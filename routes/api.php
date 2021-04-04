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
//auth routes
Route::post('/login', "UserController@login");
Route::get('/me', "UserController@me");
Route::post('/register', "UserController@register");
Route::get('/logout', 'UserController@logout');


//character routes
Route::get('/character/index', 'CharacterController@index');
Route::get('/character/charbase/{id}', 'CharacterController@getCharBase');
Route::get('/character/charvalue/{id}', 'CharacterController@getCharValue');
Route::get('/character/delete/{id}', 'CharacterController@deteleChar'); //TODO change from get to delete
Route::post('/character/create', 'CharacterController@createChar');

Route::fallback(function () {
    return response()->json([
        'message' => 'Page Not Found. If error persists, contact info@website.com'
    ], 404);
});
