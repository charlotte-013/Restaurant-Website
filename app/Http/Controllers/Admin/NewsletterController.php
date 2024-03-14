<?php

namespace App\Http\Controllers\Admin;

use App\Models\Newsletter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsletterController extends Controller
{
    // newsletter list page
    public function index() {
        $newsletters = Newsletter::when(request('key'), function ($query) {
            $query->where('email', 'like', '%' . request('key') . '%')
            ->orWhere('id', 'like', '%' . request('key') . '%');
        })->paginate(10);
        $newsletters->appends(request()->all());
        return view('admin.newsletter.list', compact('newsletters'));
    }

}
