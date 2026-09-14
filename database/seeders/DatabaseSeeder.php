<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

            User::create([
            'name' => 'admin',
            'email' => 'admin@admin',
            'number'=> '79123456789',
            'login' => 'Conf77',
            'password' => 'Demo77',
            'role' => 'admin',
        ]);
         User::create([
            'name' => 'admin1',
            'email' => 'admin1@admin1',
            'number'=> '11111111111',
            'login' => 'admin',
            'password' => 'admin',
            'role' => 'admin',
        ]);
    }
}
