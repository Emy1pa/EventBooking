<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $events = Event::where('status', 'accepted')->with('category')->paginate(10);
        $userReservations = Auth::user()->reservations;
        $reservations = [];

        $profileReservations = Reservation::where('event_id', Auth::user()->id)->get();

        foreach ($profileReservations as $profileReservation) {
            if ($profileReservation->status === '0') {
                $reservations = User::where('id', $profileReservation->user_id)->get();
            }
        }



        return view('events.index', compact('events', 'userReservations', 'reservations'));
    }
    public function UpdateStatus($id)
    {

        Reservation::where('user_id', $id)->update(['status' => "1"]);


        return redirect()->route('events.index')->with('success', 'Event created successfully');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $event = new Event();
        $categories = Category::all();

        return view('events.create', compact('event', 'categories'));
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
        $incomingFields['image'] = 'images/events/' . $file_name;

        $incomingFields['status'] = 'pending';


        Event::create($incomingFields);

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
        $categories = Category::all();
        return view('events.edit', compact('event', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(EventRequest $request, Event $event)
    // {
    //     $formFields = $request->validated();
    //     $event->fill($formFields)->save();
    //     return redirect()->route('events.index')->with('success', 'Event updated successfully');

    // }
    public function update(EventRequest $request, Event $event)
    {
        $formFields = $request->validated();

        if ($request->hasFile('image')) {
            if ($event->image) {
                $imagePath = public_path($event->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            // Télécharger et stocker la nouvelle image
            $file_extension = $request->file('image')->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extension;
            $path = public_path('images/events');
            $request->file('image')->move($path, $file_name);

            // Mettre à jour le chemin de l'image dans la base de données
            $formFields['image'] = 'images/events/' . $file_name;
        }

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

    public function test(){
        $events = Event::all()->with('reservations')->get();
        foreach($events as $event){
            e
        }
        dump($event);
    }
}
