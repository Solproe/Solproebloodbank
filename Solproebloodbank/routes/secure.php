<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\RouteUri;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\ClickEvent;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\RolesandPermission\Permissions\PermissionsController;
use App\Http\Controllers\RolesandPermission\Roles\RolesController;
use Laravel\Jetstream\Rules\Role;

/*
|--------------------------------------------------------------------------
| SECURE Routes
|--------------------------------------------------------------------------
|
| Here is where you can register SECURE routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "secure" middleware group. Enjoy building your API!
|
*/

Route::resource('permissions', PermissionsController::class)->names('secure.permissions');

Route::resource('roles', [RolesController::class])->names('secure.roles');