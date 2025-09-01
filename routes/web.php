<?php

use App\Http\Controllers\ClaimController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('items', \App\Http\Controllers\ItemController::class);
    Route::get('/item/claim/{item}', [ItemController::class, 'claim'])->name('items.claim');

    Route::get('/my_items', [ItemController::class, 'my_items'])->name('items.my_items');

    Route::get('/items/claim/accept/{claim}', [ItemController::class, 'approve'])->name('items.approve');
    Route::get('/items/claim/reject/{claim}', [ItemController::class, 'reject'])->name('items.reject');

    // Route::get('/claims/create/{item}', [ClaimController::class, 'create'])->name('claims.create');
    // Route::post('/claims/store/{item}', [ClaimController::class, 'store'])->name('claims.store');
    // Route::post('/claims/claim/{item}', [ClaimController::class, 'store'])->name('items.claim');

    Route::get('/my-claims', [ClaimController::class, 'myClaims'])->name('claims.index');
    // Route::post('items/{item}/comments', [CommentController::class, 'store'])->name('items.comments.store');
});

require __DIR__.'/auth.php';
