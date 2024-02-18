<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $admin = \App\Models\User::create([
            'username' => 'admin',
            'password' => Hash::make('Spooring123#'),
            'email' => 'adminspooring@gmail.com',
            'fullname' => 'super admin',
        ]);
        $admin->assignRole('admin');
    }
}
