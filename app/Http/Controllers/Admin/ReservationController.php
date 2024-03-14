<?php

namespace App\Http\Controllers\Admin;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{
    // direct reservation page
    public function index() {
        $reservations = Reservation::select('reservations.*', 'reservation_times.time as reservation_time')
                ->when(request('key'), function ($query) {
                    $query->where('reservation.reservation_time', 'like', '%'.request('key').'%');
                })
                ->leftJoin('reservation_times', 'reservations.reservation_time_id', 'reservation_times.id')
                ->orderBy('reservations.created_at', 'desc')
                ->paginate(10);
        $reservations->appends(request()->all());
        return view("admin.reservations.list", compact("reservations"));
    }

    // direct reservation detail page
    public function detailPage($id) {
        $reservation = Reservation::select('reservations.*', 'reservation_times.time as reservation_time')
                ->leftJoin('reservation_times', 'reservations.reservation_time_id', 'reservation_times.id')
                ->where('reservations.id', $id)
                ->first();
        return view("admin.reservations.detail", compact("reservation"));
    }

    // delete a reservation
    public function delete($id) {
        Reservation::where('id', $id)->delete();
        toastr()->error('Reservation deleted successfully!', 'Deleted!', ['timeOut' => 2000, 'closeButton' => true]);
        return back();
    }
}
