<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        DB::table('users')->insert([
            [
            // 'name' => 'Test User',
            'email' => 'rafael@gmail.com',
            'password' => bcrypt('rafael12'),
            'role' => 'admin',
            ],
            [
            // 'name' => 'Test User',
            'email' => 'bagus@gmail.com',
            'password' => bcrypt('bagus1245'),
            'role' => 'user',
            ]
        ]);
    }
}
