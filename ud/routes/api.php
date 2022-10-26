<?php

use App\Http\Controllers\Api\AirController;
use App\Http\Controllers\Api\AlltvController;
use App\Http\Controllers\Api\BuyController;
use App\Http\Controllers\Api\EkectController;
use App\Http\Controllers\Api\ResellerdetailsController;
use App\Http\Controllers\Api\BillController;
use App\Http\Controllers\Api\FundController;
use App\Http\Controllers\Api\VertualController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('run', [VertualController::class, 'run'])->name('run');
Route::post('honor', [VertualController::class, 'honor'])->name('honor');

Route::group(['middleware'=> 'apikey'], function () {
    Route::get('dashboard', [ResellerdetailsController::class, 'details']);
    Route::post('airtime', [AirController::class, 'airtime']);
    Route::get('buydata', [BuyController::class, 'buydata']);
    Route::get('pre', [BuyController::class, 'pre']);
    Route::post('bill', [BillController::class, 'data']);
    Route::get('fund', [FundController::class, 'fund']);
    Route::get('tran/{reference}', [FundController::class, 'tran']);
    Route::get('vertual', [VertualController::class, 'vertual']);
    Route::get('tv', [AlltvController::class, 'tv']);
    Route::post('tvp', [AlltvController::class, 'paytv']);
    Route::post('paytv', [AlltvController::class, 'paytv']);
    Route::post('verifytv', [AlltvController::class, 'verifytv']);
    Route::get('listtv', [AlltvController::class, 'listtv']);
    Route::get('listelect', [EkectController::class, 'listelect']);
    Route::get('elect', [EkectController::class, 'electric']);
    Route::post('velect', [EkectController::class, 'verifyelect']);
    Route::post('payelect', [EkectController::class, 'payelect']);


//        Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//            return $request->user();
//        });
});

