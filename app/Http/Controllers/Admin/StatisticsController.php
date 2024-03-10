<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatisticsController extends Controller
{
    public function index()
    {
        

        $totalUsers = User::count();
        $totalCategories = Category::count();
        $totalEvents = Event::count();
        return view('admin.statistics', compact('totalUsers', 'totalCategories', 'totalEvents'));
    }
}
