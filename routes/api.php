<?php

declare(strict_types=1);

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

use App\Http\Controllers\Admin\FileController;
use App\Http\Controllers\Admin\LinkController;
use Illuminate\Support\Facades\Route;

Route::post('files/{file}', [FileController::class, 'update'])->name('files.update');
Route::apiResource('files', FileController::class)->except(['update']);

Route::apiResource('links', LinkController::class);
