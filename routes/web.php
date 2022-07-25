<?php

declare(strict_types=1);

use App\Http\Controllers\Home\FileController;
use App\Http\Controllers\Home\LinkController;
use App\Http\Controllers\Home\SnippetController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::name('home.')->group(static function () {
    Route::view('/', 'home.void')->name('void');
    Route::resource('files', FileController::class)->only(['index']);
    Route::resource('links', LinkController::class)->only(['index']);
    Route::resource('snippets', SnippetController::class)->only(['index']);
});

Route::view('/admin/{resources?}', 'admin')
    ->where(['resources' => '^(files|links|snippets).*$'])
    ->name('admin');
