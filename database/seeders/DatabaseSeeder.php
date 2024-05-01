<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::insert(
            [
                [
                    'email' => 'duongvankhai2022001@gmail.com',
                    'password' => Hash::make(1),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'email' => 'khachhang1@gmail.com',
                    'password' => Hash::make(1),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'email' => 'nhanvien1@gmail.com',
                    'password' => Hash::make(1),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'email' => 'nhanvien2@gmail.com',
                    'password' => Hash::make(1),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
