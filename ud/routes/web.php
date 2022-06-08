<?php

use App\Http\Controllers\admin\CandCController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\admin\VertualAController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\AlltvController;
use App\Http\Controllers\AirtimeController;
use App\Http\Controllers\EkectController;
use App\Http\Controllers\listdata;
use App\Http\Controllers\ResellerController;
use App\Http\Controllers\VertualController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FundController;
use App\Http\Controllers\BillController;


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
    if (Auth()->user()) {
        return redirect(route('dashboard'))
            ->withSuccess('Signed in');

    }else {
        return view('auth.login');
    }
});
Route::post('log', [AuthController::class, 'customLogin'])->name('log');

//Route::get('select', function () {
//    return view('select');
//});
//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');
Route::middleware(['auth'])->group(function () {
Route::post('passw', [AuthController::class, 'pass'])->name('passw');
Route::get('tv', [AlltvController::class, 'tv'])->name('tv');
Route::get('select', [AuthController::class, 'select'])->name('select');
Route::get('select1', [AuthController::class, 'select1'])->name('select1');
Route::post('tvp', [AlltvController::class, 'paytv'])->name('tvp');
Route::get('paytv', [AlltvController::class, 'paytv'])->name('paytv');
Route::post('verifytv', [AlltvController::class, 'verifytv'])->name('verifytv');
Route::get('listdata', [listdata::class, 'list'])->name('listdata');
Route::get('listtv', [AlltvController::class, 'listtv'])->name('listv');
Route::get('listelect', [EkectController::class, 'listelect'])->name('listelect');
Route::get('elect', [EkectController::class, 'electric'])->name('elect');
Route::post('velect', [EkectController::class, 'verifyelect'])->name('velect');
Route::post('payelect', [EkectController::class, 'payelect'])->name('payelect');
Route::get('invoice', [AuthController::class, 'invoice'])->name('invoice');
Route::get('charges', [AuthController::class, 'charges'])->name('charges');
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('referal', [AuthController::class, 'refer'])->name('referal');
Route::post('mp', [ResellerController::class, 'reseller'])->name('mp');
Route::get('reseller', [ResellerController::class, 'sell'])->name('reseller');
Route::get('upgrade', [ResellerController::class, 'apiaccess'])->name('upgrade');
Route::post('buyairtime', [AirtimeController::class, 'airtime'])->name('buyairtime');
Route::get('airtime', [AuthController::class, 'airtime'])->name('airtime');
Route::post('buydata', [AuthController::class, 'buydata'])->name('buydata');
Route::post('redata', [AuthController::class, 'redata'])->name('redata');
Route::post('pre', [AuthController::class, 'pre'])->name('pre');
Route::post('bill', [BillController::class, 'bill'])->name('bill');
Route::get('fund', [FundController::class, 'fund'])->name('fund');
Route::get('tran/{reference}', [FundController::class, 'tran'])->name('tran');
Route::get('vertual', [VertualController::class, 'vertual'])->name('vertual');
});



Route::get('admin', function () {

    return view('admin.login');

});
Route::post('cuslog', [LoginController::class, 'login'])->name('cuslog');


Route::middleware(['auth'])->group(function () {

    Route::get('admin/dashboard', [DashboardController::class, 'dashboard'])->name('admin/dashboard');
    Route::get('admin/mcdtransaction', [DashboardController::class, 'mcdtran'])->name('admin/mcdtransaction');
    Route::get('admin/refer', [DashboardController::class, 'ref'])->name('admin/refer');
    Route::get('admin/vertual', [VertualAController::class, 'list'])->name('admin/vertual');
    Route::post('admin/update', [VertualAController::class, 'updateuser'])->name('admin/update');
    Route::post('admin/pass', [VertualAController::class, 'pass'])->name('admin/pass');
    Route::get('admin/credit', [CandCController::class, 'cr'])->name('admin/credit');
    Route::post('admin/cr', [CandCController::class, 'credit'])->name('admin/cr');
    Route::post('admin/ch', [CandCController::class, 'charge'])->name('admin/ch');
    Route::post('admin/finduser', [UsersController::class, 'finduser'])->name('admin/finduser');
    Route::get('admin/finds', [UsersController::class, 'fin'])->name('admin/finds');
    Route::get('admin/profile/{username}', [UsersController::class, 'profile'])->name('admin/profile');
    Route::get('admin/charge', [CandCController::class, 'sp'])->name('admin/charge');
    Route::get('admin/product', [productController::class, 'index'])->name('admin/product');
    Route::post('admin/do', [ProductController::class, 'edit'])->name('admin/do');
    Route::get('admin/editproduct/{id}', [ProductController::class, 'in'])->name('admin/editproduct');
    Route::post('admin/pd', [ProductController::class, 'on'])->name('admin/pd');
    Route::get('admin/user', [UsersController::class, 'index'])->name('admin/user');

});


