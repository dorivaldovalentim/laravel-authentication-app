<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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

Route::get('/socialite/{driver}/redirect', function($driver) {
    return Socialite::driver($driver)->redirect();
})->name('login.form');

Route::get('/socialite/{driver}/callback', function ($driver) {
    $user = Socialite::driver($driver)->user();

    dd($user);
});