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
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@laravel.com',
            'role' => 'admin',
            'password' => Hash::make('123456789')
        ]);

        User::factory()->create([
            'name' => 'Editor Man',
            'email' => 'man@laravel.com',
            'role' => 'editor',
            'password' => Hash::make('123456789')
        ]);

        User::factory()->create([
            'name' => 'Editor Woman',
            'email' => 'woman@laravel.com',
            'role' => 'editor',
            'password' => Hash::make('123456789')
        ]);


    }
}
