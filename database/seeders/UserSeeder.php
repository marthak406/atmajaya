<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'dosen',
            'email' => 'dosen@example.com',
            'password' => bcrypt('123'), 
        ]);

        User::factory()->create([
            'name' => 'pegawai',
            'email' => 'tu@example.com',
            'password' => bcrypt('123'),
        ]);
    }
}
