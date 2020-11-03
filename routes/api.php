<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Post
Route::post('/postKelas', 'KelasController@store');
Route::post('/postGuru', 'GuruController@store');
Route::post('/postMapel', 'MapelController@store');
Route::post('/postSiswa', 'SiswaController@store');

//Update
Route::put('/updateKelas/{id}', 'KelasController@update');
Route::put('/updateGuru/{id}', 'GuruController@update');
Route::put('/updateMapel/{id}', 'MapelController@update');
Route::put('/updateSiswa/{id}', 'SiswaController@update');

//Delete
Route::delete('/deleteKelas/{id}', 'KelasController@destroy');
Route::delete('/deleteGuru/{id}', 'GuruController@destroy');
Route::delete('/deleteMapel/{id}', 'MapelController@destroy');
Route::delete('/deleteSiswa/{id}', 'SiswaController@destroy');

//JWT Auth
Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');
Route::get('book', 'BookController@book');

Route::get('bookAll', 'BookController@bookAuth')->middleware('jwt.verify');
Route::get('user', 'UserController@getAuthenticatedUser')->middleware('jwt.verify');