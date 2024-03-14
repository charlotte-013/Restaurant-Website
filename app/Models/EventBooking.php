<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventBooking extends Model
{
    use HasFactory;

    protected $fillable = ['event_type_id', 'event_time_id', 'first_name', 'last_name', 'email', 'phone', 'event_booking_date', 'guest_number', 'message'];
}
