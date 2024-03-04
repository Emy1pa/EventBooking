@extends('layouts.master')
@section('content')
    <section class="relative bg-[url(images/image1.jpg)] bg-cover bg-center bg-no-repeat min-h-screen">
        <button class="flex justify-center py-2 text-white z-20 ml-auto">
            <a href="login" class="bg-[#014AE8] rounded inline-block px-4 py-1 text-sm font-medium mr-8">LOGIN</a>
        </button>
        <div class=" inset-0 bg-white/75 sm:bg-transparent sm:from-white/95 sm:to-white/25 ltr:sm:bg-gradient-to-r rtl:sm:bg-gradient-to-l"></div>

        <div class="relative mx-auto max-w-screen-xl px-4 py-32 sm:px-6 lg:flex lg:h-screen lg:items-center lg:px-8 justify-center items-center">
            <div class="max-w-xl text-center ltr:sm:text-left rtl:sm:text-right">
                <div class="bg-black bg-opacity-50 p-6 rounded">
                    <h1 class="text-2xl font-extrabold sm:text-3xl text-white">
                        THE BIGGEST EVENT BOOKING PLATFORM
                        <strong class="block font-extrabold text-[#04BB83] text-4xl mt-2"> [ COMING SOON ].
                        </strong>
                    </h1>

                    <p class="mt-2 max-w-lg sm:text-xl/relaxed text-white">
                        "Embark on a seamless journey of event discovery and reservation with our cutting-edge platform.
                        We bring you a world where every event is at your fingertips, offering a hassle-free experience
                        from exploration to booking."
                    </p>

                    <div class="mt-4 text-center">
                        <a href="/registerr"
                            class="block rounded bg-[#014AE8] px-12 py-3 text-sm font-medium text-white shadow hover:bg-[#0037AE] focus:outline-none focus:ring active:bg-[#76431C] sm:w-auto">
                            JOIN US
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection


