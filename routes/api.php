<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Genratepdf;
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
Route::get('FirstApi', [Genratepdf::class, 'FirstApi']);
Route::get('apilist', [Genratepdf::class, 'apilist']);
Route::get('databasegetApi/{id?}', [Genratepdf::class, 'databasegetApi']);
Route::post('databasepostApi', [Genratepdf::class, 'databasepostApi']);

Route::put('databaseUpdateApi', [Genratepdf::class, 'databaseUpdateApi']);
Route::delete('databaseDeleteApi/{id}', [Genratepdf::class, 'databaseDeleteApi']);
Route::get('Search/{Name}', [Genratepdf::class, 'search']);
