<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat beberapa user siswa untuk testing
        $siswa = [
            ['token' => '001', 'password' => 'password123'],
            ['token' => '002', 'password' => 'password123'],
            ['token' => '003', 'password' => 'password123'],
            ['token' => '004', 'password' => 'password123'],
            ['token' => '005', 'password' => 'password123'],
        ];

        foreach ($siswa as $item) {
            User::create([
                'token' => $item['token'],
                'role' => 'siswa',
                'password' => Hash::make($item['password']),
                'plain_password' => $item['password'],
            ]);
        }

        echo "Siswa users created successfully!\n";
        echo "You can now login with:\n";
        foreach ($siswa as $item) {
            echo "- Token: {$item['token']}, Password: {$item['password']}\n";
        }
    }
}
