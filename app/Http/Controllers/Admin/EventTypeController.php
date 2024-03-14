<?php

namespace App\Http\Controllers\Admin;

use App\Models\EventType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class EventTypeController extends Controller
{
    // direct event-type page
    public function index() {
        $eventTypes = EventType::when(request('key'), function ($query) {
            $query->where('name', 'like', '%' . request('key') . '%');
        })->paginate(6);
        $eventTypes->appends(request()->all());
        return view('admin.event-type.list', compact('eventTypes'));
    }

    // event-type create page
    public function createPage() {
        return view('admin.event-type.create');
    }

    // create event-type
    public function create(Request $request) {
        $this->eventTypeValidationCheck($request);
        EventType::create([
            'name' => $request->eventTypeName
        ]);
        toastr()->success('Event type created successfully!', 'Created!', ['timeOut' => 2000, 'closeButton' => true]);
        return to_route('eventType#page');
    }

    // edit page
    public function edit($id) {
        $eventType = EventType::where('id', $id)->first();
        return view('admin.event-type.edit', compact('eventType'));
    }

    // update event-type
    public function update(Request $request) {
        $this->eventTypeValidationCheck($request);
        EventType::where('id', $request->eventTypeId)->update([
            'name' => $request->eventTypeName
        ]);
        toastr()->success('Event type updated successfully!', 'Updated!', ['timeOut' => 2000, 'closeButton' => true]);
        return redirect()->route('eventType#page');
    }

    // delete event-type
    public function delete($id) {
        EventType::where('id', $id)->delete();
        toastr()->error('Event type deleted successfully!', 'Deleted!', ['timeOut' => 2000, 'closeButton' => true]);
        return back();
    }

    // validation check
    private function eventTypeValidationCheck($request) {
        Validator::make($request->all(), [
            'eventTypeName' => 'required|min:3|unique:event_types,name,'.$request->eventTypeId
        ])->validate();
    }
}
