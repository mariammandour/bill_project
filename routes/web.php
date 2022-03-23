<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\billController;
use App\Http\Controllers\showController;

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
    return view('welcome');
});
Route::group(['prefix' => 'bill', 'as' => 'bill.'], function () {
    Route::get('index', [billController::class, 'index'])->name('index');
    Route::get('bill_table', [showController::class,'show'])->name('bill_table');
    Route::get('detail/{bill_id}', [showController::class, 'detail'])->name('detail');
    Route::post('bill_store', [billController::class,'bill_store'])->name('bill_store');
    Route::resource('store', billController::class,);
});
