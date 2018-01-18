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

Route::get('/', function () {
    //return view('welcome');
    return view('index');
});

Route::get('triggered-buttons', 'ButtonController@index');

Route::any('button/{id}', function($id){
    $button = new \App\Button();
    $button->button_id = $id;
    $button->status = 1;
    $button->save();
    return $button;

});
