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

// Route::get('/bebras', fn() => 'Valio, bebrams');

// Route::get('/barsukas', [A::class, 'barsukas']);

// Route::get('/briedis/{id}', [A::class, 'briedis']);

// Route::get('/suma/{s1?}/{s2?}', [S::class, 'suma']);

// Route::get('/skirtumas', [S::class, 'skirtumas'])->name('forma');
// Route::post('/skirtumas', [S::class, 'skaiciuoti'])->name('skaiciuokle');

//Accounts
Route::get('/accounts', [B::class, 'index'])->name('accounts-index');
Route::get('/accounts/create', [B::class, 'create'])->name('accounts-create');
Route::post('/accounts', [B::class, 'store'])->name('accounts-store');
Route::get('/accounts/add/{account}', [B::class, 'add'])->name('accounts-add');
Route::put('/accounts/add/{account}', [B::class, 'addBalance'])->name('accounts-addBalance');
Route::get('/accounts/withdraw/{account}', [B::class, 'withdraw'])->name('accounts-withdraw');
Route::put('/accounts/withdraw/{account}', [B::class, 'withdrawBalance'])->name('accounts-withdrawBalance');
Route::delete('/accounts/{account}', [B::class, 'destroy'])->name('accounts-delete');

Route::get('/accounts/show/{id}', [B::class, 'show'])->name('accounts-show');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
