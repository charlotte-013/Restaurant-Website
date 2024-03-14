<?php

namespace App\Http\Controllers\Admin;

use App\Models\AboutSection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AboutSectionController extends Controller
{
    // direct about page
    public function index() {
        $about = AboutSection::get();
        return view("admin.sections.about.list", compact('about'));
    }

    // direct create about page
    public function createPage() {
        $about = AboutSection::get();
        if(count($about) === 1) {
            if(url()->current() === route('about#createPage')) {
                return abort(404);
            }

            return back();
        }
        return view('admin.sections.about.create');
    }

    // create about
    public function create(Request $request) {
        $this->aboutValidationCheck($request);
        $data = $this->getAboutData($request);

        $fileName = uniqid().$request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public', $fileName);
        $data['image'] = $fileName;

        AboutSection::create($data);
        toastr()->success('About created successfully!', 'Created!', ['timeOut' => 2000, 'closeButton' => true]);
        return to_route("about#page");
    }

    // direct edit about page
    public function edit($id) {
        $about = AboutSection::where('id', $id)->first();
        return view("admin.sections.about.edit", compact("about"));
    }

    // update about
    public function update(Request $request) {
        $this->aboutValidationCheck($request);
        $data = $this->getAboutData($request);

        if($request->hasFile('image')) {
            $about = AboutSection::where('id', $request->aboutId)->first();

            if($about['image'] != null) {
                Storage::delete('public/'.$about['image']);
            }

            $fileName = uniqid().$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public', $fileName);
            $data['image'] = $fileName;
        }

        AboutSection::where('id', $request->aboutId)->update($data);
        toastr()->success('About updated successfully!', 'Updated!', ['timeOut' => 2000, 'closeButton' => true]);
        return to_route('about#page');
    }

    // get about data
    private function getAboutData($request) {
        return [
            'title' => $request->title,
            'slug' => $request->slug,
            'paragraph1' => $request->paragraph1,
            'paragraph2' => $request->paragraph2,
        ];

    }

    // validation check
    private function aboutValidationCheck($request) {
        Validator::make($request->all(), [
            'title' => 'required|min:3|string',
            'slug' => 'required|min:3|string',
            'paragraph1' => 'required',
            'paragraph2' => 'required',
            'image'=> 'required|file|mimes:jpg,jpeg,png,webp',
        ])->validate();
    }
}
