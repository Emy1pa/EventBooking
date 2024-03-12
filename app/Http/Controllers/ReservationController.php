<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ReservationController extends Controller
{
    public function reserve(Event $event)
    {
        if ($event->availablePlaces > 0) {
            // $reservation = auth()->user()->reservations()->create([
            //     'status' => 0,
            //     'event_id' => $event->id,
            // ]);

            $user = auth()->user();
            $reservation = $user->reservations()->create([
                'status' => 0,
                'event_id' => $event->id,
            ]);

            $event->decrement('availablePlaces');

            return redirect()->route('utilisateur.index', $event)->with('success', 'Event reserved!');
        } else {
            return redirect()->route('utilisateur.index')->with('error', 'Event is fully booked.');
        }
    }


    public function generateTicket($id)
    {
        // $event = $reservation->event;
        $reservation = Reservation::where('user_id', $id)->latest()->first();


        

        return view('tickets.show', compact('reservation'));
    }


    public function showTicket(Reservation $reservation)
    {
        // If the reservation doesn't have a ticket, abort with a 404
        if (!$reservation->ticket) {
            abort(404);
        }

        return view('tickets.show', compact('reservation'));
    }
}
