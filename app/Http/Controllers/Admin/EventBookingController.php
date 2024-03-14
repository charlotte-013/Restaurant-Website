<?php

namespace App\Http\Controllers\Admin;

use App\Models\EventTime;
use App\Models\EventType;
use App\Models\EventBooking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventBookingController extends Controller
{
    // direct event-booking page
    public function index() {
        $eventBookings = EventBooking::select('event_bookings.*', 'event_types.name as event_type', 'event_times.time as event_time')
                ->when(request('key'), function ($query) {
                    $query->where('event_types.name', 'like', '%'.request('key').'%')
                        ->orWhere('event_times.time', 'like', '%'.request('key').'%');
                })
                ->leftJoin('event_types', 'event_bookings.event_type_id', 'event_types.id')
                ->leftJoin('event_times', 'event_bookings.event_time_id', 'event_times.id')
                ->paginate(10);
        $eventBookings->appends(request()->all());
        $eventTime = EventTime::get();
        return view("admin.event-booking.list", compact('eventBookings', 'eventTime'));
    }

    // event-booking filter
    public function filter($time) {
        $eventBooking = EventBooking::where('event_time_id', $time)->get();
        $eventType = EventType::get();
        $eventTime = EventTime::get();
        return view('admin.event-booking.list', compact('eventBooking','eventType', 'eventTime'));
    }

    // event-booking detail page
    public function detailPage($id) {
        $eventBooking = EventBooking::select('event_bookings.*', 'event_types.name as event_type', 'event_times.time as event_time')
                ->leftJoin('event_types', 'event_bookings.event_type_id', 'event_types.id')
                ->leftJoin('event_times', 'event_bookings.event_time_id', 'event_times.id')
                ->where('event_bookings.id', $id)
                ->first();
        return view("admin.event-booking.detail", compact("eventBooking"));
    }

    // delete event-booking
    public function delete($id) {
        EventBooking::where('id', $id)->delete();
        toastr()->error('Event Booking deleted successfully!', 'Deleted!', ['timeOut' => 2000, 'closeButton' => true]);
        return back();
    }
}
