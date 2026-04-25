<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FiaPaymentController;
use App\Http\Controllers\CustomerDemandController;
use App\Http\Controllers\FeedtanSurveyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/products', function () {
    return view('products');
});

Route::get('/pricing', function () {
    return view('pricing');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/savings', function () {
    return view('savings');
});

Route::get('/social-welfare', function () {
    return view('social-welfare');
});

Route::get('/investment', function () {
    return view('investment');
});

Route::get('/training', function () {
    return view('training');
});

Route::get('/events', function () {
    return view('events');
});

Route::get('/articles', function () {
    return view('articles');
});

Route::get('/documents', function () {
    return view('documents');
});

// Dodoso Routes (Main Feedtan Survey + Payment System)
Route::prefix('dodoso')->name('dodoso.')->group(function () {
    // Main Feedtan Survey routes
    Route::get('/', [FeedtanSurveyController::class, 'index'])->name('survey.index');
    Route::get('/create', [FeedtanSurveyController::class, 'create'])->name('survey.create');
    Route::post('/store', [FeedtanSurveyController::class, 'store'])->name('survey.store');
    Route::get('/shukrani', [FeedtanSurveyController::class, 'thankyou'])->name('survey.thankyou');
    
    // Survey admin routes
    Route::get('/admin', [FeedtanSurveyController::class, 'admin'])->name('survey.admin');
    Route::get('/export', [FeedtanSurveyController::class, 'export'])->name('survey.export');
    
    // Payment routes (sub-routes)
    Route::get('/payment', [FiaPaymentController::class, 'publicForm'])->name('payment.form');
    Route::get('/', [FiaPaymentController::class, 'publicForm'])->name('dodoso.public.form');
    Route::get('/payment/verify', [FiaPaymentController::class, 'memberVerify'])->name('payment.member.verify');
    Route::post('/payment/verify', [FiaPaymentController::class, 'memberVerifyProcess'])->name('payment.member.verify.process');
    Route::post('/payment/submit', [FiaPaymentController::class, 'submitPayment'])->name('payment.submit');
    Route::get('/payment/confirmation/{id}', [FiaPaymentController::class, 'confirmation'])->name('payment.confirmation');
    Route::get('/payment/confirmation/{id}/pdf', [FiaPaymentController::class, 'confirmationPdf'])->name('payment.confirmation.pdf');
    
    // Payment admin routes (with passcode protection)
    Route::get('/payment/admin', [FiaPaymentController::class, 'adminPasscode'])->name('payment.admin.passcode');
    Route::post('/payment/admin', [FiaPaymentController::class, 'adminPasscodeProcess'])->name('payment.admin.passcode.process');
    Route::get('/payment/admin/dashboard', [FiaPaymentController::class, 'adminDashboard'])->name('payment.admin.dashboard');
    Route::get('/payment/admin/edit/{id}', [FiaPaymentController::class, 'editPayment'])->name('payment.admin.edit');
    Route::post('/payment/admin/update/{id}', [FiaPaymentController::class, 'updatePayment'])->name('payment.admin.update');
    Route::post('/payment/admin/status/{id}', [FiaPaymentController::class, 'updateStatus'])->name('payment.admin.status');
    Route::get('/payment/admin/export', [FiaPaymentController::class, 'exportCsv'])->name('payment.admin.export');
    Route::post('/payment/admin/logout', [FiaPaymentController::class, 'adminLogout'])->name('payment.admin.logout');
});

// Admin Routes with organized folder structure and live database
Route::prefix('admin')->group(function () {
    Route::get('/login', function () {
        return view('admin.auth.login');
    });
    
    // Admin Authentication Routes
    Route::get('/login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'authenticate'])->name('admin.authenticate');
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    // Admin Dashboard Routes (Protected)
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/members', [AdminController::class, 'members'])->name('admin.members');
    Route::get('/loans', [AdminController::class, 'loans'])->name('admin.loans');
    Route::get('/savings', [AdminController::class, 'savings'])->name('admin.savings');
    Route::get('/events', [AdminController::class, 'events'])->name('admin.events');
    Route::get('/articles', [AdminController::class, 'articles'])->name('admin.articles');
    Route::get('/documents', [AdminController::class, 'documents'])->name('admin.documents');
    Route::get('/reports', [AdminController::class, 'reports'])->name('admin.reports');
    Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');
    Route::get('/database', [AdminController::class, 'database'])->name('admin.database');
    Route::get('/backups', [AdminController::class, 'backups'])->name('admin.backups');
    Route::get('/security', [AdminController::class, 'security'])->name('admin.security');
    Route::get('/notifications', [AdminController::class, 'notifications'])->name('admin.notifications');
    Route::get('/audit', [AdminController::class, 'audit'])->name('admin.audit');
});

// Customer Demand Assessment Routes
Route::prefix('customer-demand')->name('customer-demand.')->group(function () {
    Route::get('/', [CustomerDemandController::class, 'index'])->name('index');
    Route::get('/create', [CustomerDemandController::class, 'create'])->name('create');
    Route::post('/store', [CustomerDemandController::class, 'store'])->name('store');
    Route::get('/thankyou', [CustomerDemandController::class, 'thankyou'])->name('thankyou');
    Route::get('/admin', [CustomerDemandController::class, 'admin'])->name('admin');
    Route::get('/export', [CustomerDemandController::class, 'export'])->name('export');
});

// Feedtan Mini Supermarket Survey Routes - Integrated with Dodoso
Route::prefix('dodoso')->name('dodoso.')->group(function () {
    // Public survey routes
    Route::get('/survey', [FeedtanSurveyController::class, 'index'])->name('survey.index');
    Route::get('/survey/create', [FeedtanSurveyController::class, 'create'])->name('survey.create');
    Route::post('/survey/store', [FeedtanSurveyController::class, 'store'])->name('survey.store');
    Route::get('/survey/shukrani', [FeedtanSurveyController::class, 'thankyou'])->name('survey.thankyou');
    
    // Admin survey routes
    Route::get('/survey/admin', [FeedtanSurveyController::class, 'admin'])->name('survey.admin');
    Route::get('/survey/export', [FeedtanSurveyController::class, 'export'])->name('survey.export');
});
