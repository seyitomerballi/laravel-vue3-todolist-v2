<?php

use App\Http\Controllers\ItemController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/item')->group(function () {
    Route::get('/', [ItemController::class, 'getItems'])->name('item.list');
    Route::post('/store', [ItemController::class, 'storeItem'])->name('item.store');
    Route::put('/{id}', [ItemController::class, 'updateItem'])->name('item.update');
    Route::delete('/{id}', [ItemController::class, 'deleteItem'])->name('item.delete');
});
