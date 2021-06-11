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

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/profile', function () {
    return view('profile');
});
Route::get('/show', function () {
    return view('show');
});
Route::get('/item',[App\Http\Controllers\ItemController::class, 'index']);
Route::get('/item/{id}',[App\Http\Controllers\ItemController::class, 'show']);
Route::get('/item/create',[App\Http\Controllers\ItemController::class, 'create']);
Route::post('/item',[App\Http\Controllers\ItemController::class, 'store']);
Route::delete('/item/{id}',[App\Http\Controllers\ItemController::class, 'destroy']);

Route::get('/edit/{id}','App\Http\Controllers\ProfileController@edit')->name('profile.edit');
Route::post('/update','App\Http\Controllers\ProfileController@update')->name('profile.update');
Route::get('/delete/{id}','App\Http\Controllers\ProfileController@destroy')->name('profile.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/task',[App\Http\Controllers\TaskController::class, 'index']);
Route::get('/task/{id}',[App\Http\Controllers\ItemController::class, 'show']);
Route::get('ref/create_task',[App\Http\Controllers\TaskController::class, 'create']);
Route::post('/task',[App\Http\Controllers\TaskController::class, 'store']);
Route::delete('/task/{id}',[App\Http\Controllers\ItemController::class, 'destroy']);
