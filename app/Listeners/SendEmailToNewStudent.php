<?php

namespace App\Listeners;

use App\Events\NewStudent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEmailToNewStudent
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\NewStudent  $event
     * @return void
     */
    public function handle(NewStudent $event)
    {
        dd("Siunciu laiska varttojui: ".$event->student->name);
    }
}
