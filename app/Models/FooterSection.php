<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterSection extends Model
{
    use HasFactory;

    protected $fillable = ['facebook_url', 'twitter_url', 'instagram_url', 'linkedin_url', 'address', 'phone', 'email', 'opening_time1', 'opening_time2', 'closing_time1', 'closing_time2'];
}
