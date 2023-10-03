<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
    ? back()->with(['status' => __($status)])
    : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Auth::routes();

Route::get('/login-google', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/google-callback', function () {
    $user = Socialite::driver('google')->user();
    $userExists = user::where('socialmedia_id', $user->id)->where('socialmedia_auth', 'google')->first();

    if ($userExists) {
        auth::login($userExists);
    } else {
        return view('auth.passwords.Alerts.Alert_doesnt_exist');

        /* $userNew = User::create([
    'name' => $user->name,
    'email' => $user->email,
    'avatar' => $user->avatar,
    'socialmedia_id' => $user->id,
    'socialmedia_auth' => 'google',
    ]);
    auth::login($userNew); */
    }
    return redirect('/dashboard');
});

Route::get('/login-facebook', function () {
    return Socialite::driver('facebook')->redirect();
});

Route::get('/facebook-callbank', function () {


    dd($user = Socialite::driver('facebook')->user());
    try {

        $userExists = user::where('socialmedia_id', $user->id)->where('socialmedia_auth', 'facebook')->first();
        if ($userExists) {
            auth::login($userExists);
        } else {
            return view('auth.passwords.Alerts.Alert_doesnt_exist');
        }
        return redirect('/dashboard');
    } catch (Exception $e) {
        dd($e->getMessage());
    }

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
