<?php

use Illuminate\Http\Request;

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

Route::get('/activate-email/{user}', function (Request $request) {
    if (!$request->hasValidSignature()) {
        abort(401, 'This link is not valid.');
    }

    $request->user()->update([
        'is_activated' => true
    ]);

    return 'Your account is now activated!';
})->name('activate-email');
