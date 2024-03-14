<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $news = 10;
        for ($i = 1; $i < $news; $i++) {
            News::create([
                'title' => "Test title $i",
                'sub_title' => "Sub Title $i",
                'content' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod consequuntur vero facilis perspiciatis.",
                'image' => url('https://images.unsplash.com/photo-1567620905732-2d1ec7ab7445?q=80&w=1980&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')
            ]);
        }
    }
}
