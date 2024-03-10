@extends('layouts.master')

@section('content')
<header class="p-4 bg-gray-800 text-white">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo or site name can go here -->
        <a href="{{ route('categories.index') }}" class="text-lg font-bold">EventBooking</a>

        <!-- Navigation Links -->
        <nav class="flex space-x-4 items-center">
            <a href="{{ route('categories.index') }}">Categories</a>
            <a href="{{ route('admin.statistics') }}">Statistics</a>
            <a href="{{ route('users.index') }}">Users</a>
            <a href="{{ route('admin.events.index') }}" class="text-blue-300 hover:text-blue-400">Events Approval</a> <!-- Add this line -->
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-medium rounded-lg text-sm px-5 py-2.5">
                    Log out
                </button>
            </form>
        </nav>
    </div>
</header>
    <div class="container mx-auto p-8">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-4xl font-bold">ALL EVENTS</h1>
        </div>

        @if (session('success'))
            <div class="bg-green-500 text-white p-4 mb-4 rounded-md">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full bg-white border border-gray-300">
            <thead>
            <tr>
                <th class="py-2 px-4">#ID</th>
                <th class="py-2 px-4">TITLE</th>
                <th class="py-2 px-4">DESCRIPTION</th>
                <th class="py-2 px-4">IMAGE</th>
                <th class="py-2 px-4">DATE</th>
                <th class="py-2 px-4">LOCATION</th>
                <th class="py-2 px-4">CATEGORY</th>
                <th class="py-2 px-4">AVAILABLE PLACES</th>
                <th class="py-2 px-4">STATUS</th>
                <th class="py-2 px-4">ACTIONS</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($events as $event)
                <tr>
                    <td class="py-2 px-4">{{ $event->id }}</td>
                    <td class="py-2 px-4">{{ $event->title }}</td>
                    <td class="py-2 px-4">{{ $event->description }}</td>
                    <td class="py-2 px-4">
                        <img src="{{ asset($event->image) }}" alt="Event Image" class="w-16 h-16 object-cover">
                    </td>
                    <td class="py-2 px-4">{{ $event->date }}</td>
                    <td class="py-2 px-4">{{ $event->location }}</td>
                    <td class="py-2 px-4">
                        <span class="bg-blue-500 text-white px-2 py-1 rounded-md">{{ $event->category->title }}</span>
                    </td>
                    <td class="py-2 px-4">{{ $event->availablePlaces }}</td>
                    <td class="py-2 px-4">
                        <span class="{{ $event->status === 'pending' ? 'bg-yellow-500' : 'bg-green-500' }} text-white px-2 py-1 rounded-md">
                            {{ $event->status }}
                        </span>
                    </td>
                    <td class="py-2 px-4">
                        @if($event->status === 'pending')
                            <form action="{{ route('admin.events.approve', $event) }}" method="post" class="inline">
                                @csrf
                                <button type="submit" class="bg-green-500 text-white p-2 rounded-md hover:bg-green-700 block sm:inline">
                                    APPROVE
                                </button>
                            </form>

                            <form action="{{ route('admin.events.reject', $event) }}" method="post" class="inline">
                                @csrf
                                <button type="submit" class="bg-red-500 text-white p-2 rounded-md hover:bg-red-700 block sm:inline">
                                    REJECT
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="py-2 px-4" colspan="10">
                        <h1 class="text-center">No events to approve</h1>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
