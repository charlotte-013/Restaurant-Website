<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    // contact list page
    public function index() {
        $contacts = Contact::when(request('key'), function ($query) {
            $query->where('first_name', 'like', '%' . request('key') . '%')
                ->orWhere('email', 'like', '%' . request('key') . '%');
        })->orderBy('created_at', 'desc')->paginate(10);
        $contacts->appends(request()->all());
        return view('admin.contact.list', compact('contacts'));
    }

    // contact detail page
    public function detailPage($id) {
        $contact = Contact::where('id', $id)->first();
        return view('admin.contact.detail', compact('contact'));
    }

    // delete contact
    public function delete($id) {
        Contact::where('id', $id)->delete();
        toastr()->error('Contact deleted successfully!', 'Deleted!', ['timeOut' => 2000, 'closeButton' => true]);
        return back();
    }
}
