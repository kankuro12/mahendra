<?php

use App\Http\Controllers\Admin\AlbumController as AdminAlbumController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DepartmentController as AdminDepartmentController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\FacilityController as AdminFacilityController;
use App\Http\Controllers\Admin\GalleryItemController;
use App\Http\Controllers\Admin\LeadershipMessageController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\NoticeController as AdminNoticeController;
use App\Http\Controllers\Admin\TeacherController as AdminTeacherController;
use App\Http\Controllers\Admin\UploadController;
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

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::middleware('admin')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::post('/upload-image', [UploadController::class, 'image'])->name('upload.image');

        Route::resource('notices', AdminNoticeController::class);

        Route::prefix('albums/{album}/items')->name('albums.items.')->group(function () {
            Route::get('/', [GalleryItemController::class, 'index'])->name('index');
            Route::get('/create', [GalleryItemController::class, 'create'])->name('create');
            Route::post('/', [GalleryItemController::class, 'store'])->name('store');
            Route::get('/{item}/edit', [GalleryItemController::class, 'edit'])->name('edit');
            Route::put('/{item}', [GalleryItemController::class, 'update'])->name('update');
            Route::delete('/{item}', [GalleryItemController::class, 'destroy'])->name('destroy');
        });
        Route::resource('facilities', AdminFacilityController::class);
        Route::resource('albums', AdminAlbumController::class);
        Route::resource('messages', LeadershipMessageController::class);
        Route::resource('teachers', AdminTeacherController::class);
        Route::resource('events', AdminEventController::class);
        Route::resource('departments', AdminDepartmentController::class);

    });
});
