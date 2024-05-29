<?php
use App\Models\AdmissionInfo;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentDController;
use Inertia\Inertia;
use App\Http\Controllers\AdmissionInfoController;


Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

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

Route::get('/enrollment-status', function () {
    return Inertia::render('AdminComponents/EnrollmentStatus/App');
})->name('enrollment-status');

require __DIR__.'/auth.php';
