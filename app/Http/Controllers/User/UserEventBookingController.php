<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\EventBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserEventBookingController extends Controller
{
    // event booking form
    public function eventBooking(Request $request) {
        $this->eventBookingValidationCheck($request);
        $data = $this->getEventBookingInfo($request);

        $date = today();
        $eventBookingDate = $data['event_booking_date'];
        if($eventBookingDate <= $date) {
            toastr()->error('Sorry, you need to put the correct date!', 'Incorrect Date!', ['timeOut' => 2000, 'closeButton' => true]);
            return back()->with(['error' => 'Sorry, you need to put the correct date.']);
        }

        EventBooking::create($data);
        toastr()->success('Event booked successfully!', 'Booked!', ['timeOut' => 2000, 'closeButton' => true]);
        return back();
    }

    // get event booking info
    private function getEventBookingInfo($request) {
        return [
            'event_type_id' => $request->eventType,
            'event_time_id' => $request->eventTime,
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'email' => $request->email,
            'phone' => $request->phone,
            'event_booking_date' => $request->eventBookingDate,
            'guest_number' => $request->guestNumber,
            'message' => $request->message
        ];
    }

    // validation check
    private function eventBookingValidationCheck($request) {
        Validator::make($request->all(), [
            "firstName" => "required",
            'email'=> 'required|email',
            'phone' => 'required',
            'eventType' => 'required',
            'eventTime' => 'required',
            'eventBookingDate' => 'required|date',
            'guestNumber' => 'required|integer',
        ])->validate();
    }
}
