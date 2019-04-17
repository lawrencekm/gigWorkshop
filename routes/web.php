<?php
use DB;
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
Route::get('/registercustomer', function () {
    $educationlevels = DB::table('educationlevels')->pluck('name','id')->toArray();
    $citations = DB::table('citations')->pluck('name','id')->toArray();
    $typeofworks = DB::table('typeofworks')->pluck('name','id')->toArray();

    return view('auth.customer_register',compact('educationlevels','citations','typeofworks'));
});
Route::get('/registermerchant', function () {
    $userstatuses = DB::table('userstatuses')->pluck('name','id')->toArray();
    $workingstatuses = DB::table('workingstatuses')->pluck('name','id')->toArray();
    $educationlevels = DB::table('educationlevels')->pluck('name','id')->toArray();
    return view('auth.merchant_register',compact('userstatuses','workingstatuses','educationlevels'));
})->name('registermerchant');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function()
Route::group(['prefix' => 'admin'], function()

{
    Route::resource('educationlevels','EducationlevelController');
    Route::resource('disciplines','DisciplineController');
    Route::resource('orderstatuses','OrderstatusController');
    Route::resource('userdocumenttypes','UserdocumenttypeController');
    Route::resource('citations','CitationController');
    Route::resource('documenttypes','DocumenttypeController');
    Route::resource('addresses','AddressController');
    Route::resource('payments','PaymentController');
    Route::resource('paymentmethods','PaymentmethodController');
    Route::resource('paymentstatuses','PaymentstatusController');
    Route::resource('roles','RoleController');
    Route::resource('transactions','TransactionController');
    Route::resource('transactionmethods','TransactionmethodController');
    Route::resource('transactionstatuses','TransactionstatusController');
    Route::resource('transactiontypes','TransactiontypeController');
    Route::resource('typeofworks','TypeofworkController');
    Route::resource('workingstatuses','WorkingstatusController');
    Route::resource('userstatuses','UserstatusController');
    Route::resource('conversations','ConversationController');
    Route::resource('replies','ReplyController');
    Route::resource('documents','DocumentController');
    Route::resource('users','UserController');
    Route::resource('orders','OrderController');
});
/*

Route::resource('admin/educationlevels','EducationlevelController');
Route::resource('admin/disciplines','DisciplineController');
Route::resource('admin/orderstatuses','OrderstatusController');
Route::resource('admin/userdocumenttypes','UserdocumenttypeController');
Route::resource('admin/citations','CitationController');
Route::resource('admin/documenttypes','DocumenttypeController');
Route::resource('admin/addresses','AddressController');
Route::resource('admin/payments','PaymentController');
Route::resource('admin/paymentmethods','PaymentmethodController');
Route::resource('admin/paymentstatuses','PaymentstatusController');
Route::resource('admin/roles','RoleController');
Route::resource('admin/transactions','TransactionController');
Route::resource('admin/transactionmethods','TransactionmethodController');
Route::resource('admin/transactionstatuses','TransactionstatusController');
Route::resource('admin/transactiontypes','TransactiontypeController');
Route::resource('admin/typeofworks','TypeofworkController');
Route::resource('admin/workingstatuses','WorkingstatusController');
Route::resource('admin/userstatuses','UserstatusController');
Route::resource('admin/conversations','ConversationController');
Route::resource('admin/replies','ReplyController');
Route::resource('admin/documents','DocumentController');
Route::resource('admin/users','UserController');
Route::resource('admin/orders','OrderController');

*/


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