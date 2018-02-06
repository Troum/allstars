<?php

namespace App\Http\Controllers;

use App\Additional;
use App\Event;
use App\Mail\SubscriberMail;
use App\Subscribers;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $month = $this->month();
        $events = Event::all();

        return view('home', compact('events','month'));
    }

    public function create()
    {
        return view('layouts.create');
    }

    public function store()
    {
        if (Input::hasFile('file')) {
            $file = Input::file('file');
            if(empty(request('description'))) {
                Event::create([
                    'title' => request('title'),
                    'en_title' => $this->translator('ru-en',request('title')),
                    'description' => request('description'),
                    'en_description' => request('description'),
                    'cover' => $file->getClientOriginalName(),
                ]);
            }
            else {
                Event::create([
                    'title' => request('title'),
                    'en_title' => $this->translator('ru-en',request('title')),
                    'description' => request('description'),
                    'en_description' => $this->translator('ru-en',request('description')),
                    'cover' => $file->getClientOriginalName(),
                ]);
            }

            $file->move('images', $file->getClientOriginalName());
            return redirect('home/edit');
        } else {
            echo 'Error';
        }
    }

    public function show($slug) {
        $event = Event::where('slug', $slug)->first();
        return view('layouts.show', compact('event','count'));

    }

    public function edit() {
        $month = $this->month();
        $events = Event::all();
        $past = Additional::whereDate('date','<',date('Y-m-d 00:00:00'))->get();
        return view('layouts.edit',['past' => $past], compact('events', 'month','count'));
    }

    public function send() {
        $folder = base_path().'/resources/views/email';
        $files = File::allFiles($folder);
        $list = [];
        foreach ($files as $file)
        {
            array_push($list, str_replace($folder.'/','',(string)$file));
        }
        return view('send', compact('list'));
    }

    public function add() {

        if (Input::hasFile('template')) {
            $file = Input::file('template');
            $file->move(base_path().'/resources/views/email', $file->getClientOriginalName());
            return back();
        } else {
            echo 'Error';
        }
    }

    public function sendmail(Request $request, Mailer $mailer) {
        $users = Subscribers::all();
        $view = 'email.'.str_replace('.blade.php','',$request->name);
        foreach ($users as $user) {
            $mailer->to($user->email)->send(new SubscriberMail($view,$user->name));
        }
    }

    public function delete (Request $request) {
        File::delete(base_path().'/resources/views/email/'.$request->name);
        return response()->json('Success');
    }



}
