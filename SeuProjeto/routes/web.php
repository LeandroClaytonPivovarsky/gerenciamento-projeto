<?php

use App\Facade\Permissions;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('site');
})->name('site');

Route::get('/home', function () {
    return view('home');
})->name('home')->middleware(['auth']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/registerClient', 'App\Http\Controllers\ClientController@register')->name('registerClient');

Route::get('/site/success', 'App\Http\Controllers\ClientController@storeRegister')->name('site.submit');

Route::middleware('auth')->group(function (){
    
});

Route::get('/facade/test', function(){
    return Permissions::teste();
})->name('testing.permissions');


Route::get('/loginU/{id}', 'App\Http\Controllers\Auth\AuthenticatedSessionController@create')->name('loginUser');
Route::get('/loginC/{id}', 'App\Http\Controllers\Auth\AuthenticatedSessionController@create')->name('loginClient');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/test', function (){
    return view('test');
});
Route::get('/test/{test}', function (){
    return view('test');
});
require __DIR__.'/auth.php';
