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

Route::get('login', [\App\Http\Controllers\SessionController::class, 'create'])->name('login');
Route::post('login', [\App\Http\Controllers\SessionController::class, 'store'])->name('login');
Route::delete('logout', [\App\Http\Controllers\SessionController::class, 'destroy'])->name('logout');

Route::get('signup/confirm/{token}', [\App\Http\Controllers\UsersController::class, 'confirmEmail'])->name('confirm_email');
