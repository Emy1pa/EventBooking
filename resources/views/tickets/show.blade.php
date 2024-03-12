@extends('layouts.master')

@section('content')
    <div class="container mx-auto p-8">
        <h1 class="text-4xl font-bold mb-4">Your Ticket</h1>
        <p class="text-lg">Ticket Number: {{ $reservation->created_at->format('YmdHis') }}</p>

        <div class="mt-4">
            <p class="text-lg"><strong>Event:</strong> {{ $reservation->event->title }}</p>
            <p class="text-lg"><strong>Date:</strong> {{ $reservation->event->date }}</p>
            <p class="text-lg"><strong>Location:</strong> {{ $reservation->event->location }}</p>

        </div>
    </div>
@endsection
