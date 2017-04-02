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

Route::get('/', "SquidController@mainFunc");

Auth::routes();
Route::get('logout', [
    'as' => 'logout',
    'uses' => 'Auth\LoginController@logout'
]);

Route::get('v/{name?}', [
    'as' => 'view',
    function ($name) {
        return view($name);
    }
]);

Route::get('/home', 'HomeController@index');


Route::group(['middleware' => 'auth'], function () {
    Route::get('view', function () {
        return view('control_panel.settings');
    });

    Route::post('user/save', [
        'as' => 'user.save',
        'uses' => 'UsersController@saveEmployer'
    ]);

//     Добавление сайтов
    Route::post('add/save',[
        'as'=>'add.save',
        'uses'=>'SiteController@create'
    ]);
});