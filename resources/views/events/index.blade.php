@extends('layouts.master')

@section('content')
    <div class="container mx-auto p-8">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-4xl font-bold">ALL ANNOUNCES</h1>
            <div class="flex space-x-2">
                <a href="{{ route('categories.index') }}" class="bg-blue-500 text-white p-2 rounded-md hover:bg-blue-700">Categories</a>
                <a href="{{ route('events.create') }}" class="bg-blue-500 text-white p-2 rounded-md hover:bg-blue-700">Add Event</a>
            </div>
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
                        <td class="py-2 px-20">{{ $event->availablePlaces }}</td>
                        <td class="py-4 flex justify-center space-x-2">
                            <a href="{{ route('events.update', $event) }}"
                                class="bg-green-500 text-white p-2 rounded-md hover:bg-green-700">
                                UPDATE
                            </a>
                            <form action="{{ route('events.destroy', $event) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 text-white p-2 rounded-md hover:bg-red-700 block sm:inline">DELETE</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="py-2 px-4" colspan="9">
                            <h1 class="text-center">No annouces to show</h1>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $events->links() }}
        </div>
    </div>
@endsection
