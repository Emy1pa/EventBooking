<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    public function index(Request $request)
    {

        $eventQuery = Event::query();
        $categories = Category::with('events')->has('events')->get();
        $categoriesIds = ($request->input('categories'));
        $title = ($request->input('title'));
        if(!empty($title)){
            $eventQuery->where('title', 'like', "%{$title}%");
        }
        if(!empty($categoriesIds)){
            $eventQuery->whereIn('category_id', $categoriesIds);
        }
        $paginatedEvents = $eventQuery->paginate(4); // Change 2 to the number of events you want per page
        $events = $eventQuery->get();
        return view('utilisateur.index', compact('events', 'paginatedEvents', 'categories'));
    }
}
