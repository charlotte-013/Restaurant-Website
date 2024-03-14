<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FooterSectionController extends Controller
{
    // direct footer section page
    public function index() {
        $footer = FooterSection::get();
        return view('admin.sections.footer.list', compact('footer'));
    }

    // direct footer section create page
    public function createPage() {
        $footer = FooterSection::get();
        if(count($footer) === 1) {
            if(url()->current() === route('footer#createPage')) {
                return abort(404);
            }
            return back();
        }
        return view('admin.sections.footer.create');
    }

    // create footer section
    public function create(Request $request) {
        $this->footerValidationCheck($request);
        $data = $this->getFooterData($request);
        FooterSection::create($data);
        toastr()->success('Footer created successfully!', 'Created!', ['timeOut' => 2000, 'closeButton' => true]);
        return to_route('footer#page');
    }

    // edit footer section page
    public function edit($id) {
        $footer = FooterSection::where('id', $id)->first();
        return view('admin.sections.footer.edit', compact('footer'));
    }

    // update footer section
    public function update(Request $request) {
        $this->footerValidationCheck($request);
        $data = $this->getFooterData($request);
        FooterSection::where('id', $request->footerId)->update($data);
        toastr()->success('Footer updated successfully!', 'Updated!', ['timeOut' => 2000, 'closeButton' => true]);
        return to_route('footer#page');
    }

    // get footer data
    private function getFooterData($request) {
        return [
            'facebook_url' => $request->facebookUrl,
            'instagram_url' => $request->instagramUrl,
            'twitter_url' => $request->twitterUrl,
            'linkedin_url' => $request->linkedinUrl,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'opening_time1' => $request->openingTime1,
            'opening_time2' => $request->openingTime2,
            'closing_time1' => $request->closingTime1,
            'closing_time2' => $request->closingTime2
        ];
    }

    // validation check
    private function footerValidationCheck($request) {
        Validator::make($request->all(), [
            'facebookUrl' => 'required|url',
            'instagramUrl' => 'required|url',
            'twitterUrl' => 'required|url',
            'linkedinUrl' => 'required|url',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'openingTime1' => 'required',
            'openingTime2' => 'required',
            'closingTime1' => 'required',
            'closingTime2' => 'required',
        ])->validate();
    }
}
