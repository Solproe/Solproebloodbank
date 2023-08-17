<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Role;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $roleAdmin = Role::create(['name' => 'Admin']);
        $roleHR = Role::create(['name' => 'HHRR']);
        $rolePromoter = Role::create(['name' => 'Promoter']);
        $roleSystem = Role::create(['name' => 'System']);

        Permission::create(['name' => 'consults.donors'])->syncRoles([$roleAdmin, $roleHR, $rolePromoter, $roleSystem]);
        Permission::create(['name' => 'inventories.index'])->syncRoles([$roleAdmin, $roleSystem]);
        Permission::create(['name' => 'invetories.create'])->syncRoles([$roleAdmin, $roleSystem]);
        Permission::create(['name' => 'inventories.edit'])->syncRoles([$roleAdmin, $roleSystem]);
        Permission::create(['name' => 'inventories.delete'])->syncRoles([$roleAdmin, $roleSystem]);
        Permission::create(['name' => 'providers.index'])->syncRoles([$roleAdmin, $roleSystem]);
        Permission::create(['name' => 'providers.create'])->syncRoles([$roleAdmin, $roleSystem]);
        Permission::create(['name' => 'providers.edit'])->syncRoles([$roleAdmin, $roleSystem]);
        Permission::create(['name' => 'providers.delete'])->syncRoles([$roleAdmin, $roleSystem]);
        Permission::create(['name' => 'customers.index'])->syncRoles([$roleAdmin, $roleSystem]);
        Permission::create(['name' => 'customers.create'])->syncRoles([$roleAdmin, $roleSystem]);
        Permission::create(['name' => 'customers.edit'])->syncRoles([$roleAdmin, $roleSystem]);
        Permission::create(['name' => 'customers.users'])->syncRoles([$roleHR, $roleSystem]);
        Permission::create(['name' => 'customers.delete'])->syncRoles([$roleAdmin, $roleSystem]);
        Permission::create(['name' => 'states.index'])->syncRoles([$roleAdmin, $roleSystem]);
        Permission::create(['name' => 'states.create'])->syncRoles([$roleAdmin, $roleSystem]);
        Permission::create(['name' => 'states.edit'])->syncRoles([$roleAdmin, $roleSystem]);
        Permission::create(['name' => 'states.delete'])->syncRoles([$roleAdmin, $roleSystem]);
        Permission::create(['name' => 'register.users'])->syncRoles([$roleHR, $roleSystem]);
        
    }
}
