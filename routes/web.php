<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\homeController;
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

Route::get('/', function () {
    return view('auth/login');
});

//  profile



Route::get('/profile', function () {
    return view('profile.profile');
});
Route::get('/show', function () {
    return view('profile.show');
});

Route::post('/profile', [ProfileController::class, 'update']);
Route::get('/edit/{id}','App\Http\Controllers\ProfileController@edit')->name('profile.edit');
Route::post('/update','App\Http\Controllers\ProfileController@update')->name('profile.update');
Route::get('/delete/{id}','App\Http\Controllers\ProfileController@destroy')->name('profile.destroy');

//  development



Auth::routes();

Route::resource('/home', HomeController::class)->name('*','home');
Route::get('/task',[App\Http\Controllers\TaskController::class, 'index']);


Route::get('ref/create_task',[App\Http\Controllers\TaskController::class, 'create']);
Route::post('/task',[App\Http\Controllers\TaskController::class, 'store']);

