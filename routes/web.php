<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProjectsController::class, 'index'])->name('home');

Route::get('/projects/{project:slug}', [ProjectsController::class, 'show'])->name('projects.show');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('admin')->group(function() {
        Route::post('/projects', [ProjectsController::class, 'store'])->name('projects.store');
        Route::get('/projects/create', [ProjectsController::class, 'create'])->name('projects.create');
        Route::get('/projects/{project:slug}/edit', [ProjectsController::class, 'edit'])->name('projects.edit');
        Route::put('/projects/{project:slug}', [ProjectsController::class, 'update'])->name('projects.update');
        Route::delete('/projects/{project:slug}', [ProjectsController::class, 'destroy'])->name('projects.destroy');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
