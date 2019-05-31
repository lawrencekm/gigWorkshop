<?php
//use \DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Wezaworkshop\Mail\OrderUpdated;
use GuzzleHttp\Client;
use Wezaworkshop\Role;



//use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
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


    /*Mail::to('lawrencekm04@gmail.com')
    ->cc('lawrenceknjenga@gmail.com')
    ->bcc('lawrence@wezadata.co.ke')
    ->send(new OrderUpdated);
    */

    //tests the template
    return new OrderUpdated;

    

});

Route::get('/', function (Request $request) {

    return view('welcome');
});
Route::get('/registercustomer', function () {
    $educationlevels = DB::table('educationlevels')->pluck('name','id')->toArray();
    $citations = DB::table('citations')->pluck('name','id')->toArray();
    $typeofworks = DB::table('typeofworks')->pluck('name','id')->toArray();
    $orderstatuses = DB::table('orderstatuses')->pluck('name','id')->toArray();
    $merchantRole = Role::where('name','like','merchant')->first();
    $merchants = $merchantRole->users->pluck('firstname','id')->toArray();
    //$customerRole = Role::where('name','like','customer')->first();
    //$customers = $customerRole->users->pluck('firstname','id')->toArray();
    $transactionstatuses = DB::table('transactionstatuses')->pluck('name','id')->toArray();
    $paymentstatuses = DB::table('paymentstatuses')->pluck('name','id')->toArray();
    $documenttypes = DB::table('documenttypes')->pluck('name','id')->toArray();
    $disciplines = DB::table('disciplines')->pluck('name','id')->toArray();

    $allusers = DB::table('users')->pluck('firstname','id')->toArray();

    return view('auth.customer_register',compact('educationlevels','citations','typeofworks','orderstatuses',
    'merchants','transactionstatuses','paymentstatuses','documenttypes','disciplines','allusers'));
});

Route::get('/registermerchant', function () {
    $userstatuses = DB::table('userstatuses')->pluck('name','id')->toArray();
    $workingstatuses = DB::table('workingstatuses')->pluck('name','id')->toArray();
    $educationlevels = DB::table('educationlevels')->pluck('name','id')->toArray();
    return view('auth.merchant_register',compact('userstatuses','workingstatuses','educationlevels'));
})->name('registermerchant');

Auth::routes();//(['verify' => true]);//verify users

Route::get('/home', 'HomeController@index')->middleware(['auth', 'verified'])->name('home');


//Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function()
Route::group(['prefix' => 'admin','middleware' => ['auth','adminUser','verified']], function()

{
    Route::get('/','OrderController@index');

    Route::resource('educationlevels','EducationlevelController');
    Route::resource('disciplines','DisciplineController');
    Route::resource('orderstatuses','OrderstatusController');
    Route::resource('userdocumenttypes','UserdocumenttypeController');
    Route::resource('userdocuments','UserdocumentController');

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




Route::group(['prefix'=>'manager', 'middleware'=>['auth','managerUser']],function(){
    Route::get('/', function(){ return view('manager.dashboard');});

});
Route::group(['prefix'=>'officer','middleware'=>['auth','officerUser']],function(){
    Route::get('/', function(){ return view('officer.dashboard');});

});

Route::group(['prefix'=>'customer', 'middleware'=>['auth','customerUser']],function(){
    Route::resource('customer', 'Customer\CustomerController');
    Route::resource('order','CustomerOrderController');

   // Route::get('customer/take/{id}','Merchant\MerchantController@take');
   Route::get('blog/news', function(){ return view('customer.blog.news');});


});
Route::group(['prefix'=>'merchant', 'middleware'=>['auth','merchantUser']],function(){
    //Route::get('/', function(){ return view('merchant.dashboard');});
    Route::resource('merchant','Merchant\MerchantController');

    Route::get('merchant/take/{id}','Merchant\MerchantController@take');

    Route::get('blog/news', function(){ return view('merchant.blog.news');});


});

Route::group(['prefix'=>'public'],function(){
    Route::get('/', function(){ return view('public.dashboard');});
    Route::get('/blog/news', function(){ return view('public.dashboard');});

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
