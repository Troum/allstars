<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Additional;
use App\Gallery;
use App\Subscribers;
use App\Event;
use App\PastEvents;
class IndexController extends Controller
{
    public function index(Request $request) {
        App::setLocale('ru');
        $events = Event::all();
        $month = $this->month();
        $past = Additional::whereDate('date','<',date('Y-m-d 00:00:00'))->get();
        $hiddens = PastEvents::where('date','<',date('Y-m-d 00:00:00'))->orderBy('date','desc')->paginate(3);
        if ($request->ajax()) {
            return view('parts.contents.gallery', ['hiddens' => $hiddens], compact('events', 'hiddens','month'))->render();
        }
        return view('events.index',['past' => $past],compact('events', 'hiddens','month'));
    }

    public function indexEn(Request $request) {
        App::setLocale('en');
        $events = Event::all();
        $month = $this->month();
        $past = Additional::whereDate('date','<',date('Y-m-d 00:00:00'))->get();
        $hiddens = PastEvents::where('date','<',date('Y-m-d 00:00:00'))->paginate(3);
        if ($request->ajax()) {
            return view('parts.contents.gallery', ['hiddens' => $hiddens], compact('events', 'hiddens','month', 'notOne'))->render();
        }
        return view('events.index',['past' => $past],compact('events', 'hiddens','month'));
    }

    public function event($slug) {
        App::setLocale('ru');
        $event = Event::whereSlug($slug)->firstOrFail();
        $events= Event::all();
        $month = $this->month();
        
        return view('events.event', ['event' => $event],compact('events', 'month'));
    }

    public function eventEn($slug) {
        App::setLocale('en');
        $event = Event::whereSlug($slug)->firstOrFail();
        $events= Event::all();
        $month = $this->month();
        
        return view('events.event', ['event' => $event],compact('events', 'month'));
    }

    public function archive($slug) {
        App::setLocale('ru');
        $additional = Additional::whereSlug($slug)->firstOrFail();
        $gallery = Gallery::whereAdditionalId($additional->id)->get();
        $event = PastEvents::whereSlug($slug)->firstOrFail();
        $month = $this->month();
        $images = [];
        foreach ($gallery as $image) {
            array_push($images,$image);
        }
        return view('parts.contents.archive',compact('images','month', 'additional', 'event'));
    }

    public function archiveEn($slug) {
        App::setLocale('en');
        $additional = Additional::whereSlug($slug)->firstOrFail();
        $gallery = Gallery::whereAdditionalId($additional->id)->get();
        $event = PastEvents::whereSlug($slug)->firstOrFail();
        $month = $this->month();
        $images = [];
        foreach ($gallery as $image) {
            array_push($images,$image);
        }
        return view('parts.contents.archive',compact('images','month', 'additional', 'event'));
    }

    public function about() {
        return view('events.about');
    }

    public function aboutEn() {
        App::setLocale('en');
        return view('events.about-en');
    }

    public function subscribe(Request $request) {

        Subscribers::create([
            'name' => $request->name,
            'email'=> $request->email
        ]);

        $response = array(
            'msg' => 'Вы подписались на e-mail рассылку'
        );
        return response()->json($response);
    }
    
    public function getCards(Request $request)
    {   $additional = Additional::whereEventId($request->id)->get();
        $info = [];
        foreach ($additional as $item) {
            array_push($info, $item);
        }
        return response()->json($info);
    }

    public function getCover(Request $request)
    {
        $event= Event::whereId($request->id)->firstOrFail();
        return response()->json($event);
    }
}
