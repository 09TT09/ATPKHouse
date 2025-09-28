<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Seed the application's database with the admins users.
     */
    public function run(): void
    {
        User::factory()->create([
            'role' => 'admin',
            'firstname' => 'Theo',
            'lastname' => 'Rossignol',
            'email' => 'the.ros@test.com',
            'phone' => '0123456789',
            'birthdate' => '2000-01-01',
            'image_path' => "images/seeder-images/user-image-1.jpg",
            'password' => Hash::make('ThE!+rOs84'),
        ]);
    }
}
