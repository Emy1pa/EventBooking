@extends('layouts.master')

@section('content')
    <div class="container mx-auto p-8">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-4xl font-bold">ALL USERS</h1>
        </div>

        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        #ID
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        FIRSTNAME
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        LASTNAME
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        EMAIL
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        IMAGE
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        PHONE
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        ROLE
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        ACTIONS
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            {{ $user->id }}
                        </td>
                        <td class="text-gray-900 whitespace-no-wrap">
                            {{ $user->firstname }}
                        </td>
                        <td class="text-gray-900 whitespace-no-wrap">
                            {{ $user->lastname }}
                        </td>
                        <td class="text-gray-900 whitespace-no-wrap">
                            {{ $user->email }}
                        </td>
                        <td class="flex-shrink-0 w-10 h-10">
                            <img src="{{ asset($user->image) }}" alt="User Image" class="w-16 h-16 object-cover rounded-full">
                        </td>
                        <td class="text-gray-900 whitespace-no-wrap">
                            {{ $user->phone }}
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            @if ($user->role === 'admin')
                            <span class="text-red-500 font-bold rounded-full bg-red-100 py-1 px-3">{{ $user->role }}</span>
                            @elseif ($user->role === 'organisateur')
                            <span class="text-green-500 font-bold rounded-full bg-green-100 py-1 px-3">{{ $user->role }}</span>
                            @elseif ($user->role === 'utilisateur')
                            <span class="text-orange-500 font-bold rounded-full bg-orange-100 py-1 px-3">{{ $user->role }}</span>
                            @else
                                {{ $user->role }}
                            @endif
                        </td>
                        <td>
                            <button></button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="py-2 px-4" colspan="8">
                            <h1 class="text-center text-gray-500">No users to show</h1>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Add pagination if needed --}}
        {{-- <div class="mt-4">
            {{ $users->links() }}
        </div> --}}
    </div>
@endsection
