<?php

use App\Facade\Permissions;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('site');
})->name('site');

Route::get('/home', function () {
    return view('home');
})->name('home')->middleware(['auth']);

Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/registerClient', 'App\Http\Controllers\ClientController@register')->name('registerClient');

Route::get('/site/success', 'App\Http\Controllers\ClientController@storeRegister')->name('site.submit');

Route::get('/loginU/{id}', 'App\Http\Controllers\Auth\AuthenticatedSessionController@create')->name('loginUser');
Route::get('/loginC/{id}', 'App\Http\Controllers\Auth\AuthenticatedSessionController@create')->name('loginClient');

Route::middleware('auth')->group(function () {
    Route::resource('/home/projects', ProjectController::class);
    Route::resource('/home/users', UserController::class);
    // Route::resource('/home/project/{idProject}/tasks', TaskController::class);
});
require __DIR__.'/auth.php';
