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
Route::post('/login','Api\UserController@auth');
Route::post('/register','Api\UserController@store'); // PreRegisterUser
Route::post('/recovery-password','Api\UserController@verifyEmail');
Route::post('/new-password','Api\UserController@resetPassword');
Route::get('/logout','Api\UserController@logout')->middleware('jwt.verify');

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('/verify','Api\UserController@getAuthenticatedUser');
});

Route::prefix('mercadopago')->group(function () {
    Route::get('/', 'Api\MercadoPagoController@index');
    Route::get('/authorization/{user_id}', 'Api\MercadoPagoController@authorization');
    Route::get('/redirect', 'Api\MercadoPagoController@redirect');

});

Route::prefix('campania')->group(function () {
    Route::get('/', 'Api\CampaniaController@index');
});