@extends('layouts.master')

@section('content')
<main class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white p-8 shadow-md rounded-md w-96">
        @if (session('success'))
            <div class="bg-green-500 text-white p-4 mt-4 rounded-md">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
                <div class="bg-red-500 text-white p-4 mt-4 rounded-md">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <p class="mb-4 text-gray-600">We will send a link to your email. Use that link to reset your password.</p>
        
        <form action="{{ route('forget.password.post') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-400">
            </div>

            <button type="submit" class="w-full p-2 bg-blue-600 text-white rounded-md hover:bg-blue-800 focus:outline-none focus:ring focus:border-blue-400">
                Send Reset Link
            </button>
        </form>
    </div>
</main>
@endsection
