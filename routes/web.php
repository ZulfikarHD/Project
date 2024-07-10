<?php

use App\Http\Controllers\Owner\FinancialManagement\OwFmBudgetingController;
use App\Http\Controllers\Owner\FinancialManagement\OwFmExpensesController;
use App\Http\Controllers\Owner\FinancialManagement\OwFmInvoicesController;
use App\Http\Controllers\Owner\FinancialManagement\OwFmPaymentsController;
use App\Http\Controllers\Owner\FinancialManagement\OwFmReportsController;
use App\Http\Controllers\Owner\FinancialManagement\OwFmRevenueController;
use App\Http\Controllers\Owner\FinancialManagement\OwFmSettingsController;
use App\Http\Controllers\Owner\OwBookingManagementController;
use App\Http\Controllers\Owner\OwCustomerManagementController;
use App\Http\Controllers\Owner\OwFieldManagementController;
use App\Http\Controllers\Owner\OwFinancialManagementController;
use App\Http\Controllers\Owner\OwMarketingToolsController;
use App\Http\Controllers\Owner\OwReportingToolsController;
use App\Http\Controllers\Owner\OwStaffManagementController;
use App\Http\Controllers\Owner\OwUserManagementController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/owner', function () {
    return Inertia::render('Owner/OwDashboard');
})->name('owner.dashboard');

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Owner Routes
Route::get('/owner/booking-management', [OwBookingManagementController::class, 'index'])->name('owner.bookingMgmt');
Route::get('/owner/field-management', [OwFieldManagementController::class, 'index'])->name('owner.fieldMgmt');
Route::get('/owner/staff-management', [OwStaffManagementController::class, 'index'])->name('owner.staffMgmt');
Route::get('/owner/user-management', [OwUserManagementController::class, 'index'])->name('owner.userMgmt');
Route::get('/owner/marketing-tools', [OwMarketingToolsController::class, 'index'])->name('owner.marketingTools');
Route::get('/owner/reporting-tools', [OwReportingToolsController::class, 'index'])->name('owner.reportingTools');
Route::get('/owner/customer-management', [OwCustomerManagementController::class, 'index'])->name('owner.customerMgmt');

/**
 * -------------------------------
 * Financial Management Routes
 * -------------------------------
 */
Route::get('/owner/financial-management', [OwFinancialManagementController::class, 'index'])->name('owner.financialMgmt');  // Main
Route::get('/owner/financial-management/revenue', [OwFmRevenueController::class, 'index'])->name('owner.fm.revenue');
Route::get('/owner/financial-management/budgeting', [OwFmBudgetingController::class, 'index'])->name('owner.fm.budgeting');
Route::get('/owner/financial-management/expenses', [OwFmExpensesController::class, 'index'])->name('owner.fm.expenses');
Route::get('/owner/financial-management/invoices', [OwFmInvoicesController::class, 'index'])->name('owner.fm.invoices');
Route::get('/owner/financial-management/payments', [OwFmPaymentsController::class, 'index'])->name('owner.fm.payments');
Route::get('/owner/financial-management/reports', [OwFmReportsController::class, 'index'])->name('owner.fm.reports');
Route::get('/owner/financial-management/settings', [OwFmSettingsController::class, 'index'])->name('owner.fm.settings');

/**
 * ---------------------------
 * Marketing Tools Routes
 * ---------------------------
 */


require __DIR__ . '/auth.php';
