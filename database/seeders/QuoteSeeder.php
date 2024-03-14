<?php

namespace Database\Seeders;

use App\Models\QuoteSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

            QuoteSection::create([
                'name' => "Michael Strahan",
                'quote' => "If you're not the one cooking, stay out of the way and compliment the chef."
            ]);

    }
}
