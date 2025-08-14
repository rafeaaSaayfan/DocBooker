<?php

namespace Database\Seeders;

use App\Models\Picture;
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

        
        Picture::create([
            'homePhoto' => 'images/1755130051_image-removebg-preview.png',
            'ourDocPhoto' => 'images/1755130237_shutterstock_2480850611.jpg.webp',
            'clinic1' => 'images/1755130282_1.jpg',
            'clinic2' => 'images/1755130321_2.jpg',
            'clinic3' => 'images/1755130383_3.webp',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
