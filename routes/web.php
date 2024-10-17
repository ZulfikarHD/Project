<?php

use App\Http\Controllers\FindVenueController;
use App\Http\Controllers\Owner\FinancialManagement\OwFmBudgetingController;
use App\Http\Controllers\Owner\FinancialManagement\OwFmExpensesController;
use App\Http\Controllers\Owner\FinancialManagement\OwFmInvoicesController;
use App\Http\Controllers\Owner\FinancialManagement\OwFmPaymentsController;
use App\Http\Controllers\Owner\FinancialManagement\OwFmReportsController;
use App\Http\Controllers\Owner\FinancialManagement\OwFmRevenueController;
use App\Http\Controllers\Owner\FinancialManagement\OwFmSettingsController;
use App\Http\Controllers\Owner\MarketingTools\OwMtAnalitycsController;
use App\Http\Controllers\Owner\MarketingTools\OwMtCampaignManagementController;
use App\Http\Controllers\Owner\MarketingTools\OwMtCustomerFeedbackController;
use App\Http\Controllers\Owner\MarketingTools\OwMtPromotionsController;
use App\Http\Controllers\Owner\MarketingTools\OwMtRefferalProgramController;
use App\Http\Controllers\Owner\MarketingTools\OwMtSeoToolsController;
use App\Http\Controllers\Owner\MarketingTools\OwMtSocialMediaController;
use App\Http\Controllers\Owner\MarketingTools\OwMtSettingsController;
use App\Http\Controllers\Owner\OwBookingManagementController;
use App\Http\Controllers\Owner\OwCustomerManagementController;
use App\Http\Controllers\Owner\OwFieldManagementController;
use App\Http\Controllers\Owner\OwFinancialManagementController;
use App\Http\Controllers\Owner\OwMarketingToolsController;
use App\Http\Controllers\Owner\OwReportingToolsController;
use App\Http\Controllers\Owner\OwStaffManagementController;
use App\Http\Controllers\Owner\OwUserManagementController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
// use App\Http\Controllers\Owner\VenueManagement\VenueController;
use App\Http\Controllers\OwVenuesController;
use App\Http\Controllers\Venue\AddVenuesController;
use App\Http\Controllers\VenueDetailsController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/owner', function () {
    return Inertia::render('Owner/OwDashboard');
})->name('owner.dashboard');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/find-venue ', [FindVenueController::class, 'index'])->name('home');
Route::get('/venue-details', [VenueDetailsController::class, 'index'])->name('venueDetails');

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Owner Routes

Route::middleware('auth')->group(function () {
    Route::get('/owner', function () {
        return Inertia::render('Owner/OwDashboard');
    })->name('owner.dashboard');


    Route::get('/owner/booking-management', [OwBookingManagementController::class, 'index'])->name('owner.bookingMgmt');
    Route::get('/owner/field-management', [OwFieldManagementController::class, 'index'])->name('owner.fieldMgmt');
    Route::get('/owner/staff-management', [OwStaffManagementController::class, 'index'])->name('owner.staffMgmt');
    Route::get('/owner/user-management', [OwUserManagementController::class, 'index'])->name('owner.userMgmt');
    Route::get('/owner/marketing-tools', [OwMarketingToolsController::class, 'index'])->name('owner.marketingTools');
    Route::get('/owner/reporting-tools', [OwReportingToolsController::class, 'index'])->name('owner.reportingTools');
    Route::get('/owner/customer-management', [OwCustomerManagementController::class, 'index'])->name('owner.customerMgmt');


    /**
     * -------------------------------
     * Venue Management Routes
     * -------------------------------
     */
    route::namespace('App\Http\Controllers\Owner\VenueManagement')
         ->group(function () {
            Route::get('/owner/venues/add-venue', 'VenueController@create')->name('owner.venue.add-venue');
            // Route::post('/owner/venues/store',    'VenueController@store')->name('owner.venue.store');
        });

    /**
     * -------------------------------
     * Field Management Routes
     * -------------------------------
     */
    route::namespace('App\Http\Controllers\Owner\FieldManagement')
         ->group(function () {
            Route::get('/owner/fields/field-list',   'FieldController@index')->name('owner.field-management.field-list');
            Route::get('/owner/fields/create-field', 'FieldController@createField')->name('owner.field-management.create-field');
            // Route::post('/owner/venues/store',    'VenueController@store')->name('owner.venue.store');
        });

    // Route::post('/owner/venues', [VenueController::class, 'storeBasicInfo']);
    // Route::post('/owner/venues/{id}/fields', [VenueController::class, 'storeFields']);
    // Route::post('/owner/venues/{id}/availability', [VenueController::class, 'storeAvailability']);
    // Route::post('/owner/venues/{id}/submit', [VenueController::class, 'submitVenue']);

    /**
     * -------------------------------
     * Financial Management Routes
     * -------------------------------
     */
    Route::get('/owner/financial-management',           [OwFinancialManagementController::class, 'index'])->name('owner.financialMgmt');  // Main
    Route::get('/owner/financial-management/revenue',   [OwFmRevenueController::class,           'index'])->name('owner.fm.revenue');
    Route::get('/owner/financial-management/budgeting', [OwFmBudgetingController::class,         'index'])->name('owner.fm.budgeting');
    Route::get('/owner/financial-management/expenses',  [OwFmExpensesController::class,          'index'])->name('owner.fm.expenses');
    Route::get('/owner/financial-management/invoices',  [OwFmInvoicesController::class,          'index'])->name('owner.fm.invoices');
    Route::get('/owner/financial-management/payments',  [OwFmPaymentsController::class,          'index'])->name('owner.fm.payments');
    Route::get('/owner/financial-management/reports',   [OwFmReportsController::class,           'index'])->name('owner.fm.reports');
    Route::get('/owner/financial-management/settings',  [OwFmSettingsController::class,          'index'])->name('owner.fm.settings');

    /**
     * ---------------------------
     * Marketing Tools Routes
     * ---------------------------
     */
    Route::get('/owner/marketing-tools/analytics', [OwMtAnalitycsController::class, 'index'])->name('owner.marketingTools.analytics');
    Route::get('/owner/marketing-tools/campaign-management', [OwMtCampaignManagementController::class, 'index'])->name('owner.marketingTools.campaignManagement');
    Route::get('/owner/marketing-tools/customer-feedback', [OwMtCustomerFeedbackController::class, 'index'])->name('owner.marketingTools.customerFeedback');
    Route::get('/owner/marketing-tools/promotions', [OwMtPromotionsController::class, 'index'])->name('owner.marketingTools.promotions');
    Route::get('/owner/marketing-tools/refferal-program', [OwMtRefferalProgramController::class, 'index'])->name('owner.marketingTools.refferalProgram');
    Route::get('/owner/marketing-tools/social-media', [OwMtSocialMediaController::class, 'index'])->name('owner.marketingTools.socialMedia');
    Route::get('/owner/marketing-tools/seo-tools', [OwMtSeoToolsController::class, 'index'])->name('owner.marketingTools.seoTools');
    Route::get('/owner/marketing-tools/settings', [OwMtSettingsController::class, 'index'])->name('owner.marketingTools.settings');
});

require __DIR__ . '/auth.php';
