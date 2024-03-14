<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['reservation_time_id',  'first_name', 'last_name', 'email', 'phone', 'message', 'reservation_date',  'guest_number'];
}
