<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers;
use App\Http\Livewire\ShiftCreate;
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
//send message
Route::post('/messages', 'App\Http\Controllers\MessageController@sendMessage')->name('outbox');

/*Shift Routes
*
*/

//Render livewire component - > create shift using livewire aync call, no need for POST
Route::get('/shift-create', ShiftCreate::class)->name('shift-create');
Route::get('/shift-create/{id}', ShiftCreate::class)->name('shift-create/');
//Retrieve clock in view and time
Route::get('/shift-times', 'App\Http\Controllers\ShiftTimeController@index')->name('shift-times');
//Record Clock in Shift Times 
Route::put('/shift-times/{id}', 'App\Http\Controllers\ShiftTimeController@recordClockIn')->name('clock-in');
//Record Clock out Shift time
Route::put('/shift-times/{id}', 'App\Http\Controllers\ShiftTimeController@recordClockOut')->name('clock-out');