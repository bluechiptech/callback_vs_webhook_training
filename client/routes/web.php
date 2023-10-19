<?php

use App\Http\Controllers\FlutterwaveController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('flutterwave')->group(function () {
    //Initiate Payment
    Route::get('pay', [FlutterwaveController::class, 'makePayment']);
    //Callback URL
    Route::get('callback', [FlutterwaveController::class, 'callback']);
    //Webhook URL
    Route::post('webhook', [FlutterwaveController::class, 'webhook']);
});
