<?php

use App\Http\Controllers\Admin\AlbumController as AdminAlbumController;
use App\Http\Controllers\Admin\AlumniController as AdminAlumniController;
use App\Http\Controllers\Admin\AlumniRegistrationController;
use App\Http\Controllers\Admin\AlumniSettingController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\ContactSettingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DepartmentController as AdminDepartmentController;
use App\Http\Controllers\Admin\DocumentController as AdminDocumentController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\FacilityController as AdminFacilityController;
use App\Http\Controllers\Admin\FaqController as AdminFaqController;
use App\Http\Controllers\Admin\GalleryItemController;
use App\Http\Controllers\Admin\HomeSettingController;
use App\Http\Controllers\Admin\LeadershipMessageController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\NoticeController as AdminNoticeController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Admin\SiteSettingController;
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
Route::post('/contact', [PageController::class, 'contactSubmit'])->name('contact.submit');
Route::post('/alumni/register', [PageController::class, 'alumniRegister'])->name('alumni.register');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');

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
        Route::resource('pages', AdminPageController::class)->except('show');

        Route::prefix('albums/{album}/items')->name('albums.items.')->group(function () {
            Route::get('/', [GalleryItemController::class, 'index'])->name('index');
            Route::post('/', [GalleryItemController::class, 'store'])->name('store');
            Route::delete('/{item}', [GalleryItemController::class, 'destroy'])->name('destroy');
        });
        Route::resource('facilities', AdminFacilityController::class);
        Route::resource('albums', AdminAlbumController::class);
        Route::resource('messages', LeadershipMessageController::class);
        Route::resource('teachers', AdminTeacherController::class);
        Route::resource('documents', AdminDocumentController::class);
        Route::resource('events', AdminEventController::class);
        Route::get('/home-settings', [HomeSettingController::class, 'index'])->name('home-settings.index');
        Route::put('/home-settings', [HomeSettingController::class, 'update'])->name('home-settings.update');

        Route::get('/contact-settings', [ContactSettingController::class, 'index'])->name('contact-settings.index');
        Route::put('/contact-settings', [ContactSettingController::class, 'update'])->name('contact-settings.update');

        Route::get('/contact-messages', [ContactMessageController::class, 'index'])->name('contact-messages.index');
        Route::get('/contact-messages/{contactMessage}', [ContactMessageController::class, 'show'])->name('contact-messages.show');
        Route::delete('/contact-messages/{contactMessage}', [ContactMessageController::class, 'destroy'])->name('contact-messages.destroy');

        Route::get('/site-settings', [SiteSettingController::class, 'index'])->name('site-settings.index');
        Route::put('/site-settings', [SiteSettingController::class, 'update'])->name('site-settings.update');

        Route::resource('faqs', AdminFaqController::class);
        Route::resource('alumni', AdminAlumniController::class);

        Route::get('/alumni-registrations', [AlumniRegistrationController::class, 'index'])->name('alumni-registrations.index');
        Route::get('/alumni-registrations/{alumniRegistration}', [AlumniRegistrationController::class, 'show'])->name('alumni-registrations.show');
        Route::delete('/alumni-registrations/{alumniRegistration}', [AlumniRegistrationController::class, 'destroy'])->name('alumni-registrations.destroy');

        Route::get('/alumni-settings', [AlumniSettingController::class, 'index'])->name('alumni-settings.index');
        Route::put('/alumni-settings', [AlumniSettingController::class, 'update'])->name('alumni-settings.update');

        Route::resource('departments', AdminDepartmentController::class);
    });
});
