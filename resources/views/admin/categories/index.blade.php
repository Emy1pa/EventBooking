@extends('layouts.master')

@section('content')
<header class="p-4 bg-gray-800 text-white">
    <div class="container mx-auto flex flex-col md:flex-row justify-between items-center">
        <!-- Logo or site name can go here -->
        <a href="{{ route('categories.index') }}" class="text-lg font-bold mb-4 md:mb-0">EventBooking</a>

        
        <nav class="flex flex-col md:flex-row md:space-x-4 items-center">
            <a href="{{ route('categories.index') }}" class="text-blue-300 hover:text-blue-400 mb-2 md:mb-0">Categories</a>
            <a href="{{ route('admin.statistics') }}" class="mb-2 md:mb-0">Statistics</a>
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

<div class="container mx-auto p-4 md:p-8">
    <div class="flex justify-end mb-4">
        <a href="{{ route('categories.create') }}" class="bg-blue-500 text-white p-2 rounded-md hover:bg-blue-700">Add Category</a>
    </div>
    <h1 class="text-2xl md:text-4xl font-bold mb-4">Categories</h1>

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
                    <th class="py-2 px-4">NAME</th>
                    <th class="py-2 px-4">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td class="py-2 px-4">{{ $category->id }}</td>
                        <td class="py-2 px-4 text-red">{{ $category->title }}</td>
                        <td class="py-4 flex justify-center space-x-2">
                            <a href="{{ route('categories.edit', $category) }}"
                                class="bg-green-500 text-white p-2 rounded-md hover:bg-green-700">
                                UPDATE
                            </a>
                            <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-700 text-white p-2 rounded-md block sm:inline">DELETE</button>
                            </form>
                            <a href="{{ route('categories.show', $category) }}"
                                class="bg-blue-500 text-white p-2 rounded-md hover:bg-blue-700">
                                SHOW
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="py-2 px-4" colspan="3">
                            <h1 class="text-center">No categories to show</h1>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $categories->links() }}
    </div>
</div>
@endsection
