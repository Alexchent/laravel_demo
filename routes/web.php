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

//显示重置密码的邮箱发送页面
Route::get('password/reset', [\App\Http\Controllers\Auth\ForgotPasswordController::class,'showLinkRequestForm'])->name('password.request');
//邮件发送重置链接
Route::post('password/email', [\App\Http\Controllers\Auth\ForgotPasswordController::class,'sendResetLinkEmail'])->name('password.email');
//密码更新页面
Route::get('password/reset/{token}', [\App\Http\Controllers\Auth\ResetPasswordController::class,'showResetForm'])->name('password.reset');
//执行密码更新操作
Route::post('password/reset', [\App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('password.update');

//动态
Route::resource('statuses', 'StatusesController', ['only' => ['store','destroy']]);


Route::get('/users/{user}/followings', [\App\Http\Controllers\UsersController::class, 'followings'])->name('users.followings');
Route::get('/users/{user}/followers', [\App\Http\Controllers\UsersController::class, 'followers'])->name('users.followers');

Route::post('/users/followers/{user}', 'FollowersController@store')->name('followers.store');
Route::delete('/users/followers/{user}', 'FollowersController@destroy')->name('followers.destroy');

Route::get('http_demo', [\App\Http\Controllers\Demo\HttpController::class,'demo']);
Route::get('fake', [\App\Http\Controllers\Demo\HttpController::class,'fake']);
Route::get('notify/{user}', [\App\Http\Controllers\Demo\HttpController::class,'notify']);

Route::get('pushNotification', [\App\Http\Controllers\Demo\HttpController::class,'pushNotification']);
