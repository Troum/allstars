<?php

namespace App\Http\Middleware;

use App\Additional;
use App\Event;
use App\PastEvents;
use Closure;

class CreatePastEvent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $additional = Additional::whereSlug(explode('/',$request->getPathInfo())[4])->firstOrFail();
        $event = Event::whereId($additional->event_id)->firstOrFail();
        if($additional->date->format('Y-m-d 00:00:00') > date('Y-m-d 00:00:00')) {
            return redirect('/home/edit/date/'.$additional->slug.'/'.$event->slug);
        }
        else {
            $past = PastEvents::whereSlug($additional->slug)->first();
            if($past == null) {
                PastEvents::create([
                    'slug'=> $additional->slug,
                    'cover'=> $event->cover,
                    'title'=>$event->title,
                    'en_title'=>$event->en_title,
                    'city'=> $additional->city,
                    'en_city'=>$additional->en_city,
                    'date'=>$additional->date,
                    'dirname'=>$event->slug
                ]);
                return $next($request);
            }
            else {
                return $next($request);
            }
        }

    }
}
