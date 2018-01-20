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

Route::get('triggered-buttons', 'ButtonController@getIds');

Route::get('buttons', 'ButtonController@index');

Route::name('buttonsPressed')->any('button/{id}', function($id){

    event(new \App\Events\ButtonPressEvent());

//    $button = new \App\Button();
//    $button->button_id = $id;
//    $button->status = 1;
//    if ($button->save()) {
//    }
//    return $button;

});

Route::get('fbp', function (){
    event(new \App\Events\ButtonPressEvent());
});
