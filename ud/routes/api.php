<?php

use App\Http\Controllers\Api\BuyController;
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

Route::group(['middleware'=> 'apikey'], function () {
    Route::get('dashboard', [ResellerdetailsController::class, 'details']);
    Route::get('airtime', [BuyController::class, 'airtime']);
    Route::get('buydata', [BuyController::class, 'buydata']);
    Route::get('pre', [BuyController::class, 'pre']);
    Route::post('bill', [BillController::class, 'bill']);
    Route::get('fund', [FundController::class, 'fund']);
    Route::get('tran/{reference}', [FundController::class, 'tran']);
    Route::get('vertual', [VertualController::class, 'vertual']);

//        Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//            return $request->user();
//        });
});

