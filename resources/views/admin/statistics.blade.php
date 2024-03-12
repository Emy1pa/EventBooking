@extends('layouts.master')

@section('content')
<header class="p-4 bg-gray-800 text-white">
    <div class="container mx-auto flex flex-col md:flex-row justify-between items-center">
        <!-- Logo or site name can go here -->
        <a href="{{ route('categories.index') }}" class="text-lg font-bold mb-4 md:mb-0">EventBooking</a>

        <!-- Navigation Links -->
        <nav class="flex flex-col md:flex-row md:space-x-4 items-center">
            <a href="{{ route('categories.index') }}" class="mb-2 md:mb-0">Categories</a>
            <a href="{{ route('admin.statistics') }}" class="text-blue-300 hover:text-blue-400 mb-2 md:mb-0">Statistics</a>
            <a href="{{ route('users.index') }}" class="mb-2 md:mb-0">Users</a>
            <a href="{{ route('admin.events.index') }}" class="mb-2 md:mb-0">Events Approval</a>
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-medium rounded-lg text-sm px-5 py-2.5">
                    Log out
                </button>
            </form>
        </nav>
    </div>
</header>

<div class="container mx-auto mt-10 flex flex-wrap justify-center space-y-4 md:space-x-8 md:space-y-0">
    <!-- First Stats Container -->
    <div class="w-full md:w-72 bg-white max-w-xs rounded-md overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-105 cursor-pointer">
        <div class="h-20 bg-red-500 flex items-center justify-between">
            <p class="mr-0 text-white text-lg pl-5">USERS</p>
        </div>
        <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-gray-600">
            <p class="text-gray-500">TOTAL</p>
        </div>
        <p class="py-4 text-3xl ml-5 font-bold">{{ $totalUsers }}</p>
    </div>

    <!-- Second Stats Container -->
    <div class="w-full md:w-72 bg-white max-w-xs rounded-md overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-105 cursor-pointer">
        <div class="h-20 bg-blue-500 flex items-center justify-between">
            <p class="mr-0 text-white text-lg pl-5">CATEGORIES</p>
        </div>
        <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-gray-600">
            <p class="text-gray-500">TOTAL</p>
        </div>
        <p class="py-4 text-3xl ml-5 font-bold">{{ $totalCategories }}</p>
    </div>

    <!-- Third Stats Container for EVENTS -->
    <div class="w-full md:w-72 bg-white max-w-xs rounded-md overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-105 cursor-pointer">
        <div class="h-20 bg-green-500 flex items-center justify-between">
            <p class="mr-0 text-white text-lg pl-5">EVENTS</p>
        </div>
        <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-gray-600">
            <p class="text-gray-500">TOTAL</p>
        </div>
        <p class="py-4 text-3xl ml-5 font-bold">{{ $totalEvents }}</p>
    </div>

    <!-- Fourth Stats Container for RESERVATIONS -->
    <div class="w-full md:w-72 bg-white max-w-xs rounded-md overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-105 cursor-pointer">
        <div class="h-20 bg-indigo-500 flex items-center justify-between">
            <p class="mr-0 text-white text-lg pl-5">RESERVATIONS</p>
        </div>
        <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-gray-600">
            <p class="text-gray-500">TOTAL</p>
        </div>
        <p class="py-4 text-3xl ml-5 font-bold">{{ $totalReservations }}</p>
    </div>
</div>
@endsection
