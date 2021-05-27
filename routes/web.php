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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/item',[App\Http\Controllers\ItemController::class, 'index']);
Route::get('/item/{id}',[App\Http\Controllers\ItemController::class, 'show']);
Route::get('/item/create',[App\Http\Controllers\ItemController::class, 'create']);
Route::post('/item',[App\Http\Controllers\ItemController::class, 'store']);
Route::delete('/item/{id}',[App\Http\Controllers\ItemController::class, 'destroy']);

Route::get('/create', function () {
    return view('forms/create_new_task_form');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
