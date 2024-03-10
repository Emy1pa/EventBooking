<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ReservationController extends Controller
{
    public function reserve(Event $event)
{
    // Check if the event is available for reservation
    if ($event->availablePlaces > 0) {
        // Create a reservation associated with the authenticated user
        $reservation = auth()->user()->reservations()->create([
            'status' => 0, 
            'event_id' => $event->id,
        ]);

        // Update available places
        $event->decrement('availablePlaces');

        // You may redirect to a ticket view or display a success message
        return redirect()->route('utilisateur.index', $event)->with('success', 'Event reserved!');
    } else {
        // Handle case when no available places
        return redirect()->route('events.index')->with('error', 'Event is fully booked.');
    }
}


public function generateTicket(Reservation $reservation)
{
    $event = $reservation->event;

    // Customize this part to include more details on the ticket
    $ticketDetails = sprintf(
        'TICKET-%s-%s-%s-%s',
        $event->title,
        now()->format('YmdHis'), // Add current date and time for uniqueness
        auth()->id(),
        $reservation->id // Include reservation ID for reference
    );

    return $ticketDetails;
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