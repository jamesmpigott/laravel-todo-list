<?php

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

// List tasks
Route::get('/', 'TaskController@index')->name('index');

// Add task
Route::post('/add-task', 'TaskController@addTask')->name('addTask');

// Remove task
Route::delete('delete-task/{id}', 'TaskController@deleteTask')->name('deleteTask');

// Update task
Route::post('/update-task/{id}', 'TaskController@updateTask')->name('updateTask');