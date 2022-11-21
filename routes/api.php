<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\WalletController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('login', [AuthController::class, 'login'])->name('api.login');
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('wallet-add-money', [WalletController::class, 'addMoney'])->name('api.wallet.add-money');
    Route::post('buy-cookie', [PaymentController::class, 'buyCookie'])->name('api.buy-cookie');
});
