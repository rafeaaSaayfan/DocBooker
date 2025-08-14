@extends('layouts.master')

@section('content')
    @php
        $doctorName = '';
    @endphp
    @foreach ($DocInfo as $item)
        @php
            $doctorName = $item->firstName . ' ' . $item->lastName;
        @endphp
    @endforeach
    <div class="container mx-auto bg-transparent pt-20 shadow-2xl rounded-md">
        @doctor
            <div class="dashboard px-5 w-fit">
                <a href="{{ route('dashboard') }}" class="text-blue-500 text-sm underline underline-offset-2 flex items-center gap-2">
                    <span>
                        <svg viewBox="0 0 48 48" width="22" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h48v48h-48z" fill="none"/>
                            <path d="M6 26h16v-20h-16v20zm0 16h16v-12h-16v12zm20 0h16v-20h-16v20zm0-36v12h16v-12h-16z"/>
                        </svg>
                    </span>
                    <p>
                        {{ __("messages.dashboard") }}
                    </p>
                </a>
            </div>
        @enddoctor
        <div class="flex items-center justify-center pt-8">
            @foreach ($pictures as $picture)
                <img src="{{ asset('' . $picture->ourDocPhoto . '') }}" alt="Doctor's Photo" class="w-64 h-64 md:w-96 md:h-96 object-cover rounded-full">
            @endforeach
        </div>
        <h1 class="xl:text-2xl text-xl font-semibold text-center pt-5 pb-2">Dr. {{ $doctorName }}</h1>
        <p class="text-gray-600 text-center mb-16">Board-Certified Cardiologist</p>

        <div class="border-t border-gray-300 py-10 text-center">
            <h2 class="text-lg font-semibold mb-4 text-blue-500">About Dr. {{ $doctorName }}
            </h2>
            <p class="text-gray-700 px-10 text-justify">
                Dr. {{ $doctorName }} is a highly skilled cardiologist with over 15 years of experience...
                {{ __("messages.aboutContent") }}
            </p>
        </div>
        <div class="certificate border-t border-gray-300 text-center py-10 flex flex-col justify-center items-center">
            <h2 class="text-xl font-semibold text-blue-500 pb-5">{{ __("messages.certificate") }}</h2>
            <img src="{{ asset('/images/certificate.jpg') }}" alt="">
        </div>
        <div class="border-t border-gray-300 py-10 ">
            <h2 class="text-lg font-semibold mb-8 text-blue-500 text-center">{{ __("messages.contact") }}</h2>
            <div class="grid grid-cols-3 mx-5 gap-5">
                <div class="col-span-3 md:col-span-1 shadow-md py-10 text-center border-t-2 border-blue-300">
                    <div class="flex items-center gap-2 justify-center mb-4">
                        <svg class="feather feather-phone stroke-blue-500 fill-none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="22" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                        </svg>
                        <p class="text-gray-700">{{ __("messages.phone") }}</p>
                    </div>
                    @foreach ($DocInfo as $info)
                    <span>
                        {{ $info->phone }}
                    </span>
                    <p class="pt-3">
                        <a href="tel:{{ $info->phone }}" class="text-blue-500 underline underline-offset-4">{{ __("messages.callNow") }}</a>
                    </p>
                </div>
                <div class="col-span-3 md:col-span-1 shadow-md py-10 text-center border-t-2 border-blue-300">
                    <div class="flex items-center gap-2 justify-center mb-4">
                        <svg width="22" class="fill-blue-500" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg"><title/><g data-name="8-Email" id="_8-Email">
                            <path d="M45,7H3a3,3,0,0,0-3,3V38a3,3,0,0,0,3,3H45a3,3,0,0,0,3-3V10A3,3,0,0,0,45,7Zm-.64,2L24,24.74,3.64,9ZM2,37.59V10.26L17.41,22.17ZM3.41,39,19,23.41l4.38,3.39a1,1,0,0,0,1.22,0L29,23.41,44.59,39ZM46,37.59,30.59,22.17,46,10.26Z"/></g>
                        </svg>
                        <p class="text-gray-700">{{ __("messages.Emailcontact") }}</p>
                    </div>
                    <span>
                        {{ $info->email }}
                    </span>
                    <p class="pt-3">
                        <a href="mailto: {{ $info->email }}" class="text-blue-500 underline underline-offset-4">{{ __("messages.emailNow") }}</a>
                    </p>
                    @endforeach
                </div>
                <div class="col-span-3 md:col-span-1 shadow-md py-10 border-t-2 border-blue-300 flex flex-col items-center justify-center">
                    <div class="flex gap-2 items-center mb-4">
                        <svg viewBox="0 0 48 48" width="22" xmlns="http://www.w3.org/2000/svg" class="fill-blue-500">
                            <path d="M24 4c-7.73 0-14 6.27-14 14 0 10.5 14 26 14 26s14-15.5 14-26c0-7.73-6.27-14-14-14zm0 19c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5z"/>
                            <path d="M0 0h48v48h-48z" fill="none"/>
                        </svg>
                        <p>{{ __('messages.location') }}:</p>
                    </div>
                    <p class="text-gray-700">Barja, Lebanon</p>
                    <a href="https://maps.app.goo.gl/c5TyZbcvuQok1yCj7" target="_blank" class="text-blue-500 underline underline-offset-4 pt-3">
                        {{ __('messages.seeLocation') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

    @auth
    <div  id="web3forms__widget" x-data="{ open: false }"  x-init="() => setTimeout(() => open = false, 2000)">

        <div id="w3f__widget--content"
        x-show="open"
        x-transition:enter-start="opacity-0 translate-y-5"
        x-transition:enter="transition duration-200 transform ease"
        x-transition:leave="transition duration-200 transform ease"
        x-transition:leave-end="opacity-0 translate-y-5"
        @click.away="open = false"
        class="fixed flex flex-col z-50 bottom-[100px] top-0 right-0 h-auto left-0 sm:top-auto sm:right-5 sm:left-auto h-[calc(100%-95px)] w-full sm:w-[350px] overflow-auto max-h-[500px] sm:h-[600px] shadow-2xl rounded-md"
        >
        <div class="contact-title flex px-5 py-2 flex-col justify-center items-center h-32 bg-gray-900 z-20">
        <h3 class="text-lg py-4 text-blue-500">{{ __('messages.bookingHere') }}</h3>
        </div>
        {{-- content --}}
        <div class="bg-gray-900 flex-grow">
            @if ($authBookings)
            @foreach($authBookings as $item)
                <hr>
                <div class="text-white rounded-xl px-5 py-5">
                    <p class="pb-1 @if (App::isLocale('ar')) ltr @endif">{{ $item['date'] }}</p>
                    <p class="pb-1 @if (App::isLocale('ar')) ltr @endif">{{ $item['start_date'] }} -> {{ $item['end_date'] }}</p>
                    <p class="text-red-500">{{ $item['differenceDate'] }}</p>
                </div>
                <hr>
            @endforeach
            @else
                <p class="text-white text-center">{{ __('messages.noBooking') }}</p>
            @endif
        </div>
        {{-- ===== --}}
        </div>
        <button
        id="w3f__widget--btn"
        @click="open = !open"
        class="btn-booking fixed z-40 right-5 bottom-5 shadow-lg flex justify-center items-center w-14 h-14 rounded-full focus:outline-none transition duration-300 ease"
        >
        <svg
        class="w-7 h-7 text-white absolute fill-white"
        x-show="!open"
        x-transition:enter-start="opacity-0 -rotate-45 scale-75"
        x-transition:enter="transition duration-200 transform ease"
        x-transition:leave="transition duration-100 transform ease"
        x-transition:leave-end="opacity-0 -rotate-45"
        data-name="Layer 1" id="Layer_1" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title/>
        <path d="M18,5V3a1,1,0,0,0-2,0V5H8V3A1,1,0,0,0,6,3V5H2V21H22V5Zm2,14H4V7H20Zm-8-7a1.5,1.5,0,1,0-1.5-1.5A1.5,1.5,0,0,0,12,12Zm3,2.21a5.35,5.35,0,0,0-6,0V16h6Z"/>
        </svg>

        <svg
            class="w-7 h-7 text-white absolute"
            x-show="open"
            x-transition:enter-start="opacity-0 rotate-45 scale-75"
            x-transition:enter="transition duration-200 transform ease"
            x-transition:leave="transition duration-100 transform ease"
            x-transition:leave-end="opacity-0 rotate-45"
            xmlns="http://www.w3.org/2000/svg"
            width="16"
            height="16"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
        >
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
        </button>

    </div>
    @endauth

    <script>
        let li5 = document.getElementById("li5");
        li5.classList.add("active", "bg-green-500/50", "p-2", "rounded-md", "font-semibold");


        let li5s = document.getElementById("li5s");
        li5s.classList.add("text-green-500");
    </script>
@endsection
