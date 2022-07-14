<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BankController as B;

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

//Accounts

Route::get('/accounts', [B::class, 'index'])->name('accounts-index')->middleware('rp:user');
Route::get('/accounts/create', [B::class, 'create'])->name('accounts-create')->middleware('rp:admin');
Route::post('/accounts', [B::class, 'store'])->name('accounts-store')->middleware('rp:admin');
Route::get('/accounts/add/{account}', [B::class, 'add'])->name('accounts-add')->middleware('rp:admin');
Route::put('/accounts/add/{account}', [B::class, 'addBalance'])->name('accounts-addBalance')->middleware('rp:admin');
Route::get('/accounts/withdraw/{account}', [B::class, 'withdraw'])->name('accounts-withdraw')->middleware('rp:admin');
Route::put('/accounts/withdraw/{account}', [B::class, 'withdrawBalance'])->name('accounts-withdrawBalance')->middleware('rp:admin');
Route::delete('/accounts/{account}', [B::class, 'destroy'])->name('accounts-delete')->middleware('rp:admin');

Route::get('/accounts/show/{id}', [B::class, 'show'])->name('accounts-show')->middleware('rp:user');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

