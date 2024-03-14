<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteSection extends Model
{
    use HasFactory;

    protected $fillable = ['quote', 'name'];
}
