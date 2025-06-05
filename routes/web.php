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



Route::get('/test-mail', function () {
    Mail::raw('This is a test email sent using Brevo SMTP and Laravel 12.', function ($message) {
        $message->to('abdurdiary@gmail.com') // Replace with your actual email
                ->subject('🎉 Brevo SMTP Test Successful');
    });

    return 'Test email has been sent!';
});

//**PROFILE SETTING */
Route::middleware(['auth','user-status'])->get('/profile-setting', [ProfileProfileController::class, 'index'])->name('profile.setting');

require __DIR__.'/auth.php';
