<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Storage;
use Firebase\Auth\Token\Exception\InvalidToken;
use Kreait\Firebase\Exception\Auth\RevokedIdToken;

use Kreait\Firebase\Exception\Auth\EmailNotVerified;
use Kreait\Firebase\Exception\Auth\InvalidEmail;
use Kreait\Firebase\Exception\Auth\UserNotFound;
use Kreait\Firebase\Exception\StorageException;

use Google\Cloud\Storage\StorageClient;

use App\Models\UserModel;
use App\Models\Ad;

use Illuminate\Support\Facades\Cache;

use Google\Cloud\Firestore\FirestoreClient;

class FirebaseController extends Controller
{

    protected $auth, $database, $storage, $firestore;

    public function __construct(){
        $firebase = (new Factory)
            ->withServiceAccount(__DIR__.'/polovni-telefoni-b4d1c-firebase-adminsdk-ekkpf-0e0ef01ce7.json')
            ->withDatabaseUri('https://polovni-telefoni-b4d1c-default-rtdb.firebaseio.com');

        $this->firestore = new FirestoreClient([
            'projectId' => 'polovni-telefoni-b4d1c',
        ]);
        $this->auth = $firebase->createAuth();
        $this->database = $firebase->createDatabase();
        $this->storage = $firebase->createStorage();
    }
    public function checkUsernameAvailability($username){
        $collection = $this->firestore->collection('users');
        $query = $collection->where('username', '=', $username);
        $documents = $query->documents();
        return $documents->isEmpty();
    }
    public function checkEmailAvailability($email){
        $databaseRef = $this->database->getReference('subscriber');

        $query = $databaseRef->orderByChild('email')->equalTo($email);
        $snapshot = $query->getValue();

        if ($snapshot) return false; // username je zauzet
        else return true; // username je slobodan
    }
    public function sendEmailVerification(Request $request){
        $email = $request->input('email_username');
        try {
            $user = $this->auth->getUserByEmail($email);
            $this->auth->sendEmailVerificationLink($email);
            return 1;
        } catch (InvalidEmail $e) {
            return 4; // Pogresna email adresa
        } catch (\Exception $e) {
            return $e->getMessage(); // Greska pri slanju
        }
    }
    public function signUp(Request $request){
        $email = $request->input('email_reg');
        $username = $request->input('username_reg');
        $password = $request->input('password_reg');

        try{
            // proverava dostupnost username-a
            if(!FirebaseController::checkUsernameAvailability($username)) return 4; // username zauzet

            //kreira novog korisnika
            $uid = $this->auth->createUserWithEmailAndPassword($email, $password)->uid;
            $collection = $this->firestore->collection('users');
            $documentReference = $collection->document($uid);
            $data = [
                'username' => $username,
                'first-name' => '',
                'second-name' => '',
            ];
            $documentReference->set($data);
            $this->auth->sendEmailVerificationLink($email);
            return 1;
        }catch(\Exception $e){
            switch ($e->getMessage()) {
                case 'The email address is already in use by another account.':
                    return 2;
                    break;
                case 'A password must be a string with at least 6 characters.':
                    return 3;
                default:
                    return 5;
            }
        }
    }
    public function signIn(Request $request){
        $email = $request->input('email_username');
        $password = $request->input('password');
        try{
            $signInResult = $this->auth->signInWithEmailAndPassword($email, $password);
            $idToken = $signInResult->idToken();
            $verifiedIdToken = $this->auth->verifyIdToken($idToken);

            if ($verifiedIdToken->claims()->has('email_verified')) {
                if ($verifiedIdToken->claims()->get('email_verified')) {

                    $uid = $verifiedIdToken->claims()->get('sub');
                    FirebaseController::getMyData($uid, $email);
                    Session::put('firebaseUserId', $signInResult->firebaseUserId());
                    Session::put('idToken', $signInResult->idToken());
                    Session::save();
                    Cache::forget("cached_ads_page_1");
                    return 1;
                } else {
                    // The email is not verified
                    return 5;
                }
            } else {
                return 5; // Or handle the case as needed
            }
        }catch(\Exception $e){
            switch ($e->getMessage()) {
                case 'INVALID_PASSWORD':
                    //echo "Pogresna lozinka.";
                    return 4;
                    break;
                case 'EMAIL_NOT_FOUND':
                    //echo "Email adresa nije pronadjena";
                    return 2;
                    break;
                case 'The email address is invalid.':
                    //echo "Email adresa nije pronadjena";
                    return 3;
                    break;
                default:
                    return $e->getMessage();
                    break;
            }
        }
    }
    public function resetPassword(Request $request){
        $email = $request->input('email_username');
        $password = $request->input('password');
        try {
            $this->auth->sendPasswordResetLink($email);
            echo 1;
        } catch (\Exception $e) {
            switch ($e->getMessage()) {
                case 'EMAIL_NOT_FOUND':
                    //return response()->json(['error' => 'Email adresa nije pronađena.']);
                    echo 2;
                    break;
                default:
                    //return response()->json(['error' => 'Greška pri slanju emaila za resetovanje lozinke.']);
                    echo 3;
                    break;
            }
        }
    }
    public function signOut(){
        if(Session::has('firebaseUserId') && Session::has('idToken')){
            $this->auth->revokeRefreshTokens(Session::get('firebaseUserId'));
            Session::forget('firebaseUserId');
            Session::forget('idToken');
            Session::forget('user');
            Session::save();
            Cache::forget("cached_ads_page_1");
            return redirect()->route('welcome');
        }else{
            //dd('Korisnik je vec odjavljen');
        }

    }
    public function userCheck(){
        try{
            $idToken = Session::get('idToken');
            if(empty($idToken)) {
                //echo 'Korisnik nije prijavljen';
                return false;
            }
            $verifiedIdToken = $this->auth->verifyIdToken($idToken, $checkIfRevoked = true);
            //dump($verifiedIdToken);
            //dump($verifiedIdToken->claims()->get('sub'));//uid
            //dump($this->auth->getUser($verifiedIdToken->claims()->get('sub')));
            return true;
        }catch(\Exception $e){
            //echo $e->getMessage();
            return false;
        }
    }
    public function getMyData($uid='', $email){
        if($uid == '')
            $uid = FirebaseController::getUserUID();
        $collection = $this->firestore->collection('users');
        $documentReference = $collection->document($uid);
        $snapshot = $documentReference->snapshot();
        if($snapshot->exists()){
            $documentData = $snapshot->data();
            $user = new UserModel(
                $email,
                $documentData["username"],
                $documentData["first-name"],
                $documentData["second-name"]
            );
            Session::put('user', $user);
            Session::save();
        }
    }
    public function getUserUID(){
        $idToken = Session::get('idToken');
        if(empty($idToken)) {
            //echo 'Korisnik nije prijavljen';
            return false;
        }
        $verifiedIdToken = $this->auth->verifyIdToken($idToken, $checkIfRevoked = true);
        $uid = $verifiedIdToken->claims()->get('sub');
        return $uid;
    }
    private function getEmail(){
        $idToken = Session::get('idToken');
        $verifiedIdToken = $this->auth->verifyIdToken($idToken, $checkIfRevoked = true);
        //$email = $verifiedIdToken->getClaim('email');
        return $verifiedIdToken->claims()->get('email');
    }
    public function updateUser(Request $request){
        //$email = $request->input('')
        $firstName = $request->input('account-first-name');
        $secondName = $request->input('account-second-name');
        $username = $request->input('account-username');
        $email = $this->getEmail();
        $new_password = $request->input('account-new-password');

        $uid = $this->getUserUID();
        try{
            $userData = Session::get('user');
            $collection = $this->firestore->collection('users');
            $documentReference = $collection->document($uid);
            $snapshot = $documentReference->snapshot();

            if($userData->getUsername() != $username && !$this->checkUsernameAvailability($username)) return 2;

            if($snapshot->exists()){
                $documentData = $snapshot->data();
                $documentData['first-name'] = $firstName;
                $documentData['second-name'] = $secondName;
                $documentData['username'] = $username;
                $documentReference->set($documentData);
            }

            $this->getMyData($uid, $email);

            //$firebaseUser = $this->auth->getUserByEmail($email);
            // $firebaseUser->updatePassword($new_password);

            return 1;
        }catch(\Exception $e){
            return $e;
        }
    }
    public function subscribe(Request $request){
        $email = $request->input('email');
        try{
            if($this->checkEmailAvailability($email)){
                $date = date('d-m-y h:i:s');
                $randomText = substr(md5(mt_rand()), 0, 10);
                $ref = $this->database->getReference('subscriber/'.$randomText);
                $ref->set([
                    'email' => $email,
                    'date' => $date,
                ]);
                return 1;
            }else return 2;
            return 3;
        }catch(\Exception $e){
            return $e;
        }
    }
    public function mobilePhoneMainImage(Request $request){
        $phoneBrand = $request->input('phoneBrand');
        $phoneModel = $request->input('phoneModel');

        $storageBucket = $this->storage->getBucket();
        $imageReference = $storageBucket->object('main-image/' . $phoneBrand . '/' . $phoneModel . '.jpg');
        try{
            $imageContents = $imageReference->downloadAsStream();
            $base64Image = base64_encode($imageContents);

            echo $base64Image;
        }catch(StorageException $e){
            echo $e->getMessage();
        }
    }
    public function addNewAds(Request $request){
        $adsTitle = $request->input('adsTitle');
        $category = $request->input('category');
        $brand = $request->input('brand');
        $model = $request->input('model');
        $color = $request->input('color');
        $state = $request->input('state');
        $description = $request->input('description');
        $price = $request->input('price');
        $phoneNumber = $request->input('phoneNumber');
        $addons = $request->input('addons');
        $bad = $request->input('bad');

        $uid = $this->getUserUID();

        $categoryValue = '';
        switch($category){
            case '1':
                $categoryValue = 'mobile-phone';
                break;
            default:
                $categoryValue = 'other';
                break;
        }
        $colorValue = '';
        switch($color){
            case '1':
                $colorValue = 'black';
                break;
            case '2':
                $colorValue = 'white';
                break;
            case '3':
                $colorValue = 'grey';
                break;
            case '4':
                $colorValue = 'red';
                break;
            case '5':
                $colorValue = 'green';
                break;
            case '6':
                $colorValue = 'blue';
                break;
            case '7':
                $colorValue = 'orange';
                break;
            case '8':
                $colorValue = 'yellow';
                break;
            default:
                $colorValue = 'other';
                break;
        }
        $stateValue = '';
        switch($state){
            case '1':
                $stateValue = 'new';
                break;
            case '2':
                $stateValue = 'old';
                break;
        }

        $date = date('d-m-y h:i:s');


        $collection = $this->firestore->collection('ads');
        $data = [
            'user' => $uid,
            'adsTitle' => $adsTitle,
            'category' => $categoryValue,
            'brand' => $brand,
            'model' => $model,
            'color' => $colorValue,
            'state' => $stateValue,
            'description' => $description,
            'price' => $price,
            'phoneNumber' => $phoneNumber,
            'addons' => $addons,
            'dateCreate' => $date,
            'confirmed' => false,
            'bad' => $bad,
            'rates' => 0,
        ];
        $document = $collection->add($data);
        //$firestore->getFirebase()->getConnection()->close();

        $images = [];
        for($i = 0; $i <= 8; $i++){
            $file = $request->file('file_' . $i);
            if ($file) {
                $fileName = $file->getClientOriginalName();
                $fileExtension = $file->getClientOriginalExtension();
                $fileSize = $file->getSize();

                $storage = $this->storage;
                $bucket = $storage->getBucket();
                $destinationPath = 'ads/' . $document->id() . '/images/' . $fileName;
                $storageReference = $bucket->upload(
                    fopen($file->getPathname(), 'r'),
                    ['name' => $destinationPath]
                );
                array_push($images, 'https://firebasestorage.googleapis.com/v0/b/polovni-telefoni-b4d1c.appspot.com/o/ads%2F'.$document->id().'%2Fimages%2F'.$fileName.'?alt=media&token=f2662cca-d2a6-4969-a1fe-c7340cce2800');
            }
        }
        $document->update([
            ['path' => 'images', 'value' => $images],
        ]);
        echo 1;
    }
    private function updateCacheData($page){
        return $cachedAds = Cache::remember("cached_ads_page_$page", 300, function () use ($page) {
            $perPage = 16;
            $offset = ($page - 1) * $perPage;

            $collection = $this->firestore->collection('ads');
            $query = $collection->orderBy('adsTitle')->offset($offset)->limit($perPage);
            $documents = $query->documents();
            $ads = [];
            foreach($documents as $adKey => $adData){
                $adKey = $adData->id();

                $newAdd = new Ad();
                $newAdd->uid = $adKey;
                $newAdd->adsTitle = $adData['adsTitle'];
                $newAdd->category = $adData['category'];
                $newAdd->brand = $adData['brand'];
                $newAdd->model = $adData['model'];
                $newAdd->description = $adData['description'];
                $newAdd->user = $adData['user'];
                $newAdd->state = $adData['state'];
                $newAdd->price = $adData['price'];
                $newAdd->phoneNumber = $adData['phoneNumber'];
                $newAdd->dateCreate = $adData['dateCreate'];
                $newAdd->color = $adData['color'];
                $newAdd->addons = $adData['addons'];
                $newAdd->images = $adData['images'];
                $newAdd->isFavourite = $this->checkFavourite($adKey, FirebaseController::getUserUID());
                $newAdd->compared = $this->checkCompared($adKey);
                $newAdd->cart = $this->checkCart($adKey);
                $newAdd->oldPrice = $adData['oldPrice'];

                $newAdd['main-image'] = 'https://firebasestorage.googleapis.com/v0/b/polovni-telefoni-b4d1c.appspot.com/o/main-image%2F'.$adData['brand'].'%2F' . $adData['model'] .'.jpg?alt=media&token=f2662cca-d2a6-4969-a1fe-c7340cce2800';

                $newAdd['rates'] = $this->getRates($adKey)[0];
                $newAdd['ratesCount'] = $this->getRates($adKey)[1];
                $newAdd['creatorUsername'] = $this->getUserUsername($adData['user']);
                $ads[] = $newAdd;
            }
            return $ads;
        });
    }
    public function getAdsData(Request $request) {
        $page = $request->input('page');
        $cachedAds = $this->updateCacheData($page);
        return response()->json($cachedAds);
    }
    public function getRates($adKey2){
        $collection = $this->firestore->collection('rates');
        $query = $collection->where('ads_uid', '=', $adKey2);
        $documents = $query->documents();

        $ocene = [];
        foreach($documents as $adKey => $adData){
            $ocene[] = $adData['rate'];
        }
        $prosecnaOcena = count($ocene) > 0 ? array_sum($ocene) / count($ocene) : 0;
        $result = array($prosecnaOcena, count($ocene));
        return $result;
    }
    public function getUserUsername($userUID){
        $collection = $this->firestore->collection('users');
        $documentReference = $collection->document($userUID);
        return $documentReference->snapshot()->data()['username'];
    }
    public function getSpecificAd(Request $request){
        $uid = $request->input('ad');
        $cachedAd = Cache::remember($uid, 500, function () use ($uid){
            $collection = $this->firestore->collection('ads');
            $documentReference = $collection->document($uid);
            $snapshot = $documentReference->snapshot();

            if($snapshot->exists()){
                $adData = $snapshot->data();
                #region returnAd
                $newAdd = new Ad();
                $newAdd->uid = $uid;
                $newAdd->adsTitle = $adData['adsTitle'];
                $newAdd->category = $adData['category'];
                $newAdd->brand = $adData['brand'];
                $newAdd->model = $adData['model'];
                $newAdd->description = $adData['description'];
                $newAdd->user = $adData['user'];
                $newAdd->state = $adData['state'];
                $newAdd->price = $adData['price'];
                $newAdd->phoneNumber = $adData['phoneNumber'];
                $newAdd->dateCreate = $adData['dateCreate'];
                $newAdd->color = $adData['color'];
                $newAdd->addons = $adData['addons'];
                $newAdd->images = $adData['images'];
                $newAdd->visits = $adData['visits'];
                $newAdd->cart = $this->checkCart($uid);
                $newAdd->compared = $this->checkCompared($uid);
                $newAdd->count = $adData['count'];
                $newAdd->oldPrice = $adData['oldPrice'];
                $newAdd->cartCount = $adData['cartCount'];
                #endregion

                $newAdd['main-image'] = 'https://firebasestorage.googleapis.com/v0/b/polovni-telefoni-b4d1c.appspot.com/o/main-image%2F'.$adData['brand'].'%2F' . $adData['model'] .'.jpg?alt=media&token=f2662cca-d2a6-4969-a1fe-c7340cce2800';

                $newAdd->rates = $this->getRates($uid)[0];
                $newAdd->ratesCount = $this->getRates($uid)[1];
                $newAdd->creatorUsername = $this->getUserUsername($adData['user']);
                return $newAdd;
            }
            return null;
        });
        return response()->json($cachedAd);
    }
    public function addToFavourite(Request $request){
        $uid = $request->input('uid');
        try{
            $uidUser = FirebaseController::getUserUID();
            $collection = $this->firestore->collection('users');
            $documentReference = $collection->document($uidUser);
            $favCollection = $documentReference->collection('favourite');

            if($this->checkFavourite($uid)){
                $favCollection->document($uid)->delete();
                $this->updateFavouriteCached($uid, false, 1);
                return 1;
            }else{
                $date = date('d-m-y h:i:s');
                $favCollection->document($uid)->set([
                    'dateTime' => $date,
                ]);
                $this->updateFavouriteCached($uid, true, 1);
                return 2;
            }

        }catch(\Exception $e){
            return $e;
        }
    }
    public function checkFavourite($uid){
        try{
            $uidUser = FirebaseController::getUserUID();
            $collection = $this->firestore->collection('users')
                            ->document($uidUser)
                            ->collection('favourite');
            $documentReference = $collection->document($uid);
            $documentSnapshot = $documentReference->snapshot();
            return $documentSnapshot->exists();
        }catch(\Exception $e){
            return false;
        }
    }
    private function updateFavouriteCached($uid, $fav, $page){
        $cacheName = "cached_ads_page_$page";
        if(Cache::has($cacheName)){
            $cachedAds = Cache::get($cacheName);
            foreach ($cachedAds as &$ad) {
                if ($ad->uid === $uid) {
                    $ad->isFavourite = $fav;
                }
            }
            Cache::put("cached_ads_page_$page", $cachedAds, 300);
        }
        if(Cache::has($uid)){
            $cachedAds = Cache::get($uid);
            $cachedAds->isFavourite = $fav;
            Cache::put($uid, $cachedAds, 300);
        }
    }
    private function updateCompareCached($uid, $compare, $page){
        $cacheName = "cached_ads_page_$page";
        if(Cache::has($cacheName)){
            $cachedAds = Cache::get($cacheName);
            foreach ($cachedAds as &$ad) {
                if ($ad->uid === $uid) {
                    $ad->compared = $compare;
                }
            }
            Cache::put("cached_ads_page_$page", $cachedAds, 300);
        }
        if(Cache::has($uid)){
            $cachedAds = Cache::get($uid);
            $cachedAds->compared = $compare;
            Cache::put($uid, $cachedAds, 300);
        }
    }
    private function updateCartCached($uid, $cart, $page){
        $cacheName = "cached_ads_page_$page";
        if(Cache::has($cacheName)){
            $cachedAds = Cache::get($cacheName);
            foreach ($cachedAds as &$ad) {
                if ($ad->uid === $uid) {
                    $ad->cart = $cart;
                }
            }
            Cache::put("cached_ads_page_$page", $cachedAds, 300);
        }
        if(Cache::has($uid)){
            $cachedAds = Cache::get($uid);
            $cachedAds->cart = $cart;
            Cache::put($uid, $cachedAds, 300);
        }
    }
    private function checkCompared($uid){
        try{
            $uidUser = FirebaseController::getUserUID();
            $collection = $this->firestore->collection('users')
                            ->document($uidUser)
                            ->collection('compare');
            $documentReference = $collection->document($uid);
            $documentSnapshot = $documentReference->snapshot();
            return $documentSnapshot->exists();
        }catch(\Exception $e){
            return false;
        }
    }
    public function countCompared(){
        try{
            $uidUser = FirebaseController::getUserUID();
            $collection = $this->firestore->collection('users')
                            ->document($uidUser)
                            ->collection('compare');
            $querySnapshot = $collection->documents();
            $countDocument = $querySnapshot->size();
            if($countDocument < 4){
                return true;
            }
            return false;
        }catch(\Exception $e){
            return false;
        }
    }
    public function addToCompare(Request $request){
        $uid = $request->input('uid');
        try{
            $uidUser = FirebaseController::getUserUID();
            $collection = $this->firestore->collection('users');
            $documentReference = $collection->document($uidUser);
            $favCollection = $documentReference->collection('compare');

            if($this->checkCompared($uid)){
                $favCollection->document($uid)->delete();
                $this->updateCompareCached($uid, false, 1);
                return 1;
            }else{
                if($this->countCompared()){
                    $date = date('d-m-y h:i:s');
                    $favCollection->document($uid)->set([
                        'dateTime' => $date,
                    ]);
                    $this->updateCompareCached($uid, true, 1);
                    return 2;
                }else{
                    return 3;
                }
            }

        }catch(\Exception $e){
            return $e;
        }
    }
    public function addToCart(Request $request): \Exception|int
    {
        $uid = $request->input('uid');
        $quantity = $request->input('quantity');
        try {
            $uidUser = FirebaseController::getUserUID();
            $collection = $this->firestore->collection('users');
            $documentReference = $collection->document($uidUser);
            $cartCollection = $documentReference->collection('cart');
            if($this->checkCart($uid)){
                $cartCollection->document($uid)->delete();
                $this->updateCartCached($uid, false, 1);
                if($this->incrementDecrementCartCount($uid, false)){
                    return 1;
                }
                return 3;
            }else{
                $date = date('d-m-y h:i:s');
                $cartCollection->document($uid)->set([
                    'dateTime' => $date,
                    'quantity' => $quantity,
                ]);
                $this->updateCartCached($uid, true, 1);
                if($this->incrementDecrementCartCount($uid, true)){
                    return 2;
                }
                return 3;
            }
        }catch (\Exception $e){
            return $e;
        }
    }
    private function incrementDecrementCartCount($uid, $increment){
        try{
            $collection = $this->firestore->collection('ads');
            $documentReference = $collection->document($uid);
            $snapshot = $documentReference->snapshot();
            if($snapshot->exists()){
                $documentData = $snapshot->data();
                $documentData['cartCount'] = $increment ? $documentData['cartCount'] + 1 : $documentData['cartCount'] - 1;
                $documentReference->set($documentData);
            }
            return true;
        }catch(\Exception $e){
            return false;
        }
    }
    private function checkCart($uid){
        try{
            $uidUser = FirebaseController::getUserUID();
            $collection = $this->firestore->collection('users')
                ->document($uidUser)
                ->collection('cart');
            $documentReference = $collection->document($uid);
            $documentSnapshot = $documentReference->snapshot();
            return $documentSnapshot->exists();
        }catch(\Exception $e){
            return false;
        }
    }
}
