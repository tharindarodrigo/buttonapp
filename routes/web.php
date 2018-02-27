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

use \App\Events\ButtonPressEvent;

Route::get('/', function () {
    //return view('welcome');
    return view('index');
});

Route::get('triggered-buttons', 'ButtonController@getIds');

Route::get('buttons', 'ButtonController@index');


Route::any('button/log', function (){
//    $x = Input::all();
    return 'hello';
    return $button = new \App\Button();
    $button->button_id = 100;
    $button->status = 1;
    $button->data = 'asdasd';
//    $button->data = empty($x) ? 'nothing' : json_encode($x);

    return $button->save();


});


Route::name('buttonsPressed')->any('button/{id}', function ($id) {


    $button = new \App\Button();
    $button->button_id = $id;
    $button->status = 1;
    if ($button->save()) {
        event(new ButtonPressEvent($button));
    }
//    return $button;
});



Route::get('fbp', function () {
//    event(new \App\Events\ButtonPressEvent());
});
