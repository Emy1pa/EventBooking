@extends('layouts.master')

@section('content')
<div class="min-h-screen flex mx-auto p-4 bg-cover bg-center bg-repeat"
        style="background-image: url('/images/image1.jpg');">
        <form action="{{ route('categories.update', $category) }}" method="POST" enctype="multipart/form-data"
              class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
            @csrf
            @method('PUT')
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
                <input type="text" id="title" name="title" value="{{ old('title', $category->title) }}"
       class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300">

            </div>
            <button type="submit"
                class="w-full p-2 bg-blue-500 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring focus:border-blue-300">
                edit
            </button>
        </form>
    </div>
@endsection