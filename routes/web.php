<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminAuthenticated;
use App\Http\Controllers\Admin\AccountController as AdminAccountController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\ForeignLanguageController;
use App\Http\Controllers\Admin\ScientificResearchTopicController;
use App\Http\Controllers\Admin\ScientificWorkController;

use App\Http\Controllers\Employee\AccountController as EmployeeAccountController;
use App\Http\Controllers\Employee\DashboardController as EmployeeDashboardController;
use App\Http\Controllers\Employee\ProfileController;

// Trang chủ chung (nếu cần)
Route::get('/', function () {
    return view('welcome');
});

// =========================
// 👨‍💼 ADMIN ROUTES
// =========================
Route::prefix('admin')->name('admin.')->group(function () {
    // Đăng nhập
    Route::get('login', [AdminAccountController::class, 'login'])->name('login');
    Route::post('login', [AdminAccountController::class, 'postLogin'])->name('postLogin');

    // Các route cần đăng nhập admin
    Route::middleware(AdminAuthenticated::class)->group(function () {
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

        // Quản lý phòng ban, nhân viên, ngoại ngữ, nghiên cứu khoa học
        Route::resource('departments', DepartmentController::class);
        Route::resource('employee', EmployeeController::class);
        Route::resource('foreign_languages', ForeignLanguageController::class);
        Route::resource('scientific_research_topics', ScientificResearchTopicController::class);
        Route::resource('scientific_works', ScientificWorkController::class);

        // Đăng xuất
        Route::post('logout', [AdminAccountController::class, 'logout'])->name('logout');
    });
});

// =========================
// 👷 EMPLOYEE ROUTES
// =========================
Route::prefix('employee')->name('employee.')->group(function () {
    // Chưa đăng nhập (guest)
    Route::middleware('guest:employee')->group(function () {
        Route::get('login', [EmployeeAccountController::class, 'login'])->name('login');
        Route::post('login', [EmployeeAccountController::class, 'postLogin'])->name('postLogin');
    });

    // Đã đăng nhập (auth)
    Route::middleware('auth:employee')->group(function () {
        Route::get('dashboard', [EmployeeDashboardController::class, 'index'])->name('dashboard');

        // Hồ sơ cá nhân
        Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

        // Đăng xuất
        Route::post('logout', [EmployeeAccountController::class, 'logout'])->name('logout');
    });
});
