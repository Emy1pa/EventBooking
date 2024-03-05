@extends('layouts.master')

@section('content')
    <div class="container mx-auto p-8">
        <div class="flex justify-end mb-4">
            <a href="{{ route('events.create') }}" class="bg-blue-500 text-white p-2 rounded-md hover:bg-blue-700">Add
                Event</a>
        </div>
        <h1 class="text-4xl font-bold mb-8">ALL ANNOUNCES</h1>

        <div class="overflow-x-auto">
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
                            <td class="py-2 px-4">{{ $event->availablePlaces }}</td>
                            <td class="py-2">
                                <button type="submit"
                                    class="bg-green-500 text-white p-2 rounded-md hover:bg-green-700 block sm:inline">UPDATE</button>
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
                            <td class="py-2 px-4" colspan="8">
                                <h1 class="text-center">No annouces to show</h1>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $events->links() }}
        </div>
    </div>
@endsection
