<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Authenticated;
use App\Models\Reservation;

class LinkReservationsToUser
{
    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Authenticated  $event
     * @return void
     */
    public function handle(Authenticated $event)
    {
        $user = $event->user;

        // Update reservations with the user's email and null user_id to link them to the user
        Reservation::where('email', $user->email)
            ->whereNull('user_id')
            ->update(['user_id' => $user->id]);
    }
}
