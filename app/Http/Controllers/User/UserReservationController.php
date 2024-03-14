<?php

namespace App\Http\Controllers\User;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\FooterSection;
use App\Models\ReservationTime;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserReservationController extends Controller
{
    // reservation page
    public function reservationPage() {
        $reservationTimes = ReservationTime::get();
        $footer = FooterSection::first();
        return view('user.reservation', compact('reservationTimes', 'footer'));
    }

    // reservation
    public function reservation(Request $request) {
        $this->reservationValidationCheck($request);
        $data = $this->getReservationData($request);

        $date = today();
        $reservationDate = $data['reservation_date'];
        if($reservationDate <= $date) {
            toastr()->error('Sorry, you need to put the correct date!', 'Incorrect Date!', ['timeOut' => 2000, 'closeButton' => true]);
            return back();
        }

        Reservation::create($data);
        toastr()->success('Thank You For Your Reservation!', 'Reserved!', ['timeOut' => 2000, 'closeButton' => true]);
        return back();
    }

    // get reservation data
    private function getReservationData($request) {
        return [
            'reservation_time_id' => $request->reservationTime,
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'email' => $request->email,
            'phone' => $request->phone,
            'reservation_date' => $request->reservationDate,
            'guest_number' => $request->guestNumber,
            'message' => $request->message
        ];
    }

    // validation check
    private function reservationValidationCheck($request) {
        Validator::make($request->all(), [
            'firstName' => 'required',
            'email'=> 'required|email',
            'phone' => 'required',
            'reservationTime' => 'required',
            'reservationDate' => 'required|date',
            'guestNumber' => 'required|integer',
        ])->validate();
    }
}
