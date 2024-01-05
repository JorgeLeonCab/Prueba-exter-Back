<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Jorge Leon',
            'email' => 'jorge.leoncab@gmail.com',
            'password' => Hash::make('password')
        ])->assignRole('Admin');

        User::create([
            'name' => 'Prueba x',
            'email' => 'prueba@gmail.com',
            'password' => Hash::make('password')
        ])->assignRole('User');
    }
}
