<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Article;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = User::factory()->create([
            'username' => 'admin',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'password' => bcrypt('password123')
        ]);

        // Create regular users
        User::factory(5)->create([
            'role' => 'penyewa'
        ]);

        // Create articles
        Article::factory(10)->create([
            'created_by' => $admin->id
        ]);
    }
}
