<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controller\ItemsController;

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

Route::get('/items',[App\Http\Controllers\ItemsController::class, 'index']);
Route::get('/category',[App\Http\Controllers\ItemsController::class, 'getCategory']);
Route::post('/save',[App\Http\Controllers\ItemsController::class, 'store']);
Route::get('/edit/{id}',[App\Http\Controllers\ItemsController::class, 'edit']);
Route::post('/update/{id}',[App\Http\Controllers\ItemsController::class, 'update']);
Route::get('/delete/{id}',[App\Http\Controllers\ItemsController::class, 'destroy']);
Route::get('/search', [App\Http\Controllers\ItemsController::class, 'search']);
Route::get('/with-stock', [App\Http\Controllers\ItemsController::class, 'withStocks']);
Route::get('/no-stock', [App\Http\Controllers\ItemsController::class, 'noStocks']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
