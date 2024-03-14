<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    // direct news page
    public function index() {
        $news = News::when(request('key'), function ($query) {
            $query->where('title', 'like', '%' . request('key') . '%')
                ->orWhere('sub_title', 'like', '%' . request('key') . '%');
        })->orderBy('created_at', 'desc')->paginate(10);
        $news->appends(request()->all());
        return view('admin.news.list', compact('news'));
    }

    // direct create news page
    public function createPage() {
        return view('admin.news.create');
    }

    // create news
    public function create(Request $request) {
        $this->newsValidationCheck($request, 'create');
        $data = $this->getNewsData($request);

        $fileName = uniqid().$request->file('newsImage')->getClientOriginalName();
        $request->file('newsImage')->storeAs('public', $fileName);
        $data['image'] = $fileName;

        News::create($data);
        toastr()->success('News created successfully!', 'Created!', ['timeOut' => 2000, 'closeButton' => true]);
        return to_route('news#page');

    }

    // news detail page
    public function detailPage($id) {
        $news = News::where('id', $id)->first();
        return view('admin.news.detail', compact('news'));
    }

    // direct edit news page
    public function edit($id) {
        $news = News::where('id', $id)->first();
        return view('admin.news.edit', compact('news'));
    }

    // update news
    public function update(Request $request) {
        $this->newsValidationCheck($request, 'update');
        $data = $this->getNewsData($request);

        if($request->hasFile('newsImage')) {
            $news = News::where('id', $request->newsId)->first();

            if($news['image'] != null) {
                Storage::delete('public/'.$news['image']);
            }

            $fileName = uniqid().$request->file('newsImage')->getClientOriginalName();
            $request->file('newsImage')->storeAs('public', $fileName);
            $data['image'] = $fileName;
        }

        News::where('id', $request->newsId)->update($data);
        toastr()->success('News updated successfully!', 'Updated!', ['timeOut' => 2000, 'closeButton' => true]);
        return to_route('news#page');
    }

    // delete news
    public function delete($id) {
        $news = News::where('id', $id)->first();
        News::where('id', $id)->delete();

        if(Storage::exists('public/'.$news['image'])){
            Storage::delete('public/'.$news['image']);
        }

        toastr()->error('News deleted successfully!', 'Deleted!', ['timeOut' => 2000, 'closeButton' => true]);

        return back();
    }

    // get news data
    private function getNewsData($request) {
        return [
            'title'=> $request->newsTitle,
            'sub_title'=> $request->newsSubTitle,
            'content'=> $request->newsContent,
            'image'=> $request->newsImage
        ];
    }

    // validation check
    private function newsValidationCheck($request, $action) {
        $validationRules = [
            'newsTitle' => 'required|min:3',
            'newsSubTitle' => 'required|min:3',
            'newsContent' => 'required',
        ];

        $validationRules['newsImage'] = $action == 'create' ? 'required|mimes:png,jpg,jpeg,webp|file' : 'mimes:png,jpg,jpeg,webp|file';

        Validator::make($request->all(), $validationRules)->validate();
    }
}
