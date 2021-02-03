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
    return view('dashboard');
});

// Start Employee Type Routes
Route::group(['prefix' =>'employee/type/', 'as' => 'employee.type.'],function(){
    Route::GET('list',[
        'uses' => 'EmployeeTypeController@index',
        'as'   => 'list'
    ]);
    Route::GET('add',[
        'uses'  => 'EmployeeTypeController@create',
        'as'    => 'add'
    ]);
    Route::POST('store',[
        'uses'  => 'EmployeeTypeController@store',
        'as'    => 'store'
    ]);
    Route::GET('edit',[
        'uses'  => 'EmployeeTypeController@edit',
        'as'    => 'edit'
    ]);
    Route::POST('update',[
        'uses'  => 'EmployeeTypeController@update',
        'as'    => 'update'
    ]);
    Route::GET('delete',[
        'uses'  => 'EmployeeTypeController@destroy',
        'as'    => 'delete'
    ]);
});
// End Employee Type Routes

// Start Employee Routes
Route::group(['prefix' => 'employee/', 'as' => 'employee.'],function(){
   Route::GET('list',[
       'uses' => 'EmployeeController@index',
       'as'   => 'list'
   ]);
    Route::GET('add',[
        'uses'  => 'EmployeeController@create',
        'as'    => 'add'
    ]);
    Route::POST('store',[
        'uses'  => 'EmployeeController@store',
        'as'    => 'store'
    ]);
    Route::GET('edit',[
        'uses'  => 'EmployeeController@edit',
        'as'    => 'edit'
    ]);
    Route::POST('update',[
        'uses'  => 'EmployeeController@update',
        'as'    => 'update'
    ]);
    Route::GET('delete',[
        'uses'  => 'EmployeeController@destroy',
        'as'    => 'delete'
    ]);
});
// End Employee Routes

// Payment Route Start

// Payment Route End