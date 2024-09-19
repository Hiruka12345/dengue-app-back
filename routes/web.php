<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
return view('welcome');
});

// Routes for authenticated and verified users
Route::middleware([
'auth:sanctum',
config('jetstream.auth_session'),
'verified',
])->group(function () {
// Dashboard route
Route::get('/dashboard', function () {
$authenticatedUser = Auth::user();
$permissions = $authenticatedUser->permissions;
$location = $authenticatedUser->location;

if ($permissions == 'edit_settings') {
return view('dashboard', compact('authenticatedUser', 'permissions', 'location'));
} elseif ($permissions == 'super_admin') {
return view('dashboard', compact('authenticatedUser', 'permissions', 'location'));
} else {
return view('dashboard', compact('authenticatedUser', 'permissions', 'location'));
}
})->name('dashboard');

// Reports route
Route::get('/reports', function () {
return view('reports');
})->name('reports');

// Active Cases route
Route::get('/active-cases', function () {
return view('active-cases');
})->name('active-cases');

// Resolved Cases route
Route::get('/resolved-cases', function () {
return view('resolved-cases');
})->name('resolved-cases');

// Settings route
Route::get('/settings', function () {
return view('settings');
})->name('settings');
});

use App\Http\Controllers\MagicLinkController;

// Route to show the form for adding a sub-admin
Route::get('/add-sub-admin', function () {
return view('add-sub-admin'); // Assumes you have a view file named 'add-sub-admin.blade.php'
})->name('addSubAdminForm');

// Route to handle the form submission for adding a sub-admin
Route::post('/add-sub-admin', [MagicLinkController::class, 'store'])->name('addSubAdmin');

// Route to send a magic login link
Route::post('/magic-link', [MagicLinkController::class, 'sendLink'])->name('sendMagicLink');

// Route to handle the magic login
Route::get('/magic-login', [MagicLinkController::class, 'login'])->name('magic.login');





