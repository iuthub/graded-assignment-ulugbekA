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

Route::get('/', [
    'uses'=>'TasksController@getIndex',
    'as' => 'index'
]);

Route::get('{$id}', [
    'uses' => 'TasksController@getEdit',
    'as' => 'edit'
]);

Route::post('/', [
    'uses' => 'TasksController@getEdit',
    'as' => 'editTask'
]);

Route::get('{$id}', [
    'uses' => 'TasksController@getDelete',
    'as' => 'delete'
]);

Route::post('/',[
    'uses' => 'TasksController@taskCreate',
    'as' => 'createTask'
]);


