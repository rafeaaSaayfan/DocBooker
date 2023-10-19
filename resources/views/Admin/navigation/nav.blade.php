<div class=" md:min-h-screen w-full">
    <div @click.away="open = false" class="fixed top-0 z-20 md:min-h-screen flex flex-col w-full md:w-1/4 xl:w-1/6 bg-gray-900 flex-shrink-0" x-data="{ open: false }">
        <div class="flex-shrink-0 px-4 py-4 flex flex-row items-center justify-between">
            <a href="{{ route('auth') }}" class="docbooker text-lg font-bold tracking-widest rounded-lg flex items-center gap-1">
                <svg class="fill-blue-500 @if (App::isLocale('en')) transform rotate-180 fill-green-500 @endif" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="22px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <polygon points="160,115.4 180.7,96 352,256 180.7,416 160,396.7 310.5,256 "/>
                </svg>
                {{ __("messages.websiteName") }}
            </a>
            <button class="rounded-lg md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
                <svg fill="#ffff" viewBox="0 0 20 20" class="w-6 h-6">
                    <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <nav :class="{'block': open, 'hidden': !open}" class="flex-grow md:block px-4 pb-4 md:pb-0 md:overflow-y-auto">
            <a class="block px-4 py-2 mt-2 text-sm font-semibold text-white hover:bg-blue-500 rounded-lg flex items-center gap-2 transition-colors cursor-pointer" href="{{ route('dashboard') }}" id="addPatientBtn">
                <svg class="fill-white" baseProfile="tiny" id="Layer_1" version="1.2" viewBox="0 0 24 24" width="22px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <path d="M9,14c1.381,0,2.631-0.56,3.536-1.465C13.44,11.631,14,10.381,14,9s-0.56-2.631-1.464-3.535C11.631,4.56,10.381,4,9,4  S6.369,4.56,5.464,5.465C4.56,6.369,4,7.619,4,9s0.56,2.631,1.464,3.535C6.369,13.44,7.619,14,9,14z"/>
                    <path d="M9,21c3.518,0,6-1,6-2c0-2-2.354-4-6-4c-3.75,0-6,2-6,4C3,20,5.25,21,9,21z"/>
                    <path d="M21,12h-2v-2c0-0.553-0.447-1-1-1s-1,0.447-1,1v2h-2c-0.553,0-1,0.447-1,1s0.447,1,1,1h2v2c0,0.553,0.447,1,1,1s1-0.447,1-1  v-2h2c0.553,0,1-0.447,1-1S21.553,12,21,12z"/>
                </svg>
                {{ __("messages.addPatient") }}
            </a>
            <a class="block px-4 py-2 mt-2 text-sm font-semibold text-white hover:bg-blue-500 rounded-lg flex items-center gap-2 transition-colors cursor-pointer" href="{{ route('search') }}" id="searchBtn">
                <svg class="@if (App::isLocale('ar')) transform rotate-90 @endif" enable-background="new 0 0 50 50" id="Layer_1" version="1.1" viewBox="0 0 50 50" width="22px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <rect fill="none" height="50" width="50"/>
                    <circle cx="21" cy="20" fill="none" r="16" class="stroke-white" stroke-linecap="round" stroke-miterlimit="10" stroke-width="3"/>
                    <line fill="none" class="stroke-white" stroke-miterlimit="10" stroke-width="3" x1="32.229" x2="45.5" y1="32.229" y2="45.5"/>
                </svg>
                {{ __("messages.search") }}
            </a>
            <a class="block px-4 py-2 mt-2 text-sm font-semibold text-white hover:bg-blue-500 rounded-lg flex items-center gap-2 transition-colors cursor-pointer" href="{{ route('DashAppointment') }}" id="appointmentBtn">
                <svg width="22" class="fill-white" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="223.7983" cy="215.7292" r="16.4529" transform="translate(-61.1534 339.9361) rotate(-67.5)"/>
                    <circle cx="130.8293" cy="215.7292" r="16.4529"/><circle cx="316.7671" cy="215.7292" r="16.4529"/>
                    <circle cx="223.7983" cy="293.4321" r="16.4529" transform="translate(-132.9415 387.9034) rotate(-67.5)"/>
                    <circle cx="130.8293" cy="293.4321" r="16.4529"/>
                    <path d="M402.6875,254.4266V116.0352A25.9656,25.9656,0,0,0,376.751,90.0986h-51.13V62.3945h-13V90.0986H134.4746V62.3945h-13V90.0986h-51.13a25.9656,25.9656,0,0,0-25.9365,25.9366v31.8837a6.4758,6.4758,0,0,0,.501,2.5032v197.155a25.9655,25.9655,0,0,0,25.9365,25.9366H268.8589A100.9158,100.9158,0,1,0,402.6875,254.4266ZM70.8457,360.5137a12.9517,12.9517,0,0,1-12.9365-12.9366V154.4189H389.6875v96.01A100.9113,100.9113,0,0,0,266.4626,360.5137Zm351.9414,11.8828a1.5,1.5,0,0,1-1.5,1.5H391.8828V403.3a1.5,1.5,0,0,1-1.5,1.5H342.9746a1.5,1.5,0,0,1-1.5-1.5V373.8965H312.0713a1.4883,1.4883,0,0,1-.9922-.3831,1.5425,1.5425,0,0,1-.2085-.2263l-.0015-.0017a1.5319,1.5319,0,0,1-.1489-.248l-.0127-.0234a1.4709,1.4709,0,0,1-.0849-.2483c-.0044-.0178-.0122-.0343-.0162-.0523a1.4753,1.4753,0,0,1-.0351-.3169V324.9883a1.5,1.5,0,0,1,1.5-1.5h29.4033V294.085a1.5,1.5,0,0,1,1.5-1.5h47.4082a1.5,1.5,0,0,1,1.5,1.5v29.4033h29.4043a1.5,1.5,0,0,1,1.5,1.5Z"/>
                </svg>
                {{ __("messages.nav.apoin") }}
            </a>
            <a class="block px-4 py-2 mt-2 text-sm font-semibold text-white hover:bg-blue-500 rounded-lg flex items-center gap-2 transition-colors cursor-pointer" href="{{ route('messages') }}" id="messagesBtn">
                <svg width="22" class="fill-white" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg"><title/><g data-name="8-Email" id="_8-Email">
                    <path d="M45,7H3a3,3,0,0,0-3,3V38a3,3,0,0,0,3,3H45a3,3,0,0,0,3-3V10A3,3,0,0,0,45,7Zm-.64,2L24,24.74,3.64,9ZM2,37.59V10.26L17.41,22.17ZM3.41,39,19,23.41l4.38,3.39a1,1,0,0,0,1.22,0L29,23.41,44.59,39ZM46,37.59,30.59,22.17,46,10.26Z"/></g>
                </svg>
                {{ __("messages.Messages") }}
            </a>
            <div class="mt-5 border-b border-gray-600 text-gray-600">
                {{ __("messages.Setting") }}
            </div>
            <a class="block px-4 py-2 mt-2 text-sm font-semibold text-white hover:bg-blue-500 rounded-lg flex items-center gap-2 transition-colors cursor-pointer" href="{{ route('profile') }}" id="profileBtn">
                <svg class="fill-white" width="22" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><title/>
                    <g id="about"><path d="M16,16A7,7,0,1,0,9,9,7,7,0,0,0,16,16ZM16,4a5,5,0,1,1-5,5A5,5,0,0,1,16,4Z"/>
                    <path d="M17,18H15A11,11,0,0,0,4,29a1,1,0,0,0,1,1H27a1,1,0,0,0,1-1A11,11,0,0,0,17,18ZM6.06,28A9,9,0,0,1,15,20h2a9,9,0,0,1,8.94,8Z"/></g>
                </svg>
                {{ __("messages.Profile") }}
            </a>
            <div class="">
                <ul class="flex flex-wrap items-center h-10">
                    <li class="relative w-full" x-data="{showChildren:false}" @mouseleave="showChildren=false" @mouseenter="showChildren=true">
                        <a class="flex items-center block px-4 py-2 mt-2 text-sm font-semibold text-white rounded-lg hover:bg-blue-500 no-underline hover:no-underline transition-colors duration-100 cursor-pointer gap-2">
                            <svg class="w-5 h-5 rounded-full" version="1.1" viewBox="0 0 20 20" width="22px" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" xmlns:xlink="http://www.w3.org/1999/xlink"><title/><desc/><defs/><g fill="none" fill-rule="evenodd" id="Page-1" stroke="none" stroke-width="1"><g class="fill-white" id="Core" transform="translate(-296.000000, -296.000000)"><g id="language" transform="translate(296.000000, 296.000000)"><path d="M10,0 C4.5,0 0,4.5 0,10 C0,15.5 4.5,20 10,20 C15.5,20 20,15.5 20,10 C20,4.5 15.5,0 10,0 L10,0 Z M16.9,6 L14,6 C13.7,4.7 13.2,3.6 12.6,2.4 C14.4,3.1 16,4.3 16.9,6 L16.9,6 Z M10,2 C10.8,3.2 11.5,4.5 11.9,6 L8.1,6 C8.5,4.6 9.2,3.2 10,2 L10,2 Z M2.3,12 C2.1,11.4 2,10.7 2,10 C2,9.3 2.1,8.6 2.3,8 L5.7,8 C5.6,8.7 5.6,9.3 5.6,10 C5.6,10.7 5.7,11.3 5.7,12 L2.3,12 L2.3,12 Z M3.1,14 L6,14 C6.3,15.3 6.8,16.4 7.4,17.6 C5.6,16.9 4,15.7 3.1,14 L3.1,14 Z M6,6 L3.1,6 C4.1,4.3 5.6,3.1 7.4,2.4 C6.8,3.6 6.3,4.7 6,6 L6,6 Z M10,18 C9.2,16.8 8.5,15.5 8.1,14 L11.9,14 C11.5,15.4 10.8,16.8 10,18 L10,18 Z M12.3,12 L7.7,12 C7.6,11.3 7.5,10.7 7.5,10 C7.5,9.3 7.6,8.7 7.7,8 L12.4,8 C12.5,8.7 12.6,9.3 12.6,10 C12.6,10.7 12.4,11.3 12.3,12 L12.3,12 Z M12.6,17.6 C13.2,16.5 13.7,15.3 14,14 L16.9,14 C16,15.7 14.4,16.9 12.6,17.6 L12.6,17.6 Z M14.4,12 C14.5,11.3 14.5,10.7 14.5,10 C14.5,9.3 14.4,8.7 14.4,8 L17.8,8 C18,8.6 18.1,9.3 18.1,10 C18.1,10.7 18,11.4 17.8,12 L14.4,12 L14.4,12 Z" id="Shape"/></g></g></g></svg>
                            <p>{{ __("messages.language") }}</p>
                        </a>
                        <div class="bg-white shadow-md rounded border-gray-300 text-sm" x-show="showChildren" x-transition:enter="transition ease duration-300 transform" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease duration-300 transform" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-4" style="display: none;">
                            <div class="bg-white rounded w-full relative my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow" id="language-dropdown-menu">
                                <ul class="list-reset">
                                    <li class="py-1 border-b border-gray-300">
                                        <a href="{{ route('changeLang', 'en') }}" class="block px-2 py-2 text-sm hover:bg-blue-300" role="menuitem" data-locale="en">
                                            <div class="inline-flex items-center text-black gap-2">
                                                <svg aria-hidden="true" class="h-4 w-4 rounded-full" xmlns="http://www.w3.org/2000/svg" id="flag-icon-css-us" viewBox="0 0 512 512"><g fill-rule="evenodd"><g stroke-width="1pt"><path fill="#bd3d44" d="M0 0h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0z" transform="scale(3.9385)"/><path fill="#fff" d="M0 10h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0z" transform="scale(3.9385)"/></g><path fill="#192f5d" d="M0 0h98.8v70H0z" transform="scale(3.9385)"/><path fill="#fff" d="M8.2 3l1 2.8H12L9.7 7.5l.9 2.7-2.4-1.7L6 10.2l.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7L74 8.5l-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 7.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 24.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 21.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 38.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 35.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 52.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 49.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 66.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 63.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9z" transform="scale(3.9385)"/></g></svg>
                                                English (US)
                                            </div>
                                        </a>
                                    </li>
                                    <li class="py-1">
                                        <a href="{{ route('changeLang', 'ar') }}" class="block px-2 py-2 text-sm hover:bg-blue-300" role="menuitem" data-locale="ar">
                                            <div class="inline-flex items-center text-black gap-2">
                                                <svg class="h-5 w-5 rounded-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><title/><g id="_5" data-name="5"><path d="M19.78,16.85a3.48,3.48,0,0,1-2,.33,3.47,3.47,0,0,1-2.64-5,1,1,0,0,0-1.34-1.34,5.49,5.49,0,0,0-3,4.5h0c0,.13,0,.27,0,.4a5.47,5.47,0,0,0,10.37,2.42,1,1,0,0,0-1.34-1.34Zm-3.56,2.38a3.46,3.46,0,0,1-3.07-1.85,3.42,3.42,0,0,1-.4-1.61c0-.09,0-.17,0-.26a3.41,3.41,0,0,1,.12-.69,5.48,5.48,0,0,0,4.29,4.28A3.48,3.48,0,0,1,16.22,19.24Z"/><path d="M30.43,15.12,25,12.41V8a1,1,0,0,0-1-1H19.6L16.89,1.57a1,1,0,0,0-1.79,0L12.38,7H8A1,1,0,0,0,7,8v4.4L1.57,15.11a1,1,0,0,0,0,1.79L7,19.62V24a1,1,0,0,0,1,1h4.4l2.71,5.43a1,1,0,0,0,1.79,0L19.62,25H24a1,1,0,0,0,1-1V19.62l5.43-2.71a1,1,0,0,0,0-1.79Zm-6.88,3A1,1,0,0,0,23,19v4H19a1,1,0,0,0-.89.55L16,27.75l-2.1-4.19A1,1,0,0,0,13,23H9V19a1,1,0,0,0-.55-.89L4.25,16l4.19-2.1A1,1,0,0,0,9,13V9h4a1,1,0,0,0,.89-.55L16,4.25l2.1,4.19A1,1,0,0,0,19,9h4v4a1,1,0,0,0,.55.89L27.75,16Z"/></g></svg>
                                                العربية
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                @method('post')
                <button type="submit" class="block px-4 py-2 mt-2 text-sm font-semibold text-white w-full hover:bg-red-500 rounded-lg flex items-center gap-2 transition-colors">
                    <svg class="fill-white @if (App::isLocale('ar')) transform rotate-180 @endif"  viewBox="0 0 32 32" width="22" xmlns="http://www.w3.org/2000/svg"><title/>
                        <g data-name="1" id="_1"><path class="fill-white" d="M27,3V29a1,1,0,0,1-1,1H6a1,1,0,0,1-1-1V27H7v1H25V4H7V7H5V3A1,1,0,0,1,6,2H26A1,1,0,0,1,27,3ZM10.71,20.29,7.41,17H18V15H7.41l3.3-3.29L9.29,10.29l-5,5a1,1,0,0,0,0,1.42l5,5Z" id="logout_account_exit_door"/></g>
                    </svg>
                    <span>{{ __("messages.logout") }}</span>
                </button>
            </form>
        </nav>
    </div>
