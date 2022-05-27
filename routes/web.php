<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CashController;
use App\Http\Controllers\CreditCardController;
use App\Http\Controllers\BankTransferController;
use App\CustomClass\CashMachine;

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
    return view('cashmachine');
});

Route::get('cash', function () {
    return view('cash');
})->name('cash');

Route::get('credit_card', function () {
    return view('card');
})->name('credit_card');

Route::get('bank_transfer', function () {
    return view('bank');
})->name('bank_transfer');

Route::post('store', [CashMachine::class, 'generateTransaction'])->name('store');


