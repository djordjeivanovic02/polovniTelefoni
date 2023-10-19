<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\FirebaseController;
use App\Http\Controllers\MyAccountController;
use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\UserDataNotification;
use App\Http\Controllers\QuickViewController;

use App\Http\Middleware\AddNewAdsMiddleware;
use App\Http\Middleware\AuthentificateFirebase;
use App\Http\Middleware\LoginRegisterMiddleware;

// javne stranice
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::post('/user/login', [FirebaseController::class, 'signIn'])->name('login');
Route::post('/user/signOut', [FirebaseController::class, 'signOut'])->name('signOut');
Route::post('/user/forgotPasssword', [FirebaseController::class, 'resetPassword'])->name('forgotPassword');
Route::post('/user/register', [FirebaseController::class, 'signUp'])->name('register');
Route::post('/subscribe', [FirebaseController::class, 'subscribe'])->name('subscribe');

Route::post('/getAds', [FirebaseController::class, 'getAdsData'])->name('get-ads');

Route::get('/mydata', [FirebaseController::class, 'getMyData']);

Route::post('/getSpecificAd', [FirebaseController::class, 'getSpecificAd'])->name('get-specific-ad');

Route::get('/login-register', [LoginRegisterController::class, 'index'])
    ->name('login-register')
    ->middleware('loginRegisterAuth');

Route::get('/models/{model}', [WelcomeController::class, 'getModels']);
Route::get('/getLast', [FirebaseController::class, 'getLastNumericKey']);
// Route::get('/rates', [FirebaseController::class, 'getRates']);

Route::get('/quick-view', [QuickViewController::class, 'index']);
Route::get('/wishlist', [MyAccountController::class, 'wishlist'])->name('wishlist');

Route::middleware(['firebaseAuth'])->group(function () {
    // Zasticene stranice
    Route::get('/my-account/dashboard', [MyAccountController::class, 'index'])->name('my-account');
    Route::get('/my-account/edit-account', [MyAccountController::class, 'myData'])->name('edit-account');
    Route::get('/my-account/add-new-ads', [MyAccountController::class, 'addNewAds'])
        ->name('add-new-ads')
        ->middleware('addNewAds');
    Route::post('/user/verifyEmail', [FirebaseController::class, 'sendEmailVerification'])->name('verifyEmail');
    Route::post('/user/getUsername', [FirebaseController::class, 'getMyData'])->name('getMyData');
    Route::post('/user/updateData', [FirebaseController::class, 'updateUser'])->name('updateMyData');
    Route::get('my-account/add-new-ads/mobilePhoneMainImage', [FirebaseController::class, 'mobilePhoneMainImage'])->name('mobilePhoneMainImage');
    Route::get('my-account/userData', [UserDataNotification::class, 'index'])->name('user-data-notification');
    Route::post('/user/addNewAds', [FirebaseController::class, 'addNewAds'])->name('addNewAds');
    Route::post('/user/addToFavourite', [FirebaseController::class, 'addToFavourite'])->name('addToFavourite');
    Route::post('/user/addToCompare', [FirebaseController::class, 'addToCompare'])->name('addToCompare');
    //Route::get('/user/countCompared', [FirebaseController::class, 'countCompared'])->name('countCompared');
    Route::post('user/addToCart', [FirebaseController::class, 'addToCart'])->name('addToCart');
});
