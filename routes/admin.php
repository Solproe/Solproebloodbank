<?php

use App\Http\Controllers\Admin\accountings\Pettycashs;
use App\Http\Controllers\Admin\appUsers\AppUsersController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\inventories\delivery\ShippingReportController;
use App\Http\Controllers\Admin\inventories\orders\SuppliesOrder;
use App\Http\Controllers\Admin\inventories\supplies\SupplyController;
use App\Http\Controllers\Admin\inventories\supplies\WarehouseController;
use App\Http\Controllers\Admin\inventories\warehouses\RequestController;
use App\Http\Controllers\Admin\inventories\warehouses\validateReceived\ValidateReceivedController;
use App\Http\Controllers\Admin\inventories\warehouse\warehouse_movement;
use App\Http\Controllers\Admin\providers\ProveedorController;
use App\Http\Controllers\Admin\RequestoringController;
use App\Http\Controllers\ApiWhatsapp\ApiManager;
use App\Http\Controllers\Auth\RegisterSecondLevel;
use App\Http\Controllers\Donors\Reports\ReportController;
use App\Http\Controllers\donor\PersonController;
use App\Http\Controllers\RolesAndPermissions\Permissions;
use App\Http\Controllers\RolesAndPermissions\Roles;
use App\Http\Controllers\sihevi\ConsultaController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::resource('warehouse', warehouse_movement::class)->names('admin.warehouse.transfer');

    Route::post('data', [RegisterSecondLevel::class, 'create'])->name('data');

    Route::get('register2', function () {
        return view('auth.register');
    })->name('register2');

    Route::resource('Permissions', Permissions::class)->names('RolesAndPermissions.Permissions');

    Route::resource('Roles', Roles::class)->names('RolesAndPermissions.Roles');

    Route::get('/', [HomeController::class, 'index'])->name('admin.home');

    Route::resource('Pettycashs', Pettycashs::class)->names('admin.accountings.pettycash');

    Route::resource('requestorings', RequestoringController::class)->names('admin.requestorings');

    Route::resource('providers', ProveedorController::class)->names('admin.providers');

    Route::resource('states', StateController::class)->names('admin.states');

    Route::resource('consults', ConsultaController::class)->names('sihevi.consults');

    Route::resource('supplies', SupplyController::class)->names('admin.inventories.supplies');

    Route::resource('donors', PersonController::class)->names('donors');

    Route::resource('storages', WarehouseController::class)->names('admin.inventories.supplies.storages');

    Route::resource('warehouses', RequestController::class)->names('admin.inventories.warehouses');

    Route::resource('suppliesorder', SuppliesOrder::class)->names('admin.inventories.suppliesorder');

    Route::post('deletePermissions', [Roles::class, 'deletePermissions'])->name('admin.deletePermissions');

    Route::post('addPermissions', [Roles::class, 'addPermissions'])->name('admin.addPermissions');

    Route::post('permissionsAdd', [Roles::class, 'editAddPermissions'])->name('admin.permissionsAdd');

    Route::resource('validatereceived', ValidateReceivedController::class)->names('admin.warehouse.validatereceived');

    Route::resource('appUsers', AppUsersController::class)->names('admin.appUsers');

    Route::post('whatsapp', [ApiManager::class, 'store'])->name('whatsapp');

});
/* Donor reporting routes */

Route::get('reports/export/', [ReportController::class, 'export'])->name('donor.Reports.export');
Route::get('reports/import', [ReportController::class, 'import'])->name('donor.Reports.import');
Route::get('reports/modalvariable', [ReportController::class, 'modalvariable'])->name('donor.Reports.modalvariable');
Route::post('reports/export-post', [ReportController::class, 'exportPost'])->name('donor.Reports.exportPost');

/* Delivery reporting routes */
Route::get('Shippingreports/export/', [ShippingReportController::class, 'export'])->name('admin.inventories.delivery.export');
Route::get('Shippingreports/import', [ShippingReportControllerr::class, 'import'])->name('admin.inventories.delivery.import');
Route::post('Shippingreportsreports/export-post', [ShippingReportController::class, 'exportPost'])->name('admin.inventories.delivery.exportPost');
