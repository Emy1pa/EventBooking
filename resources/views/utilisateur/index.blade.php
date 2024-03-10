@extends('layouts.master')

@section('content')
<header class="p-4 bg-gray-800 text-white">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo or site name can go here -->
        <a href="{{route('utilisateur.index')}}" class="text-lg font-bold">EventBooking</a>

        <!-- Navigation Links -->
        <nav class="flex space-x-4 items-center">
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-medium rounded-lg text-sm px-5 py-2.5">
                    Log out
                </button>
            </form>
        </nav>
    </div>
</header>
    <div class="container mx-auto flex flex-wrap">
        <!-- Sidebar with filters -->
        <aside class="w-full md:w-1/4 p-4 bg-gray-100">
            <h2 class="text-lg font-bold mb-4">Filters</h2>
            <form method="GET">
                <!-- Category filter -->
                <div class="mb-4">
                    <h3 class="text-sm font-bold text-gray-700 mb-2">Category</h3>
                    @foreach ($categories as $category)
                        <div class="flex items-center mb-2">
                            <input type="checkbox" name="categories[]" value="{{$category->id}}" id="category-{{$category->id}}" class="text-blue-500 focus:ring focus:border-blue-300">
                            <label for="category-{{$category->id}}" class="text-sm ml-2">{{$category->title}}</label>
                        </div>
                    @endforeach
                </div>

                <!-- Search by title -->
                <div class="mb-4">
                    <label class="block text-sm font-bold text-gray-700" for="title">Search by Title</label>
                    <input id="title" name="title" type="text" class="mt-1 p-2 border rounded-md w-full" placeholder="Enter title">
                    
                    <!-- Filter button -->
                    <button type="submit" class="w-full mt-2 p-2 bg-blue-500 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring focus:border-blue-300">
                        Filter
                    </button>
                    <a href="{{route('utilisateur.index')}}" type="reset" class="text-center w-full mt-2 p-2 bg-gray-500 text-white rounded-md hover:bg-gray-700 focus:outline-none focus:ring focus:border-blue-300">
                        Reset
                    </a>
                </div>
            </form>
        </aside>

        <!-- Main content area -->
        <div class="w-full md:w-3/4 p-8">
            <h1 class="text-4xl font-bold mb-8">ALL EVENTS</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach ($events as $event)
                    <div class="bg-white p-4 rounded-md shadow-md transition-transform transform hover:scale-105 mb-8">
                        <h2 class="text-xl font-bold mb-2">{{ $event->title }}</h2>
                        <p class="text-gray-600 mb-4">{{ $event->description }}</p>
                        <img src="{{ asset($event->image) }}" alt="Event Image" class="w-full h-48 object-cover mb-4 rounded-md">

                        <div class="flex justify-between items-center mb-2">
                            <span class="bg-blue-500 text-white p-1 rounded-md">{{ $event->availablePlaces }} places available</span>
                            <span class="bg-green-500 text-white p-1 rounded-md">{{ $event->location }}</span>
                            <span class="bg-purple-500 text-white p-1 rounded-md">{{ $event->category->title }}</span>
                        </div>

                        <p class="text-gray-500 mb-2">
                            <span class="mr-1">Date:</span>
                            <span class="text-blue-600">{{ $event->date }}</span>
                        </p>

                        <form action="{{ route('events.reserve', $event) }}" method="post">
                            @csrf
                            <button type="submit"
                                class="w-full bg-yellow-500 text-white p-2 rounded-md hover:bg-yellow-700 focus:outline-none focus:ring focus:border-yellow-300">
                                Reserve
                            </button>
                        </form>

                        @php
                            $userReservations = auth()->user()->reservations;
                            $eventReservation = $userReservations ? $userReservations->where('event_id', $event->id)->first() : null;
                        @endphp

                        @if ($eventReservation && $eventReservation->ticket)
                            <a href="{{ route('events.ticket', $eventReservation) }}"
                                class="text-blue-500 hover:text-blue-700">
                                View Ticket
                            </a>
                        @elseif ($eventReservation)
                            <form action="{{ route('showticket', $eventReservation) }}" method="post">
                                @csrf
                                <button type="submit" class="text-blue-500 hover:text-blue-700">
                                    Get Ticket
                                </button>
                            </form>
                        @endif
                    </div>
                @endforeach
            </div>

            <div class="mt-4">
                {{ $paginatedEvents->links() }}
            </div>
        </div>
    </div>
@endsection
