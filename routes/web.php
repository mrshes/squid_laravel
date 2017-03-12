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

Route::get('/', "SquidController@parseLogs");

Auth::routes();
Route::get('/={name?}', function($name)
{
//    $url = url('report');
    return view($name);
});
Route::get('/home', 'HomeController@index');

Route::get('view',function (){
    return view('control_panel.settings');
});