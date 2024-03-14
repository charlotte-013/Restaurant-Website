<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $galleries = 6;
        for ($i = 1; $i < $galleries; $i++) {
            Gallery::create([
                'title' => "Test title $i",
                'image' => url('https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.freepik.com%2Fphotos%2Ffood&psig=AOvVaw3F6aX0oYidyiboKdJ3_m8_&ust=1709960184194000&source=images&cd=vfe&opi=89978449&ved=0CBMQjRxqFwoTCPj11Z3w44QDFQAAAAAdAAAAABAE')
            ]);
        }

    }
}
