<?php

use App\Http\Controllers\Admin\DashboardController  as AdminDashboardController;    
use App\Http\Controllers\Admin\DestinationController as AdminDestinationController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\VisitorController as AdminVisitorController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;

use App\Http\Controllers\User\DashboardController as UserDashboardController;


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    // Rute untuk admin
    Route::prefix('admin')->middleware('admin')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/dashboard/destination', [AdminDestinationController::class, 'index'])->name('admin.dashboard.destination');
        Route::get('/dashboard/user', [AdminUserController::class, 'index'])->name('admin.dashboard.user');
        Route::get('/dashboard/visitor', [AdminVisitorController::class, 'index'])->name('admin.dashboard.visitor');
        Route::get('/profile', [AdminProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [AdminProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [AdminProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // Rute untuk user
    Route::prefix('user')->middleware('user')->group(function () {
        Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
    });
});

require __DIR__ . '/auth.php';
