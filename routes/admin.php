<?php

use App\Http\Controllers\admin\accountings\Pettycashs;
use App\Http\Controllers\admin\appUsers\AppUsersController;
use App\Http\Controllers\admin\center\CenterController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\inventories\delivery\ShippingReportController;
use App\Http\Controllers\admin\inventories\delivery\ValidateReceivedController;
use App\Http\Controllers\admin\inventories\orders\SuppliesOrder;
use App\Http\Controllers\admin\inventories\supplies\SupplyController;
use App\Http\Controllers\admin\inventories\warehouses\RequestController;
use App\Http\Controllers\admin\providers\ProveedorController;
use App\Http\Controllers\admin\RequestoringController;
use App\Http\Controllers\admin\stateController;
use App\Http\Controllers\admin\token\TokenController;
use App\Http\Controllers\ApiWhatsapp\ApiManager;
use App\Http\Controllers\Auth\RegisterSecondLevel;
use App\Http\Controllers\countriesstatestowns\CountriesController;
use App\Http\Controllers\Donors\Reports\ReportController;
use App\Http\Controllers\donor\PersonController;
use App\Http\Controllers\RolesAndPermissions\Permissions;
use App\Http\Controllers\RolesAndPermissions\Roles;
use App\Http\Controllers\sihevi\ConsultaController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {

    /* Route::resource('warehouse', warehouse_movement::class)->names('admin.warehouse.transfer'); */

    Route::post('data', [RegisterSecondLevel::class, 'create'])->name('data');

    Route::get('register2', [RegisterSecondLevel::class, 'index'])->name('register2');

    Route::resource('Permissions', Permissions::class)->names('RolesAndPermissions.Permissions');

    Route::resource('Roles', Roles::class)->names('RolesAndPermissions.Roles');

    Route::get('/', [HomeController::class, 'index'])->name('admin.home');

    Route::resource('Pettycashs', Pettycashs::class)->names('admin.accountings.pettycash');

    Route::resource('requestorings', RequestoringController::class)->names('admin.requestorings');

    Route::resource('providers', ProveedorController::class)->names('admin.providers');

    Route::resource('states', stateController::class)->names('admin.states');

    Route::resource('consults', ConsultaController::class)->names('sihevi.consults');

    Route::resource('supplies', SupplyController::class)->names('admin.inventories.supplies');

    Route::resource('donors', PersonController::class)->names('donors');

    /* Route::resource('storages', WarehouseController::class)->names('admin.inventories.supplies.storages'); */

    Route::resource('warehouses', RequestController::class)->names('admin.inventories.warehouses');

    Route::resource('suppliesorder', SuppliesOrder::class)->names('admin.inventories.suppliesorder');

    Route::post('deletePermissions', [Roles::class, 'deletePermissions'])->name('admin.deletePermissions');

    Route::post('addPermissions', [Roles::class, 'addPermissions'])->name('admin.addPermissions');

    Route::post('permissionsAdd', [Roles::class, 'editAddPermissions'])->name('admin.permissionsAdd');

    Route::resource('validateReceived', ValidateReceivedController::class)->names('admin.inventories.delivery.validateReceived');

    Route::resource('appUsers', AppUsersController::class)->names('admin.appUsers');

    Route::post('whatsapp', [ApiManager::class, 'store'])->name('whatsapp');

    /* countries states towns routes */

    //Route::resource('countries', CountriesController::class)->names('admin.centers');

    /* Donor reporting  Excel routes */

    Route::get('reports/export/', [ReportController::class, 'export'])->name('donor.Reports.export');
    Route::get('reports/import', [ReportController::class, 'import'])->name('donor.Reports.import');
    Route::get('reports/modalvariable', [ReportController::class, 'modalvariable'])->name('donor.Reports.modalvariable');
    Route::post('reports/export-post', [ReportController::class, 'exportPost'])->name('donor.Reports.exportPost');

/* Delivery reporting routes */
    Route::get('shippingreports/export/', [ShippingReportController::class, 'export'])->name('admin.inventories.delivery.export');
    Route::get('shippingreports/import', [ShippingReportController::class, 'import'])->name('admin.inventories.delivery.import');
    Route::post('shippingreportsreports/export-post', [ShippingReportController::class, 'exportPost'])->name('admin.inventories.delivery.exportPost');

/* Report pdf */
    Route::get('shippingreports/pdf/', [ShippingReportController::class, 'reportPDF'])->name('admin.inventories.delivery.reports.shippingPDF');
    Route::resource('center', CenterController::class)->names('admin.center');
    Route::resource('token', TokenController::class)->names('admin.token');

});
