<?php

use Livewire\Livewire;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home.welcome');
});

Route::middleware(['guest'])->group(function () {
    Route::get('login', function () {
        return view('home.login');
    })->name('login');

    Route::post('login', [AuthController::class, 'login'])->name('auth.login');
});

Route::middleware(['auth'])->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');
});

$path = parse_url(config('app.url'), PHP_URL_PATH) ?? '';

Livewire::setScriptRoute(function ($handle) use ($path) {
    return Route::get($path . '/livewire/livewire.js', $handle);
});

Livewire::setUpdateRoute(function ($handle) use ($path) {
    return Route::post($path . '/livewire/update', $handle);
});
