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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route :: group ([ 'middleware' => 'auth.jwt' ], function  ()  {
    Route::get('books/current_user', ['uses' => 'BookController@get_user']);
    Route::post('/books/new', ['uses' => 'BookController@put']);
    Route::put('books/{id}', ['uses' => 'BookController@update'] );
    Route::delete('books/{id}', ['uses' => 'BookController@delete'] );
});

Route::prefix('/users')->group(function () {
    Route::post('/login', ['uses' => 'LoginController@login']);
    Route::post('/register', ['uses' => 'UserController@register']);
});

Route::prefix('/books')->group(function () {
    Route::get('/', ['uses' => 'BookController@get']);
    Route::get('/{Name_Surname}', ['uses' => 'BookController@get_author']);
});

Route::prefix('/authors')->group(function () {
    Route::get('/', ['uses' => 'AuthorController@get']);
});
