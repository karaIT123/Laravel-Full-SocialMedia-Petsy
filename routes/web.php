<?php

use App\Http\Controllers\Auth\ConfirmEmailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PetsController;
use App\Http\Controllers\SpeciesController;
use App\Http\Controllers\UsersController;
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

/*Route::get('/', function () {
    return view('home');
});*/

Route::get('/',[HomeController::class,'index']);

Auth::routes();

Route::get('confirm/{id}/{token}', [ConfirmEmailController::class,'confirm']);

Route::get('profil', [UsersController::class,'edit'])->name('profil');
Route::post('profil',[UsersController::class,'update']);

Route::resource('species',SpeciesController::class);

Route::resource('pets', PetsController::class);

#Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
