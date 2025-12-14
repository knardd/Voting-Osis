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
            ['nis' => '001', 'password' => 'password123'],
            ['nis' => '002', 'password' => 'password123'],
            ['nis' => '003', 'password' => 'password123'],
            ['nis' => '004', 'password' => 'password123'],
            ['nis' => '005', 'password' => 'password123'],
        ];

        foreach ($siswa as $item) {
            User::create([
                'nis' => $item['nis'],
                'role' => 'siswa',
                'password' => Hash::make($item['password']),
            ]);
        }

        echo "Siswa users created successfully!\n";
        echo "You can now login with:\n";
        foreach ($siswa as $item) {
            echo "- NIS: {$item['nis']}, Password: {$item['password']}\n";
        }
    }
}
