<div class="hidden xl:grid grid-cols-4 gap-5">
    <div class="col-span-1 grid grid-cols-1 gap-2 h-fit">
        @foreach (['Mon', 'Fri'] as $day)
        <div class="col-span-1 grid py-5 px-8 border shadow-md rounded-xl bg-gray-50 gap-2 h-fit">
            <p class="text-center text-green-500 font-semibold mb-5">{{ $day }}</p>
            @php
            $hasBookings = false;
            @endphp
            @forelse ($bookings as $index => $booking)
            @if ($booking['day'] == $day)
            @if ($booking['status'] == 1 && $booking['checkDate'] != 'now')
            <button class="btnBooking @if (App::isLocale('ar')) ltr @endif bg-blue-500 hover:bg-blue-800 text-xs py-1 rounded-xl w-full text-white">
                @elseif($booking['checkDate'] == 'now')
                <button class="btnBooking @if (App::isLocale('ar')) ltr @endif bg-red-500 hover:bg-red-800 text-xs py-1 rounded-xl w-full text-white">
                    @else
                    <button class="btnBooking @if (App::isLocale('ar')) ltr @endif bg-gray-500 hover:bg-gray-800 text-xs py-1 rounded-xl w-full text-white">
                        @endif
                        <input type="hidden" data-id="{{ $booking['id'] }}" id="id">
                        <input type="hidden" data-id="{{ $booking['start_date'] }} -> {{ $booking['end_date'] }}" id="time">
                        <input type="hidden" data-id="{{ $booking['date'] }}" id="date">
                        <input type="hidden" data-id="{{ $booking['firstName'] }}" id="firstName">
                        <input type="hidden" data-id="{{ $booking['lastName'] }}" id="lastName">
                        <input type="hidden" data-id="{{ $booking['email'] }}" id="email">
                        <input type="hidden" data-id="{{ $booking['phone'] }}" id="phone">
                        <input type="hidden" data-id="{{ $booking['checkDate'] }}" id="checkDate">
                        {{ $booking['start_date'] }} -> {{ $booking['end_date'] }}
                    </button>
                    @php
                    $hasBookings = true;
                    @endphp
                    @endif
                    @if ($index == count($bookings) - 1)
                    @if (!$hasBookings)
                    <p class="text-center">{{ __('messages.noBooking') }}</p>
                    @endif
                    @endif
                    @empty
                    <p class="text-center">{{ __('messages.noBooking') }}</p>
                    @endforelse
        </div>
        @endforeach
    </div>
    <div class="col-span-1 grid grid-cols-1 gap-2 h-fit">
        @foreach (['Tue', 'Sat'] as $day)
        <div class="col-span-1 grid py-5 px-8 border shadow-md rounded-xl bg-gray-50 gap-2">
            <p class="text-center text-green-500 font-semibold mb-5">{{ $day }}</p>
            @php
            $hasBookings = false;
            @endphp
            @forelse ($bookings as $index => $booking)
            @if ($booking['day'] == $day)
            @if ($booking['status'] == 1 && $booking['checkDate'] != 'now')
            <button class="btnBooking @if (App::isLocale('ar')) ltr @endif bg-blue-500 hover:bg-blue-800 text-xs py-1 rounded-xl w-full text-white">
                @elseif($booking['checkDate'] == 'now')
                <button class="btnBooking @if (App::isLocale('ar')) ltr @endif bg-red-500 hover:bg-red-800 text-xs py-1 rounded-xl w-full text-white">
                    @else
                    <button class="btnBooking @if (App::isLocale('ar')) ltr @endif bg-gray-500 hover:bg-gray-800 text-xs py-1 rounded-xl w-full text-white">
                        @endif
                        <input type="hidden" data-id="{{ $booking['id'] }}" id="id">
                        <input type="hidden" data-id="{{ $booking['start_date'] }} -> {{ $booking['end_date'] }}" id="time">
                        <input type="hidden" data-id="{{ $booking['date'] }}" id="date">
                        <input type="hidden" data-id="{{ $booking['firstName'] }}" id="firstName">
                        <input type="hidden" data-id="{{ $booking['lastName'] }}" id="lastName">
                        <input type="hidden" data-id="{{ $booking['email'] }}" id="email">
                        <input type="hidden" data-id="{{ $booking['phone'] }}" id="phone">
                        <input type="hidden" data-id="{{ $booking['checkDate'] }}" id="checkDate">
                        {{ $booking['start_date'] }} -> {{ $booking['end_date'] }}
                    </button>
                    @php
                    $hasBookings = true;
                    @endphp
                    @endif
                    @if ($index == count($bookings) - 1)
                    @if (!$hasBookings)
                    <p class="text-center">{{ __('messages.noBooking') }}</p>
                    @endif
                    @endif

                    @empty
                    <p class="text-center">{{ __('messages.noBooking') }}</p>
                    @endforelse
        </div>
        @endforeach
    </div>
    <div class="col-span-1 grid grid-cols-1 gap-2 h-fit">
        @foreach (['Wed', 'Sun'] as $day)
        <div class="col-span-1 grid py-5 px-8 border shadow-md rounded-xl bg-gray-50 gap-2">
            @php
            $hasBookings = false;
            @endphp
            <p class="text-center text-green-500 font-semibold mb-5">{{ $day }}</p>
            @forelse ($bookings as $index => $booking)
            @if ($booking['day'] == $day)
            @if ($booking['status'] == 1 && $booking['checkDate'] != 'now')
            <button class="btnBooking @if (App::isLocale('ar')) ltr @endif bg-blue-500 hover:bg-blue-800 text-xs py-1 rounded-xl w-full text-white">
                @elseif($booking['checkDate'] == 'now')
                <button class="btnBooking @if (App::isLocale('ar')) ltr @endif bg-red-500 hover:bg-red-800 text-xs py-1 rounded-xl w-full text-white">
                    @else
                    <button class="btnBooking @if (App::isLocale('ar')) ltr @endif bg-gray-500 hover:bg-gray-800 text-xs py-1 rounded-xl w-full text-white">
                        @endif
                        <input type="hidden" data-id="{{ $booking['id'] }}" id="id">
                        <input type="hidden" data-id="{{ $booking['start_date'] }} -> {{ $booking['end_date'] }}" id="time">
                        <input type="hidden" data-id="{{ $booking['date'] }}" id="date">
                        <input type="hidden" data-id="{{ $booking['firstName'] }}" id="firstName">
                        <input type="hidden" data-id="{{ $booking['lastName'] }}" id="lastName">
                        <input type="hidden" data-id="{{ $booking['email'] }}" id="email">
                        <input type="hidden" data-id="{{ $booking['phone'] }}" id="phone">
                        <input type="hidden" data-id="{{ $booking['checkDate'] }}" id="checkDate">
                        {{ $booking['start_date'] }} -> {{ $booking['end_date'] }}
                    </button>
                    @php
                    $hasBookings = true;
                    @endphp
                    @endif
                    @if ($index == count($bookings) - 1)
                    @if (!$hasBookings)
                    <p class="text-center">{{ __('messages.noBooking') }}</p>
                    @endif
                    @endif

                    @empty
                    <p class="text-center">{{ __('messages.noBooking') }}</p>
                    @endforelse
        </div>
        @endforeach
    </div>
    <div class="col-span-1 grid grid-cols-1 gap-2 h-fit">
        @foreach (['Thu'] as $day)
        <div class="col-span-1 grid py-5 px-8 border shadow-md rounded-xl bg-gray-50 gap-2">
            @php
            $hasBookings = false;
            @endphp
            <p class="text-center text-green-500 font-semibold mb-5">{{ $day }}</p>
            @forelse ($bookings as $index => $booking)
            @if ($booking['day'] == $day)
            @if ($booking['status'] == 1 && $booking['checkDate'] != 'now')
            <button class="btnBooking @if (App::isLocale('ar')) ltr @endif bg-blue-500 hover:bg-blue-800 text-xs py-1 rounded-xl w-full text-white">
                @elseif($booking['checkDate'] == 'now')
                <button class="btnBooking @if (App::isLocale('ar')) ltr @endif bg-red-500 hover:bg-red-800 text-xs py-1 rounded-xl w-full text-white">
                    @else
                    <button class="btnBooking @if (App::isLocale('ar')) ltr @endif bg-gray-500 hover:bg-gray-800 text-xs py-1 rounded-xl w-full text-white">
                        @endif
                        <input type="hidden" data-id="{{ $booking['id'] }}" id="id">
                        <input type="hidden" data-id="{{ $booking['start_date'] }} -> {{ $booking['end_date'] }}" id="time">
                        <input type="hidden" data-id="{{ $booking['date'] }}" id="date">
                        <input type="hidden" data-id="{{ $booking['firstName'] }}" id="firstName">
                        <input type="hidden" data-id="{{ $booking['lastName'] }}" id="lastName">
                        <input type="hidden" data-id="{{ $booking['email'] }}" id="email">
                        <input type="hidden" data-id="{{ $booking['phone'] }}" id="phone">
                        <input type="hidden" data-id="{{ $booking['checkDate'] }}" id="checkDate">
                        {{ $booking['start_date'] }} -> {{ $booking['end_date'] }}
                    </button>
                    @php
                    $hasBookings = true;
                    @endphp
                    @endif
                    @if ($index == count($bookings) - 1)
                    @if (!$hasBookings)
                    <p class="text-center">{{ __('messages.noBooking') }}</p>
                    @endif
                    @endif

                    @empty
                    <p class="text-center">{{ __('messages.noBooking') }}</p>
                    @endforelse
        </div>
        @endforeach
    </div>
</div>


<div class="hidden md:grid xl:hidden grid-cols-2 gap-8 pb-5">
    <div class="col-span-1 grid grid-cols-1 gap-2 h-fit">
        @foreach (['Mon', 'Wed', 'Fri', 'Sun'] as $day)
        <div class="col-span-1 grid py-5 px-8 border shadow-md rounded-xl bg-gray-50 gap-2 h-fit">
            <p class="text-center text-green-500 font-semibold mb-5">{{ $day }}</p>
            @php
            $hasBookings = false;
            @endphp
            @forelse ($bookings as $index => $booking)
            @if ($booking['day'] == $day)
            @if ($booking['status'] == 1 && $booking['checkDate'] != 'now')
            <button class="btnBooking @if (App::isLocale('ar')) ltr @endif bg-blue-500 hover:bg-blue-800 text-xs py-1 rounded-xl w-full text-white">
                @elseif($booking['checkDate'] == 'now')
                <button class="btnBooking @if (App::isLocale('ar')) ltr @endif bg-red-500 hover:bg-red-800 text-xs py-1 rounded-xl w-full text-white">
                    @else
                    <button class="btnBooking @if (App::isLocale('ar')) ltr @endif bg-gray-500 hover:bg-gray-800 text-xs py-1 rounded-xl w-full text-white">
                        @endif
                        <input type="hidden" data-id="{{ $booking['id'] }}" id="id">
                        <input type="hidden" data-id="{{ $booking['start_date'] }} -> {{ $booking['end_date'] }}" id="time">
                        <input type="hidden" data-id="{{ $booking['date'] }}" id="date">
                        <input type="hidden" data-id="{{ $booking['firstName'] }}" id="firstName">
                        <input type="hidden" data-id="{{ $booking['lastName'] }}" id="lastName">
                        <input type="hidden" data-id="{{ $booking['email'] }}" id="email">
                        <input type="hidden" data-id="{{ $booking['phone'] }}" id="phone">
                        <input type="hidden" data-id="{{ $booking['checkDate'] }}" id="checkDate">
                        {{ $booking['start_date'] }} -> {{ $booking['end_date'] }}
                    </button>
                    @php
                    $hasBookings = true;
                    @endphp
                    @endif
                    @if ($index == count($bookings) - 1)
                    @if (!$hasBookings)
                    <p class="text-center">{{ __('messages.noBooking') }}</p>
                    @endif
                    @endif

                    @empty
                    <p class="text-center">{{ __('messages.noBooking') }}</p>
                    @endforelse
        </div>
        @endforeach
    </div>
    <div class="col-span-1 grid grid-cols-1 gap-2 h-fit">
        @foreach (['Tue', 'Thur', 'Sat'] as $day)
        <div class="col-span-1 grid py-5 px-8 border shadow-md rounded-xl bg-gray-50 gap-2 h-fit">
            <p class="text-center text-green-500 font-semibold mb-5">{{ $day }}</p>
            @php
            $hasBookings = false;
            @endphp
            @forelse ($bookings as $index => $booking)
            @if ($booking['day'] == $day)
            @if ($booking['status'] == 1 && $booking['checkDate'] != 'now')
            <button class="btnBooking @if (App::isLocale('ar')) ltr @endif bg-blue-500 hover:bg-blue-800 text-xs py-1 rounded-xl w-full text-white">
                @elseif($booking['checkDate'] == 'now')
                <button class="btnBooking @if (App::isLocale('ar')) ltr @endif bg-red-500 hover:bg-red-800 text-xs py-1 rounded-xl w-full text-white">
                    @else
                    <button class="btnBooking @if (App::isLocale('ar')) ltr @endif bg-gray-500 hover:bg-gray-800 text-xs py-1 rounded-xl w-full text-white">
                        @endif
                        <input type="hidden" data-id="{{ $booking['id'] }}" id="id">
                        <input type="hidden" data-id="{{ $booking['start_date'] }} -> {{ $booking['end_date'] }}" id="time">
                        <input type="hidden" data-id="{{ $booking['date'] }}" id="date">
                        <input type="hidden" data-id="{{ $booking['firstName'] }}" id="firstName">
                        <input type="hidden" data-id="{{ $booking['lastName'] }}" id="lastName">
                        <input type="hidden" data-id="{{ $booking['email'] }}" id="email">
                        <input type="hidden" data-id="{{ $booking['phone'] }}" id="phone">
                        <input type="hidden" data-id="{{ $booking['checkDate'] }}" id="checkDate">
                        {{ $booking['start_date'] }} -> {{ $booking['end_date'] }}
                    </button>
                    @php
                    $hasBookings = true;
                    @endphp
                    @endif
                    @if ($index == count($bookings) - 1)
                    @if (!$hasBookings)
                    <p class="text-center">{{ __('messages.noBooking') }}</p>
                    @endif
                    @endif

                    @empty
                    <p class="text-center">{{ __('messages.noBooking') }}</p>
                    @endforelse
        </div>
        @endforeach
    </div>
</div>

<div class="grid md:hidden xl:hidden grid-cols-1 gap-4 pb-10">
    @foreach (['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'] as $day)
    <div class="col-span-1 grid grid-cols-1 gap-2 h-fit">
        <div class="col-span-1 grid py-5 px-8 border shadow-md rounded-xl bg-gray-50 gap-2">
            <p class="text-center text-green-500 font-semibold mb-5">{{ $day }}</p>
            @php
            $hasBookings = false;
            @endphp
            @forelse ($bookings as $index => $booking)
            @if ($booking['day'] == $day)
            @if ($booking['status'] == 1 && $booking['checkDate'] != 'now')
            <button class="btnBooking @if (App::isLocale('ar')) ltr @endif bg-blue-500 hover:bg-blue-800 text-xs py-1 rounded-xl w-full text-white">
                @elseif($booking['checkDate'] == 'now')
                <button class="btnBooking @if (App::isLocale('ar')) ltr @endif bg-red-500 hover:bg-red-800 text-xs py-1 rounded-xl w-full text-white">
                    @else
                    <button class="btnBooking @if (App::isLocale('ar')) ltr @endif bg-gray-500 hover:bg-gray-800 text-xs py-1 rounded-xl w-full text-white">
                        @endif
                        <input type="hidden" data-id="{{ $booking['id'] }}" id="id">
                        <input type="hidden" data-id="{{ $booking['start_date'] }} -> {{ $booking['end_date'] }}" id="time">
                        <input type="hidden" data-id="{{ $booking['date'] }}" id="date">
                        <input type="hidden" data-id="{{ $booking['firstName'] }}" id="firstName">
                        <input type="hidden" data-id="{{ $booking['lastName'] }}" id="lastName">
                        <input type="hidden" data-id="{{ $booking['email'] }}" id="email">
                        <input type="hidden" data-id="{{ $booking['phone'] }}" id="phone">
                        <input type="hidden" data-id="{{ $booking['checkDate'] }}" id="checkDate">
                        {{ $booking['start_date'] }} -> {{ $booking['end_date'] }}
                    </button>
                    @php
                    $hasBookings = true;
                    @endphp
                    @endif
                    @if ($index == count($bookings) - 1)
                    @if (!$hasBookings)
                    <p class="text-center">{{ __('messages.noBooking') }}</p>
                    @endif
                    @endif

                    @empty
                    <p class="text-center">{{ __('messages.noBooking') }}</p>
                    @endforelse
        </div>
    </div>
    @endforeach
</div>

<dialog id="myModal" class="w-full h-full bg-transparent">
    <div class="w-full h-full flex items-center justify-center bg-transparent">
        <div class="w-full md:w-1/2 xl:w-1/3 relative bg-gray-100 rounded-xl shadow">
            <div onclick="document.getElementById('myModal').close();" class="absolute top-2 @if (App::isLocale('en')) right-2 @endif @if (App::isLocale('ar')) left-2 @endif cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </div>
            <div class="grid grid-cols-2 gap-5 py-10 px-10">
                <div id="CheckDate"></div>
                <div class="col-span-2">
                    <div class="w-full grid gap-2">
                        <label for="showEndTime" class="underline underline-offset-4">{{ __('messages.dateTime') }}</label>
                        <p id="showDate" class="w-full text-xl px-2 @if (App::isLocale('ar')) ltr @endif"></p>
                        <p id="showTime" class="w-full text-xl px-2 @if (App::isLocale('ar')) ltr @endif"></p>
                    </div>
                </div>
                <div class="col-span-2">
                    <span class="underline underline-offset-4">{{ __('messages.bookedBy') }}</span>
                    <p id="showName" class="px-2"></p>
                </div>
                <div class="col-span-2 flex items-center gap-3">
                    <div class="w-full grid gap-1">
                        <label for="showEmail" class="underline underline-offset-4">{{ __('messages.Emailcontact') }}</label>
                        <a href="" id="showEmail" class="w-full text-blue-500 px-2"></a>
                    </div>
                    <div class="w-full grid gap-1">
                        <label for="showEmail" class="underline underline-offset-4">{{ __('messages.phone') }}</label>
                        <a href="" id="showPhone" class="w-full text-blue-500 px-2 @if (App::isLocale('ar')) ltr @endif"></a>
                    </div>
                </div>
                <div class="col-span-2 hidden" id="emptying">
                    <hr class="col-span-2 pb-5">
                    <p class="pb-2 text-sm flex items-center gap-1">
                        <svg fill="none" viewBox="0 0 24 24" width="22" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13 17C13 17.5523 12.5523 18 12 18C11.4477 18 11 17.5523 11 17C11 16.4477 11.4477 16 12 16C12.5523 16 13 16.4477 13 17Z" fill="red" />
                            <path clip-rule="evenodd" d="M12 6C12.5523 6 13 6.44772 13 7V13C13 13.5523 12.5523 14 12 14C11.4477 14 11 13.5523 11 13V7C11 6.44772 11.4477 6 12 6Z" fill="red" fill-rule="evenodd" />
                            <path clip-rule="evenodd" d="M12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4ZM2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12Z" fill="red" fill-rule="evenodd" />
                        </svg>
                        {{ __('messages.emptyOneClick') }}
                    </p>
                    <button class="confEmpty px-3 py-2 bg-red-500 text-white rounded-md hover:bg-red-800" onclick="document.getElementById('myModal').close();">
                        {{ __('messages.Emptying') }}
                    </button>
                </div>
                <hr class="col-span-2">
                <div class="col-span-2">
                    <p class="pb-2 text-sm flex items-center gap-1">
                        <svg fill="none" viewBox="0 0 24 24" width="22" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13 17C13 17.5523 12.5523 18 12 18C11.4477 18 11 17.5523 11 17C11 16.4477 11.4477 16 12 16C12.5523 16 13 16.4477 13 17Z" fill="red" />
                            <path clip-rule="evenodd" d="M12 6C12.5523 6 13 6.44772 13 7V13C13 13.5523 12.5523 14 12 14C11.4477 14 11 13.5523 11 13V7C11 6.44772 11.4477 6 12 6Z" fill="red" fill-rule="evenodd" />
                            <path clip-rule="evenodd" d="M12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4ZM2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12Z" fill="red" fill-rule="evenodd" />
                        </svg>
                        {{ __('messages.deleteOneClick') }}
                    </p>
                    <button class="confDelete px-3 py-2 bg-red-500 text-white rounded-md hover:bg-red-800" onclick="document.getElementById('myModal').close();">
                        {{ __('messages.delete') }}
                    </button>
                </div>
            </div>
        </div>
    </div>

</dialog>

<script>
    $(document).ready(function() {
        let id;
        let bookingElement;

        $(document).on('click', ".btnBooking", function() {
            document.getElementById('myModal').showModal();

            id = $(this).find("#id").data("id");
            bookingElement = $(this);

            let bookingDate = $(this).find("#date").data("id");
            let bookingTime = $(this).find("#time").data("id");
            let bookingFirstName = $(this).find("#firstName").data("id");
            let bookingLastName = $(this).find("#lastName").data("id");
            let bookingEmail = $(this).find("#email").data("id");
            let bookingPhone = $(this).find("#phone").data("id");
            let bookingCheckDate = $(this).find("#checkDate").data("id");

            if (bookingCheckDate == 'now') {
                $('#CheckDate').html('<p class="text-red-500 font-semibold">{{ __("messages.now") }}</p>');
            } else if (bookingCheckDate == 'finished') {
                $('#CheckDate').html('<p class="text-gray-500 font-semibold">{{ __("messages.finished") }}</p>');
            } else {
                $('#CheckDate').html('<p class="text-blue-500 font-semibold">{{ __("messages.notStart") }}</p>');
            }

            $('#showDate').text(bookingDate);
            $('#showTime').text(bookingTime);
            if (bookingEmail == '' && bookingPhone == '') {
                $('#showName').empty();
                $('#showEmail').empty();
                $('#showEmail').attr("href", '#');
                $('#showPhone').empty();
                $('#showPhone').attr("href", '#');

                $('#emptying').addClass('hidden');

            } else {
                nameElement = $('#showName').text(bookingFirstName + " " + bookingLastName);
                emailElement = $('#showEmail').text(bookingEmail);
                $('#showEmail').attr("href", 'mailto:' + bookingEmail);
                phoneElement = $('#showPhone').text(bookingPhone);
                $('#showPhone').attr("href", 'tel:' + bookingPhone);

                $('#emptying').removeClass('hidden');
            }
        });

        $('.confDelete').click(function() {
            $.ajax({
                url: '/DocBooker/dashboard/deleteAppointment/' + id,
                method: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response === 'deleted') {
                        bookingElement.remove();

                        Swal.fire({
                            title: '{{ __("messages.deleteSucc") }}',
                            showConfirmButton: false,
                            timer: 2500,
                            background: 'linear-gradient(90deg, rgba(139, 192, 74, 1) 1%, rgba(0, 116, 217, 1) 60%, rgba(0, 116, 217, 1) 100%)',
                            color: 'white',
                            toast: true,
                            timerProgressBar: true,
                        })
                    }
                }
            });
        });
        $('.confEmpty').click(function() {
            $.ajax({
                url: '/DocBooker/dashboard/updateAppointment/' + id,
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response === 'updated') {
                        bookingElement.removeClass('btnBooking bg-blue-500 hover:bg-blue-800');
                        bookingElement.addClass('bg-gray-500 hover:bg-gray-800');

                        Swal.fire({
                            title: '{{ __("messages.emptySucc") }}',
                            showConfirmButton: false,
                            timer: 2500,
                            background: 'linear-gradient(90deg, rgba(139, 192, 74, 1) 1%, rgba(0, 116, 217, 1) 60%, rgba(0, 116, 217, 1) 100%)',
                            color: 'white',
                            toast: true,
                            timerProgressBar: true,
                        })
                    }
                }
            });
        });
    })
</script>