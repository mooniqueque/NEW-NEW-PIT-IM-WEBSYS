<?php

use App\Models\AdmissionInfo;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentDController;
use Inertia\Inertia;
use App\Http\Controllers\AdmissionInfoController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return Inertia::render('welcome-page', [
    ]);
})->name('welcome-page');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/student-dashboard', function () {
    return Inertia::render('DComponents/StudentD');
})->name('student.dashboard');

Route::get('/admission-form', function () {
    return Inertia::render('AdmissionComponents/AdmissionForm');
})->name('admission.form');

Route::post('/submitForm', [AdmissionInfoController::class, 'store'])->name('submitForm');

Route::get('/admin-dashboard', function () {
    return Inertia::render('AdminComponents/AllAdComps');
})->name('admin.dashoard');

Route::get('/application-process', function () {
    return Inertia::render('AdminComponents/Applications/App');
})->name('application-process');


Route::get('/welcome-page', function () {
    return Inertia::render('WelcomePage/WelPage');
})->name('welcome-page');


Route::get('/login-page', [PagesController::class, 'showLoginPage'])->name('login-page');

Route::post('/login', [LoginController::class, 'login']);


// Dashboard routes for different user roles
Route::get('/department-dashboard', function () {
    return view('app');
})->name('department.dashboard');

Route::get('/cashier-dashboard', function () {
    return view('app');
})->name('cashier.dashboard');

Route::get('/registrar-dashboard', function () {
    return view('app');
})->name('registrar.dashboard');

use App\Http\Controllers\Auth\RegistrationController;

Route::post('/register-page', [RegistrationController::class, 'register']);


// routes/web.php
use App\Http\Controllers\AdmissionHandlerController;

Route::get('/admission-handlers', [AdmissionHandlerController::class, 'index']);

require __DIR__.'/auth.php';

