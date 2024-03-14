<?php

namespace Database\Seeders;

use App\Models\TeamSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $team = 3;
        for ($i = 1; $i < $team; $i++) {
            TeamSection::create([
                'first_name' => "John",
                'last_name' => "Smith",
                'position' => "Chef $i",
                'image' => url('//https://upload.wikimedia.org/wikipedia/commons/thumb/a/a0/Pierre-Person.jpg/800px-Pierre-Person.jpg')
            ]);
        }

    }
}
