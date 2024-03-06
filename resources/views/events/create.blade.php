@extends('layouts.master')

@section('content')
@if (session('success'))
    <div class="bg-green-500 text-white p-4 mb-4 rounded-md">
        {{ session('success') }}
    </div>
@endif
    <div class="min-h-screen flex mx-auto p-4 bg-cover bg-center bg-repeat"
        style="background-image: url('/images/image1.jpg');">
        <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data"
              class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
            @csrf

            @if ($errors->any())
                <div class="bg-red-500 text-white p-4 mb-4 rounded-md">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="mb-4">
                <label for="title" class="block text-sm font-semibold text-gray-600">Title:</label>
                <input type="text" id="title" name="title" value="{{old('title')}}"
                    class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-semibold text-gray-600">Description:</label>
                <textarea id="description" name="description" rows="3" 
                          class="mt-1 p-2 w-full border rounded-md resize-none focus:outline-none focus:ring focus:border-blue-300 resize-none">
                          {{old('description')}}</textarea>
            </div>
            
            <div class="mb-4 flex space-x-4">
                <div class="w-1/2">
                    <label for="image" class="block text-sm font-semibold text-gray-600">Image:</label>
                    <input type="file" id="image" name="image" accept="image/*" 
                        class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300">
                </div>
                <div class="w-1/2">
                    <label for="date" class="block text-sm font-semibold text-gray-600">Date:</label>
                    <input type="date" id="date" name="date" value="{{old('date')}}" 
                        class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300">
                </div>
            </div>
            <div class="mb-4 flex space-x-4">
                <div class="w-1/2">
                    <label for="location" class="block text-sm font-semibold text-gray-600">Location:</label>
                    <input type="text" id="location" name="location" value="{{old('location')}}" 
                        class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300">
                </div>
                <div class="w-1/2">
                    <label for="availablePlaces" class="block text-sm font-semibold text-gray-600">Available Places:</label>
                    <input type="text" id="AvailablePlaces" name="availablePlaces" value="{{old('availablePlaces')}}" 
                        class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300">
                </div>
            </div>
            <div class="mb-6">
                <label for="category_id" class="block text-1xl font-semibold text-gray-800">Category:</label>
                <select id="category_id" name="category_id"
                    class="mt-2 p-4 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-400">
                    <option value="">Please choose your category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit"
                class="w-full p-2 bg-blue-500 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring focus:border-blue-300">
                create
            </button>
        </form>
    </div>
@endsection
