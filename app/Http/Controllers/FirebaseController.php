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

class FirebaseController extends Controller
{

    protected $auth, $database, $storage;

    public function __construct(){
        $firebase = (new Factory)
            ->withServiceAccount(__DIR__.'/polovni-telefoni-b4d1c-firebase-adminsdk-ekkpf-0e0ef01ce7.json')
            ->withDatabaseUri('https://polovni-telefoni-b4d1c-default-rtdb.firebaseio.com');
        
        $this->auth = $firebase->createAuth();
        $this->database = $firebase->createDatabase();
        $this->storage = $firebase->createStorage();
    }
    public function checkUsernameAvailability($username){
        $databaseRef = $this->database->getReference('user');
    
        $query = $databaseRef->orderByChild('username')->equalTo($username);
        $snapshot = $query->getValue();
    
        if ($snapshot) return false; // username je zauzet
        else return true; // username je slobodan
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
        } catch (\Throwable $e) {
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
            $newUser = $this->auth->createUserWithEmailAndPassword($email, $password);
            $uid = $newUser->uid;
            //unosi username u bazu
            $ref = $this->database->getReference('user/'.$uid);
            $ref->set([
                'username' => $username,
                'first-name' => '',
                'second-name' => '',
            ]);
            $this->auth->sendEmailVerificationLink($email);
            return 1;
            //return redirect()->away('welcome');
        }catch(\Throwable $e){
            return $e->getMessage();
            switch ($e->getMessage()) {
                case 'The email address is already in use by another account.':
                    return 2;
                    break;
                case 'A password must be a string with at least 6 characters.':
                    return 3;
                    break;
                default:
                    return 5;
                    break;
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

            if ($verifiedIdToken->claims()->get('email_verified')) {
                $uid = $verifiedIdToken->claims()->get('sub');
                FirebaseController::getMyData($uid, $email);
                Session::put('firebaseUserId', $signInResult->firebaseUserId());
                Session::put('idToken', $signInResult->idToken());
                Session::save();

                return 1;
            } 
            return 5;
        }catch(\Throwable $e){
            return $e->getMessage();
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
        } catch (\Throwable $e) {
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

            return redirect()->route('welcome');
            //return redirect()->away('../');
            //dd('Korisnik je odjavljen');
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
        }catch(\Throwable $e){
            //echo $e->getMessage();
            return false;
        }
    }

    public function getMyData($uid='', $email){
        if($uid == '')
            $uid = FirebaseController::getUserUID();
        $ref = $this->database->getReference('user')->getValue();
        
        $user = new UserModel(
            $email,  
            $ref[$uid]["username"],
            $ref[$uid]["first-name"],
            $ref[$uid]["second-name"],
        );
        Session::put('user', $user);
        Session::save();
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
            $ref = $this->database->getReference('user/'.$uid);
            if($userData->getUsername() != $username && !$this->checkUsernameAvailability($username)) return 2;
            $ref->update([
                'first-name' => $firstName,
                'second-name' => $secondName,
                'username' => $username,
            ]);
            $this->getMyData($uid, $email);

            $firebaseUser = $this->auth->getUserByEmail($email);
            // $firebaseUser->updatePassword($new_password);

            return 1;
        }catch(\Throwable $e){
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
        }catch(\Throwable $e){
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

    public function getLastNumericKey() {
        $ref = $this->database->getReference('ads')
            ->orderByKey()
            ->limitToLast(1)
            ->getValue();
        
        if (!empty($ref)) {
            if(count($ref) == "2"){
                return 1;
            }else{
                return key($ref);
            }
        } else {
            return 0;
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
        $randomText = $this->getLastNumericKey() + 1;
        $ref = $this->database->getReference('ads/'.$randomText);
        $ref->set([
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
        ]);
        for($i = 0; $i <= 8; $i++){
            $file = $request->file('file_' . $i);
            if ($file) {
                $fileName = $file->getClientOriginalName();
                $fileExtension = $file->getClientOriginalExtension();
                $fileSize = $file->getSize();

                $storage = $this->storage;
                $bucket = $storage->getBucket();
                $destinationPath = 'ads/' . $randomText . '/images/' . $fileName;
                $storageReference = $bucket->upload(
                    fopen($file->getPathname(), 'r'),
                    ['name' => $destinationPath]
                );
            }
        }
        echo 1;
    }
    public function getAdsData(Request $request) {
        $page = $request->input('page');
        // $this->getLastNumericKey();
        $cachedAds = Cache::remember("cached_ads_page_$page", 500, function () use ($page) {
            $perPage = 16;
            $offset = ($page - 1) * $perPage;
    
            $ref = $this->database->getReference('ads')
                ->orderByKey()
                ->startAt(strval($offset))
                ->limitToFirst($perPage + 1)
                ->getValue();

            $ads = collect($ref)->map(function ($adData, $adKey) {
                if($adData != null){
                    $newAdd = new Ad($adData);
                    $storageBucket = $this->storage->getBucket();
                    $imageReference = $storageBucket->object('main-image/' . $newAdd['brand'] . '/' . $newAdd['model'] . '.jpg');
                    try{
                        $imageContents = $imageReference->downloadAsStream();
                        $base64Image = base64_encode($imageContents);

                        $newAdd['main-image'] = $base64Image;
                    }catch(StorageException $e){
                        $newAdd['main-image'] = 'none';
                    }

                    $imagesFolderPrefix = 'ads/' . $adKey . '/images/';
                    try{
                        $images = [];
                        $objects = $this->storage->getBucket()->objects(['prefix' => $imagesFolderPrefix]);
                        foreach ($objects as $object) {
                            $image = $object->downloadAsString();
                            $images[] = base64_encode($image);
                        }
                        $newAdd['images'] = $images;
                    }catch(StorageException $e){
                        $newAdd['images'] = 'none';
                    }
                    $newAdd['rates'] = $this->getRates($adKey)[0];
                    $newAdd['ratesCount'] = $this->getRates($adKey)[1];
                    $newAdd['creatorUsername'] = $this->getUserUsername($adData['user']);
                    return $newAdd;
                }
            });
    
            return $ads;
        });
    
        return response()->json($cachedAds);
    }

    public function getRates($adKey2){
        $ref = $this->database->getReference('rates/' . $adKey2)->getSnapshot();
        $ocene = [];
        if($ref->getValue() == null) return array(0, 0);
        foreach($ref->getValue() as $korisnikId => $ocena){
            $ocene[] = $ocena['rate'];
        }
        $prosecnaOcena = count($ocene) > 0 ? array_sum($ocene) / count($ocene) : 0;
        $result = array($prosecnaOcena, count($ocene));
        return $result;
    }
    public function getUserUsername($userUID){
        $ref = $this->database->getReference('user')->getValue();
        return $ref[$userUID]['username'];
    }
}