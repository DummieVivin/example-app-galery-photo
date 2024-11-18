<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\{
    GaleriPhotoController,
    NewsPortalController
    };
use App\Http\Controllers\User\DashboardController as UserDashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //Route Admin
    Route::get('/admin-dashboard' , [AdminDashboard::class, 'index'])->name('admin-dashboard');
    Route::get('admin-galeri-photo', [GaleriPhotoController::class, 'index'])->name('admin-galeri-photo');
    Route::get('admin-create-galeri-photo', [GaleriPhotoController::class, 'create'])->name('admin-create-galeri-photo');
    Route::post('admin-store-galeri-photo', [GaleriPhotoController::class, 'store'])->name('admin-store-galeri-photo');
    Route::get('admin-edit-galeri-photo/{post:slug}', [GaleriPhotoController::class, 'edit'])->name('admin-edit-galeri-photo');
    Route::get('admin-show-galeri-photo/{post:slug}', [GaleriPhotoController::class, 'show'])->name('admin-show-galeri-photo');
    Route::put('admin-update-galeri-photo/{post:slug}', [GaleriPhotoController::class, 'updateGaleri'])->name('admin-update-galeri-photo');
    Route::get('admin-newsportal', [NewsPortalController::class, 'index'])->name('admin-newsportal');
    Route::get('admin-create-newsportal', [NewsPortalController::class, 'create'])->name('admin-create-news-portal');

    Route::get('admin-galeri-photo-with-vue', [GaleriPhotoController::class, 'getPost'])->name('admin-galeri-photo-with-vue');
    // Route::get('admin-edit-galeri-photo/{post}', [GaleriPhotoController::class, 'edit'])->name('admin-edit-galeri-photo');

    //Route User
    Route::get('/user-dashboard' , [UserDashboardController::class, 'index'])->name('user-dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
