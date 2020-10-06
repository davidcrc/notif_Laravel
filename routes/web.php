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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/messages', [App\Http\Controllers\HomeController::class, 'store'])->name('messages.store');
Route::get('messages/{id}/', [App\Http\Controllers\HomeController::class, 'show'])->name('messages.show');
Route::get('notificaciones', [App\Http\Controllers\NotificationsController::class, 'index'])->name('notifications.index');

// Marcar como leida
Route::patch('notificaciones/{id}', [App\Http\Controllers\NotificationsController::class, 'read'])->name('notifications.read');

// Marcar como eliminada
Route::delete('notificaciones/{id}', [App\Http\Controllers\NotificationsController::class, 'destroy'])->name('notifications.destroy');
