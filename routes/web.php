
<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BookingController;

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;

use App\Http\Controllers\ProfileController;

// Karigora হোমপেজ
Route::get('/', [HomeController::class, 'index'])->name('home');

// সার্ভিসের বিস্তারিত
Route::get('/services/{service:slug}', [ServiceController::class, 'show'])
    ->name('services.show');

// লগইন ছাড়াই বুকিং
Route::get('/services/{service:slug}/book', [BookingController::class, 'create'])
    ->name('bookings.create');

Route::post('/services/{service:slug}/book', [BookingController::class, 'store'])
    ->name('bookings.store');

Route::get('/booking-success/{booking}', [BookingController::class, 'success'])
    ->name('bookings.success');

// Breeze Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// লগইন করা ব্যবহারকারীর প্রোফাইল
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

// অ্যাডমিন রুট: আপাতত auth middleware দিয়ে সুরক্ষিত

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'admin'])
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('categories', AdminCategoryController::class);
        Route::resource('services', AdminServiceController::class);

        Route::get('/bookings', [AdminBookingController::class, 'index'])
            ->name('bookings.index');

        Route::get('/bookings/{booking}', [AdminBookingController::class, 'show'])
            ->name('bookings.show');

        Route::patch('/bookings/{booking}/status', [
            AdminBookingController::class,
            'updateStatus',
        ])->name('bookings.updateStatus');
    });


// Breeze Login, Register, Logout ইত্যাদি
require __DIR__.'/auth.php';
