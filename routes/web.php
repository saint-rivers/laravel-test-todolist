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

Route::get('/', "App\Http\Controllers\TaskController@index");
Route::post("/task", "App\Http\Controllers\TaskController@store");
Route::get("/{id}/complete", "App\Http\Controllers\TaskController@complete");
Route::get("/{id}/delete", "App\Http\Controllers\TaskController@destroy");

Route::get('/testing', function () {
    return "asd";
});
