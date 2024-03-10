<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class AdminEventController extends Controller
{
    public function index()
    {
        $events = Event::where('status', 'pending')->get();
        return view('admin.eventsapprovel', compact('events'));
    }

    public function approve(Event $event)
    {
        $event->update(['status' => 'accepted']);
        return redirect()->route('admin.events.index')->with('success', 'Event approved successfully');
    }

    public function reject(Event $event)
    {
        $event->update(['status' => 'rejected']);
        return redirect()->route('admin.events.index')->with('success', 'Event rejected successfully');
    }
}
