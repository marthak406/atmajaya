<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MhsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'mahasiswa',
            'email' => 'mahasiswa@example.com',
            'password' => bcrypt('123'),
            'role' => 'mahasiswa'
        ]);
    }
}
