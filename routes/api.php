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
    Route::post('/notification', 'Api\MercadoPagoController@notification');
    Route::get('/authorization/{user_id}', 'Api\MercadoPagoController@authorization');
    Route::get('/redirect', 'Api\MercadoPagoController@redirect');

});

Route::prefix('campania')->group(function () {
    Route::get('/', 'Api\CampaniaController@index');
    Route::post('/', 'Api\CampaniaController@store')->middleware('jwt.verify.role:admin|user');
});

Route::prefix('tipo-publico')->group(function () {
    Route::get('/', 'Api\TipoPublicoController@index')->middleware('jwt.verify.role:admin|user');
});

Route::prefix('categoria')->group(function () {
    Route::get('/', 'Api\CategoriasController@index')->middleware('jwt.verify.role:admin|user');
});

Route::prefix('sub-categoria')->group(function () {
    Route::get('/', 'Api\SubCategoriasController@index')->middleware('jwt.verify.role:admin|user');
});

Route::prefix('reembolso')->group(function () {
    Route::get('/', 'Api\ReembolsoController@index')->middleware('jwt.verify.role:admin|user');
});


Route::prefix('lugar')->group(function () {
    Route::get('/', 'Api\LugarController@index')->middleware('jwt.verify.role:admin|user');
});


Route::prefix('pais')->group(function () {
    Route::get('/', 'Api\PaisController@index')->middleware('jwt.verify.role:admin|user');
});

Route::prefix('provincia')->group(function () {
    Route::get('/', 'Api\ProvinciaController@index')->middleware('jwt.verify.role:admin|user');
});


Route::prefix('localidad')->group(function () {
    Route::get('/', 'Api\LocalidadController@index')->middleware('jwt.verify.role:admin|user');
});

Route::prefix('entrada')->group(function () {
    Route::get('/', 'Api\EntradaController@index')->middleware('jwt.verify.role:admin|user');
});


Route::prefix('tipo-entrada')->group(function () {
    Route::get('/', 'Api\TipoEntradaController@index')->middleware('jwt.verify.role:admin|user');
});

