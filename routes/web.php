<?php

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

Route::get('/login', function () {
    return view('merchant.dashboard');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/test', function(){
    echo "found";
    //return view('merchant.dashboard');
});

Route::group(['prefix'=>'admin','middleware'=>'admin'],function(){
    Route::resources(['users'=>'Usercontroller',
                    'transactions'=>'TransactionController']);
});

Route::group(['prefix'=>'merchant','middleware'=>'merchant'],function(){
 
});
Route::group(['prefix'=>'customer','middleware'=>'customer'],function(){
    
});
Route::group(['prefix'=>'manager','middleware'=>'manager'],function(){
    
});
Route::group(['prefix'=>'officer','middleware'=>'officer'],function(){
    
});
