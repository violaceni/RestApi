<?php

use Illuminate\Http\Request;

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
Route::group(['prefix' => 'books'], function() {
    Route::get('/', 'BookController@getAllBooks')->name('books');
    Route::get('/{id}', 'BookController@getBookById')->name('book.read');
    Route::post('/', 'BookController@storeBook')->name('book.store');
    Route::put('/{id}', 'BookController@updateBook')->name('book.update');
    Route::delete('/{id}', 'BookController@deleteBook')->name('book.delete');
    Route::get('/{id}', 'BookController@findBook')->name('book.find');
    Route::get('/{bookId}', 'BookController@getBookById')->name('book.read');

});