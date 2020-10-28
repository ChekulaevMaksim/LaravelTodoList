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

Route::get('/index', [
   'uses' => 'App\Http\Controllers\TodoController@index'
]);

Route::get('/create', [
    'uses' => 'App\Http\Controllers\TodoController@create',
    'as' => 'create.todo'
]);

Route::post('/store', [
    'uses' => 'App\Http\Controllers\TodoController@store',
    'as' => 'store.todo'
]);

Route::get('/delete/{id}', [
    'uses' => 'App\Http\Controllers\TodoController@destroy',
    'as' => 'delete'
]);

Route::get('/edit/{id}', [
    'uses' => 'App\Http\Controllers\TodoController@edit',
    'as' => 'edit'
]);

Route::post('/update', [
    'uses' => 'App\Http\Controllers\TodoController@update',
    'as' => 'update'
]);

Route::get('/complete/{id}', [
    'uses' => 'App\Http\Controllers\TodoController@complete',
    'as' => 'complete'
]);

Route::get('/notcomplete/{id}', [
    'uses' => 'App\Http\Controllers\TodoController@notcomplete',
    'as' => 'notcomplete'
]);
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
