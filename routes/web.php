<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/berita', [HomeController::class, 'news'])->name('news');
Route::get('/berita/{id}', [HomeController::class, 'newsDetail'])->name('news.detail');
Route::get('/profil', [HomeController::class, 'profile'])->name('profile');
Route::get('/galeri', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/arsip', [HomeController::class, 'archives'])->name('archives');
Route::get('/kontak', [HomeController::class, 'contact'])->name('contact');
Route::post('/kontak', [HomeController::class, 'sendMessage'])->name('contact.send');

// ==========================
// Authentication Routes
// ==========================
// Login
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Register
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Password Reset
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

// ==========================
// Admin Routes (Protected)
// ==========================
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // News Routes
    Route::get('/berita', [AdminController::class, 'newsIndex'])->name('admin.news.index');
    Route::get('/berita/tambah', [AdminController::class, 'newsCreate'])->name('admin.news.create');
    Route::post('/berita', [AdminController::class, 'newsStore'])->name('admin.news.store');
    Route::get('/berita/{id}/edit', [AdminController::class, 'newsEdit'])->name('admin.news.edit');
    Route::put('/berita/{id}', [AdminController::class, 'newsUpdate'])->name('admin.news.update');
    Route::delete('/berita/{id}', [AdminController::class, 'newsDestroy'])->name('admin.news.destroy');
    
    // Gallery Routes
    Route::get('/galeri', [AdminController::class, 'galleryIndex'])->name('admin.gallery.index');
    Route::get('/galeri/tambah', [AdminController::class, 'galleryCreate'])->name('admin.gallery.create');
    Route::post('/galeri', [AdminController::class, 'galleryStore'])->name('admin.gallery.store');
    Route::delete('/galeri/{id}', [AdminController::class, 'galleryDestroy'])->name('admin.gallery.destroy');
    
    // Archive Routes
    Route::get('/arsip', [AdminController::class, 'archiveIndex'])->name('admin.archives.index');
    Route::get('/arsip/tambah', [AdminController::class, 'archiveCreate'])->name('admin.archives.create');
    Route::post('/arsip', [AdminController::class, 'archiveStore'])->name('admin.archives.store');
    Route::delete('/arsip/{id}', [AdminController::class, 'archiveDestroy'])->name('admin.archives.destroy');
    
    // Settings Route
    Route::get('/pengaturan', [AdminController::class, 'settings'])->name('admin.settings');
    Route::put('/pengaturan', [AdminController::class, 'settingsUpdate'])->name('admin.settings.update');
});
