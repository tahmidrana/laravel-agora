<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/agora-chat', ['App\Http\Controllers\AgoraVideoController', 'index']);
    Route::post('/agora-token', ['App\Http\Controllers\AgoraVideoController', 'token']);
    Route::post('/agora/call-user', ['App\Http\Controllers\AgoraVideoController', 'callUser']);
});

require __DIR__.'/auth.php';
