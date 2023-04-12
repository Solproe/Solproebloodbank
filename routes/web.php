<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\ClickEvent;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Donors\AcceptedDonors;
use App\Http\Controllers\Donors\DeferredDonors;
use App\Http\Controllers\Donors\Donation;
use App\Http\Controllers\Donors\PotentialDonors;
use App\Http\Controllers\Donors\RejectedDonors;
use Laravel\Jetstream\Rules\Role;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Auth::routes();
