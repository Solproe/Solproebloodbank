<?php

use App\Http\Controllers\APIs\authentication\validateAppUsers;
use App\Http\Controllers\APIs\requestapi\RequestController;
use App\Http\Controllers\APIs\requestapi\validate;
use App\Models\usersValidationBloodBank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('store', [RequestController::class, 'store'])->name('v1.store');

Route::put('update/{consecutive}', [RequestController::class, 'update'])->name('v1.update');

Route::get('show', [RequestController::class, 'show'])->name('v1.show');

Route::post('validation', [validateAppUsers::class, 'validateBloodBankUsers'])->name('v1.validation');
