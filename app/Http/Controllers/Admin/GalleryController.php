<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    // direct gallery page
    public function index() {
        $galleries = Gallery::paginate(5);
        $galleries->appends(request()->all());
        return view("admin.sections.gallery.list", compact('galleries'));
    }

    // direct create gallery page
    public function createPage() {
        return view("admin.sections.gallery.create");
    }

    // create gallery
    public function create(Request $request) {
        $this->galleryValidationCheck($request);
        $data = $this->getGalleryData($request);

        $fileName = uniqid().$request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public', $fileName);
        $data['image'] = $fileName;

        Gallery::create($data);
        toastr()->success('Gallery created successfully!', 'Created!', ['timeOut' => 2000, 'closeButton' => true]);
        return to_route("gallery#page");
    }

    // delete gallery
    public function delete($id) {
        $gallery = Gallery::where('id', $id)->first();
        Gallery::where('id', $id)->delete();

        if(Storage::exists('public/'.$gallery['image'])){
            Storage::delete('public/'.$gallery['image']);
        }

        toastr()->error('Gallery deleted successfully!', 'Deleted!', ['timeOut' => 2000, 'closeButton' => true]);
        return back();
    }

    // direct edit gallery page
    public function edit($id) {
        $gallery = Gallery::where('id', $id)->first();
        return view("admin.sections.gallery.edit", compact("gallery"));
    }

    // update gallery
    public function update(Request $request) {
        $this->galleryValidationCheck($request);
        $data = $this->getGalleryData($request);

        if($request->hasFile('image')) {
            $gallery = Gallery::where('id', $request->galleryId)->first();

            if($gallery['image'] != null) {
                Storage::delete('public/'.$gallery['image']);
            }

            $fileName = uniqid().$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public', $fileName);
            $data['image'] = $fileName;
        }

        Gallery::where('id', $request->galleryId)->update($data);
        toastr()->success('Gallery updated successfully!', 'Updated!', ['timeOut' => 2000, 'closeButton' => true]);
        return to_route('gallery#page');
    }

    // get gallery data
    private function getGalleryData($request) {
        return [
            'title' => $request->title,
        ];
    }

    // validation check
    private function galleryValidationCheck($request) {
        Validator::make($request->all(), [
            'title' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,webp'
        ])->validate();
    }
}
