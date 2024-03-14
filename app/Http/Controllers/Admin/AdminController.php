<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Event;
use App\Models\Newsletter;
use App\Models\Reservation;
use App\Models\EventBooking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    // admin dashboard
    public function index() {
        $newsletters = Newsletter::get();
        $reservations = Reservation::get();
        $eventBookings = EventBooking::get();
        $events = Event::get();
        $admin = User::where('role', 'admin')->get();
        return view('admin.dashboard', compact('newsletters', 'reservations', 'eventBookings', 'events', 'admin'));
    }

    // admin list
    public function list() {
        $admin = User::where('role', 'admin')->paginate(10);
        $admin->appends(request()->all());
        return view('admin.dashboard', compact('admin'));
    }

    // delete account
    public function delete($id) {
        User::where('id', $id)->delete();
        toastr()->error('Admin account deleted successfully!', 'Deleted!', ['timeOut' => 2000, 'closeButton' => true]);
        return back();
    }

    // direct admin profile page
    public function profile() {
        return view('admin.profile.page');
    }

    // direct admin edit profile
    public function editPage() {
        return view('admin.profile.edit');
    }

    // update account
    public function update($id, Request $request) {
        $this->accountValidationCheck($request);
        $data = $this->getUserData($request);

        if($request->hasFile('avatar')) {
            $dbImage = User::where('id', $id)->first();
            $dbImage = $dbImage->avatar;

            if ($dbImage != null) {
                Storage::delete('public/'.$dbImage);
            }

            $fileName = uniqid().$request->file('avatar')->getClientOriginalName();
            $request->file('avatar')->storeAs('public', $fileName);
            $data['avatar'] = $fileName;
        }


        User::where('id', $id)->update($data);
        toastr()->success('Admin account updated successfully!', 'Updated!', ['timeOut' => 2000, 'closeButton' => true]);
        return to_route('admin#page');
    }

    // change password page
    public function changePasswordPage() {
        return view('admin.profile.changePassword');
    }

    // change password
    public function changePassword(Request $request) {

        $this->passwordValidationCheck($request);

        $user = User::select('password')->where('id', Auth::user()->id)->first();
        $dbHashValue = $user->password;

        if(Hash::check($request->oldPassword, $dbHashValue)) {
            $data = [
                'password' => Hash::make($request->newPassword)
            ];
            User::where('id', Auth::user()->id)->update($data);

            // Auth::logout();
            // return to_route('admin#login');

            toastr()->success('Password changed successfully!', '', ['timeOut' => 2000, 'closeButton' => true]);

            return back();
        };

        toastr()->error("Old Password don't match!", 'Try Again!', ['timeOut' => 2000, 'closeButton' => true]);
        return back()->with(['notMatch' => "Old Password don't match. Try Again!"]);
    }

    // request user data
    private function getUserData($request) {
        return [
            'name' => $request->name,
            'email' => $request->email,
        ];
    }

    // account validation check
    private function accountValidationCheck ($request) {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'avatar' => 'mimes:png,jpg,jpeg,webp|file',
        ])->validate();
    }

    // password validation check
    private function passwordValidationCheck($request) {
        Validator::make($request->all(), [
            'oldPassword' => 'required|min:6|max:20',
            'newPassword' => 'required|min:6|max:20',
            'confirmPassword' => 'required|min:6|max:20|same:newPassword',
        ])->validate();
    }
}
