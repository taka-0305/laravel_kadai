<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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


use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;

//Route::get('/', 'App\Http\Controllers\ArticleController@index');
Route::get('/', [ArticleController::class, 'index'])->name('index');
Route::resource('article', ArticleController::class);
Route::resource('profile', ProfileController::class);
Route::get('/myPage', [HomeController::class, 'myPage'])->name('myPage');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
