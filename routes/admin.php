<?php

use App\Http\Controllers\admin\EstadoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\TownController;
use App\Http\Controllers\Admin\RequestoringController;
use App\Http\Controllers\admin\PersonController;
use App\Http\Controllers\admin\ProveedorController;
use App\Models\Proveedor;
use App\Http\Controllers\admin\stateController;
use Illuminate\Routing\RouteUri;
use App\Http\Controllers\donor\DonorsController;
use App\Http\Controllers\sihevi\ConsultaController;


Route::get('', [HomeController::class, 'index'])->name('admin.home');

Route::resource('requestorings', RequestoringController::class)->names('admin.requestorings');

Route::resource('providers',ProveedorController::class)->names('admin.providers');

Route::resource('states',StateController::class)->names('admin.states');

Route::resource('donors', DonorsController::class)->names('donor.donors');

Route::resource('consults', ConsultaController::class)->names('sihevi.consults');






/* Route::get('/sihevi/consults/consulta', function() {
     return view('sihevi.consults.consulta');
});*/

/* Route::get('consulta', 'ConsultaController')
     ->middleware( 'sesion', 'modulo:10' )->name('sihevi.consulta'); */




/*oute::get( 'consulta/consulta-en-huav', 'ConsultaController@ConsultarDonanteEnHuav' )
     ->middleware( 'sesion', 'modulo:10', 'permiso:36' );*/

/* Route::get( 'consulta/consulta-en-sihevi', 'ConsultaController@ConsultarDonanteEnSihevi' )
     ->middleware( 'sesion', 'modulo:10', 'permiso:37' );
 */


/*Route::get('/towns/{id}', [StateController::class, 'getTowns']);*/

/*Route::resource('towns',TownController::class)->names('admin.towns');*/

/*Route::get('', [StateController::class, 'index'])->name('admin.state');*/

/*Route::post('/states', 'state@store')->name('states.store');*/
/*Route::get('/towns', [stateController::class, 'getTowns']);*/


