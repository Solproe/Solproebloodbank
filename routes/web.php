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

Route::middleware(['auth:sanctum'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Auth::routes();

/* Auth::routes(['verify' => true]); */

/* Route::get('profile', function () {
// Only verified users may enter...
})->middleware('verified'); */

/* Route::get('/email/verify', function () {
return view('auth.verify-email');
})->middleware('auth')->name('verification.notice'); */

/* Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
$request->fulfill();

return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify'); */

Route::get('/login-google', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/google-callback', function () {
    dd($user = Socialite::driver('google')->user());
    $userExists = user::where('socialmedia_id', $user->id)->where('socialmedia_auth', 'google')->first();

    if ($userExists) {
        auth::login($userExists);
    } else {
        /*  return view('auth.passwords.Alerts.Alert_doesnt_exist'); */

        $userNew = User::create([
            'name' => $user->name,
            'email' => $user->email,
            'avatar' => $user->avatar,
            'socialmedia_id' => $user->id,
            'socialmedia_auth' => 'google',
        ]);
        auth::login($userNew);
    }
    return redirect('/dashboard');
});

Route::get('/login-facebook', function () {
    return Socialite::driver('facebook')->redirect();
});

Route::get('/facebook-callback', function () {

    $user = Socialite::driver('facebook')->user();
    $userExists = user::where('socialmedia_id', $user->id)->where('socialmedia_auth', 'facebook')->first();
    if ($userExists) {
        auth::login($userExists);
    } else {
        return view('auth.passwords.Alerts.Alert_doesnt_exist');
    }
    return redirect('/dashboard');

});

Auth::routes();
