<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite('resources/css/app.css')
    <title>Document</title>
</head>

<body class="@if (App::isLocale('ar')) rtl @endif">
    @include('Admin.navigation.nav')
    <div class="md:flex" id="content">
        <div class="xl:w-1/6 md:w-1/4"></div>
        <div class="my-16 md:my-5 xl:my-10 xl:w-5/6 md:w-3/4 md:mx-5 xl:mx-20">
            <div id="calendar">
                <div class="days rounded-xl h-screen bg-transparent p-2 md:p-5">
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
                    <div class="dayNav flex items-center justify-between p-4 md:p-5 rounded-md shadow-md">
                        <div class="text-center">
                            <div class="relative" x-data="{ open: false }">
                                <button @click="open = ! open" type="button" class="group inline-flex items-center gap-2" aria-expanded="false">
                                    <span class="text-xs sm:text-sm md:text-base text-white font-bold @if (App::isLocale('ar')) ltr @endif" id="dateDisplay"></span>
                                    <svg :class="{'rotate-180 duration-300': open, 'duration-300' : !open}" class="text-white h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-90"
                                    x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-200"
                                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90" class="absolute left-1/2 z-full mt-1 -translate-x-1/2 transform w-full rounded-xl"
                                    >
                                    <div class="grid bg-gray-50 px-1 py-1 rounded-xl border shadow-xl">
                                        <p class="hover:bg-gray-200 py-1 cursor-pointer rounded-xl" id="daily" @click="open = ! open">{{ __('messages.daily') }}</p>
                                        <hr class="my-1">
                                        <p class="hover:bg-gray-200 py-1 cursor-pointer rounded-xl" id="weekly" @click="open = ! open">{{ __('messages.weekly') }}</p>
                                    </div>
                                </div>
                            </div>
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
                    </div>
                </div>
                <div onclick="document.getElementById('modalForMake').showModal()" class="makeAppointment fixed p-2 cursor-pointer bottom-5 @if (App::isLocale('en')) right-5 @endif @if (App::isLocale('ar')) left-5 @endif bg-blue-500 hover:bg-blue-800 rounded-full">
                    <svg width="35" class="fill-white" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="223.7983" cy="215.7292" r="16.4529" transform="translate(-61.1534 339.9361) rotate(-67.5)"/>
                        <circle cx="130.8293" cy="215.7292" r="16.4529"/><circle cx="316.7671" cy="215.7292" r="16.4529"/>
                        <circle cx="223.7983" cy="293.4321" r="16.4529" transform="translate(-132.9415 387.9034) rotate(-67.5)"/>
                        <circle cx="130.8293" cy="293.4321" r="16.4529"/>
                        <path d="M402.6875,254.4266V116.0352A25.9656,25.9656,0,0,0,376.751,90.0986h-51.13V62.3945h-13V90.0986H134.4746V62.3945h-13V90.0986h-51.13a25.9656,25.9656,0,0,0-25.9365,25.9366v31.8837a6.4758,6.4758,0,0,0,.501,2.5032v197.155a25.9655,25.9655,0,0,0,25.9365,25.9366H268.8589A100.9158,100.9158,0,1,0,402.6875,254.4266ZM70.8457,360.5137a12.9517,12.9517,0,0,1-12.9365-12.9366V154.4189H389.6875v96.01A100.9113,100.9113,0,0,0,266.4626,360.5137Zm351.9414,11.8828a1.5,1.5,0,0,1-1.5,1.5H391.8828V403.3a1.5,1.5,0,0,1-1.5,1.5H342.9746a1.5,1.5,0,0,1-1.5-1.5V373.8965H312.0713a1.4883,1.4883,0,0,1-.9922-.3831,1.5425,1.5425,0,0,1-.2085-.2263l-.0015-.0017a1.5319,1.5319,0,0,1-.1489-.248l-.0127-.0234a1.4709,1.4709,0,0,1-.0849-.2483c-.0044-.0178-.0122-.0343-.0162-.0523a1.4753,1.4753,0,0,1-.0351-.3169V324.9883a1.5,1.5,0,0,1,1.5-1.5h29.4033V294.085a1.5,1.5,0,0,1,1.5-1.5h47.4082a1.5,1.5,0,0,1,1.5,1.5v29.4033h29.4043a1.5,1.5,0,0,1,1.5,1.5Z"/>
                    </svg>
                </div>
                <dialog id="modalForMake" class="w-full md:w-1/2 rounded-xl shadow bg-gray-300">
                    <div class="w-full relative">
                        <div onclick="document.getElementById('modalForMake').close();" class="absolute top-4 @if (App::isLocale('en')) right-4 @endif @if (App::isLocale('ar')) left-4 @endif cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        </div>
                        <div class="pt-10 pb-5 w-full px-4">
                            <form method="POST" class="grid grid-cols-2 gap-5 w-full">
                                @csrf
                                @method('post')
                                <div class="grid col-span-2">
                                    <p id="errorUnique" class="text-red-500 text-sm mb-2"></p>
                                    <p id="errorTime" class="text-red-500 text-sm mb-2"></p>
                                </div>
                                <div class="start_date col-span-2">
                                    <label for="" class="text-sm text-blue-900 pb-2">{{ __('messages.date') }}</label>
                                    <input type="date" name="start_date" class="start_date w-full bg-white py-2 border outline-0 shdaow-xl rounded-xl px-5 cursor-pointer">
                                    <p id="start_date_error" class="text-red-500 text-sm mt-1"></p>
                                </div>
                                <div class="start_time col-span-1">
                                    <label for="" class="text-sm text-blue-900 pb-2">{{ __('messages.startTime') }}</label>
                                    <input type="time" name="start_time" class="start_time w-full bg-white py-2 border outline-0 shdaow-xl rounded-xl px-5 cursor-pointer">
                                    <p id="start_time_error" class="text-red-500 text-sm mt-1"></p>
                                </div>
                                <div class="start_time col-span-1">
                                    <label for="" class="text-sm text-blue-900 pb-2">{{ __('messages.endTime') }}</label>
                                    <input type="time" name="end_time" class="end_time w-full bg-white py-2 border outline-0 shdaow-xl rounded-xl px-5 cursor-pointer">
                                    <p id="end_time_error" class="text-red-500 text-sm mt-1"></p>
                                </div>
                            </form>
                        </div>
                        <button class="submit mb-5 mx-4 bg-blue-500 hover:bg-blue-700 py-2 px-5 rounded-xl text-white">{{ __('messages.submit') }}</button>
                    </div>
                </dialog>
            </div>
        </div>
    </div>
</div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>

    let appointmentBtn = document.getElementById("appointmentBtn");
    appointmentBtn.classList.add("bg-blue-500");

    $(document).ready(function() {
        let mode = 'daily';
        let currentDate = new Date();

        $(document).on('click', '#searchBtn', function () {
            $('.errorSearch').empty();

            let yearSearch = parseInt($("#yearSearch").val());
            let monthSearch = parseInt($("#monthSearch").val());
            let daySearch = parseInt($("#daySearch").val());

            if (yearSearch >= 2023 && yearSearch <= 2080 && monthSearch >= 1 && monthSearch <= 12 && daySearch >= 1 && daySearch <= 31) {

                currentDate = new Date(yearSearch, monthSearch - 1, daySearch);
                let currentDateStr = formatDate(currentDate);
                $("#dateDisplay").text(currentDateStr);

                updateDateDisplayed();
                fetchAppointments();
                initializeCalendar();

                $('.errorSearch').empty();

            } else {
                $('.errorSearch').text('{{ __("messages.errorFormat") }}');
            }
        });


        function initializeCalendar() {
            if (mode === 'weekly') {
                currentDate.setDate(currentDate.getDate() - (currentDate.getDay() + 6) % 7);
                $('#today').text('{{ __("messages.thisWeek") }}');
            } else {
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
            } else {
                $("#today").addClass('opacity-100').removeClass('opacity-80');
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
            dateDisplay = currentDateStr;

            updateDateDisplayed();
            fetchAppointments();
        }

        function updateUrl() {
            if (mode === 'daily') {
                return "/DocBooker/dashboard/appointment/days/" + dateDisplayed;
            } else {
                return "/DocBooker/dashboard/appointment/weeks/" + dateDisplayed;
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

        // make booking
        $('.submit').on('click', function () {
            let start_date = $('input[name="start_date"]').val();
            let start_time = $('input[name="start_time"]').val();
            let end_time = $('input[name="end_time"]').val();

            $('#errorUnique').empty();
            $('#errorTime').empty();
            $('#start_date_error').empty();
            $('#start_time_error').empty();
            $('#end_time_error').empty();

            $.ajax({
                url: '{{ route("makeAppointment") }}',
                method: 'POST',
                data: {
                    start_date: start_date,
                    start_time: start_time,
                    end_time: end_time,
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    if(response === 'maked') {
                        let modal = document.getElementById('modalForMake');
                        modal.close();

                        Swal.fire({
                            title: 'booking maked successfully',
                            showConfirmButton: false,
                            timer: 2500,
                            background: 'linear-gradient(90deg, rgba(139, 192, 74, 1) 1%, rgba(0, 116, 217, 1) 60%, rgba(0, 116, 217, 1) 100%)',
                            color: 'white',
                            toast: true,
                            timerProgressBar: true,
                        })

                        fetchAppointments();
                    } else if(response === 'errorUnique') {
                        $('#errorUnique').text('{{ __("messages.errorUnique") }}');
                    } else if(response === 'errorTimeBefore') {
                        $('#errorTime').text('{{ __("messages.errorTimeBefore") }}');
                    } else if(response === 'errorTime') {
                        $('#errorTime').text('{{ __("messages.errorTime") }}');
                    }  else if(response === 'errorTimeAfter') {
                        $('#errorTime').text('{{ __("messages.errorTimeAfter") }}');
                    }
                },
                error: function (xhr, status, error) {
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        let errorMessages = xhr.responseJSON.errors;

                        for (let fieldName in errorMessages) {

                            if (errorMessages.hasOwnProperty(fieldName)) {
                                let errorMessage = errorMessages[fieldName][0];

                                if (fieldName === 'start_date') {
                                    $('#start_date_error').text(errorMessage);
                                }
                                if (fieldName === 'start_time') {
                                    $('#start_time_error').text(errorMessage);
                                }
                                if (fieldName === 'end_time') {
                                    $('#end_time_error').text(errorMessage);
                                }
                            }
                        }
                    }
                }
            });
        });
    });

</script>

</html>


