<?php

namespace Database\Seeders;

use App\Models\UserDetails;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
    UserDetails::create([
    'title' => 'Admin',
    'name' => 'Admin',
    'role' => 'admin',
    'email' => 'benilsj007@gmail.com',
    'phone' => '1234567890',
    'password' => 'admin123',
    'otp' => null,
    'otp_expiry' => null,

        ]);
    }
}
