<?php

use App\Http\Controllers\AlltvController;
use App\Http\Controllers\AirtimeController;
use App\Http\Controllers\EkectController;
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
    return view('auth.login');
});

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');
Route::get('tv', [AlltvController::class, 'tv'])->name('tv');
Route::post('tvp', [AlltvController::class, 'paytv'])->name('tvp');
Route::get('paytv', [AlltvController::class, 'paytv'])->name('paytv');
Route::post('verifytv', [AlltvController::class, 'verifytv'])->name('verifytv');
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
Route::post('log', [AuthController::class, 'customLogin'])->name('log');
Route::post('buyairtime', [AirtimeController::class, 'airtime'])->name('buyairtime');
Route::get('airtime', [AuthController::class, 'airtime'])->name('airtime');
Route::get('buydata', [AuthController::class, 'buydata'])->name('buydata');
Route::get('redata', [AuthController::class, 'redata'])->name('redata');
Route::post('pre', [AuthController::class, 'pre'])->name('pre');
Route::post('bill', [BillController::class, 'bill'])->name('bill');
Route::get('fund', [FundController::class, 'fund'])->name('fund');
Route::get('tran/{reference}', [FundController::class, 'tran'])->name('tran');
Route::get('vertual', [VertualController::class, 'vertual'])->name('vertual');
