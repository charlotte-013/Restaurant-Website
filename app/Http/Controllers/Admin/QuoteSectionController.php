<?php

namespace App\Http\Controllers\Admin;

use App\Models\QuoteSection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class QuoteSectionController extends Controller
{
    // direct quote page
    public function index() {
        $quote = QuoteSection::get();
        return view("admin.sections.quote.list", compact('quote'));
    }

    // direct create quote page
    public function createPage() {
        $quote = QuoteSection::get();

        if(count($quote) === 1) {
            if(url()->current() === 'http://127.0.0.1:8000/quote/create-page') {
                return abort(404);
            }

            return back();
        }

        return view('admin.sections.quote.create');
    }

    // create quote
    public function create(Request $request) {
        $this->quoteValidationCheck($request);
        $data = $this->getQuoteData($request);
        QuoteSection::create($data);
        toastr()->success('Quote created successfully!', 'Created!', ['timeOut' => 2000, 'closeButton' => true]);
        return to_route("quote#page");
    }

    // direct edit quote page
    public function edit($id) {
        $quote = QuoteSection::where('id', $id)->first();
        return view("admin.sections.quote.edit", compact("quote"));
    }

    // update quote
    public function update(Request $request, $id) {
        $this->quoteValidationCheck($request);
        $data = $this->getQuoteData($request);
        QuoteSection::where('id', $id)->update($data);
        toastr()->success('Quote updated successfully!', 'Updated!', ['timeOut' => 2000, 'closeButton' => true]);
        return to_route('quote#page');
    }

    // get quote data
    private function getQuoteData($request) {
        return [
            'name' => $request->name,
            'quote' => $request->quote
        ];
    }

    // validation check
    private function quoteValidationCheck($request) {
        Validator::make($request->all(), [
            'name' => 'required|min:3|string',
            'quote' => 'required|min:3|string'
        ])->validate();
    }
}
