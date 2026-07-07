<?php

use App\Http\Controllers\FacilityController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// Static Pages
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/notice', [PageController::class, 'notice'])->name('notice');
Route::get('/alumni', [PageController::class, 'alumni'])->name('alumni');
Route::get('/teachers', [PageController::class, 'teachers'])->name('teachers');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

// Institution Static Pages
Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/tenders', [PageController::class, 'tenders'])->name('tenders');
Route::get('/downloads', [PageController::class, 'downloads'])->name('downloads');
Route::get('/careers', [PageController::class, 'careers'])->name('careers');

// Facilities
Route::get('/facilities', [FacilityController::class, 'index'])->name('facilities');
Route::get('/facilities/{slug}', [FacilityController::class, 'show'])->name('facility-detail');

// Gallery Albums
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/gallery/{slug}', [GalleryController::class, 'show'])->name('gallery-detail');

// Leadership Messages
Route::get('/messages', [MessageController::class, 'index'])->name('messages');
Route::get('/messages/{slug}', [MessageController::class, 'show'])->name('message-detail');
