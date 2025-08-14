@extends('layouts.master')

@section('content')
    <div class="container mx-auto px-2 md:px-0 mt-5 py-20 bg-white shadow-2xl">
        <div class="mx-auto w-full shadow md:w-9/12 p-3 md:p-8 bg-blue-100 rounded-xl">
            <h1 class="md:text-3xl text-xl font-medium">{{ __("messages.nav.contact") }}</h1>
            <p class="mt-3 text-sm text-green-600">{{ __("messages.contactP") }}</p>
            <form action="{{ route('message') }}" method="POST" class="mt-10 shadow border-1 py-8 px-3 md:p-6 bg-white rounded-xl">
                @csrf
                @method('post')
                <div class="grid md:gap-16 gap-10">
                    <div class="relative z-0 col-span-2">
                        <textarea name="message" rows="5" class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-1 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0" placeholder=" "></textarea>
                        <label class="absolute top-1 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 @if (App::isLocale('en')) peer-focus:left-0 @endif @if (App::isLocale('ar')) peer-focus:-right-2.5 @endif peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600">{{ __("messages.message") }}</label>
                    </div>
                </div>
                @if ($errors->has('message'))
                    <p class="text-red-500 text-sm mb-3 mt-1">{{ $errors->first('message') }}</p>
                @endif
                <button type="submit" class="text-sm mt-8 rounded-md hover:bg-blue-900 bg-blue-500 px-8 py-2 text-white">{{ __("messages.sendMessage") }}</button>
            </form>
        </div>
        <div class="border-t border-gray-300 pt-10 mt-10">
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
                    <p class="@if (App::isLocale('ar')) ltr @endif">
                        {{ $info->phone }}
                    </p>
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

@if(session('messageSent'))
    @if (App::isLocale('ar'))
    <script>
        Swal.fire({
            position: 'bottom-end',
            title: '{{ session('messageSent') }}',
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
            title: '{{ session('messageSent') }}',
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

        let li4 = document.getElementById("li4");
        li4.classList.add("active", "bg-green-500/50", "p-2", "rounded-md", "font-semibold");


        let li4s = document.getElementById("li4s");
        li4s.classList.add("text-green-500");

    </script>
@endsection
