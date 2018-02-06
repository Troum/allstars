<?php

namespace App\Console;

use App\Event;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $events = Event::all();
            foreach ($events as $event) {
                foreach ($event->additional as $additional) {
                    foreach ($additional as $value) {
                        if(count($value->date) == 1) {
                            if($value->date->format('Y-m-d 00:00:00') < date('Y-m-d H:i:s')) {
                                $item = Event::whereId($value->event_id)->firstOrFail();
                                $item->hidden_status = 0;
                            }
                        }
                        else
                        {
                            foreach ($value->date as $date) {
                                $max = max($date);
                                if($max->format('Y-m-d 00:00:00') < date('Y-m-d H:i:s')) {
                                    $item = Event::whereId($value->event_id)->firstOrFail();
                                    $item->hidden_status = 0;
                                }
                            }
                        }

                    }
                }
            }
        })->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
