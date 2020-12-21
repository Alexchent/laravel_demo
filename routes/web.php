<?php

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
Route::get('/',[\App\Http\Controllers\StaticPagesController::class, 'home'])->name('home');
Route::get('/help', function () {
    return view('help');
})->name('help');
Route::get('/about',[\App\Http\Controllers\StaticPagesController::class, 'about'])->name('about');

Route::get('signup', 'UsersController@create')->name('signup');

Route::resource('users','UsersController');
