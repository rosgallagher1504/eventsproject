<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\EventController;

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

//Home directory
Route::get('/', function () {
    return Redirect()->route('login');
});

//allevents directory
Route::get('/events', function(){
    return view('events');
});

Route::get('/myevents', function(){
    return view('myevents');
});

//events controller
Route::get('/event/all',[EventController::class, 'AllEvent',])->name('all.event');

Route::post('/event/all',[EventController::class, 'AddEvent',])->name('store.event');

Route::get('/event/edit/{id}',[EventController::class, 'Edit']);

Route::post('/event/update/{id}',[EventController::class, 'Update']);

Route::get('/softdelete/event/{id}',[EventController::class, 'SoftDelete']);

Route::get('/event/restore/{id}',[EventController::class, 'Restore']);

Route::get('/pdelete/event/{id}',[EventController::class, 'PDelete']);

Route::get('/event/cancelupdate', [EventController::class, 'CancelUpdate']);

Route::get('/event/logout', [EventController::class, 'Logout'])->name('event.logout');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
