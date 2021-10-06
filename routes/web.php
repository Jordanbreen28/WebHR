<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers;
use App\Http\Livewire\ShiftCreate;
use App\Http\Livewire\ShiftTime;
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

/*Messages Routes
*
*/

//return messages view with Auth user messages
Route::get('/messages', 'App\Http\Controllers\MessageController@retrieveUserMessage')->name('messages');
//Open specific message
Route::get('/messages/{message_id}', 'App\Http\Controllers\MessageController@openMessage')->name('open-message');
//Create message
Route::post('/messages', 'App\Http\Controllers\MessageController@sendMessage')->name('outbox');

/*Shift Routes
*
*/

//Render livewire component - > create shift using livewire aync call, no need for POST
Route::get('/shifts', ShiftCreate::class)->name('shifts');

Route::get('/view-shifts', 'App\Http\Controllers\ShiftController@index')->name('current-shift');

Route::get('/shifts/{id}', 'App\Http\Controllers\ShiftController@getShift')->name('current-shift');
//Record Clock in Shift Times 
Route::put('/shifts/{id}', 'App\Http\Controllers\ShiftTimeController@recordTime')->name('shift');