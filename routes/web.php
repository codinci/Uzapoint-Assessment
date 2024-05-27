<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\GroupController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', [ContactController::class, 'index'])->name('dashboard')->middleware('auth');;
Route::get('/dashboard/create', [ContactController::class, 'create'])->name('contact.create')->middleware('auth');
Route::post('/dashboard/store', [ContactController::class, 'store'])->name('contact.store')->middleware('auth');
Route::get('/dashboard/{contact}/edit', [ContactController::class, 'edit'])->name('contact.edit')->middleware('auth');
Route::put('/dashboard/{contact}', [ContactController::class, 'update'])->name('contact.update')->middleware('auth');
Route::delete('/dashboard/{contact}', [ContactController::class, 'destroy'])->name('contact.destroy')->middleware('auth');

Route::get('/group', [GroupController::class, 'index'])->name('group.index')->middleware('auth');
Route::post('/group', [GroupController::class, 'store'])->name('group.store')->middleware('auth');


require __DIR__.'/auth.php';
