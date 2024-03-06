<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    public function index()
    {
        $events = Event::query()->paginate(3);
        return view('utilisateur.index', compact('events'));
    }
}
