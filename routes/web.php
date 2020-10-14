<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalendarController;

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
Route::group(['prefix' => '/appetiser-calendar'], function () {
    Route::get('', [CalendarController::class, 'appetiserIndex'])->name('calendar');
    Route::post('add-event', [CalendarController::class, 'appetiserAddEvent']);
});