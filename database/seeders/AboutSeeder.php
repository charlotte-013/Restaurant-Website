<?php

namespace Database\Seeders;

use App\Models\AboutSection;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AboutSection::create([
            'title' => 'Welcome To',
            'slug' => 'Little Story',
            'paragraph1' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque auctor
                            suscipit
                            feugiat. Ut at pellentesque ante, sed convallis arcu. Nullam facilisis, eros in eleifend
                            luctus, odio ante sodales augue, eget lacinia lectus erat et sem.',
            'paragraph2' => 'Sed semper orci sit amet porta placerat. Etiam quis finibus eros. Sed aliquam
                            metus lorem, a
                            pellentesque tellus pretium a. Nulla placerat elit in justo vestibulum, et maximus sem
                            pulvinar.',
            'image' => url('https://img.freepik.com/free-photo/chicken-wings-barbecue-sweetly-sour-sauce-picnic-summer-menu-tasty-food-top-view-flat-lay_2829-6471.jpg'),
        ]);
    }
}
