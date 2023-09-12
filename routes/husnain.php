<?php

use App\Http\Controllers\CitylistingController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\WishlistController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');

});



//auth
 Auth::routes();

 //home page frontend
Route::prefix('/')->group(function(){
    Route::get('/register',[RegisterController::class,'showRegisterForm'])->name('register');
    Route::get('/',[FrontController::class,'index'])->name('/');
    Route::get('/contant',[FrontController::class,'contant'])->name('contant');
    Route::get('/about',[FrontController::class,'about'])->name('about');
    // city_listing
    Route::get('/city_listing/{id}', [CitylistingController::class,'city_listing']);
    // detail page
    Route::get('/details/{id}',[ListingController::class,'detail']);
    // Route::post('/profile.update',[ProfileController::class,'update'])->name('profile.update');
    // Route::get('/task',[FrontController::class,'task'])->name('/task');

});
Route::post('/wishlist/add/{product}', [WishlistController::class, 'addToWishlist'])->name('wishlist.add');


Route::middleware(['auth'])->group(function (){

    Route::prefix('/profile')->group(function(){

        Route::get('/add_listing',[ListingController::class,'add_listing'])->name('add_listing');

        Route::post('/store',[ListingController::class,'store'])->name('listing.store');

        Route::get('/',[ProfileController::class,'profile'])->name('profile');

        Route::post('/update',[ProfileController::class,'update'])->name('profile.update');



    });
    // wishlist
Route::get('/wishlist', [WishlistController::class, 'viewWishlist'])->name('wishlist.view');


    // countries
Route::get('/create',[ListingController::class,'country']);
Route::post('/fetch-states/{id}',[ListingController::class,'fetchStates']);
Route::post('/fetch-cities/{id}',[ListingController::class,'fetchCities']);
Route::post('/fetch-streets/{id}',[ListingController::class,'fetchStreets']);


});
