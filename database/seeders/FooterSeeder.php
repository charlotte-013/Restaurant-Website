<?php

namespace Database\Seeders;

use App\Models\FooterSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FooterSection::create([
            'facebook_url' => 'https://www.facebook.com/',
            'instagram_url' => 'https://www.instagram.com/',
            'twitter_url' => 'https://www.twitter.com/',
            'linkedin_url' => 'https://www.linkedin.com/',
            'address' => '4321 California St, San Francisco, CA 12345',
            'phone' => '+01 2000 800 9999',
            'email' => 'golden_eight@gamil.com',
            'opening_time1' => '10:00',
            'opening_time2' => '5:00',
            'closing_time1' => '2:00',
            'closing_time2' => '9:00'
        ]);
    }
}
