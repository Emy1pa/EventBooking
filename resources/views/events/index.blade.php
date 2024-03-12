@extends('layouts.master')

@section('content')
    <!-- Logout Button -->
    <form action="/logout" method="post" class="absolute top-0 right-0 mt-2 mr-2">
        @csrf
        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-medium rounded-md text-sm px-5 py-2.5">
            Log out
        </button>
    </form>

    <div class="container mx-auto p-8">
        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row justify-between items-center mb-4">
            <h1 class="text-4xl font-bold mb-4 sm:mb-0">ALL ANNOUNCES</h1>
            <div class="flex space-x-2">
                <!-- Add Event Button -->
                <a href="{{ route('events.create') }}" class="bg-blue-500 text-white p-2  mt-8 rounded-md hover:bg-blue-700">
                    Add Event
                </a>
            </div>
        </div>

        <!-- Success Message -->
        @if (session('success'))
            <div class="bg-green-500 text-white p-4 mb-4 rounded-md">
                {{ session('success') }}
            </div>
        @endif

        <!-- Responsive Table -->
        <div class="table-responsive">
            <table class="min-w-full bg-white border border-gray-300 overflow-x-auto">
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
                        @if ($event->user_id === Auth::user()->id)
                            <tr>
                                <!-- Event Details -->
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

                                <!-- Action Buttons -->
                                <td class="py-4 mr-4 flex justify-center space-x-2">
                                    <a href="{{ route('events.update', $event) }}" class="bg-green-500 text-white p-2 rounded-md hover:bg-green-700">
                                        UPDATE
                                    </a>
                                    <form action="{{ route('events.destroy', $event) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white p-2 rounded-md hover:bg-red-700 block sm:inline">
                                            DELETE
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @empty
                        <!-- No Announces Message -->
                        <tr>
                            <td class="py-2 px-4" colspan="9">
                                <h1 class="text-center">No announces to show</h1>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>


        <h5>les liste d'attentes</h5>
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4">#ID</th>
                    <th class="py-2 px-4">image</th>
                    <th class="py-2 px-4">name</th>
                    <th class="py-2 px-4">email</th>
                    <th class="py-2 px-4">valid</th>
                    <th class="py-2 px-4">ACTIONS</th>
                </tr>
            </thead>

            <tbody>
                
                @forelse ($reservations as $reservation)
                    <tr>
                        <td class="py-2 px-4">{{ $reservation->id }}</td>
                        <td class="py-2 px-4"><img src="{{ asset($reservation->image) }}" alt="Event Image"
                                class="w-16 h-16 object-cover">
                        </td>
                        <td class="py-2 px-4">{{ $reservation->firstname }} {{ $reservation->lastname }}</td>
                        <td class="py-2 px-4">{{ $reservation->email }}</td>
                        <td class="py-2 px-4">
                        </td>
                        <td class="py-4 mr-4 flex justify-center space-x-2">
                            <form action="{{ route('status.update',$reservation->id ) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit"
                                    class="bg-green-500 text-white p-2 rounded-md hover:bg-green-700">oui</button>
                            </form>
                        </td>
                    </tr>
               
            @empty
                <tr>
                    <td class="py-2 px-4" colspan="9">
                        <h1 class="text-center">No reservation to show</h1>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
