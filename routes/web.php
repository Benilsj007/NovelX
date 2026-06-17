<?php

use App\Http\Controllers\Students\StudentController;
use App\Http\Controllers\Login\AuthController;
use App\Http\Controllers\Students\CaptureController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'Register'])->name('register');

Route::post('/register/store', [AuthController::class, 'store']);
Route::post('/login/auth', [AuthController::class, 'loginAut']);
Route::post('/send-otp', [AuthController::class, 'sendOtp']);

Route::middleware(['checklogin'])->group(function () {

    Route::get('/dashboard', [StudentController::class, 'dashboard']);

    Route::get('/students/edit/{id}', [StudentController::class, 'edit']);
    Route::put('/students/update/{id}', [StudentController::class, 'update']);
    Route::get('/students/delete/{id}', [StudentController::class, 'delete']);
    Route::delete('/students/destroy/{id}', [StudentController::class, 'destroy']);

    // Browsershot Routes
    Route::get('/dashboard-pdf', [StudentController::class, 'generatePdf']);
    Route::get('/dashboard-screenshot', [StudentController::class, 'generateScreenshot']);

    Route::get('/logout', [AuthController::class, 'logout']);
});
    Route::get('/students-data', [StudentController::class, 'getUsersData']);

Route::get('/students-details', [StudentController::class, 'index']);

Route::get('/capture', [CaptureController::class, 'capture']);