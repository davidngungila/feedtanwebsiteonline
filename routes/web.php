<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FiaPaymentController;

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

// FIA Payment Routes (Public Access)
Route::prefix('fia')->name('fia.')->group(function () {
    // Member routes
    Route::get('/verify', [FiaPaymentController::class, 'memberVerify'])->name('member.verify');
    Route::post('/verify', [FiaPaymentController::class, 'memberVerifyProcess'])->name('member.verify.process');
    Route::post('/submit', [FiaPaymentController::class, 'submitPayment'])->name('submit');
    Route::get('/confirmation/{id}', [FiaPaymentController::class, 'confirmation'])->name('confirmation');
    
    // Admin routes (with passcode protection)
    Route::get('/admin', [FiaPaymentController::class, 'adminPasscode'])->name('admin.passcode');
    Route::post('/admin', [FiaPaymentController::class, 'adminPasscodeProcess'])->name('admin.passcode.process');
    Route::get('/admin/dashboard', [FiaPaymentController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/edit/{id}', [FiaPaymentController::class, 'editPayment'])->name('admin.edit');
    Route::post('/admin/update/{id}', [FiaPaymentController::class, 'updatePayment'])->name('admin.update');
    Route::post('/admin/status/{id}', [FiaPaymentController::class, 'updateStatus'])->name('admin.status');
    Route::get('/admin/export', [FiaPaymentController::class, 'exportCsv'])->name('admin.export');
    Route::post('/admin/logout', [FiaPaymentController::class, 'adminLogout'])->name('admin.logout');
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
