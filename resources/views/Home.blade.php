@extends('layouts.master')

@section('content')

<div class="container mx-auto md:flex mb-5 px-auto" id="home">
    <div class="md:pt-36 md:w-2/5 pt-20">
        <div class="border-t-8 border-green-500 pb-3 w-40 ms-5 md:ms-0 xl:ms-0"></div>
        <h1 class="text-2xl xl:text-7xl md:text-3xl md:ps-0 xl:ps-0">
            {{ __("messages.h1") }} <span class="text-blue-500">{{ __("messages.h1Span") }}</span></h1>
        <p class="pt-5 text-sm text-justify px-5 md:px-0 xl:px-0 pb-5">{{ __("messages.homeP") }}</p>
        @auth
            <a href="{{ route('appointment') }}" class="cursor-pointer rounded-2xl mt-5 px-4 py-2 bg-blue-500 hover:bg-blue-800 text-white ms-5 md:ms-0 xl:ms-0 text-sm">{{ __("messages.bookNow") }}</a>
        @endauth
        @guest
            <a href="{{ route('appointmentGuest') }}" class="cursor-not-allowed rounded-2xl mt-5 px-4 py-2 bg-gray-400 text-white ms-5 md:ms-0 xl:ms-0 text-sm">{{ __("messages.bookNow") }}</a>
        @endguest
    </div>
    <div class="md:w-1/5"></div>
    <div class="homeImg w-full md:w-1/2 flex items-center justify-center">
        @foreach ($pictures as $picture)
            <img src="{{ asset('' . $picture->homePhoto . '') }}" alt="" class="rounded-full  bg-cover">
        @endforeach
    </div>
    </div>
</div>
{{-- =============  ====================== --}}
<div class="about mt-20 py-20 md:mt-0 bg-blue-100">
    <h1 class="flex justify-center text-2xl font-semibold items-center gap-1">
        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="24px" fill="#3b82f6"><title/><path fill="#3b82f6" d="M12,2A10,10,0,1,0,22,12,10,10,0,0,0,12,2Zm-.5,3A1.5,1.5,0,1,1,10,6.5,1.5,1.5,0,0,1,11.5,5ZM14,18H13a2,2,0,0,1-2-2V12a1,1,0,0,1,0-2h1a1,1,0,0,1,1,1v5h1a1,1,0,0,1,0,2Z"/></svg>
        <span>{{ __("messages.about") }}</span>
    </h1>
    <div class="container mx-auto pt-10 px-5 md:px-0 ">
        <p class="text-justify text-md">
            {{ __("messages.aboutContent") }}
        </p>
    </div>
</div>
{{-- =============  ====================== --}}
<div class="services py-20">
    <h1 class="flex justify-center text-4xl font-bold mb-20 text-black">{{ __("messages.services") }}</h1>
    <div class="grid col-span-1 md:grid-cols-2 container mx-auto gap-3 rounded-2xl">
        <div class="leftService md:col-span-1 mx-5 md:mx-0 shadow-md border-t-4 border-green-300  rounded-xl py-5">
            <h2 class="flex justify-center text-xl font-semibold mb-5">{{ __("messages.services1") }}</h2>
            <p class="text-justify px-3">{{ __("messages.services1C") }}</p>
        </div>
        <div class="rightService col-span-1 mx-5 md:mx-0 shadow-md border-t-4 border-blue-300 rounded-xl py-5">
            <h2 class="flex justify-center text-xl font-semibold mb-5">{{ __("messages.services2") }}</h2>
            <p class="text-justify px-3">{{ __("messages.services2C") }}</p>
        </div>
        <div class="leftService col-span-1 mx-5 md:mx-0 shadow-md border-t-4 border-green-300 rounded-xl py-5">
            <h2 class="flex justify-center text-xl font-semibold mb-5">{{ __("messages.services3") }}</h2>
            <p class="text-justify px-3">{{ __("messages.services3C") }}</p>
        </div>
        <div class="rightService col-span-1 mx-5 md:mx-0 shadow-md border-t-4 border-blue-300 rounded-xl py-5">
            <h2 class="flex justify-center text-xl font-semibold mb-5">{{ __("messages.services4") }}</h2>
            <p class="text-justify px-3">{{ __("messages.services4C") }}</p>
        </div>
    </div>
</div>
{{-- ============= auth bookings ====================== --}}
@auth
<div  id="web3forms__widget" x-data="{ open: true }"  x-init="() => setTimeout(() => open = false, 2000)">

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

@if(session('successLogin'))
    @if (App::isLocale('ar'))
    <script>
        Swal.fire({
            position: 'bottom-end',
            title: '{{ session('successLogin') }}',
            showConfirmButton: false,
            timer: 2500,
            background: 'linear-gradient(90deg, rgba(139, 192, 74, 1) 1%, rgba(0, 116, 217, 1) 60%, rgba(0, 116, 217, 1) 100%)',
            color: 'white',
            toast: true,
            timerProgressBar: true,
        })
    </script>
    @else
    <script>
        Swal.fire({
            position: 'bottom-start',
            title: '{{ session('successLogin') }}',
            showConfirmButton: false,
            timer: 2500,
            background: 'linear-gradient(90deg, rgba(139, 192, 74, 1) 1%, rgba(0, 116, 217, 1) 60%, rgba(0, 116, 217, 1) 100%)',
            color: 'white',
            toast: true,
            timerProgressBar: true,
        })
    </script>
    @endif
@endif

<script>

    // const observer = new IntersectionObserver((entries) => { entries.forEach((entry) => {

    //     if (entry.isIntersecting) {
    //         entry.target.classList.add('show');
    //     } else {
    //        entry.target.classList.remove('show');
    //     }
    // });
    // });
    // const hiddenElements = document.querySelectorAll('.hide');
    // hiddenElements.forEach((el) => observer.observe (el));



    let li1 = document.getElementById("li1");
    li1.classList.add("active", "bg-green-500/50", "p-2", "rounded-md", "font-semibold");


    let li1s = document.getElementById("li1s");
    li1s.classList.add("text-green-500");

</script>
@endsection

