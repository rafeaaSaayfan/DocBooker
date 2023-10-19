@extends('layouts.master')

@section('content')

    <div class="container mx-auto pt-28">
        <h1 class="text-2xl font-semibold text-center">{{ __("messages.clinic") }}</h1>
    </div>
    <div class="container mx-auto grid md:grid-cols-5 gap-0 py-10 mb-10">
        <div class="md:col-span-5 bg-blue-100 py-10 px-5">
            <h1 class="text-xl text-blue-500 pb-5">{{ __("messages.ourClinic") }}</h1>
            <li class="pb-5 text-sm px-2 text-justify">
                {{ __("messages.clinicContent1") }}
            </li>
            <li class="pb-5 text-sm px-2 text-justify">
                {{ __("messages.clinicContent2") }}
            </li>
        </div>
        @foreach ($pictures as $picture)
        <div class="md:col-span-5">
            <img src="{{ asset('' . $picture->clinic1 . '') }}" alt="" class="">
        </div>
        <div class="md:col-span-3">
            <img src="{{ asset('' . $picture->clinic2 . '') }}" alt="" class="">
        </div>
        <div class="md:col-span-2 grid grid-cols-1">
            <div class="col-span-1 bg-blue-100">
            <img src="{{ asset('' . $picture->clinic3 . '') }}" alt="" class="">
            </div>
            <div class="col-span-1 px-5 py-5 bg-blue-100">
                <li>
                    {{ __("messages.clinicContent3") }}
                </li>
            </div>
        </div>
        @endforeach
        <div class="bg-white md:col-span-5 border-t border-black mt-10">
            <h2 class="text-2xl font-semibold my-5 md:px-0 px-2 text-blue-500">{{ __("messages.location") }}</h2>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d706.3361623623599!2d35.441101905890584!3d33.64432243381278!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151ee38444604e59%3A0x26c8a1d31c95b345!2sWissam%20-%20Pharmacy!5e0!3m2!1sen!2slb!4v1692803992961!5m2!1sen!2slb"
               width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
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
        let li3 = document.getElementById("li3");
        li3.classList.add("active", "border-b-2", "border-green-600", "pb-2", "font-semibold");


        let li3s = document.getElementById("li3s");
        li3s.classList.add("text-green-500");

    </script>
@endsection
