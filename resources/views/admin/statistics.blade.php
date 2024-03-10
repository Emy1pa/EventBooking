@extends('layouts.master')

@section('content')
<header class="p-4 bg-gray-800 text-white">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo or site name can go here -->
        <a href="{{ route('categories.index') }}" class="text-lg font-bold">EventBooking</a>

        <!-- Navigation Links -->
        <nav class="flex space-x-4 items-center">
            <a href="{{ route('categories.index') }}">Categories</a>
            <a href="{{ route('admin.statistics') }}" class="text-blue-300 hover:text-blue-400">Statistics</a>
            <a href="{{ route('users.index') }}">Users</a>
            <form action="/logout" method="post">
                @csrf
                <button type="submit"
                    class="bg-red-500 hover:bg-red-700 text-white font-medium rounded-lg text-sm px-5 py-2.5">
                    Log out
                </button>
            </form>
        </nav>
    </div>
</header>

<div class="container mx-auto mt-10 flex justify-center space-x-8">
    <!-- First Stats Container -->
    <div
        class="w-72 bg-white max-w-xs rounded-md overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-105 cursor-pointer">
        <div class="h-20 bg-red-500 flex items-center justify-between">
            <p class="mr-0 text-white text-lg pl-5">USERS</p>
        </div>
        <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-gray-600">
            <p class="text-gray-500">TOTAL</p>
        </div>
        <p class="py-4 text-3xl ml-5 font-bold">{{ $totalUsers }}</p>
    </div>

    <!-- Second Stats Container -->
    <div
        class="w-72 bg-white max-w-xs rounded-md overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-105 cursor-pointer">
        <div class="h-20 bg-blue-500 flex items-center justify-between">
            <p class="mr-0 text-white text-lg pl-5">CATEGORIES</p>
        </div>
        <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-gray-600">
            <p class="text-gray-500">TOTAL</p>
        </div>
        <p class="py-4 text-3xl ml-5 font-bold">{{ $totalCategories }}</p>
    </div>

    <!-- Third Stats Container with adjusted color for EVENTS -->
    <div
        class="w-72 bg-white max-w-xs rounded-md overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-105 cursor-pointer">
        <div class="h-20 bg-green-500 flex items-center justify-between">
            <p class="mr-0 text-white text-lg pl-5">EVENTS</p>
        </div>
        <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-gray-600">
            <p class="text-gray-500">TOTAL</p>
        </div>
        <p class="py-4 text-3xl ml-5 font-bold">{{ $totalEvents }}</p>
    </div>
</div>
@endsection
