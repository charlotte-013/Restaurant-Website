<?php

namespace App\Http\Controllers\Admin;

use App\Models\TeamSection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TeamSectionController extends Controller
{
    // direct team page
    public function index() {
        $team = TeamSection::get();
        return view("admin.sections.team.list", compact('team'));
    }

    // direct create team page
    public function createPage() {
        return view('admin.sections.team.create');
    }

    // create team
    public function create(Request $request) {
        $this->teamValidationCheck($request);
        $data = $this->getTeamData($request);

        $fileName = uniqid().$request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public', $fileName);
        $data['image'] = $fileName;

        TeamSection::create($data);
        toastr()->success('Team created successfully!', 'Created!', ['timeOut' => 2000, 'closeButton' => true]);
        return to_route("team#page");
    }

    // delete team
    public function delete($id) {
        $team = TeamSection::where('id', $id)->first();
        TeamSection::where('id', $id)->delete();

        if(Storage::exists('public/'.$team['image'])){
            Storage::delete('public/'.$team['image']);
        }

        toastr()->error('Team deleted successfully!', 'Deleted!', ['timeOut' => 2000, 'closeButton' => true]);
        return back();
    }

    // direct edit team page
    public function edit($id) {
        $team = TeamSection::where('id', $id)->first();
        return view("admin.sections.team.edit", compact("team"));
    }

    // update team
    public function update(Request $request) {
        $this->teamValidationCheck($request);
        $data = $this->getTeamData($request);

        if($request->hasFile('image')) {
            $team = TeamSection::where('id', $request->teamId)->first();

            if($team['image'] != null) {
                Storage::delete('public/'.$team['image']);
            }

            $fileName = uniqid().$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public', $fileName);
            $data['image'] = $fileName;
        }

        TeamSection::where('id', $request->teamId)->update($data);
        toastr()->success('Team updated successfully!', 'Updated!', ['timeOut' => 2000, 'closeButton' => true]);
        return to_route('team#page');
    }

    // get team data
    private function getTeamData($request) {
        return [
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'position' => $request->position,
        ];
    }

    // validation check
    private function teamValidationCheck($request) {
        Validator::make($request->all(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'position' => 'required',
            'image'=> 'required|mimes:png,jpg,jpeg,webp|file',
        ])->validate();
    }
}
