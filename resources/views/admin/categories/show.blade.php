@extends('layouts.master')

@section('content')
    <div class="container mx-auto p-8">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-4xl font-bold">Category: {{ $category->title }}</h1>
            <a href="{{ route('categories.index') }}" class="bg-blue-500 text-white p-2 rounded-md hover:bg-blue-700">Go Back</a>
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
                    <th class="py-2 px-4">Event Name</th>
                    <th class="py-2 px-4">Edit Event</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($events as $event)
                    <tr>
                        <td class="py-2 px-4">{{ $event->id }}</td>
                        <td class="py-2 px-4 text-blue-600">{{ $event->title }}</td>
                        <td class="py-4 flex justify-center space-x-2">
                            <a href="{{ route('events.edit', $event) }}"
                                class="bg-green-500 text-white p-2 rounded-md hover:bg-green-700">
                                Update
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="py-2 px-4" colspan="3">
                            <h1 class="text-center text-gray-600">No events available</h1>
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
