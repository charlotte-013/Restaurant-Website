<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    // direct menu page
    public function index() {
        $menus = Menu::select('menus.*', 'categories.name as category_name')
                ->when(request('key'), function ($query) {
                    $query->where('menus.name', 'like', '%' . request('key') . '%')
                        ->orWhere('categories.name', 'like', '%' . request('key') . '%');
                })
                ->leftJoin('categories', 'menus.category_id', 'categories.id')
                ->orderBy('menus.updated_at', 'desc')
                ->paginate(10);
        $menus->appends(request()->all());
        return view("admin.menu.list", compact('menus'));
    }

    // direct create menu page
    public function createPage() {
        $categories = Category::select('id', 'name')->get();
        return view('admin.menu.create', compact('categories'));
    }

    // create menu
    public function create(Request $request) {
        $this->menuValidationCheck($request, 'create');
        $data = $this->requestMenuInfo($request);

        $fileName = uniqid().$request->file('menuImage')->getClientOriginalName();
        $request->file('menuImage')->storeAs('public', $fileName);
        $data['image'] = $fileName;

        Menu::create($data);
        toastr()->success('Menu created successfully!', 'Created!', ['timeOut' => 2000, 'closeButton' => true]);
        return to_route('menu#page');
    }

    // menu detail
    public function detailPage($id) {
        $menu = Menu::select('menus.*', 'categories.name as category_name')
                ->leftJoin('categories', 'menus.category_id', 'categories.id')
                ->where('menus.id', $id)
                ->first();
        return view('admin.menu.detail', compact('menu'));
    }

    // direct edit page
    public function edit($id) {
        $menu = Menu::where('id', $id)->first();
        $category = Category::get();
        return view('admin.menu.edit', compact('menu', 'category'));
    }

    // update menu
    public function update(Request $request) {
        $this->menuValidationCheck($request, 'update');
        $data = $this->requestMenuInfo($request);

        if($request->hasFile('menuImage')) {
            $menu = Menu::where('id', $request->menuId)->first();

            if($menu['image'] != null) {
                Storage::delete('public/'.$menu['image']);
            }

            $fileName = uniqid().$request->file('menuImage')->getClientOriginalName();
            $request->file('menuImage')->storeAs('public', $fileName);
            $data['image'] = $fileName;
        }

        Menu::where('id', $request->menuId)->update($data);
        toastr()->success('Menu updated successfully!', 'Updated!', ['timeOut' => 2000, 'closeButton' => true]);
        return to_route('menu#page');
    }

    // delete menu
    public function delete($id) {
        $menu = Menu::where('id', $id)->first();
        Menu::where('id', $id)->delete();

        if(Storage::exists('public/'.$menu['image'])){
            Storage::delete('public/'.$menu['image']);
        }

        toastr()->error('Menu deleted successfully!', 'Deleted!', ['timeOut' => 2000, 'closeButton' => true]);
        return back();
    }

    // request data
    private function requestMenuInfo($request) {
        return [
            'category_id' => $request->menuCategory,
            'name' => $request->menuName,
            'description' => $request->menuDescription,
            'price' => $request->menuPrice,
        ];
    }

    // validation check
    private function menuValidationCheck($request, $action) {
        $validationRules = [
            'menuName' => 'required|min:3|unique:menus,name,'.$request->menuId,
            'menuDescription' => 'required',
            'menuCategory' => 'required',
            'menuPrice' => 'required',
        ];

        $validationRules['menuImage'] = $action == 'create' ? 'required|mimes:png,jpg,jpeg,webp|file' : 'mimes:png,jpg,jpeg,webp|file';

        Validator::make($request->all(), $validationRules)->validate();
    }
}
