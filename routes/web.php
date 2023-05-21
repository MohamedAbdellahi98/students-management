<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\StandardController;


Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('students', StudentController::class);
    Route::resource('announcements', AnnouncementController::class);
    Route::resource('messages', MessageController::class);
    Route::post('/messages/{message}/reply', [MessageController::class, 'reply'])->name('messages.reply'); // Add this line
    Route::delete('/messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');

});

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth', 'standard_user'])->group(function () {
    Route::get('/standard_users/update-password', [App\Http\Controllers\ProfileController::class, 'showPasswordUpdateForm'])->middleware(['auth', 'standard_user'])->name('standard.update-password');
    Route::post('/standard/update-password', [App\Http\Controllers\ProfileController::class, 'updatePassword'])->name('standard.update-password.submit');
});

Route::get('/standard_users/students/search', [App\Http\Controllers\StandardController::class, 'searchStudents'])->name('standard.students.search');



Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});


Route::middleware(['auth', 'role:standard'])->group(function () {
    Route::get('/standard_users/dashboard', [StandardController::class, 'dashboard'])->name('standard.dashboard');
});


// Standard User Announcements
Route::get('/standard/announcements', [AnnouncementController::class, 'indexStandardUser'])->name('standard.announcements');

// Standard User Students
Route::get('/standard/students', [StudentController::class, 'indexStandardUser'])->name('standard.students');

// Standard User Messages
Route::middleware(['auth', 'role:standard'])->group(function () {
    Route::get('/standard/messages', [MessageController::class, 'index'])->name('standard.messages.index');
    Route::get('/standard/messages/create', [MessageController::class, 'createStandardUser'])->name('standard.messages.create');
    Route::get('/standard/messages/{message}', [MessageController::class, 'show'])->name('standard.messages.show');
    Route::post('/standard/messages', [MessageController::class, 'storeStandardUser'])->name('standard.messages.store');
});

require __DIR__.'/auth.php';
