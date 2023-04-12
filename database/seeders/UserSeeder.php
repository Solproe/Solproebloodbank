<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Gerencia',
            'email' => 'Gerencia@gmail.com',
            'password' => Hash::make('gerenciasolproe'),
        ])->assignRole('System');

        User::create([
            'name' => 'prueba',
            'email' => 'prueba@gmail.com',
            'password' => Hash::make('123456789'),
        ])->assignRole('Promoter');

        User::create([
            'name' => 'Systems',
            'email' => 'Systems@gmail.com',
            'password' => Hash::make('gerenciasolproe'),
        ])->assignRole('System');

    }
}
