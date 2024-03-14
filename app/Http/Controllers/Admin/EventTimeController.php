<?php

namespace App\Http\Controllers\Admin;

use App\Models\EventTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class EventTimeController extends Controller
{
    // direct event time page
    public function index() {
        $eventTimes = EventTime::get();
        return view('admin.event-time.list', compact('eventTimes'));
    }

    // direct event time create page
    public function createPage() {
        return view('admin.event-time.create');
    }

    // create event time
    public function create(Request $request) {
        $this->eventTimeValidationCheck($request);
        EventTime::create([
            'time' => $request->eventTime,
        ]);
        toastr()->success('Event time created successfully!', 'Created!', ['timeOut' => 2000, 'closeButton' => true]);
        return redirect()->route('eventTime#page');
    }

    // edit page
    public function edit($id) {
        $eventTime = EventTime::where('id', $id)->first();
        return view('admin.event-time.edit', compact('eventTime'));
    }

    // update event time
    public function update(Request $request) {
        $this->eventTimeValidationCheck($request);
        EventTime::where('id', $request->eventTimeId)->update([
            'time' => $request->eventTime
        ]);
        toastr()->success('Event time updated successfully!', 'Updated!', ['timeOut' => 2000, 'closeButton' => true]);
        return redirect()->route('eventTime#page');
    }

    // validation check
    private function eventTimeValidationCheck($request) {
        Validator::make($request->all(), [
            'eventTime' => 'required|min:3'
        ])->validate();
    }
}
