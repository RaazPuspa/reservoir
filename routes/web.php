<?php

declare(strict_types=1);

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
});

Route::view('/admin/{resources?}', 'admin')
    ->where(['resources' => '^(files|links|snippets).*$'])
    ->name('admin');
