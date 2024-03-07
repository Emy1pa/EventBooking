@extends('layouts.master')

@section('content')
    <div class="container mx-auto flex flex-wrap">
        <!-- Sidebar with filters -->
        <aside class="w-full md:w-1/4 p-4 bg-gray-100">
            <h2 class="text-lg font-bold mb-4">Filters</h2>
            <!-- Add your filter options here -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Category</label>
                <select class="mt-1 p-2 border rounded-md w-full">
                    <option>All Categories</option>
                    <!-- Add category options dynamically if needed -->
                </select>
            </div>

            <!-- Search by title -->
            <div class="mb-4">
                <form action="">
                <label class="block text-sm font-medium text-gray-700">Search by Title</label>
                <input type="text" class="mt-1 p-2 border rounded-md w-full" placeholder="Enter title">
                </form>
            </div>
            <!-- Add more filters as needed -->
        </aside>

        <!-- Main content area -->
        <div class="w-full md:w-3/4 p-8">
            <h1 class="text-4xl font-bold mb-8">ALL ANNOUNCES</h1>

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

                        <div class="flex justify-center">
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
    </div>
@endsection
