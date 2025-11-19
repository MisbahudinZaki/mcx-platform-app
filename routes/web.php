<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BUController;
use App\Http\Controllers\FinancingRequestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:BU'])->group(function () {
    Route::post('/financing-request', [FinancingRequestController::class, 'store']);
    Route::get('/financing-request', [FinancingRequestController::class, 'index']);
    Route::get('/financing-request/{id}', [FinancingRequestController::class, 'show']);

    Route::get('/dashboard', [BUController::class, 'dashboard'])->name('bu.dashboard');
});

Route::resource('financing-requests', FinancingRequestController::class);

Route::get('financing-requests/{financingRequest}/download/approval-note', 
    [FinancingRequestController::class, 'downloadApprovalNote']);

Route::get('financing-requests/{financingRequest}/download/request-letter', 
    [FinancingRequestController::class, 'downloadRequestLetter']);
