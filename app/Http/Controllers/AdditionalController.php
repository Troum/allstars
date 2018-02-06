<?php

namespace App\Http\Controllers;

use App\AdditionalInfo;
use App\Gallery;
use App\PastEvents;
use App\Photos;
use App\Soclinks;
use App\Videos;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Additional;
use App\Event;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;

class AdditionalController extends Controller
{
    public function store(Request $request, Event $event) {

        $date = Carbon::createFromFormat('Y-m-d', $request->date)->format('Y-m-d 00:00:00');
        $time = Carbon::createFromFormat('H:i', $request->time);
        if($date > date('Y-m-d') && !empty($request->price)) {
            $hidden = 1;
            $event->hidden_status = $hidden;
            $event->save();

            Additional::create([
                'event_id' => $event->id,
                'date' => $date,
                'time' => $time,
                'place' => $request->place,
                'en_place' => $this->translator('ru-en',$request->place),
                'city' => $request->city,
                'en_city' => $this->translator('ru-en',$request->city),
                'ticket_id' => $request->ticket_id,
                'price' => $request->price,
                'en_price' => $this->translator('ru-en', $request->price)
            ]);

        }
        else {
            Additional::create([
                'event_id' => $event->id,
                'date' => $date,
                'time' => $time,
                'place' => $request->place,
                'en_place' => $this->translator('ru-en',$request->place),
                'city' => $request->city,
                'en_city' => $this->translator('ru-en',$request->city),
                'ticket_id' => $request->ticket_id,
                'price' => $request->price,
                'en_price' => $request->price
            ]);

        }


        return back();

    }

    public function links(Request $request, Event $event){

        Soclinks::create([
            'event_id' => $event->id,
            'link' => $request->eventlink
        ]);

        foreach ($request->video as $video) {
            Videos::create([
                'event_id' => $event->id,
                'videos' => str_replace('https://youtu.be/','',$video)
            ]);
        }
        return back();
    }
    public function photo(Event $event){
        if (Input::hasFile('photos')) {
            foreach (Input::file('photos') as $file) {
                $file->move('images/uploads/'.$event->slug, $file->getClientOriginalName());
                Photos::create([
                    'event_id' => $event->id,
                    'photos' => $file->getClientOriginalName()
                ]);
            }
            return back();
        } else {
            echo 'Error';
        }
    }
    public function info(Request $request, Event $event){
        AdditionalInfo::create([
            'event_id' => $event->id,
            'info' => $request->info,
            'en_info' => $this->translator('ru-en',$request->info),
        ]);
        return back();
    }

    public function gallery (Request $request, $id) {
        $additional = Additional::whereId($id)->firstOrFail();
        $pastEvents = PastEvents::whereSlug($additional->slug)->firstOrFail();
        if (Input::hasFile('gallery')) {
            foreach (Input::file('gallery') as $index=>$file) {
                if ($index == 0) {
                    $pastEvents->cover = Input::file('gallery')[$index]->getClientOriginalName();
                    $pastEvents->save();
                }
                Input::file('gallery')[$index]->move('images/gallery/'.$pastEvents->dirname.'/'.$additional->slug, Input::file('gallery')[$index]->getClientOriginalName());
                Gallery::create([
                    'additional_id' => $additional->id,
                    'past_events_id' => $pastEvents->id,
                    'image' => Input::file('gallery')[$index]->getClientOriginalName(),
                    'date' => $additional->date,
                    'photographer' => $request->photographer,
                    'en_photographer' => $this->translator('ru-en',$request->photographer),
                ]);
            }
            return redirect('home/edit');
        } else {
            echo 'Error';
        }

    }

    public function delete($slug) {
        $event = Event::whereSlug($slug)->firstOrFail();
        $pastEvent = PastEvents::whereTitle($event->title)->get();
        foreach ($pastEvent as $value){
            foreach ($value->gallery as $gallery) {
                if(count($gallery) != 0) {
                    $gallery->delete();
                    File::delete(base_path().'/public/images/gallery/'.$pastEvent->dirname.'/'.$gallery->image);
                    $files = File::allFiles(base_path().'/public/images/gallery/'.$pastEvent->dirname);
                    if(count($files) == 0) {
                        File::deleteDirectory(base_path().'/public/images/gallery/'.$pastEvent->dirname);
                    }
                }
            }
            $value->delete();
        }

        foreach ($event->photos as $photo) {
            if(count($photo) != 0){
                $photo->delete();
                File::delete(base_path().'/public/images/upload/'.$event->slug.'/'.$photo->photos);
            }
        }
        foreach ($event->additional as $additional) {
            if(count($additional) != 0) {
                $additional->delete();
            }
        }
        foreach ($event->videos as $video) {
            if(count($video) != 0) {
                $video->delete();
            }
        }
        foreach ($event->info as $info) {
            if(count($info) != 0) {
                $info->delete();
            }
        }

        File::delete(base_path().'/public/images/'.$event->cover);

        $event->delete();

        return back();

    }

    public function updateInfo(Request $request, $id) {
        $info = AdditionalInfo::whereEventId($id)->firstOrFail();
        if(empty($request->info)){
            $info->delete();
            return back();
        }
        else {
            $info->info = $request->info;
            $info->en_info = $this->translator('ru-en', $request->info);
            $info->save();
            return back();
        }

    }

    public function updateEvent (Request $request, $id) {
        $event = Event::whereId($id)->firstOrFail();
        $pastEvent = PastEvents::whereTitle($event->title)->get();
        foreach ($pastEvent as $item) {
            if(!empty($request->new_title)) {
                $item->title = $request->new_title;
                $item->save();
            }
            if(!empty($request->new_en_title)) {
                $item->en_title = $request->new_en_title;
                $item->save();
            }
        }

        if(!empty($request->new_title)){
            $event->title = $request->new_title;
            $event->save();
        }
        if(!empty($request->new_en_title)){
            $event->en_title = $request->new_en_title;
            $event->save();
        }
        if(!empty($request->updated)){
            $event->description = $request->updated;
            $event->save();
        }
        if(!empty($request->en_updated)){
            $event->en_description = $request->en_updated;
            $event->save();
        }
        return back();

    }

    public function updateGallery (Request $request, $id) {
        $additional = Additional::whereId($id)->firstOrFail();
        $pastEvents = PastEvents::whereSlug($additional->slug)->firstOrFail();
        $gallery = Gallery::wherePastEventsId($pastEvents->id)->get();
        foreach ($gallery as $item) {

            if(!empty($request->newphotographer)) {
                $item->photographer = $request->newphotographer;
                $item->en_photographer = $this->translator('ru-en', $request->newphotographer);
                $item->save();
            }
        }
        return back();
    }

    public function edit($slug){
        $additional = Additional::whereSlug($slug)->firstOrFail();
        $event = PastEvents::whereSlug($additional->slug)->firstOrFail();
        return view('layouts.date', compact('additional','event'));
    }

    public function editEvent(Request $request){
        $additional = Additional::whereSlug(explode('/',$request->getPathInfo())[4])->firstOrFail();
        $event = Event::whereId($additional->event_id)->firstOrFail();
        return view('layouts.editEvent', compact('additional','event'));
    }

    public function updateDate(Request $request, $id) {
        $additional = Additional::whereId($id)->firstOrFail();
        if(!empty($request->newdate)) {
            $additional->date = Carbon::createFromFormat('Y-m-d',$request->newdate)->format('Y-m-d 00:00:00');
            $additional->save();
        }
        if(!empty($request->newtime)) {
            $additional->time = Carbon::createFromFormat('H:i',$request->newtime);
            $additional->save();
        }
        if(!empty($request->newplace)) {
            $additional->place = $request->newplace;
            $additional->save();
        }
        if(!empty($request->en_newplace)) {
            $additional->en_place = $request->en_newplace;
            $additional->save();
        }
        if(!empty($request->newcity)) {
            $additional->city = $request->newcity;
            $additional->en_city = $this->translator('ru-en', $request->newcity);
            $additional->save();
        }
        if(!empty($request->newprice)) {
            $additional->price = $request->newprice;
            $additional->en_price = $this->translator('ru-en', $request->newprice);
            $additional->save();
        }

        return redirect('home/edit/');
    }

    public function deletePhoto (Request $request) {
        $pastEvent = PastEvents::whereSlug($request->slug)->firstOrFail();
        $image = Gallery::where('image','=',$request->name)->where('past_events_id','=',$request->id);
        $image->delete();
        File::delete(base_path().'/public/images/gallery/'.$pastEvent->dirname.'/'.$request->slug.'/'.$request->name);
        $files = File::allFiles(base_path().'/public/images/gallery/'.$pastEvent->dirname);
        if(count($files) == 0) {
            File::deleteDirectory(base_path().'/public/images/gallery/'.$pastEvent->dirname);
        }
        return response()->json('Success');
    }
}
