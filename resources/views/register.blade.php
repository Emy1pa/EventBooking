@extends('layouts.master')

@section('content')
    <div class="flex h-screen bg-cover bg-center bg-no-repeat" style="background-image: url('images/image1.jpg');">
        <div class="w-full flex items-center justify-center">
            <div class="max-w-2xl m-auto bg-slate-100 rounded p-5 w-4/5 text-white"> 
                <h1 class="text-3xl font-extrabold mb-6 text-center text-[#0037AE]">USER REGISTER</h1>
                @if ($errors->any())
                    <div class="bg-red-500 text-white p-4 mb-4 rounded-md">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="/register" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="flex mb-6">
                        <div class="w-1/3 pr-2">
                            <label class="block mb-2 text-[#0037AE]" for="firstname">FirstName</label>
                            <input id="firstname"
                                class="text-black w-full p-2 border-b-2 outline-none focus:bg-gray-300"
                                type="text" name="firstname" value="{{old('firstname')}}">
                        </div>
                        <div class="w-1/3 px-2">
                            <label class="block mb-2 text-[#0037AE]" for="lastname">LastName</label>
                            <input id="lastname"
                                class="text-black w-full p-2 border-b-2 outline-none focus:bg-gray-300"
                                type="text" name="lastname" value="{{old('lastname')}}">
                        </div>
                        <div class="w-1/3 pl-2">
                            <label class="block mb-2 text-[#0037AE]" for="email">Email</label>
                            <input id="email"
                                class="text-black w-full p-2 border-b-2 outline-none focus:bg-gray-300"
                                type="email" name="email" value="{{old('email')}}">
                        </div>
                    </div>                    
                    <div class="flex mb-6">
                        <div class="w-1/2 pr-2">
                            <label class="block mb-2 text-[#0037AE]" for="password">Password</label>
                            <input
                                class="text-black w-full p-2 border-b-2 outline-none focus:bg-gray-300"
                                type="password" name="password" value="{{old('password')}}">
                        </div>
                        <div class="w-1/2 pl-2">
                            <label class="block mb-2 text-[#0037AE]" for="cpassword"> C_Password</label>
                            <input
                                class="text-black w-full p-2 border-b-2 outline-none focus:bg-gray-300"
                                type="password" name="password_confirmation">
                        </div>
                    </div>
                    
                    <div class="flex mb-6">
                        <div class="w-2/5 pr-2">
                            <label class="block mb-2 text-[#0037AE]" for="image">Your Profile</label>
                            <input type="file" name="image" accept="image/*" class="text-black">
                        </div>
                        <div class="w-2/5 px-2">
                            <label class="block mb-2 text-[#0037AE]" for="phone">Phone</label>
                            <input id="phone" class="text-black w-full p-2 border-b-2 outline-none focus:bg-gray-300 text-[#004DBB]" type="number" name="phone" value="{{old('phone')}}">
                        </div>
                        <div class="w-1/5 pl-2">
                            <label class="block mb-2 text-[#0037AE]" for="role">Role</label>
                            <select name="role" class="w-full p-2 border-b-2 outline-none focus:bg-gray-300 text-[#004DBB]">
                                <option>Selection of roles:</option>
                                <option value="utilisateur">Utilisateur</option>
                                <option value="organisateur">Organisateur</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <input class="w-full bg-[#0037AE] hover:bg-[#004DBB] text-white font-bold py-2 px-4 mb-6 rounded" type="submit" value="REGISTER"> <!-- Updated color to #0037AE and hover color to #004DBB -->
                    </div>
                </form>
                <div class="text-center">
                    <p class="text-[#0037AE]">Already have an account? <a href="/login" class="font-bold text-[#0037AE]">LOGIN HERE</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
