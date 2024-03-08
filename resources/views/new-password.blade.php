@extends('layouts.master')

@section('content')
    <main class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="bg-white p-8 shadow-md rounded-md w-96">
            @if ($errors->any())
                <div class="bg-red-500 text-white p-4 mt-4 rounded-md">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('reset.password.post') }}" method="POST">
                @csrf
                <input type="text" hidden value="{{ $token }}" name="token">
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email"
                        class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-400">
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Enter new password</label>
                    <input type="password" id="password" name="password"
                        class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-400">
                </div>
                <div class="mb-4">
                    <label for="c_password" class="block text-sm font-medium text-gray-700">Confrim new password</label>
                    <input type="password" id="c_password" name="password_confirmation"
                        class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-400">
                </div>

                <button type="submit"
                    class="w-full p-2 bg-blue-600 text-white rounded-md hover:bg-blue-800 focus:outline-none focus:ring focus:border-blue-400">
                    Change Password
                </button>
            </form>
        </div>
    </main>
@endsection
