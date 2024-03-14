<?php

namespace App\Http\Controllers\User;

use App\Models\FooterSection;
use App\Models\Menu;
use App\Models\News;
use App\Models\Event;
use App\Models\Category;
use App\Models\EventTime;
use App\Models\EventType;
use App\Models\Newsletter;
use App\Models\AboutSection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\QuoteSection;
use App\Models\TeamSection;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    // user home
    public function index() {
        $news = News::orderBy('id', 'desc')->take(2)->get();
        $event = Event::orderBy('id', 'desc')->take(3)->get();
        $menu1 = Menu::select('id', 'name' ,'description', 'price', 'image')->inRandomOrder()->first();
        $menu2 = Menu::select('id', 'name' ,'description', 'price', 'image')->inRandomOrder()->first();
        $quote = QuoteSection::first();
        $about = AboutSection::first();
        $footer = FooterSection::first();
        return view('user.home', compact('quote', 'news', 'event', 'menu1', 'menu2', 'about', 'footer'));
    }

    // newsletter
    public function newsletter(Request $request) {
        Validator::make($request->all(), [
            'email' => 'required|email',
        ])->validate();

        if(Newsletter::select('email') === $request->email) {
            toastr()->warning('You have already subscribed!', 'Warning!', ['timeOut' => 2000, 'closeButton' => true]);
            return back();
        }

        Newsletter::create([
            'email' => $request->email,
        ]);
        toastr()->success('Subscribed to newsletter successfully!', 'Subscribed!', ['timeOut' => 2000, 'closeButton' => true]);
        return back();
    }

    // about page
    public function about() {
        $about = AboutSection::first();
        $team = TeamSection::get();
        $galleries = Gallery::get();
        $footer = FooterSection::first();
        return view('user.about', compact('about', 'team', 'galleries', 'footer'));
    }

    // menu page
    public function menu() {
        $category = Category::get();
        $menu = Menu::select('menus.*', 'categories.name as category_name')
                    ->leftJoin('categories', 'menus.category_id', 'categories.id')
                    ->paginate(6);
        $footer = FooterSection::first();
        return view('user.menu', compact('category', 'menu', 'footer'));
    }

    // menu filter
    public function filter($menuId) {
        $menu = Menu::where('category_id', $menuId)->paginate(6);
        $category = Category::get();
        $menu->appends(request()->all());
        $footer = FooterSection::first();
        return view('user.menu', compact('menu','category', 'footer'));
    }

    // menu load more data
    public function loadMoreMenus(Request $request)
    {
        $start = $request->input('start');

        $data = Menu::orderBy('id', 'ASC')
            ->offset($start)
            ->limit(6)
            ->get();

        return response()->json([
            'data' => $data,
            'next' => $start + 6
        ]);
    }

    // event page
    public function event() {
        $events = Event::orderBy('id', 'desc')->paginate(6);
        $events->appends(request()->all());
        $eventTypes = EventType::get();
        $eventTimes = EventTime::get();
        $footer = FooterSection::first();
        return view('user.events', compact('events', 'eventTypes', 'eventTimes', 'footer'));
    }

    // event detail page
    public function eventDetail($id) {
        $eventTime = EventTime::get();
        $event = Event::where('id', $id)->first();
        $footer = FooterSection::first();
        return view('user.event-details', compact('event', 'eventTime', 'footer'));
    }


    // events load more data
    public function loadMoreEvents(Request $request)
    {
        $start = $request->input('start');

        $data = Event::orderBy('id', 'ASC')
            ->offset($start)
            ->limit(6)
            ->get();

        return response()->json([
            'data' => $data,
            'next' => $start + 6
        ]);
    }

    // news page
    public function news() {
        $news = News::orderBy('id', 'desc')->paginate(6);
        $news->appends(request()->all());
        $footer = FooterSection::first();
        return view('user.news', compact('news', 'footer'));
    }

    // news detail
    public function newsDetail($id) {
        $news = News::where('id', $id)->first();
        $footer = FooterSection::first();
        return view('user.news-detail', compact('news', 'footer'));
    }

}
