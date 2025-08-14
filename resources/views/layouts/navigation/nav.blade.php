    <div class="flex flex-wrap items-center justify-between mx-auto bg-white px-5 py-3 shadow">
        <div>
            <a href="" class="flex items-center">
                <span class="docbooker font-bold text-xl">{{ __("messages.websiteName") }}</span>
            </a>
        </div>
        <!-- Navbar -->
        <div class="hidden md:block">
            <ul class="flex xl:gap-16 md:gap-5 items-center text-sm">
                <li id="li1">
                    @auth
                        <a href="{{ route('auth') }}" class="hover:text-blue-700">{{ __("messages.nav.home") }}</a>
                    @endauth
                    @guest
                        <a href="{{ route('guest') }}" class="hover:text-blue-700">{{ __("messages.nav.home") }}</a>
                    @endguest
                </li>
                <li id="li2">
                    @auth
                        <a href="{{ route('appointment') }}" class="hover:text-blue-700">{{ __("messages.nav.apoin") }}</a>
                    @endauth
                    @guest
                        <a href="{{ route('appointmentGuest') }}" class="hover:text-blue-700">{{ __("messages.nav.apoin") }}</a>
                    @endguest
                </li>
                <li id="li3">
                    @auth
                        <a href="{{ route('clinic') }}" class="hover:text-blue-700">{{ __("messages.nav.clinic") }}</a>
                    @endauth
                    @guest
                        <a href="{{ route('clinicGuest') }}" class="hover:text-blue-700">{{ __("messages.nav.clinic") }}</a>
                    @endguest
                </li>
                <li id="li4">
                    @auth
                        <a href="{{ route('contactUs') }}" class="hover:text-blue-700">{{ __("messages.nav.contact") }}</a></li>
                    @endauth
                    @guest
                        <a href="{{ route('contactUsGuest') }}" class="hover:text-blue-700">{{ __("messages.nav.contact") }}</a>
                    @endguest
                </li>
                <li id="li5">
                    @auth
                        <a href="{{ route('Doctor') }}" class="hover:text-blue-700">{{ __("messages.nav.ourDoctor") }}</a>
                    @endauth
                    @guest
                    <a href="{{ route('DoctorGuest') }}" class="hover:text-blue-700">{{ __("messages.nav.ourDoctor") }}</a>
                    @endguest
                <li>
                @guest
                    <div class="hidden md:block">
                        <div class="md:order-2">
                            <div class="w-full md:flex md:w-auto md:order-1">
                                <div @click.away="open = false" class="relative" x-data="{ open: true }">
                                    <button @click="open = !open" id="log" class="group py-2 px-3 hover:bg-blue-700 hover:text-white rounded-xl text-sm cursor-pointer flex items-center gap-2">
                                        <svg class="@if (App::isLocale('en')) transform rotate-180 @endif group-hover:fill-white" viewBox="0 0 32 32" width="22" xmlns="http://www.w3.org/2000/svg"><title/>
                                            <g data-name="1" id="_1"><path class="fill-blue-500 group-hover:fill-white" d="M27,3V29a1,1,0,0,1-1,1H6a1,1,0,0,1-1-1V27H7v1H25V4H7V7H5V3A1,1,0,0,1,6,2H26A1,1,0,0,1,27,3ZM10.71,20.29,7.41,17H18V15H7.41l3.3-3.29L9.29,10.29l-5,5a1,1,0,0,0,0,1.42l5,5Z" id="logout_account_exit_door"/></g>
                                        </svg>
                                        <span>{{ __("messages.login") }}</span>
                                    </button>
                                    <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 origin-top-right">
                                        <div class="h-screen pt-5">
                                            <form class="bg-white shadow py-5 px-5 rounded-xl w-72" action="{{ route('guest') }}" method="POST">
                                                @csrf
                                                @method('post')
                                                <div class="flex item-center mb-7 gap-2">
                                                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width='28'><path d="M0 0h24v24H0z" fill="none"></path><path d="m12.866 3 9.526 16.5a1 1 0 0 1-.866 1.5H2.474a1 1 0 0 1-.866-1.5L11.134 3a1 1 0 0 1 1.732 0zM11 16v2h2v-2h-2zm0-7v5h2V9h-2z" fill="#ff0000" class="fill-000000"></path></svg>
                                                    <p class="text-sm font-normal text-red-600">{{ __("messages.warning") }}</p>
                                                </div>
                                                @if ($errors->has('errorLogin'))
                                                    <p class="text-red-500 text-sm mb-2">{{ $errors->first('errorLogin') }}</p>
                                                @endif
                                                @if ($errors->has('email') or $errors->has('errorLogin'))
                                                <div class="flex items-center shadow-md border-t-2 border-red-400 py-2 px-3 rounded-2xl gap-2 cursor-text">
                                                @else
                                                <div class="flex items-center shadow-md border-t-2 border-blue-400 py-2 px-3 rounded-2xl gap-2 cursor-text">
                                                @endif
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                                    </svg>
                                                    <input class="w-full bg-transparent outline-none border-none cursor-text" type="email" name="email" value="{{ old('email') }}" id="" placeholder="{{ __("messages.email") }}" />
                                                </div>
                                                @if ($errors->has('email'))
                                                    <p class="text-red-500 text-sm mb-3 mt-1">{{ $errors->first('email') }}</p>
                                                @endif
                                                @if ($errors->has('password') or $errors->has('errorLogin'))
                                                <div class="flex items-center shadow-md border-t-2 border-red-400 py-2 mt-5 px-3 rounded-2xl gap-2">
                                                @else
                                                <div class="flex items-center shadow-md border-t-2 border-blue-400 py-2 mt-5 px-3 rounded-2xl gap-2">
                                                @endif
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                                    </svg>
                                                    <input class="w-full outline-none border-none" type="password" name="password" id="" placeholder="{{ __("messages.password") }}" />
                                                </div>
                                                @if ($errors->has('password'))
                                                    <p class="text-red-500 text-sm mb-3 mt-1">{{ $errors->first('password') }}</p>
                                                @endif
                                                <button type="submit" class="py-2 px-3 text-white bg-blue-500 hover:bg-blue-800 px-4 py-2 mt-3 font-semibold w-full mt-4 py-2 rounded-2xl mb-2">{{ __("messages.login") }}</button>
                                                {{-- <div class="my-2 flex flex-row justify-center">
                                                    <span class="absolute bg-white px-3">or</span>
                                                    <div
                                                        class="w-full bg-gray-200 mt-3" style="height: 1px"
                                                    ></div>
                                                </div> --}}
                                                {{-- <div class="w-full flex flex-col gap-2 mt-4">
                                                    <button class="bg-red-500 text-white w-full p-2 flex flex-row justify-center gap-2 items-center hover:bg-red-600 duration-100 ease-in-out">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="w-5" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><g fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 0C5.372 0 0 5.373 0 12s5.372 12 12 12c6.627 0 12-5.373 12-12S18.627 0 12 0zm.14 19.018c-3.868 0-7-3.14-7-7.018c0-3.878 3.132-7.018 7-7.018c1.89 0 3.47.697 4.682 1.829l-1.974 1.978v-.004c-.735-.702-1.667-1.062-2.708-1.062c-2.31 0-4.187 1.956-4.187 4.273c0 2.315 1.877 4.277 4.187 4.277c2.096 0 3.522-1.202 3.816-2.852H12.14v-2.737h6.585c.088.47.135.96.135 1.474c0 4.01-2.677 6.86-6.72 6.86z" fill="currentColor"/></g></svg>
                                                            Sign-in with Google
                                                    </button>
                                                </div> --}}
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endguest
                @auth
                    <div class="hidden md:block">
                        <div class="md:order-2">
                            <div class="w-full md:flex md:w-auto md:order-1">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    @method('post')
                                    <button type="submit" id="log" class="group py-2 px-3 hover:bg-red-500 hover:text-white rounded-2xl text-sm cursor-pointer flex items-center gap-2">
                                        <svg class="@if (App::isLocale('ar')) transform rotate-180 @endif"  viewBox="0 0 32 32" width="22" xmlns="http://www.w3.org/2000/svg"><title/>
                                            <g data-name="1" id="_1"><path class="fill-red-500 group-hover:fill-white" d="M27,3V29a1,1,0,0,1-1,1H6a1,1,0,0,1-1-1V27H7v1H25V4H7V7H5V3A1,1,0,0,1,6,2H26A1,1,0,0,1,27,3ZM10.71,20.29,7.41,17H18V15H7.41l3.3-3.29L9.29,10.29l-5,5a1,1,0,0,0,0,1.42l5,5Z" id="logout_account_exit_door"/></g>
                                        </svg>
                                        <span>{{ __("messages.logout") }}</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endauth
                </li>
            </ul>

        </div>
        {{-- === --}}

        {{-- === --}}
        <div class="hidden md:block">
            <ul class="flex flex-wrap items-center h-10">
                <li class="relative px-2" x-data="{showChildren:false}" @mouseleave="showChildren=false" @mouseenter="showChildren=true">
                    <a class="@if (App::isLocale('ar')) px-8 @endif px-5 py-2 flex items-center hover:bg-gray-100 no-underline hover:no-underline transition-colors duration-100 cursor-pointer gap-2">
                        <svg class="w-5 h-5 rounded-full" version="1.1" viewBox="0 0 20 20" width="22px" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" xmlns:xlink="http://www.w3.org/1999/xlink"><title/><desc/><defs/><g fill="none" fill-rule="evenodd" id="Page-1" stroke="none" stroke-width="1"><g fill="#3b82f6" id="Core" transform="translate(-296.000000, -296.000000)"><g id="language" transform="translate(296.000000, 296.000000)"><path d="M10,0 C4.5,0 0,4.5 0,10 C0,15.5 4.5,20 10,20 C15.5,20 20,15.5 20,10 C20,4.5 15.5,0 10,0 L10,0 Z M16.9,6 L14,6 C13.7,4.7 13.2,3.6 12.6,2.4 C14.4,3.1 16,4.3 16.9,6 L16.9,6 Z M10,2 C10.8,3.2 11.5,4.5 11.9,6 L8.1,6 C8.5,4.6 9.2,3.2 10,2 L10,2 Z M2.3,12 C2.1,11.4 2,10.7 2,10 C2,9.3 2.1,8.6 2.3,8 L5.7,8 C5.6,8.7 5.6,9.3 5.6,10 C5.6,10.7 5.7,11.3 5.7,12 L2.3,12 L2.3,12 Z M3.1,14 L6,14 C6.3,15.3 6.8,16.4 7.4,17.6 C5.6,16.9 4,15.7 3.1,14 L3.1,14 Z M6,6 L3.1,6 C4.1,4.3 5.6,3.1 7.4,2.4 C6.8,3.6 6.3,4.7 6,6 L6,6 Z M10,18 C9.2,16.8 8.5,15.5 8.1,14 L11.9,14 C11.5,15.4 10.8,16.8 10,18 L10,18 Z M12.3,12 L7.7,12 C7.6,11.3 7.5,10.7 7.5,10 C7.5,9.3 7.6,8.7 7.7,8 L12.4,8 C12.5,8.7 12.6,9.3 12.6,10 C12.6,10.7 12.4,11.3 12.3,12 L12.3,12 Z M12.6,17.6 C13.2,16.5 13.7,15.3 14,14 L16.9,14 C16,15.7 14.4,16.9 12.6,17.6 L12.6,17.6 Z M14.4,12 C14.5,11.3 14.5,10.7 14.5,10 C14.5,9.3 14.4,8.7 14.4,8 L17.8,8 C18,8.6 18.1,9.3 18.1,10 C18.1,10.7 18,11.4 17.8,12 L14.4,12 L14.4,12 Z" id="Shape"/></g></g></g></svg>
                        <span>{{ __("messages.language") }}</span>
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
        <!-- mobile navbar -->
        <div class="mobile-navbar md:hidden">
            <div class="navbar-wrapper fixed top-0 left-0 h-full bg-white z-30 w-64 shadow-lg p-5"
                x-show="isOpen"
                @click.away=" isOpen = false"
                x-transition:enter="transition duration-300 -ml-64"
                x-transition:enter-start=""
                x-transition:enter-end="transform translate-x-64"
                x-transition:leave="transition duration-300"
                x-transition:enter-start=""
                x-transition:leave-end="transform -translate-x-64">
                <div class="close">
                    <button class="absolute top-0 right-0 mt-4 mr-4" @click=" isOpen = false">
                        <svg
                            class="w-6 h-6"
                            fill="none" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <ul class="divide-y pt-8">
                    <li>
                        <a href="{{ route('auth') }}" class="my-4 px-3 inline-block active" id="li1s">
                            {{ __("messages.nav.home") }}
                        </a>
                    </li>
                    <li>
                        @auth
                            <a href="{{ route('appointment') }}" class="my-4 px-3 inline-block hover:text-blue-700" id="li2s">{{ __("messages.nav.apoin") }}</a>
                        @endauth
                        @guest
                            <a href="{{ route('appointmentGuest') }}" class="my-4 px-3 inline-block hover:text-blue-700" id="li2s">{{ __("messages.nav.apoin") }}</a>
                        @endguest
                    </li>
                    <li>
                        @auth
                            <a href="{{ route('clinic') }}" class="my-4 px-3 inline-block hover:text-blue-700" id="li3s">{{ __("messages.nav.clinic") }}</a></li>
                        @endauth
                        @guest
                            <a href="{{ route('clinicGuest') }}" class="my-4 px-3 inline-block hover:text-blue-700" id="li3s">{{ __("messages.nav.clinic") }}</a></li>
                        @endguest
                    <li>
                        @auth
                            <a href="{{ route('contactUs') }}" class="my-4 px-3 inline-block hover:text-blue-700" id="li4s">{{ __("messages.nav.contact") }}</a></li>
                        @endauth
                        @guest
                            <a href="{{ route('contactUsGuest') }}" class="my-4 px-3 inline-block hover:text-blue-700" id="li4s">{{ __("messages.nav.contact") }}</a>
                        @endguest
                    </li>
                    <li>
                        @auth
                            <a href="{{ route('Doctor') }}" class="my-4 px-3 inline-block hover:text-blue-700" id="li5s">{{ __("messages.nav.ourDoctor") }}</a>
                        @endauth
                        @guest
                            <a href="{{ route('DoctorGuest') }}" class="my-4 px-3 inline-block hover:text-blue-700" id="li5s">{{ __("messages.nav.ourDoctor") }}</a>
                        @endguest
                    </li>
                    <li class="mb-4">
                        <ul class="flex w-full flex-wrap items-center h-10 mt-3">
                            <li class="relative" x-data="{showChildren:false}" @mouseleave="showChildren=false" @mouseenter="showChildren=true">
                                <a class="@if (App::isLocale('ar')) px-3 @endif px-3 py-2 flex w-full items-center no-underline hover:no-underline transition-colors duration-100 cursor-pointer gap-2">
                                    <svg class="w-5 h-5 rounded-full" version="1.1" viewBox="0 0 20 20" width="22px" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" xmlns:xlink="http://www.w3.org/1999/xlink"><title/><desc/><defs/><g fill="none" fill-rule="evenodd" id="Page-1" stroke="none" stroke-width="1"><g fill="#3b82f6" id="Core" transform="translate(-296.000000, -296.000000)"><g id="language" transform="translate(296.000000, 296.000000)"><path d="M10,0 C4.5,0 0,4.5 0,10 C0,15.5 4.5,20 10,20 C15.5,20 20,15.5 20,10 C20,4.5 15.5,0 10,0 L10,0 Z M16.9,6 L14,6 C13.7,4.7 13.2,3.6 12.6,2.4 C14.4,3.1 16,4.3 16.9,6 L16.9,6 Z M10,2 C10.8,3.2 11.5,4.5 11.9,6 L8.1,6 C8.5,4.6 9.2,3.2 10,2 L10,2 Z M2.3,12 C2.1,11.4 2,10.7 2,10 C2,9.3 2.1,8.6 2.3,8 L5.7,8 C5.6,8.7 5.6,9.3 5.6,10 C5.6,10.7 5.7,11.3 5.7,12 L2.3,12 L2.3,12 Z M3.1,14 L6,14 C6.3,15.3 6.8,16.4 7.4,17.6 C5.6,16.9 4,15.7 3.1,14 L3.1,14 Z M6,6 L3.1,6 C4.1,4.3 5.6,3.1 7.4,2.4 C6.8,3.6 6.3,4.7 6,6 L6,6 Z M10,18 C9.2,16.8 8.5,15.5 8.1,14 L11.9,14 C11.5,15.4 10.8,16.8 10,18 L10,18 Z M12.3,12 L7.7,12 C7.6,11.3 7.5,10.7 7.5,10 C7.5,9.3 7.6,8.7 7.7,8 L12.4,8 C12.5,8.7 12.6,9.3 12.6,10 C12.6,10.7 12.4,11.3 12.3,12 L12.3,12 Z M12.6,17.6 C13.2,16.5 13.7,15.3 14,14 L16.9,14 C16,15.7 14.4,16.9 12.6,17.6 L12.6,17.6 Z M14.4,12 C14.5,11.3 14.5,10.7 14.5,10 C14.5,9.3 14.4,8.7 14.4,8 L17.8,8 C18,8.6 18.1,9.3 18.1,10 C18.1,10.7 18,11.4 17.8,12 L14.4,12 L14.4,12 Z" id="Shape"/></g></g></g></svg>
                                    <span>{{ __("messages.language") }}</span>
                                </a>
                                <div class="bg-white shadow-md rounded border-gray-300 text-sm" x-show="showChildren" x-transition:enter="transition ease duration-300 transform" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease duration-300 transform" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-4" style="display: none;">
                                    <div class="bg-white rounded w-full relative z-10 py-1 z-50 my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow" id="language-dropdown-menu">
                                        <ul class="list-reset">
                                            <li>
                                                <a href="{{ route('changeLang', 'en') }}" class="block px-2 py-3 text-sm hover:bg-blue-300" role="menuitem">
                                                    <div class="inline-flex items-center text-black gap-2">
                                                        <svg aria-hidden="true" class="h-4 w-4 rounded-full" xmlns="http://www.w3.org/2000/svg" id="flag-icon-css-us" viewBox="0 0 512 512"><g fill-rule="evenodd"><g stroke-width="1pt"><path fill="#bd3d44" d="M0 0h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0z" transform="scale(3.9385)"/><path fill="#fff" d="M0 10h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0z" transform="scale(3.9385)"/></g><path fill="#192f5d" d="M0 0h98.8v70H0z" transform="scale(3.9385)"/><path fill="#fff" d="M8.2 3l1 2.8H12L9.7 7.5l.9 2.7-2.4-1.7L6 10.2l.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7L74 8.5l-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 7.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 24.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 21.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 38.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 35.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 52.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 49.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 66.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 63.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9z" transform="scale(3.9385)"/></g></svg>
                                                        English (US)
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('changeLang', 'ar') }}" class="block px-2 py-3 text-sm hover:bg-blue-300" role="menuitem">
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
                    </li>
                    @auth
                    <li class="">
                        <div class="w-full my-4">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                @method('post')
                                <button type="submit" class="py-2 px-3 text-red-500 rounded-2xl text-sm cursor-pointer flex items-center gap-2">
                                    @if (App::isLocale('en'))
                                        <svg class="fill-red-500"  viewBox="0 0 32 32" width="22" xmlns="http://www.w3.org/2000/svg"><title/>
                                            <g data-name="1" id="_1"><path class="fill-red-500" d="M27,3V29a1,1,0,0,1-1,1H6a1,1,0,0,1-1-1V27H7v1H25V4H7V7H5V3A1,1,0,0,1,6,2H26A1,1,0,0,1,27,3ZM10.71,20.29,7.41,17H18V15H7.41l3.3-3.29L9.29,10.29l-5,5a1,1,0,0,0,0,1.42l5,5Z" id="logout_account_exit_door"/></g>
                                        </svg>
                                    @else
                                        <svg class="fill-red-500" fill="" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:4;" version="1.1" viewBox="0 0 32 32" width="24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <path class="fill-red-500" d="M12,21.999l-0,2.001c-0,1.326 0.527,2.598 1.464,3.536c0.938,0.937 2.21,1.464 3.536,1.464c2.166,-0 4.834,-0 7,-0c1.326,0 2.598,-0.527 3.536,-1.464c0.937,-0.938 1.464,-2.21 1.464,-3.536c-0,-4.439 0,-11.561 0,-16c0,-1.326 -0.527,-2.598 -1.464,-3.536c-0.938,-0.937 -2.21,-1.464 -3.536,-1.464c-2.166,-0 -4.834,-0 -7,-0c-2.761,-0 -5,2.239 -5,5l-0,1.941c-0,0.552 0.448,1 1,1c0.552,0 1,-0.448 1,-1l0,-1.941c0,-1.657 1.343,-3 3,-3c2.166,-0 4.834,0 7,-0c0.796,-0 1.559,0.316 2.121,0.879c0.563,0.562 0.879,1.325 0.879,2.121l-0,16c0,0.796 -0.316,1.559 -0.879,2.121c-0.562,0.563 -1.325,0.879 -2.121,0.879c-2.166,0 -4.834,0 -7,0c-0.796,0 -1.559,-0.316 -2.121,-0.879c-0.563,-0.562 -0.879,-1.325 -0.879,-2.121l0,-2.001c-0,-0.552 -0.448,-1 -1,-1c-0.552,0 -1,0.448 -1,1Z"/>
                                            <path class="fill-red-500" d="M21.21,15l-17.21,0c-0.552,-0 -1,0.448 -1,1c-0,0.552 0.448,1 1,1l17.245,0l-3.967,3.967c-0.39,0.391 -0.39,1.024 0,1.415c0.39,0.39 1.024,0.39 1.414,-0c0,-0 2.567,-2.567 4.243,-4.243c1.171,-1.172 1.171,-3.071 -0,-4.243l-4.243,-4.242c-0.39,-0.391 -1.024,-0.391 -1.414,-0c-0.39,0.39 -0.39,1.024 0,1.414l3.932,3.932Z"/>
                                        </svg>
                                    @endif
                                    <span>{{ __("messages.logout") }}</span>
                                </button>
                            </form>
                        </div>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
        <!-- end mobile navbar -->
        <div class="toggle md:hidden flex items-center gap-2 relative">
            @guest
                <div class="w-full">
                    <div @click.away="open = false" x-data="{ open: true }">
                        <button @click="open = !open" id="log" class="group py-2 px-2 hover:bg-blue-700 hover:text-white rounded-xl text-sm cursor-pointer flex items-center gap-1">
                            @if (App::isLocale('ar'))
                                <svg class="group-hover:fill-white fill-blue-500" viewBox="0 0 32 32" width="22" xmlns="http://www.w3.org/2000/svg"><title/>
                                    <g data-name="1" id="_1"><path class="group-hover:fill-white fill-blue-500" d="M27,3V29a1,1,0,0,1-1,1H6a1,1,0,0,1-1-1V27H7v1H25V4H7V7H5V3A1,1,0,0,1,6,2H26A1,1,0,0,1,27,3ZM10.71,20.29,7.41,17H18V15H7.41l3.3-3.29L9.29,10.29l-5,5a1,1,0,0,0,0,1.42l5,5Z" id="logout_account_exit_door"/></g>
                                </svg>
                            @else
                                <svg class="fill-blue-500 group-hover:fill-white" fill="" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:4;" version="1.1" viewBox="0 0 32 32" width="24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <path class="group-hover:fill-white" d="M12,21.999l-0,2.001c-0,1.326 0.527,2.598 1.464,3.536c0.938,0.937 2.21,1.464 3.536,1.464c2.166,-0 4.834,-0 7,-0c1.326,0 2.598,-0.527 3.536,-1.464c0.937,-0.938 1.464,-2.21 1.464,-3.536c-0,-4.439 0,-11.561 0,-16c0,-1.326 -0.527,-2.598 -1.464,-3.536c-0.938,-0.937 -2.21,-1.464 -3.536,-1.464c-2.166,-0 -4.834,-0 -7,-0c-2.761,-0 -5,2.239 -5,5l-0,1.941c-0,0.552 0.448,1 1,1c0.552,0 1,-0.448 1,-1l0,-1.941c0,-1.657 1.343,-3 3,-3c2.166,-0 4.834,0 7,-0c0.796,-0 1.559,0.316 2.121,0.879c0.563,0.562 0.879,1.325 0.879,2.121l-0,16c0,0.796 -0.316,1.559 -0.879,2.121c-0.562,0.563 -1.325,0.879 -2.121,0.879c-2.166,0 -4.834,0 -7,0c-0.796,0 -1.559,-0.316 -2.121,-0.879c-0.563,-0.562 -0.879,-1.325 -0.879,-2.121l0,-2.001c-0,-0.552 -0.448,-1 -1,-1c-0.552,0 -1,0.448 -1,1Z"/>
                                    <path class="group-hover:fill-white" d="M21.21,15l-17.21,0c-0.552,-0 -1,0.448 -1,1c-0,0.552 0.448,1 1,1l17.245,0l-3.967,3.967c-0.39,0.391 -0.39,1.024 0,1.415c0.39,0.39 1.024,0.39 1.414,-0c0,-0 2.567,-2.567 4.243,-4.243c1.171,-1.172 1.171,-3.071 -0,-4.243l-4.243,-4.242c-0.39,-0.391 -1.024,-0.391 -1.414,-0c-0.39,0.39 -0.39,1.024 0,1.414l3.932,3.932Z"/>
                                </svg>
                            @endif
                            <span>{{ __("messages.login") }}</span>
                        </button>
                        <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute @if (App::isLocale('en')) -right-2.5 @endif @if (App::isLocale('ar')) -left-2.5 @endif">
                            <div class="h-screen pt-5">
                                <form class="bg-white shadow py-5 px-3 rounded-xl w-64" action="{{ route('guest') }}" method="POST">
                                    @csrf
                                    @method('post')
                                    <div class="flex item-center mb-7 gap-2">
                                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width='30'><path d="M0 0h24v24H0z" fill="none"></path><path d="m12.866 3 9.526 16.5a1 1 0 0 1-.866 1.5H2.474a1 1 0 0 1-.866-1.5L11.134 3a1 1 0 0 1 1.732 0zM11 16v2h2v-2h-2zm0-7v5h2V9h-2z" fill="#ff0000" class="fill-000000"></path></svg>
                                        <p class="text-sm font-normal text-red-600">{{ __("messages.warning") }}</p>
                                    </div>
                                    @if ($errors->has('errorLogin'))
                                        <p class="text-red-500 text-sm mb-2">{{ $errors->first('errorLogin') }}</p>
                                    @endif
                                    @if ($errors->has('email') or $errors->has('errorLogin'))
                                        <div class="flex items-center shadow-md border-t-2 border-red-400 py-2 px-3 rounded-2xl gap-2">
                                    @else
                                        <div class="flex items-center shadow-md border-t-2 border-blue-400 py-2 px-3 rounded-2xl gap-2">
                                    @endif
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                        </svg>
                                        <input class="w-full bg-transparent outline-none border-none " type="email" name="email" value="{{ old('email') }}" id="" placeholder="{{ __("messages.email") }}" />
                                    </div>
                                    @if ($errors->has('email'))
                                        <p class="text-red-500 text-sm mb-3 mt-1">{{ $errors->has('email') }}</p>
                                    @endif
                                    @if ($errors->has('password') or $errors->has('errorLogin'))
                                        <div class="flex items-center shadow-md border-t-2 border-red-400 py-2 mt-5 px-3 rounded-2xl gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                            </svg>
                                            <input class="w-full outline-none border-none" type="password" name="password" id="" placeholder="{{ __("messages.password") }}" />
                                    @else
                                        <div class="flex items-center shadow-md border-t-2 border-blue-400 py-2 mt-5 px-3 rounded-2xl gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                            </svg>
                                            <input class="w-full outline-none border-none" type="password" name="password" id="" placeholder="{{ __("messages.password") }}" />
                                    @endif
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="text-red-500 text-sm mb-3 mt-1">{{ $errors->has('password') }}</span>
                                    @endif
                                    <button type="submit" class="py-2 px-3 text-white bg-blue-500 hover:bg-blue-800 px-4 py-2 mt-3 font-semibold w-full mt-4 py-2 rounded-2xl mb-2">{{ __("messages.login") }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endguest
            <button @click=" isOpen = true" @keydown.escape=" isOpen = false">
                <svg
                    class="h-6 w-6 fill-current text-black"
                    fill="none" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>

