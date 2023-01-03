<?php

use App\Http\Controllers\App\MatterController;
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

Route::get('/', function (){
    $a = new \App\Arch\Repositories\App\MatterRepository();
    return $a -> getPaginated();
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('matter') -> group(function () {

    Route::get('/index', [MatterController::class, 'index']);
    Route::get('/show/{id}', [MatterController::class, 'show']);
    Route::post('/create', [MatterController::class, 'create']);
});
