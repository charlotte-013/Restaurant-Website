<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([AdminSeeder::class, NewsSeeder::class, AboutSeeder::class, GallerySeeder::class,  QuoteSeeder::class, TeamSeeder::class, FooterSeeder::class]);
        User::factory()->count(5)->create();
    }
}
