<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PertanianController;
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
    return view('LocationAtm');
});


Route::get('/welcome', function () {
    return view('welcome');
});


Route::get('/dashboard',[PertanianController::class, 'index'])->name('dashboard');


Route::get('/page', function () {
    return view('page');
});

Route::get('/produk', function () {
    return view('produk');
});

Route::get('/datakota', function () {
    return view('datakota');
});

use App\Http\Controllers\KriteriaController;
Route::controller(KriteriaController::class)->group(function() {
    Route::get('kriteria/', 'index');
    Route::get('kriteria/add', 'add');
    Route::post('kriteria/store', 'store');
    Route::get('kriteria/edit/{id}', 'edit');
    Route::post('kriteria/update/{id}', 'update');
    Route::get('kriteria/delete/{id}', 'delete');
});

use App\Http\Controllers\AlternatifController;
Route::controller(AlternatifController::class)->group(function() {
    Route::get('alternatif/', 'index');
    Route::get('alternatif/add', 'add');
    Route::post('alternatif/store', 'store');
    Route::get('alternatif/edit/{id}', 'edit');
    Route::post('alternatif/update/{id}', 'update');
    Route::get('alternatif/delete/{id}', 'delete');
});

use App\Http\Controllers\HitungController;
Route::get('/hitung', [HitungController::class, 'hitung'])->name('hitung');




