<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::query()->paginate(1);
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $event = new Event();
        return view('events.create', compact('event'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRequest $request)
    {

        $incomingFields = $request->validated();
        $file_extension = $request->image->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $path = public_path('images/events');
        $request->image->move($path, $file_name);

        // Assurez-vous d'ajouter le chemin de l'image à votre tableau $incomingFields
        $incomingFields['image'] = 'images/events/' . $file_name;

        $event = Event::create($incomingFields);

        return redirect()->route('events.index')->with('success', 'Event created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventRequest $request, Event $event)
    {
        $formFields = $request->validated();
        $event->fill($formFields)->save();
        return redirect()->route('events.index')->with('success', 'Event updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event deleted successfully');

    }
}
