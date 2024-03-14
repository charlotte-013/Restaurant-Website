<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EventTime;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    // direct event page
    public function index() {
        $events = Event::select('events.*', 'event_times.time as event_time')
                ->leftJoin('event_times', 'events.event_time_id', 'event_times.id')
                ->where('event_date', '>=', today())
                ->orderBy('events.updated_at', 'desc')
                ->paginate(6);
        $events->appends(request()->all());
        return view('admin.events.list', compact('events'));
    }

    // direct event create page
    public function createPage() {
        $eventTimes = EventTime::select('id', 'time')->get();
        return view('admin.events.create', compact('eventTimes'));
    }

    // create event
    public function create(Request $request) {
        $this->eventValidationCheck($request);
        $data = $this->getEventInfo($request);

        $date = today();
        $eventDate = $data['event_date'];
        if($eventDate <= $date) {
            toastr()->error('Sorry, you need to put the correct date!', 'Incorrect Date!', ['timeOut' => 2000, 'closeButton' => true]);
            return back();
        }

        if ($request->hasFile('eventImage')) {
            $fileName = uniqid().$request->file('eventImage')->getClientOriginalName();
            $request->file('eventImage')->storeAs('public', $fileName);
            $data['image'] = $fileName;
        }

        Event::create($data);
        toastr()->success('Event created successfully!', 'Created!', ['timeOut' => 2000, 'closeButton' => true]);
        return to_route('events#page');
    }

    // news detail page
    public function detailPage($id) {
        $event = Event::select('events.*', 'event_times.time as event_time')
                ->leftJoin('event_times', 'events.event_time_id', 'event_times.id')
                ->where('events.id', $id)
                ->first();
        return view('admin.events.detail', compact('event'));
    }

    // edit event page
    public function edit($id) {
        $event = Event::where('id', $id)->first();
        $eventTimes = EventTime::get();
        return view('admin.events.edit', compact('event', 'eventTimes'));
    }

    // update event
    public function update(Request $request) {
        $this->eventValidationCheck($request);
        $data = $this->getEventInfo($request);

        if($request->hasFile('eventImage')) {
            $event = Event::where('id', $request->eventId)->first();

            if($event['image'] != null) {
                Storage::delete('public/'.$event['image']);
            }

            $fileName = uniqid().$request->file('eventImage')->getClientOriginalName();
            $request->file('eventImage')->storeAs('public', $fileName);
            $data['image'] = $fileName;
        }

        Event::where('id', $request->eventId)->update($data);
        toastr()->success('Event updated successfully!', 'Updated!', ['timeOut' => 2000, 'closeButton' => true]);
        return to_route('events#page');
    }

    // delete event
    public function delete($id) {
        $event = Event::where('id', $id)->first();
        Event::where('id', $id)->delete();

        if(Storage::exists('public/'.$event['image'])){
            Storage::delete('public/'.$event['image']);
        }

        toastr()->error('Event deleted successfully!', 'Deleted!', ['timeOut' => 2000, 'closeButton' => true]);
        return back();
    }

    // get event data
    private function getEventInfo($request) {
        return [
            'event_time_id' => $request->eventTime,
            'title' => $request->eventTitle,
            'description' => $request->eventDescription,
            'event_date' => $request->eventDate,
        ];
    }

    // validation check
    private function eventValidationCheck($request) {
        Validator::make($request->all(), [
            'eventTitle' => 'required|min:3|unique:events,title,'.$request->eventId,
            'eventDescription' => 'required|min:5',
            'eventDate' => 'required',
            'eventTime' => 'required',
            'eventImage' => 'file|mimes:jpg,jpeg,png,webp'
        ])->validate();
    }
}
