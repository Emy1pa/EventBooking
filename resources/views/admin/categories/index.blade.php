@extends('layouts.master')

@section('content')
<header class="p-4">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo or site name can go here -->
        <a href="" class="text-lg font-bold">EventBooking</a>

        <!-- Navigation Links -->
        <nav class="flex space-x-4">
            <a href="{{ route('categories.index') }}">Categories</a>
            <a href="#">Statistics</a>
            <a href="#">Users</a>
            <a href="#">Log Out</a>
        </nav>
    </div>
</header>


    <div class="container mx-auto p-8">
        <div class="flex justify-end mb-4">
            <a href="{{ route('categories.create') }}" class="bg-blue-500 text-white p-2 rounded-md hover:bg-blue-700">Add Category</a>
        </div>
        <h1 class="text-4xl font-bold mb-8">Categories</h1>

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
                                        class="bg-red-500 text-white p-2 rounded-md hover:bg-red-700 block sm:inline">DELETE</button>
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
