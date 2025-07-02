<?php

use App\Http\Controllers\BerandaFrontendController;
use App\Http\Controllers\BerandaBackendController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProjectFrontendController;
use Illuminate\Support\Facades\Route;

// Redirect root ke beranda frontend
Route::get('/', function () {
    return redirect()->route('beranda');
});

// AUTH routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// FRONTEND routes
Route::get('/beranda', [BerandaFrontendController::class, 'index'])->name('beranda');
Route::get('/project', [ProjectFrontendController::class, 'index'])->name('project');

// BACKEND routes (admin area) dengan prefix dan auth middleware
Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
    // Dashboard admin
    Route::get('/beranda', [BerandaBackendController::class, 'index'])->name('beranda');

    // Halaman daftar project admin
    Route::get('/project', [ProjectController::class, 'index'])->name('project');

    // Resource CRUD project (index/create/store/edit/update/delete)
    Route::resource('projects', ProjectController::class);
    Route::get('/admin/projects/{project}', [ProjectController::class, 'show'])->name('admin.projects.show');

});
