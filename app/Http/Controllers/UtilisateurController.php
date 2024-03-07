<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    public function index(Request $request)
    {

        $eventQuery = Event::query();
        $title = ($request->input('title'));
        if(!empty($title)){
            $eventQuery->where('title', 'like', "%{$title}%");
        }
        $events = $eventQuery->get();
        return view('utilisateur.index', compact('events'));
    }
}
