<?php

use App\Http\Controllers\Admin\DashboardController  as AdminDashboardController;    
use App\Http\Controllers\Admin\DestinationController as AdminDestinationController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\VisitorController as AdminVisitorController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;


use App\Http\Controllers\Guest\AboutController;
use App\Http\Controllers\guest\DestinationController;
use App\Http\Controllers\Guest\HomeController;


use App\Http\Controllers\User\CalendarController as UserCalendarController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\ReservationController as UserReservationController;
use App\Http\Controllers\User\TicketController as UserTicketController;


use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/destination', [DestinationController::class, 'index']);
Route::get('/destination/{id}', [DestinationController::class, 'show']);
Route::get('/about', [AboutController::class, 'index']);


Route::middleware('auth')->group(function () {
    // Rute untuk admin
    Route::prefix('admin')->middleware('admin')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

        Route::get('/dashboard/destination', [AdminDestinationController::class, 'index'])->name('admin.dashboard.destination');
        Route::get('/dashboard/destination/create', [AdminDestinationController::class, 'create'])->name('admin.dashboard.destination.create');
        Route::post('/dashboard/destination/store', [AdminDestinationController::class, 'store'])->name('admin.dashboard.destination.store');
        Route::get('/dashboard/destination/{id}/edit', [AdminDestinationController::class, 'edit'])->name('admin.dashboard.destination.edit');
        Route::patch('/dashboard/destination/{id}/update', [AdminDestinationController::class, 'update'])->name('admin.dashboard.destination.update');
        Route::delete('/dashboard/destination/{id}/delete', [AdminDestinationController::class, 'destroy'])->name('admin.dashboard.destination.destroy');
        Route::get('/dashboard/destination/{id}', [AdminDestinationController::class, 'show'])->name('admin.dashboard.destination.show');


        Route::get('/dashboard/user', [AdminUserController::class, 'index'])->name('admin.dashboard.user');
        Route::delete('/dashboard/user/{id}/delete', [AdminUserController::class, 'destroy'])->name('admin.dashboard.user.destroy');


        Route::get('/dashboard/visitor', [AdminVisitorController::class, 'index'])->name('admin.dashboard.visitor');
        Route::patch('/dashboard/visitor/{id}/confirm', [AdminVisitorController::class, 'confirm'])->name('admin.dashboard.visitor.confirm');
        Route::patch('/dashboard/visitor/{id}/reject', [AdminVisitorController::class, 'reject'])->name('admin.dashboard.visitor.reject');


        Route::get('/profile', [AdminProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [AdminProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [AdminProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // Rute untuk user
    Route::prefix('user')->middleware('user')->group(function () {

        Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
        Route::patch('/dashboard/{id}/update', [UserDashboardController::class, 'update'])->name('user.dashboard.update');

        Route::get('/dashboard/reservation', [UserReservationController::class, 'index'])->name('user.dashboard.reservation');
        Route::patch('/dashboard/reservation/{id}/confirm', [UserReservationController::class, 'confirm'])->name('user.dashboard.reservation.confirm');
        Route::patch('/dashboard/reservation/{id}/cancel', [UserReservationController::class, 'cancel'])->name('user.dashboard.reservation.cancel');
        Route::post('/dashboard/reservation/{id}/review', [UserReservationController::class, 'review'])->name('user.dashboard.reservation.review');
        Route::post('/reservation/{id}', [UserReservationController::class, 'store'])->name('user.dashboard.reservation.store');


        Route::get('/dashboard/calendar', [UserCalendarController::class, 'index'])->name('user.dashboard.calendar');

        Route::get('/dashboard/ticket', [UserTicketController::class, 'index'])->name('user.dashboard.ticket');
        Route::get('/dashboard/ticket/{id}/download', [UserTicketController::class, 'download'])->name('user.dashboard.ticket.dowload');

        Route::get('/destination/{id}/reservation', [UserReservationController::class, 'store'])->name('user.destination.reservation');

    });
});

require __DIR__ . '/auth.php';
