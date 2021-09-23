<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

/*Messages Routes*/

//return messages view with Auth user messages
Route::get('/messages', 'App\Http\Controllers\MessageController@retrieveUserMessage')->name('messages');
//send message
Route::post('/messages', 'App\Http\Controllers\MessageController@sendMessage')->name('outbox');
