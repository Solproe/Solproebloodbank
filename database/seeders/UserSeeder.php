<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;

class UserSeeder extends Seeder
{

    use HasRoles;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => 'prueba',
            'email' => 'prueba@gmail.com',
            'password' => Hash::make('123456789'),
        ])->assignRole('Promoter');

        User::create([
            'name' => 'Systems',
            'email' => 'Systems@solproe.com',
            'password' => Hash::make('gerenciasolproe'),
        ])->assignRole('System');

    }
}
