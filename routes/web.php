<?php

use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\AlternatifNilaiController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\KriteriaSubController;
//use App\Http\Controllers\user_controller;
use App\Http\Controllers\PbKriteriaController;
use App\Http\Controllers\PbKriteriaSubController;
use Illuminate\Support\Facades\Route;

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
    return view('home');
});

Route::view('/', 'pages.auth.login');

//Route::view('/', 'home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('kriteria', KriteriaController::class);
Route::resource('kriteria_sub', KriteriaSubController::class);
Route::resource('alternatif', AlternatifController::class);
Route::resource('alternatif_nilai', AlternatifNilaiController::class);
Route::resource('pb_kriteria', PbKriteriaController::class);
Route::resource('pb_kriteria_sub', PbKriteriaSubController::class)->except(['show']);

Route::get('pb_kriteria_sub/search', [PbKriteriaSubController::class, 'search'])->name('pb_kriteria.search');

// Route::get('kriteria', [kriteria_controller::class, 'index'])->name('kriteria.index');
// Route::get('kriteria/create', [kriteria_controller::class, 'create'])->name('kriteria.index');
// Route::post('kriteria/store', [kriteria_controller::class, 'store'])->name('kriteria.store');
// Route::get('kriteria/{id}/edit', [kriteria_controller::class, 'edit'])->name('kriteria.edit');
// Route::delete('kriteria/{id}/update', [kriteria_controller::class, 'destroy'])->name('kriteria.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
