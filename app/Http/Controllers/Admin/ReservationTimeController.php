<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReservationTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReservationTimeController extends Controller
{
    // direct reservation-time page
    public function index() {
        $reservationTimes = ReservationTime::when(request('key'), function ($query) {
            $query->where('time', 'like', '%' . request('key') . '%');
        })->paginate(6);
        $reservationTimes->append(request()->all());
        return view('admin.reservation-time.list', compact('reservationTimes'));
    }

    // direct reservation-time create page
    public function createPage() {
        return view('admin.reservation-time.create');
    }

    // create reservation-time
    public function create(Request $request) {
        $this->reservationTimeValidationCheck($request);
        $data = $this->getReservationTimeData($request);
        ReservationTime::create($data);
        toastr()->success('Reservation time created successfully!', 'Created!', ['timeOut' => 2000, 'closeButton' => true]);
        return to_route('reservationTime#page');
    }

    // direct reservation-time edit page
    public function edit($id) {
        $reservationTime = ReservationTime::where('id', $id)->first();
        return view('admin.reservation-time.edit', compact('reservationTime'));
    }

    // update reservation-time
    public function update(Request $request) {
        $this->reservationTimeValidationCheck($request);
        $data = $this->getReservationTimeData($request);
        ReservationTime::where('id', $request->reservationTimeId)->update($data);
        toastr()->success('Reservation time updated successfully!', 'Updated!', ['timeOut' => 2000, 'closeButton' => true]);
        return to_route('reservationTime#page');
    }

    // delete reservation-time
    public function delete($id) {
        ReservationTime::where('id', $id)->delete();
        toastr()->error('Reservation time deleted successfully!', 'Deleted!', ['timeOut' => 2000, 'closeButton' => true]);
        return to_route('reservationTime#page');
    }

    // get reservation-time data
    private function getReservationTimeData($request) {
        return [
            'time' => $request->reservationTime,
        ];
    }

    // validation check
    private function reservationTimeValidationCheck($request) {
        Validator::make($request -> all(), [
            'reservationTime' => 'required|string'
        ])->validate();
    }
}
