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
Route::get('/test', function(){
    //echo "found";
  //dd($user);
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('admin/educationlevels','EducationlevelController');
Route::resource('admin/disciplines','DisciplineController');
Route::resource('admin/orderstatuses','OrderstatusController');
Route::resource('admin/userdocumenttypes','UserdocumenttypeController');
Route::resource('admin/citations','CitationController');
Route::resource('admin/documenttypes','DocumenttypeController');
Route::resource('admin/addresses','AddressController');
Route::resource('admin/paymentmethods','PaymentmethodController');
Route::resource('admin/paymentstatuses','PaymentstatusController');
Route::resource('admin/roles','RoleController');
Route::resource('admin/transactionmethods','TransactionmethodController');

Route::resource('admin/transactionstatuses','TransactionstatusController');
Route::resource('admin/transactiontypes','TransactiontypeController');
Route::resource('admin/typeofworks','TypeofworkController');
Route::resource('admin/workingstatuses','WorkingstatusController');
Route::resource('admin/userstatuses','UserstatusController');
Route::resource('admin/conversations','ConversationController');



//Route::match(['post','put'],'/admin/educationlevels','EducationlevelController@update');


/*

Route::group(['prefix'=>'admin'],function(){
    Route::get('/', function(){ 
        return view('admin.dashboard');
    });
    Route::get('users', 'UserController@index');
    Route::post('users/create', 'UserController@create');
    //Route::post('users/store', 'UserController@store');
    //Route::match(['get', 'post'],'users/store', 'UserController@store');
    
    //Route::match(['get','put'],'educationlevels','EducationlevelController@update');

    //Route::get('educationlevels','EducationlevelController@update');

    Route::resource('educationlevels','EducationlevelController');


    
  //  Route::get('educationlevels', 'EducationlevelController@index');
   // Route::get('educationlevels/create', 'EducationlevelController@create');
    //Route::match(['get','post'],'educationlevels/store','EducationlevelController@store');
    //Route::get('educationlevels/show/{id}', 'EducationlevelController@show');


    //Route::resources(['users'=>'UserController', 'transactions'=>'TransactionController']);
});


*/








Route::group(['prefix'=>'manager'],function(){
    Route::get('/', function(){ return view('manager.dashboard');});

});
Route::group(['prefix'=>'officer','middleware'=>'officer'],function(){
    Route::get('/', function(){ return view('officer.dashboard');});

});

Route::group(['prefix'=>'customer'],function(){
    Route::get('/', function(){ return view('customer.dashboard');});

});
Route::group(['prefix'=>'merchant'],function(){
    Route::get('/', function(){ return view('merchant.dashboard');});

});
Route::group(['prefix'=>'public'],function(){
    Route::get('/', function(){ return view('public.dashboard');});

});