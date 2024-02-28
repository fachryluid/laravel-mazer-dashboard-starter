<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SecurityController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::name('public.')->group(function () {
    Route::get('/', function () {
        return redirect()->route('dashboard.index');
    });
});

Route::name('auth.')->group(function () {
    Route::get('/login', [AuthController::class, 'login_index'])->name('login.index');
    Route::post('/login/authenticate', [AuthController::class, 'login_authenticate'])->name('login.authenticate');
});

Route::prefix('dashboard')->name('dashboard.')->middleware(['web', 'auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::prefix('master')->name('master.')->middleware([])->group(function () {
        Route::resource('/users', UserController::class)->names('user');
        Route::put('/users/{user}/update/password', [UserController::class, 'update_password'])->name('user.update.password');
    });
    Route::prefix('reports')->name('reports.')->middleware([])->group(function () {
        Route::get('/users', [ReportController::class, 'users'])->name('users');
        Route::get('/users/pdf', [ReportController::class, 'users_pdf'])->name('users.pdf');
    });
    Route::prefix('profile')->name('profile.')->middleware([])->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('index');
        Route::put('/update', [ProfileController::class, 'update'])->name('update');
        Route::put('/avatar', [ProfileController::class, 'avatar'])->name('avatar');
    });
    Route::prefix('security')->name('security.')->middleware([])->group(function () {
        Route::get('/', [SecurityController::class, 'index'])->name('index');
        Route::put('/update/password', [SecurityController::class, 'update_password'])->name('update.password');
    });
    Route::prefix('setting')->name('setting.')->middleware([])->group(function () {
        Route::get('/', [SettingController::class, 'index'])->name('index');
        Route::put('/update', [SettingController::class, 'update'])->name('update');
        Route::get('/load-file/auth-bg', [FileController::class, 'loadFileAuthBg']);
    });
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
