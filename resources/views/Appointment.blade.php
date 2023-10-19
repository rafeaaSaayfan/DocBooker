@extends('layouts.master')

@section('content')
<div class="container mx-auto pt-20 min-h-screen" id="appointment">
    <div id="calendar">
        <div class="days rounded-xl bg-transparent p-1">
            <div class="search pb-5">
                <p class="errorSearch text-red-500 pb-1"></p>
                <div class="grid grid-cols-4 md:grid-cols-7 border rounded-md text-sm md:text-base">
                    <input type="number" step="1" min="2023" placeholder="{{ __('messages.year') }}" id="yearSearch" class="col-span-1 md:col-span-2 bg-gray-100 px-4 py-2 border-0 w-full outline-green-500 hover:outline-green-500">
                    <input type="number" step="1" min="1" max="12" placeholder="{{ __('messages.month') }}" id="monthSearch" class="col-span-1 md:col-span-2 bg-gray-100 px-4 py-2 border-x-2 w-full outline-green-500 hover:outline-green-500">
                    <input type="number" step="1" min="1" max="31" placeholder="{{ __('messages.day') }}" id="daySearch" class="col-span-1 md:col-span-2 bg-gray-100 px-4 py-2 border-0 w-full outline-green-500 hover:outline-green-500">
                    <button class="col-span-1 flex items-center justify-center gap-1 bg-blue-400 hover:bg-blue-500 text-white @if (App::isLocale('ar')) rounded-l-md @endif @if (App::isLocale('en')) rounded-r-md @endif" id="searchBtn">
                        <svg class="fill-white" id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="22px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <path d="M344.5,298c15-23.6,23.8-51.6,23.8-81.7c0-84.1-68.1-152.3-152.1-152.3C132.1,64,64,132.2,64,216.3  c0,84.1,68.1,152.3,152.1,152.3c30.5,0,58.9-9,82.7-24.4l6.9-4.8L414.3,448l33.7-34.3L339.5,305.1L344.5,298z M301.4,131.2  c22.7,22.7,35.2,52.9,35.2,85c0,32.1-12.5,62.3-35.2,85c-22.7,22.7-52.9,35.2-85,35.2c-32.1,0-62.3-12.5-85-35.2  c-22.7-22.7-35.2-52.9-35.2-85c0-32.1,12.5-62.3,35.2-85c22.7-22.7,52.9-35.2,85-35.2C248.5,96,278.7,108.5,301.4,131.2z"/>
                        </svg>
                       <p>{{ __('messages.search') }}</p>
                    </button>
                </div>
            </div>
            <div x-data="{ selected: true }" class="flex flex-col mb-5 w-40">
                <div class="relative pt-2">
                    <div class="relative flex items-center gap-2">
                        <div @click="selected=!selected" id="daily" class="w-full flex justify-center text-gray-400 font-semibold cursor-pointer">
                            <button>{{ __('messages.daily') }}</button>
                        </div>
                        <div @click="selected=!selected" id="weekly" class="w-full flex justify-center text-gray-400 font-semibold cursor-pointer">
                            <button>{{ __('messages.weekly') }}</button>
                        </div>
                    </div>
                    <span :class="{ '@if (App::isLocale('en')) left-1/2 @endif @if (App::isLocale('ar')) left-1 @endif -ml-1 text-white':!selected,
                            '@if (App::isLocale('en')) left-1 @endif @if (App::isLocale('ar')) left-1/2 @endif text-white font-semibold':selected
                        }"
                        x-text="selected ? '{{ __("messages.daily") }}' : '{{ __("messages.weekly") }}'"
                        class="bg-blue-500 shadow flex items-center justify-center w-1/2 rounded h-[1.88rem] transition-all duration-150 ease-linear top-[4px] absolute">
                    </span>
                </div>
            </div>
            <div class="dayNav flex items-center justify-between p-4 md:p-5 rounded-md shadow-md">
                <div class="text-center">
                    <p class="text-xs sm:text-sm md:text-base text-white font-bold @if (App::isLocale('ar')) ltr @endif" id="dateDisplay"></p>
                </div>
                <div class="flex items-center gap-1 md:gap-2">
                    <button class="text-xs sm:text-sm md:text-base p-2 rounded-md shadow-2xl bg-white opacity-80 mx-1 md:mx-3" id="today"></button>
                    <button class="bg-white p-1 md:p-2 shadow-2xl rounded-full opacity-80 hover:opacity-100" id="prevDate">
                        <svg class="fill-black w-5 @if (App::isLocale('en')) transform rotate-180 @endif" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <polygon points="160,115.4 180.7,96 352,256 180.7,416 160,396.7 310.5,256 "/>
                        </svg>
                    </button>
                    <button class="bg-white p-1 md:p-2 shadow-2xl rounded-full opacity-80 hover:opacity-100" id="nextDate">
                        <svg class="fill-black w-5 @if (App::isLocale('ar')) transform rotate-180 @endif" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <polygon points="160,115.4 180.7,96 352,256 180.7,416 160,396.7 310.5,256 "/>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="calendarContent py-5">
                @guest
                    <p class="text-center text-red-500">Login first</p>
                @endguest
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    let li2 = document.getElementById("li2");
    li2.classList.add("active", "border-b-2", "border-green-600", "pb-2", "font-semibold");


    let li2s = document.getElementById("li2s");
    li2s.classList.add("text-green-500");

    $(document).ready(function() {

        let mode = 'daily';
        let currentDate = new Date();

        let currentForSearch = new Date();
        currentForSearch.setHours(0, 0, 0, 0);

        // $(document).on('click', '#searchBtn', function () {
        //     let yearSearch = parseInt($("#yearSearch").val());
        //     let monthSearch = parseInt($("#monthSearch").val());
        //     let daySearch = parseInt($("#daySearch").val());
        //     let searchDate = new Date(yearSearch, monthSearch - 1, daySearch).toLocaleDateString();

        //     if (searchDate >= currentForSearch && !isNaN(yearSearch) || !isNaN(monthSearch) || !isNaN(daySearch)) {

        //         currentDate = new Date(yearSearch, monthSearch - 1, daySearch);
        //         let currentDateStr = formatDate(currentDate);
        //         $("#dateDisplay").text(currentDateStr);

        //         updateDateDisplayed();
        //         fetchAppointments();
        //         initializeCalendar();

        //         $('.errorSearch').empty();

        //     } else {
        //         $('.errorSearch').text('{{ __("messages.errorFormat") }}');
        //     }
        // });
        $(document).on('click', '#searchBtn', function () {

            let yearSearch = parseInt($("#yearSearch").val());
            let monthSearch = parseInt($("#monthSearch").val());
            let daySearch = parseInt($("#daySearch").val());

            let searchDate = new Date(yearSearch, monthSearch - 1, daySearch);
            searchDate.setHours(0, 0, 0, 0);

            if (isNaN(yearSearch) || isNaN(monthSearch) || isNaN(daySearch)) {
                $('.errorSearch').text('{{ __("messages.errorFormat") }}');
            } else if(yearSearch < 2023 || yearSearch > 2080 || monthSearch < 1 || monthSearch > 12 || daySearch < 1 || daySearch > 31) {
                $('.errorSearch').text('{{ __("messages.errorFormat") }}');
            } else if(searchDate < currentForSearch) {
                $('.errorSearch').text('{{ __("messages.errorFormat") }}');
            } else {
                currentDate = new Date(yearSearch, monthSearch - 1, daySearch);
                let currentDateStr = formatDate(currentDate);
                $("#dateDisplay").text(currentDateStr);

                updateDateDisplayed();
                fetchAppointments();
                initializeCalendar();

                $('.errorSearch').empty();
            }
        });

        function checkDate() {
            now = new Date();
            if(currentDate < now) {
                currentDate = now;
            }
        }

        function initializeCalendar() {
            if (mode === 'weekly') {
                currentDate.setDate(currentDate.getDate() - (currentDate.getDay() + 6) % 7);
                $('#today').text('{{ __("messages.thisWeek") }}');
            } else {
                checkDate();
                $('#today').text('{{ __("messages.today") }}');
            }

            let currentDateStr = formatDate(currentDate);
            $("#dateDisplay").text(currentDateStr);

            updateDateDisplayed();
            fetchAppointments();
        }

        function updateDateDisplayed() {
            dateDisplayed = $('#dateDisplay').text();

            let now = new Date();
            let checKDate = formatCheckDate(now);

            if (dateDisplayed === checKDate) {
                $("#today").addClass('opacity-80').removeClass('opacity-100');
                $("#prevDate").addClass('hidden');
            } else {
                $("#today").addClass('opacity-100').removeClass('opacity-80');
                $("#prevDate").removeClass('hidden');
            }

            function formatCheckDate(date) {
                let days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
                let months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

                if (mode === 'daily') {
                    let dayOfWeek = days[date.getDay()];
                    let dayOfMonth = date.getDate();
                    let monthName = months[date.getMonth()];
                    let year = date.getFullYear();

                    return dayOfWeek + " " + dayOfMonth.toString().padStart(2, '0') + '-' + monthName + '-' + year;
                } else {
                    let currDate = new Date();
                    currDate.setDate(currDate.getDate() - (currDate.getDay() + 6) % 7)

                    let dayOfWeek = days[currDate.getDay()];
                    let dayOfMonth = currDate.getDate();
                    let monthName = months[currDate.getMonth()];
                    let year = currDate.getFullYear();

                    let nextWeek = new Date(currDate);
                    nextWeek.setDate(currDate.getDate() + 6);
                    let monthNameEnd = months[nextWeek.getMonth()];

                    return year + " " + dayOfMonth.toString().padStart(2, '0') + '-' + monthName + ' -> ' + nextWeek.getDate().toString().padStart(2, '0') + '-' + monthNameEnd;
                }
            }
        }

        $("#nextDate").click(function () {
            if (mode === 'daily') {
                currentDate.setDate(currentDate.getDate() + 1);
            } else {
                currentDate.setDate(currentDate.getDate() + 7);
            }
            currentDateStr = formatDate(currentDate);
            dateDisplay = currentDateStr;

            $("#today").addClass('opacity-100').removeClass('opacity-80');

            updateDateDisplayed();
            fetchAppointments();
            initializeCalendar();
        });

        $("#prevDate").click(function () {
            if (mode === 'daily') {
                currentDate.setDate(currentDate.getDate() - 1);
            } else {
                currentDate.setDate(currentDate.getDate() - 7);
            }
            currentDateStr = formatDate(currentDate);
            dateDisplay = currentDateStr;

            $("#today").addClass('opacity-100').removeClass('opacity-80');

            updateDateDisplayed();
            fetchAppointments();
            initializeCalendar();
        });

        $("#today").click(function () {
            currentDate = new Date();
            if (mode === 'weekly') {
                currentDate.setDate(currentDate.getDate() - (currentDate.getDay() + 6) % 7);
            }
            currentDateStr = formatDate(currentDate);
            dateDisplay = currentDateStr;

            $("#today").addClass('opacity-80').removeClass('opacity-100');

            updateDateDisplayed();
            fetchAppointments();
            initializeCalendar();
        });

        initializeCalendar();

        $('#daily').click(function() {
            mode = 'daily';
            initializeCalendar();
        });

        $('#weekly').click(function() {
            mode = 'weekly';
            initializeCalendar();
        });

        function formatDate(date) {
            let days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
            let months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

            let dayOfWeek = days[date.getDay()];
            let dayOfMonth = date.getDate();
            let monthName = months[date.getMonth()];
            let year = date.getFullYear();

            if (mode === 'daily') {
                return dayOfWeek + " " + dayOfMonth.toString().padStart(2, '0') + '-' + monthName + '-' + year;
            } else {
                let nextWeek = new Date(date);
                nextWeek.setDate(date.getDate() + 6);
                let monthNameEnd = months[nextWeek.getMonth()];

                return year + " " + dayOfMonth.toString().padStart(2, '0') + '-' + monthName + ' -> ' + nextWeek.getDate().toString().padStart(2, '0') + '-' + monthNameEnd;
            }

            updateDateDisplayed();
            fetchAppointments();
        }

        function updateUrl() {
            if (mode === 'daily') {
                return "/DocBooker/appointment/days/" + dateDisplayed;
            } else {
                return "/DocBooker/appointment/weeks/" + dateDisplayed;
            }
        }

        function fetchAppointments() {
            $.ajax({
                url: updateUrl(),
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('.calendarContent').html(response);
                }
            });
        }
    });

</script>

@endsection

