<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'firstName' => 'Ahmed',
            'lastName' => 'Mohammad',
            'email' => 'doctor@gmail.com',
            'password' => '123456789',
            'phone' => '+96171837475',
            'role' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
