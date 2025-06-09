<?php
use App\Http\Controllers\backend\profile\ProfileController as ProfileProfileController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CheckUserStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'user-status'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');




//**PROFILE SETTING */
Route::middleware(['auth','user-status'])->get('/profile-setting', [ProfileProfileController::class, 'index'])->name('profile.setting');
Route::middleware(['auth', 'user-status'])->post('/pass-update', [ProfileProfileController::class, 'updatePassword'])->name('pass.update');
Route::middleware(['auth', 'user-status'])->post('/profile-image', [ProfileProfileController::class, 'profileImageUpload'])->name('profile.store');
Route::middleware(['auth', 'user-status'])->post('/profile-info', [ProfileProfileController::class, 'profileInfo'])->name('profile.info');


require __DIR__.'/auth.php';
