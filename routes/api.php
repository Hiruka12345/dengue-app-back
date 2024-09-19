<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\Auth\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Registration and login routes
Route::post('/register', [AuthController::class, 'registerUser']);
Route::post('/login', [AuthController::class, 'LoginUser']);

// Report submission route
Route::post('/report_submission', [ReportController::class, 'submitReport']);

// Fetch all reports route
Route::get('/reports', [ReportController::class, 'getAllReports']);

// Fetch a single report by ID route
Route::get('/reports/{id}', [ReportController::class, 'getReportById']);
