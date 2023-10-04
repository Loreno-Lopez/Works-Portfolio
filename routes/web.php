<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\GoogleController;

//Sezione socialite
Route::get('auth/google', [GoogleController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back', [GoogleController::class, 'callbackGoogle']);

//Sezione admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index')->middleware('isAdmin');

Route::get('/', [PageController::class, 'homepage'])->name('home');
Route::get('/category/{category}', [PageController::class, 'categoryShow'])->name('categoryShow');

//Sezione annunci
Route::prefix('announcements')->middleware('auth')->group(function () {

    //SISTEMA RICERCA OLD (by Biagio)
    Route::get('\search', [AnnouncementController::class, 'announcementsSearch'])->name('announcements.search');
});

//SISTEMA RICERCA CON TNTSEARCH
Route::get('/search/announcement', [AnnouncementController::class, 'searchAnnouncements'])->name('search.announcements');

Route::get('show/{announcement}', [AnnouncementController::class, 'showAnnouncements'])->name('announcements.show');

Route::get('announcements', [AnnouncementController::class, 'indexAnnouncements'])->name('announcements.index');


//Sezione contatti
Route::get('/contacts', [ContactController::class, 'form'])->name('contacts');
Route::post('/contacts/save', [ContactController::class, 'save'])->name('contacts.save');

//Sezione account
Route::prefix('account')->middleware('auth')->group(function () {

    //Crea Annunci
    Route::get('/new/announcement', [AnnouncementController::class, 'createAnnouncement'])->name('announcement.create');
});


//Sezione Revisore
Route::middleware('auth', 'isRevisor')->group(function () {

    //Home Revisore
    Route::get('/revisor/home', [RevisorController::class, 'index'])->name('revisor.index');

    //Accetta Annunci
    Route::patch('/accepted/announcement/{announcement}', [RevisorController::class, 'acceptAnnouncement'])->name('revisor.accept_announcement');

    //Rifiuta Annunci
    Route::patch('/reject/announcement/{announcement}', [RevisorController::class, 'rejectAnnouncement'])->name('revisor.reject_announcement');

    //Annunci rifiutati
    Route::get('/revisor/reject', [RevisorController::class, 'reject'])->name('revisor.reject');

    //Sposta Annunci
    Route::patch('move/reject/announcement/{announcement}', [RevisorController::class, 'moveRejectAnnouncement'])->name('revisor.move_reject_announcement');
});

//Richiesta di diventare Revisore
Route::get('/request/revisor', [RevisorController::class, 'becomeRevisor'])->name('become.revisor')->middleware('auth');

//Rendi utente revisore da mail
Route::get('/make/revisor/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor')->middleware('auth');

// cambio lingua
Route::post('/lingua/{lang}', [FrontController::class, 'setLanguage'])->name('set_language_locale');

//Sezione privacy policy
Route::get('/privacy_policy', [PageController::class, 'privacyPolicy'])->name('privacypolicy');

//Sezione terms of use
Route::get('/terms_of_use', [PageController::class, 'termsOfUse'])->name('termsofuse');

//Sezione About-us
Route::get('/about_us', [PageController::class, 'aboutUs'])->name('aboutUs');
