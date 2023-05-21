<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UserController,
    StudentController,
    AnnouncementController,
    MessageController,
    DashboardController,
    ProfileController,
    StandardController,
    Auth\AuthenticatedSessionController,
    Auth\RegisteredUserController
};

// Authentication Routes
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// Welcome Page
Route::get('/', function () {
    return view('welcome');
});

// Middleware Auth Routes
Route::middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('students', StudentController::class);
    Route::resource('announcements', AnnouncementController::class);
    Route::resource('messages', MessageController::class);
    Route::post('/messages/{message}/reply', [MessageController::class, 'reply'])->name('messages.reply');
    Route::delete('/messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');
});

// Middleware Auth & Standard User Routes
Route::middleware(['auth', 'standard_user'])->group(function () {
    Route::get('/standard_users/update-password', [ProfileController::class, 'showPasswordUpdateForm'])->name('standard.update-password');
    Route::post('/standard/update-password', [ProfileController::class, 'updatePassword'])->name('standard.update-password.submit');
    Route::get('/standard_users/students/search', [StandardController::class, 'searchStudents'])->name('standard.students.search');
});

// Middleware Auth & Admin Routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// Middleware Auth & Standard User Dashboard Routes
Route::middleware(['auth', 'role:standard'])->group(function () {
    Route::get('/standard_users/dashboard', [StandardController::class, 'dashboard'])->name('standard.dashboard');
});

// Standard User Routes
Route::get('/standard/announcements', [AnnouncementController::class, 'index'])->name('standard.announcements');
Route::get('/standard/students', [StudentController::class, 'indexStandardUser'])->name('standard.students');

// Standard User Message Routes
Route::middleware(['auth', 'role:standard'])->group(function () {
    Route::get('/standard/messages', [MessageController::class, 'index'])->name('standard.messages.index');
    Route::get('/standard/messages/create', [MessageController::class, 'createStandardUser'])->name('standard.messages.create');
    Route::get('/standard/messages/{message}', [MessageController::class, 'show'])->name('standard.messages.show');
    Route::post('/standard/messages', [MessageController::class, 'storeStandardUser'])->name('standard.messages.store');
});

// Authentication
require __DIR__.'/auth.php';
