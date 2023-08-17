<?php

namespace App\Http\Controllers\RolesAndPermissions;

use App\Http\Controllers\Controller;
use App\Models\RoleAndPermission\Permission as RoleAndPermissionPermission;
use App\Models\RoleAndPermission\Role;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role as ModelsRole;

class Roles extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Role::all();

        return view('RolesAndPermissions.Roles.index', compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::all();

        return view('RolesAndPermissions.Roles.create', compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Role::create(['name' => $request->name])->syncPermissions([$request->permissions]);

        return redirect()->route('RolesAndPermissions.Roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);

        return view('RolesAndPermissions.Roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $role = Role::where('id', '=', $id);

        $role->delete();

        return redirect()->route('RolesAndPermissions.Roles.index');
    }

    public function deletePermissions(Request $request)
    {
        foreach ($request->permission as $roleId => $permissionsId) 
        {
            $permission = Permission::findById($permissionsId);

            $role = Role::findById($roleId);

            $role->revokePermissionTo($permission->name);

            return redirect()->route('RolesAndPermissions.Roles.edit', $role);
        }
    }

    public function addPermissions(Request $request)
    {
        foreach ($request->permissions as $roleId => $permissionsId) 
        {
            $permission = Permission::findById(intval($permissionsId));

            $role = Role::findById(intval($roleId));

            $role->givePermissionTo($permission->name);
        }

        return redirect()->route('RolesAndPermissions.Roles.edit', $role);
    }

    public function editAddPermissions(Request $request)
    {
        foreach ($request->permissions as $roleId) {
            $role = Role::findById($roleId);

            $permission = Permission::all();

            return view('RolesAndPermissions.Roles.addPermissions', compact('role', 'permission'));
        }
    }
}
