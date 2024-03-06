@extends('layouts.master')

@section('content')
    <div class="container mx-auto p-8">
        <h1 class="text-4xl font-bold mb-8">ALL ANNOUNCES</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($events as $event)
                <div class="bg-white p-4 rounded-md shadow-md transition-transform transform hover:scale-105">
                    <h2 class="text-xl font-bold mb-2">{{ $event->title }}</h2>
                    <p class="text-gray-600 mb-2">{{ $event->description }}</p>
                    <img src="{{ asset($event->image) }}" alt="Event Image" class="w-full h-32 object-cover mb-2 rounded-md">

                    <div class="flex justify-between items-center mb-2">
                        <span class="bg-blue-500 text-white p-1 rounded-md">{{ $event->availablePlaces }} places available</span>
                        <span class="bg-green-500 text-white p-1 rounded-md">{{ $event->location }}</span>
                        <!-- Display Category -->
                        <span class="bg-purple-500 text-white p-1 rounded-md">{{ $event->category->title }}</span>
                    </div>

                    <p class="text-gray-500 mb-1">
                        <span class="mr-1">Date:</span>
                        <span class="text-blue-600">{{ $event->date }}</span>
                    </p>

                    <div class="flex justify-center mt-2">
                        <button class="w-full bg-yellow-500 text-white p-2 rounded-md hover:bg-yellow-700 focus:outline-none focus:ring focus:border-yellow-300">
                            Reserve
                        </button>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $events->links() }}
        </div>
    </div>
@endsection
