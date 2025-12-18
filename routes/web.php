<?php

use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VoteController;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\CreateUser;
use App\Livewire\CandidateList;
use App\Livewire\VoteSuccess;
use App\Models\Candidate;
use GuzzleHttp\Promise\Create;

// Public Routes
Route::get('/', fn () => view('auth.login'))->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post'); 

// Route::middleware(['auth'])->group(function () {
    Route::get('/candidate', CandidateList::class)->middleware('hasNotVoted', 'noCache')->name('candidate');
    Route::get('/vote-success', VoteSuccess::class)->middleware('noCache')->name('vote.success');
// });

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/create-user', CreateUser::class)->name('create.user');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
