<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\RestaurantController as AdminRestaurantController;
use App\Http\Controllers\Admin\MenuController as AdminMenuController;
use App\Http\Controllers\Admin\ReservationController as AdminReservationController;
use App\Http\Controllers\Admin\TableController as AdminTableController;
use App\Http\Controllers\Frontend\WelcomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Frontend\RestaurantsController as FrontendRestaurantsController;
use App\Http\Controllers\Frontend\MenuController as FrontendMenuController;
use App\Http\Controllers\Frontend\ReservationController as FrontendReservationController;
use App\Http\Controllers\UserReservationController;
use App\Http\Controllers\DashboardController; // Import the DashboardController
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index'])->name('home');

Route::get('/restaurants', [FrontendRestaurantsController::class, 'index'])->name('restaurants.index');
Route::get('/restaurants/{restaurant}', [FrontendRestaurantsController::class, 'show'])->name('restaurants.show');

Route::get('/restaurants/{restaurant}/menus', [FrontendMenuController::class, 'index'])->name('menus.index');
Route::get('/menus/{menu}', [FrontendMenuController::class, 'show'])->name('menus.show');

// Step One routes
Route::get('/reservations/step-one/{restaurant}', [FrontendReservationController::class, 'stepOne'])->name('reservations.step.one');
Route::post('/reservations/step-one/{restaurant}', [FrontendReservationController::class, 'storeStepOne'])->name('reservations.store.step.one');

// Step Two routes
Route::get('/reservations/step-two/{restaurant}', [FrontendReservationController::class, 'stepTwo'])->name('reservations.step.two');
Route::post('/reservations/step-two/{restaurant}', [FrontendReservationController::class, 'storeStepTwo'])->name('reservations.store.step.two');

Route::get('/thankyou', [WelcomeController::class, 'thankyou'])->name('thankyou');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Renamed this route to avoid conflict
    Route::get('/restaurant/{restaurant}/reservation', [FrontendReservationController::class, 'create'])->name('frontend.reservations.create');
    Route::post('/restaurant/{restaurant}/reservation', [FrontendReservationController::class, 'store'])->name('frontend.reservations.store');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // User reservation routes
    Route::get('/reservations/{restaurant}', [UserReservationController::class, 'index'])->name('user.reservations.index');
    Route::get('/reservations/create/{restaurant}', [UserReservationController::class, 'create'])->name('user.reservations.create');
    Route::post('/reservations', [UserReservationController::class, 'store'])->name('user.reservations.store');
    Route::get('/reservations/{restaurant}/{reservation}/edit', [UserReservationController::class, 'edit'])->name('user.reservations.edit');
    Route::put('/reservations/{restaurant}/{reservation}', [UserReservationController::class, 'update'])->name('user.reservations.update');
    Route::delete('/reservations/{restaurant}/{reservation}', [UserReservationController::class, 'destroy'])->name('user.reservations.destroy');
});

Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('/restaurants', AdminRestaurantController::class);
    Route::resource('/menus', AdminMenuController::class);
    Route::resource('/tables', AdminTableController::class);
    Route::resource('/reservations', AdminReservationController::class);
});

require __DIR__ . '/auth.php';
