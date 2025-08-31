<?php

use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/login', function () {
//     return redirect()->route('filament.admin.auth.login');
// })->name('login');

// Route::get('/logout', function () {
//     return redirect()->route('filament.admin.auth.logout');
// })->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::resource('items', ItemController::class);
});
