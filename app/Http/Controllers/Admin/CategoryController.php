<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    // direct category page
    public function index() {
        $categories = Category::when(request('key'), function ($query) {
            $query->where('name', 'like', '%' . request('key') . '%');
        })->paginate(6);
        $categories->appends(request()->all());
        return view('admin.category.list', compact('categories'));
    }

    // direct category create page
    public function createPage() {
        return view('admin.category.create');
    }

    // create category
    public function create(Request $request) {
        $this->categoryValidationCheck($request);
        Category::create([
            'name' => $request->categoryName,
        ]);
        toastr()->success('Category created successfully!', 'Created!', ['timeOut' => 2000, 'closeButton' => true]);
        return redirect()->route('category#page');
    }

    // edit page
    public function edit($id) {
        $category = Category::where('id', $id)->first();
        return view('admin.category.edit', compact('category'));
    }

    // update category
    public function update(Request $request) {
        $this->categoryValidationCheck($request);
        Category::where('id', $request->categoryId)->update([
            'name' => $request->categoryName
        ]);
        toastr()->success('Category updated successfully!', 'Updated!', ['timeOut' => 2000, 'closeButton' => true]);
        return redirect()->route('category#page');
    }

    // delete category
    public function delete($id) {
        Category::where('id', $id)->delete();
        toastr()->error('Category deleted successfully!', 'Deleted!', ['timeOut' => 2000, 'closeButton' => true]);
        return back();
    }

    // validation check
    private function categoryValidationCheck($request) {
        Validator::make($request->all(), [
            'categoryName' => 'required|min:3|unique:categories,name,'.$request->categoryId
        ])->validate();
    }
}
