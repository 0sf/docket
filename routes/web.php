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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/task',[App\Http\Controllers\TaskController::class, 'index']);
Route::get('/task/{id}',[App\Http\Controllers\ItemController::class, 'show']);
Route::get('ref/create_task',[App\Http\Controllers\TaskController::class, 'create']);
Route::post('/task',[App\Http\Controllers\TaskController::class, 'store']);
Route::delete('/task/{id}',[App\Http\Controllers\ItemController::class, 'destroy']);
