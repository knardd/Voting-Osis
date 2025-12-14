<?php

use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('auth.login');
})->name('login.page');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/candidate', function () {
    return view('livewire.candidate-list');
})->name('candidate')->middleware(['auth']);

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Volt::route('/dashboard', 'admin.dashboard')->name('dashboard');
    Volt::route('/users', 'admin.create-user')->name('users');
});

require __DIR__.'/auth.php';
