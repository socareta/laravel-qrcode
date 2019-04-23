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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('qrcode-with-image', function () {
    $image = QrCode::format('png')
                    ->merge('images/icons/laravel.png', 0.5, true)
                    ->size(300)->errorCorrection('H')
                    ->generate('A simple example of QR code!');

    return response($image)->header('Content-type','image/png');
});