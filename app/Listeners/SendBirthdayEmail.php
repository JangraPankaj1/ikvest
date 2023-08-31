<?php

namespace App\Listeners;

use App\Events\UpcomingBirthday;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendBirthdayEmail
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
     * @param  \App\Events\UpcomingBirthday  $event
     * @return void
     */

    public function handle(UpcomingBirthday $event)
    {
        $user = $event->user;
        $date = $user->birthday;

        Mail::to($user->email)->send(new BirthdayEmail($user, $date));
    }
}
