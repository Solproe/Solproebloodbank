<?php

use App\Http\Controllers\APIs\authentication\validateAppUsers;
use App\Http\Controllers\APIs\inventories\SuppliesManage;
use App\Http\Controllers\APIs\requestapi\LocalDataController;
use App\Http\Controllers\APIs\requestapi\RequestController;
use App\Http\Controllers\APIs\requestapi\validate;
use App\Http\Controllers\BloodUnitReport;
use App\Models\usersValidationBloodBank;
use FontLib\Table\Type\name;
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

Route::group(['middleware:api'], function () {
    Route::post('store', [RequestController::class, 'store'])->name('v1.store');

    Route::put('update/{consecutive}', [RequestController::class, 'update'])->name('v1.update');

    Route::get('show', [RequestController::class, 'show'])->name('v1.show');

    Route::post('authUser', [validateAppUsers::class, 'validateBloodBankUsers'])->name('v1.authUser');

    Route::post('isLogged', [validateAppUsers::class, 'isLogged'])->name('v1.isLogged');

    Route::post('logOut', [validateAppUsers::class, 'logOut'])->name('v1.logOut');

    Route::post('getData', [LocalDataController::class, 'getPatientData'])->name('v1.getData');

    Route::get('getListCenter', [RequestController::class, 'getCentersList'])->name('v1.getListCenter');

    Route::post('getAllSupplies', [SuppliesManage::class, 'getAllSupplies'])->name('v1.getAllSupplies');

    Route::post('sendReportBloodUnits', [BloodUnitReport::class, 'saveReport'])->name('v1.sendReportBloodUnits');

    Route::post('getLastReports', [BloodUnitReport::class, 'getLastReport'])->name('v1.getLastReports');
});
