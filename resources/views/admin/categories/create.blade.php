@extends('layouts.master')

@section('content')
@if (session('success'))
    <div class="bg-green-500 text-white p-4 mb-4 rounded-md">
        {{ session('success') }}
    </div>
@endif
<div class="min-h-screen flex mx-auto p-4 bg-cover bg-center bg-repeat"
    style="background-image: url('/images/image1.jpg'); margin-bottom: 20px;">
    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data"
        class="max-w-md mx-auto bg-gray-200 p-8 rounded-md shadow-md">
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

        <div class="mb-6">
            <label for="title" class="block text-2xl font-semibold text-gray-800">Category Title:</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}"
                class="mt-2 p-4 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-400">
        </div>

        <button type="submit"
            class="w-full p-4 bg-blue-600 text-white rounded-md hover:bg-blue-800 focus:outline-none focus:ring focus:border-blue-400">
            Create Category
        </button>
    </form>
</div>
</div>
@endsection
