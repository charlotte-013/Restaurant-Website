<?php

namespace App\Http\Controllers\User;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\FooterSection;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserContactController extends Controller
{
    // direct contact form page
    public function contactPage() {
        $footer = FooterSection::first();
        return view("user.contact",compact('footer'));
    }

    // contact form
    public function contact(Request $request) {
        $this->contactFormValidationCheck($request);
        $data = $this->getContactFormData($request);
        Contact::create($data);
        toastr()->success('Message submitted successfully!', 'Submitted!', ['timeOut' => 2000, 'closeButton' => true]);
        return back();
    }

    // get contact form data
    private function getContactFormData($request) {
        return [
            'first_name' => $request->contactFirstName,
            'last_name' => $request->contactLastName,
            'email' => $request->contactEmail,
            'phone' => $request->contactPhone,
            'message' => $request->contactMessage,
        ];
    }

    // validation check
    private function contactFormValidationCheck($request) {
        Validator::make($request->all(), [
            'contactEmail' => 'required|email',
            'contactPhone' => 'required',
            'contactMessage' => 'required',
        ])->validate();
    }
}
