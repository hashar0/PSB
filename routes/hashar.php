<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\StreetController;
use App\Http\Controllers\admin\StateController;
use App\Http\Controllers\admin\CityController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\CountryController;
use App\Http\Controllers\admin\AddressController;
use App\Http\Controllers\admin\Sub_CategoryController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\SliderController ;
use App\Http\Controllers\PriceController ;
use App\Http\Controllers\TypeController ;
use App\Http\Controllers\AboutController ;

use App\Http\Controllers\ContantController;
use App\Http\Controllers\FooterController;

use App\Models\About;
use App\Models\Slider;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::middleware(['auth'])->group(function (){
    Route::get('/admin',[AdminController::class,'admin_panel']);
    Route::prefix('admin')->group(function(){

    Route::get('/dashboard',[AdminController::class,'index'])->name('dashboard');

    Route::get('/user',[AdminController::class,'user'])->name('users');

//categories

    Route::prefix('categories')->group(function(){
        Route::get('/',[CategoryController::class,'index'])->name('cat.index');

        Route::get('/create',[CategoryController::class,'create'])->name('cat.create');

        Route::post('/store',[CategoryController::class,'store'])->name('cat.store');

        Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('cat.edit');

        Route::post('/update/{id}',[CategoryController::class,'update'])->name('cat.update');

        Route::get('/delete/{id}',[CategoryController::class,'delete'])->name('cat.delete');

    });
//sub_categories
    Route::prefix('sub_categories')->group(function(){

        Route::get('/',[Sub_CategoryController::class,'index'])->name('sub_cat.index');

        Route::get('GetSubCatAgainstMainCatEdit/{id}',[Sub_CategoryController::class,'GetSubCatAgainstMainCatEdit']);

        Route::get('/create',[Sub_CategoryController::class,'create'])->name('sub_cat.create');

        Route::post('/store',[Sub_CategoryController::class,'store'])->name('sub_cat.store');

        Route::get('/edit/{id}',[Sub_CategoryController::class,'edit'])->name('sub_cat.edit');

        Route::post('/update/{id}',[Sub_CategoryController::class,'update'])->name('sub_cat.update');

        Route::get('/delete/{id}',[Sub_CategoryController::class,'delete'])->name('sub_cat.delete');


    });
//country
    Route::prefix('country')->group(function(){

        Route::get('/',[CountryController::class,'index'])->name('cout.index');

        Route::get('/create',[CountryController::class,'create'])->name('cout.create');

        Route::post('/store',[CountryController::class,'store'])->name('cout.store');

        Route::get('/edit/{id}',[CountryController::class,'edit'])->name('cout.edit');

        Route::post('/update/{id}',[CountryController::class,'update'])->name('cout.update');

        Route::get('/delete/{id}',[CountryController::class,'delete'])->name('cout.delete');

    });
//address
    Route::prefix('address')->group(function(){

        Route::get('/',[AddressController::class,'index'])->name('address.index');

        Route::get('/create',[AddressController::class,'create'])->name('address.create');

        Route::post('/store',[AddressController::class,'store'])->name('address.store');

        Route::get('/edit/{id}',[AddressController::class,'edit'])->name('address.edit');

        Route::post('/update/{id}',[AddressController::class,'update'])->name('address.update');

        Route::get('/delete/{id}',[AddressController::class,'delete'])->name('address.delete');


    });
// product
    Route::prefix('product')->group(function(){

        Route::get('/',[ProductController::class,'index'])->name('prdct.index');

        Route::get('/create',[ProductController::class,'create'])->name('prdct.create');

        Route::post('/store',[ProductController::class,'store'])->name('prdct.store');

        Route::get('/edit/{id}',[ProductController::class,'edit'])->name('prdct.edit');

        Route::post('/update/{id}',[ProductController::class,'update'])->name('prdct.update');

        Route::get('/delete/{id}',[ProductController::class,'delete'])->name('prdct.delete');


    });
// city
    Route::prefix('city')->group(function(){

        Route::get('/',[CityController::class,'index'])->name('sta.index');

        Route::get('/create',[CityController::class,'create'])->name('sta.create');

        Route::post('/store',[CityController::class,'store'])->name('sta.store');

        Route::get('/edit/{id}',[CityController::class,'edit'])->name('sta.edit');

        Route::post('/filter-cities', [CityController::class, 'filterCities'])->name('filter-cities');

        Route::post('/update/{id}',[CityController::class,'update'])->name('sta.update');

        Route::get('/delete/{id}',[CityController::class,'delete'])->name('sta.delete');


    });

// state
    Route::prefix('state')->group(function(){

        Route::get('/',[StateController::class,'index'])->name('sa.index');

        Route::get('/create',[StateController::class,'create'])->name('sa.create');

        Route::post('/store',[StateController::class,'store'])->name('sa.store');

        Route::get('/edit/{id}',[StateController::class,'edit'])->name('sa.edit');

        Route::post('/update/{id}',[StateController::class,'update'])->name('sa.update');

        Route::get('/delete/{id}',[StateController::class,'delete'])->name('sa.delete');


    });
// street
    Route::prefix('street')->group(function(){

        Route::get('/',[StreetController::class,'index'])->name('st.index');

        Route::get('/create',[StreetController::class,'create'])->name('st.create');

        Route::post('/store',[StreetController::class,'store'])->name('st.store');

        Route::get('/edit/{id}',[StreetController::class,'edit'])->name('st.edit');

        Route::post('/update/{id}',[StreetController::class,'update'])->name('st.update');

        Route::get('/delete/{id}',[StreetController::class,'delete'])->name('st.delete');


    });


// slider data


    Route::prefix('slider')->group(function(){

        Route::get('/',[SliderController::class,'index'])->name('slider.index');

        Route::get('/create',[SliderController::class,'create'])->name('slider.create');

        Route::post('/store',[SliderController::class,'store'])->name('slider.store');

        Route::get('/delete/{id}',[SliderController::class,'delete'])->name('slider.delete');



    });

    //header data

    Route::prefix('header')->group(function(){

        Route::get('/',[HeaderController::class,'index'])->name('head.index');

        // Route::get('/create',[HeaderController::class,'create'])->name('head.create');

        Route::post('/store',[HeaderController::class,'store'])->name('head.store');

        Route::get('/edit/{id}',[HeaderController::class,'edit'])->name('head.edit');

        Route::post('/update/{id}',[HeaderController::class,'update'])->name('head.update');

        // Route::get('/delete/{id}',[HeaderController::class,'delete'])->name('head.delete');
    });


//type
    Route::prefix('type')->group(function(){

        Route::get('/',[TypeController::class,'index'])->name('type.index');

        Route::get('/create',[TypeController::class,'create'])->name('type.create');

        Route::post('/store',[TypeController::class,'store'])->name('type.store');

        Route::get('/delete/{id}',[TypeController::class,'delete'])->name('type.delete');
    });

//about us
    Route::prefix('about')->group(function(){

        Route::get('/',[AboutController::class,'index'])->name('about.index');

        Route::get('/create',[AboutController::class,'create'])->name('about.create');

        Route::post('/store',[AboutController::class,'store'])->name('about.store');

        Route::get('/edit/{id}',[AboutController::class,'edit'])->name('about.edit');

        Route::post('/update/{id}',[AboutController::class,'update'])->name('about.update');

         Route::get('/delete/{id}',[AboutController::class,'delete'])->name('about.delete');
    });


//contact us
 Route::prefix('contact')->group(function(){

    Route::get('/',[ContantController::class,'index'])->name('contant.index');

    Route::get('/create',[ContantController::class,'create'])->name('contant.create');

    Route::post('/store',[ContantController::class,'store'])->name('contant.store');

    Route::get('/edit/{id}',[ContantController::class,'edit'])->name('contant.edit');

     Route::post('/update/{id}',[ContantController::class,'update'])->name('contant.update');

     Route::get('/delete/{id}',[ContantController::class,'delete'])->name('contant.delete');

});
//footer
 Route::prefix('footer')->group(function(){

    Route::get('/',[FooterController::class,'index'])->name('footer.index');

    Route::get('/create',[FooterController::class,'create'])->name('footer.create');

    Route::post('/store',[FooterController::class,'store'])->name('footer.store');

    Route::get('/edit/{id}',[FooterController::class,'edit'])->name('footer.edit');

     Route::post('/update/{id}',[FooterController::class,'update'])->name('footer.update');

     Route::get('/delete/{id}',[FooterController::class,'delete'])->name('footer.delete');

});

});


});
