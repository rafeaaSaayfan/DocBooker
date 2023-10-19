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

                    @if ($booking['status'] == 0 && $booking['checkDate'] == 'not started yet')
                        <button class="btnBooking @if (App::isLocale('ar')) ltr @endif bg-gray-500 hover:bg-gray-800 text-xs py-1 rounded-xl w-full text-white">
                            {{ $booking['start_date'] }} -> {{ $booking['end_date'] }}
                        @php
                            $hasBookings = true;
                        @endphp
                    @elseif($booking['status'] == 1 && $booking['checkDate'] == 'not started yet' && $patientId == $booking['patientId'])
                        <button class="bookedBtn @if (App::isLocale('ar')) ltr @endif bg-blue-500 hover:bg-blue-800 text-xs py-1 rounded-xl w-full text-white">
                            {{ $booking['start_date'] }} -> {{ $booking['end_date'] }}
                            <input type="hidden" data-id="{{ $booking['differenceDate'] }}" id="differenceDate">
                        @php
                            $hasBookings = true;
                        @endphp
                    @elseif($booking['status'] == 1 && $booking['checkDate'] == 'now' && $patientId == $booking['patientId'])
                        <button class="bookedBtn @if (App::isLocale('ar')) ltr @endif bg-red-500 hover:bg-red-800 text-xs py-1 rounded-xl w-full text-white">
                            {{ $booking['start_date'] }} -> {{ $booking['end_date'] }}
                        @php
                            $hasBookings = true;
                        @endphp
                    @else
                        @php
                            $hasBookings = false;
                        @endphp
                    @endif
                            <input type="hidden" data-id="{{ $booking['id'] }}" id="id">
                            <input type="hidden" data-id="{{ $booking['start_date'] }} -> {{ $booking['end_date'] }}" id="time">
                            <input type="hidden" data-id="{{ $booking['date'] }}" id="date">
                            <input type="hidden" data-id="{{ $booking['checkDate'] }}" id="checkDate">
                    </button>
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

                    @if ($booking['status'] == 0 && $booking['checkDate'] == 'not started yet')
                        <button class="btnBooking @if (App::isLocale('ar')) ltr @endif bg-gray-500 hover:bg-gray-800 text-xs py-1 rounded-xl w-full text-white">
                            {{ $booking['start_date'] }} -> {{ $booking['end_date'] }}
                        @php
                            $hasBookings = true;
                        @endphp
                    @elseif($booking['status'] == 1 && $booking['checkDate'] == 'not started yet' && $patientId == $booking['patientId'])
                        <button class="bookedBtn @if (App::isLocale('ar')) ltr @endif bg-blue-500 hover:bg-blue-800 text-xs py-1 rounded-xl w-full text-white">
                            {{ $booking['start_date'] }} -> {{ $booking['end_date'] }}
                            <input type="hidden" data-id="{{ $booking['differenceDate'] }}" id="differenceDate">
                        @php
                            $hasBookings = true;
                        @endphp
                    @elseif($booking['status'] == 1 && $booking['checkDate'] == 'now' && $patientId == $booking['patientId'])
                        <button class="bookedBtn @if (App::isLocale('ar')) ltr @endif bg-red-500 hover:bg-red-800 text-xs py-1 rounded-xl w-full text-white">
                            {{ $booking['start_date'] }} -> {{ $booking['end_date'] }}
                        @php
                            $hasBookings = true;
                        @endphp
                    @else
                        @php
                            $hasBookings = false;
                        @endphp
                    @endif
                            <input type="hidden" data-id="{{ $booking['id'] }}" id="id">
                            <input type="hidden" data-id="{{ $booking['start_date'] }} -> {{ $booking['end_date'] }}" id="time">
                            <input type="hidden" data-id="{{ $booking['date'] }}" id="date">
                            <input type="hidden" data-id="{{ $booking['checkDate'] }}" id="checkDate">
                    </button>
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
                @if ($booking['status'] == 0 && $booking['checkDate'] == 'not started yet')
                    <button class="btnBooking @if (App::isLocale('ar')) ltr @endif bg-gray-500 hover:bg-gray-800 text-xs py-1 rounded-xl w-full text-white">
                        {{ $booking['start_date'] }} -> {{ $booking['end_date'] }}
                    @php
                        $hasBookings = true;
                    @endphp
                @elseif($booking['status'] == 1 && $booking['checkDate'] == 'not started yet' && $patientId == $booking['patientId'])
                    <button class="bookedBtn @if (App::isLocale('ar')) ltr @endif bg-blue-500 hover:bg-blue-800 text-xs py-1 rounded-xl w-full text-white">
                        {{ $booking['start_date'] }} -> {{ $booking['end_date'] }}
                        <input type="hidden" data-id="{{ $booking['differenceDate'] }}" id="differenceDate">
                    @php
                        $hasBookings = true;
                    @endphp
                @elseif($booking['status'] == 1 && $booking['checkDate'] == 'now' && $patientId == $booking['patientId'])
                    <button class="bookedBtn @if (App::isLocale('ar')) ltr @endif bg-red-500 hover:bg-red-800 text-xs py-1 rounded-xl w-full text-white">
                        {{ $booking['start_date'] }} -> {{ $booking['end_date'] }}
                    @php
                        $hasBookings = true;
                    @endphp
                @else
                    @php
                        $hasBookings = false;
                    @endphp
                @endif
                        <input type="hidden" data-id="{{ $booking['id'] }}" id="id">
                        <input type="hidden" data-id="{{ $booking['start_date'] }} -> {{ $booking['end_date'] }}" id="time">
                        <input type="hidden" data-id="{{ $booking['date'] }}" id="date">
                        <input type="hidden" data-id="{{ $booking['checkDate'] }}" id="checkDate">
                </button>
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

                @if ($booking['status'] == 0 && $booking['checkDate'] == 'not started yet')
                    <button class="btnBooking @if (App::isLocale('ar')) ltr @endif bg-gray-500 hover:bg-gray-800 text-xs py-1 rounded-xl w-full text-white">
                        {{ $booking['start_date'] }} -> {{ $booking['end_date'] }}
                    @php
                        $hasBookings = true;
                    @endphp
                @elseif($booking['status'] == 1 && $booking['checkDate'] == 'not started yet' && $patientId == $booking['patientId'])
                    <button class="bookedBtn @if (App::isLocale('ar')) ltr @endif bg-blue-500 hover:bg-blue-800 text-xs py-1 rounded-xl w-full text-white">
                        {{ $booking['start_date'] }} -> {{ $booking['end_date'] }}
                        <input type="hidden" data-id="{{ $booking['differenceDate'] }}" id="differenceDate">
                    @php
                        $hasBookings = true;
                    @endphp
                @elseif($booking['status'] == 1 && $booking['checkDate'] == 'now' && $patientId == $booking['patientId'])
                    <button class="bookedBtn @if (App::isLocale('ar')) ltr @endif bg-red-500 hover:bg-red-800 text-xs py-1 rounded-xl w-full text-white">
                        {{ $booking['start_date'] }} -> {{ $booking['end_date'] }}
                    @php
                        $hasBookings = true;
                    @endphp
                @else
                    @php
                        $hasBookings = false;
                    @endphp
                @endif
                        <input type="hidden" data-id="{{ $booking['id'] }}" id="id">
                        <input type="hidden" data-id="{{ $booking['start_date'] }} -> {{ $booking['end_date'] }}" id="time">
                        <input type="hidden" data-id="{{ $booking['date'] }}" id="date">
                        <input type="hidden" data-id="{{ $booking['checkDate'] }}" id="checkDate">
                </button>
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

                    @if ($booking['status'] == 0 && $booking['checkDate'] == 'not started yet')
                        <button class="btnBooking @if (App::isLocale('ar')) ltr @endif bg-gray-500 hover:bg-gray-800 text-xs py-1 rounded-xl w-full text-white">
                            {{ $booking['start_date'] }} -> {{ $booking['end_date'] }}
                        @php
                            $hasBookings = true;
                        @endphp
                    @elseif($booking['status'] == 1 && $booking['checkDate'] == 'not started yet' && $patientId == $booking['patientId'])
                        <button class="bookedBtn @if (App::isLocale('ar')) ltr @endif bg-blue-500 hover:bg-blue-800 text-xs py-1 rounded-xl w-full text-white">
                            {{ $booking['start_date'] }} -> {{ $booking['end_date'] }}
                            <input type="hidden" data-id="{{ $booking['differenceDate'] }}" id="differenceDate">
                        @php
                            $hasBookings = true;
                        @endphp
                    @elseif($booking['status'] == 1 && $booking['checkDate'] == 'now' && $patientId == $booking['patientId'])
                        <button class="bookedBtn @if (App::isLocale('ar')) ltr @endif bg-red-500 hover:bg-red-800 text-xs py-1 rounded-xl w-full text-white">
                            {{ $booking['start_date'] }} -> {{ $booking['end_date'] }}
                        @php
                            $hasBookings = true;
                        @endphp
                    @else
                        @php
                            $hasBookings = false;
                        @endphp
                    @endif
                            <input type="hidden" data-id="{{ $booking['id'] }}" id="id">
                            <input type="hidden" data-id="{{ $booking['start_date'] }} -> {{ $booking['end_date'] }}" id="time">
                            <input type="hidden" data-id="{{ $booking['date'] }}" id="date">
                            <input type="hidden" data-id="{{ $booking['checkDate'] }}" id="checkDate">
                    </button>
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
        @foreach (['Tue', 'Thu', 'Sat'] as $day)
            <div class="col-span-1 grid py-5 px-8 border shadow-md rounded-xl bg-gray-50 gap-2 h-fit">
                <p class="text-center text-green-500 font-semibold mb-5">{{ $day }}</p>
                @php
                    $hasBookings = false;
                @endphp
                @forelse ($bookings as $index => $booking)
                @if ($booking['day'] == $day)

                    @if ($booking['status'] == 0 && $booking['checkDate'] == 'not started yet')
                        <button class="btnBooking @if (App::isLocale('ar')) ltr @endif bg-gray-500 hover:bg-gray-800 text-xs py-1 rounded-xl w-full text-white">
                            {{ $booking['start_date'] }} -> {{ $booking['end_date'] }}
                        @php
                            $hasBookings = true;
                        @endphp
                    @elseif($booking['status'] == 1 && $booking['checkDate'] == 'not started yet' && $patientId == $booking['patientId'])
                        <button class="bookedBtn @if (App::isLocale('ar')) ltr @endif bg-blue-500 hover:bg-blue-800 text-xs py-1 rounded-xl w-full text-white">
                            {{ $booking['start_date'] }} -> {{ $booking['end_date'] }}
                            <input type="hidden" data-id="{{ $booking['differenceDate'] }}" id="differenceDate">
                        @php
                            $hasBookings = true;
                        @endphp
                    @elseif($booking['status'] == 1 && $booking['checkDate'] == 'now' && $patientId == $booking['patientId'])
                        <button class="bookedBtn @if (App::isLocale('ar')) ltr @endif bg-red-500 hover:bg-red-800 text-xs py-1 rounded-xl w-full text-white">
                            {{ $booking['start_date'] }} -> {{ $booking['end_date'] }}
                        @php
                            $hasBookings = true;
                        @endphp
                    @else
                        @php
                            $hasBookings = false;
                        @endphp
                    @endif
                            <input type="hidden" data-id="{{ $booking['id'] }}" id="id">
                            <input type="hidden" data-id="{{ $booking['start_date'] }} -> {{ $booking['end_date'] }}" id="time">
                            <input type="hidden" data-id="{{ $booking['date'] }}" id="date">
                            <input type="hidden" data-id="{{ $booking['checkDate'] }}" id="checkDate">
                    </button>
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

                        @if ($booking['status'] == 0 && $booking['checkDate'] == 'not started yet')
                            <button class="btnBooking @if (App::isLocale('ar')) ltr @endif bg-gray-500 hover:bg-gray-800 text-xs py-1 rounded-xl w-full text-white">
                                {{ $booking['start_date'] }} -> {{ $booking['end_date'] }}
                            @php
                                $hasBookings = true;
                            @endphp
                        @elseif($booking['status'] == 1 && $booking['checkDate'] == 'not started yet' && $patientId == $booking['patientId'])
                            <button class="bookedBtn @if (App::isLocale('ar')) ltr @endif bg-blue-500 hover:bg-blue-800 text-xs py-1 rounded-xl w-full text-white">
                                {{ $booking['start_date'] }} -> {{ $booking['end_date'] }}
                                <input type="hidden" data-id="{{ $booking['differenceDate'] }}" id="differenceDate">
                            @php
                                $hasBookings = true;
                            @endphp
                        @elseif($booking['status'] == 1 && $booking['checkDate'] == 'now' && $patientId == $booking['patientId'])
                            <button class="bookedBtn @if (App::isLocale('ar')) ltr @endif bg-red-500 hover:bg-red-800 text-xs py-1 rounded-xl w-full text-white">
                                {{ $booking['start_date'] }} -> {{ $booking['end_date'] }}
                            @php
                                $hasBookings = true;
                            @endphp
                        @else
                            @php
                                $hasBookings = false;
                            @endphp
                        @endif
                                <input type="hidden" data-id="{{ $booking['id'] }}" id="id">
                                <input type="hidden" data-id="{{ $booking['start_date'] }} -> {{ $booking['end_date'] }}" id="time">
                                <input type="hidden" data-id="{{ $booking['date'] }}" id="date">
                                <input type="hidden" data-id="{{ $booking['checkDate'] }}" id="checkDate">
                        </button>
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

<dialog id="myModal" class="w-full md:w-1/2 xl:w-1/3 rounded-xl shadow bg-gray-100 h-fit">
    <div class="w-full relative">
        <div onclick="document.getElementById('myModal').close();" class="absolute top-2 @if (App::isLocale('en')) right-2 @endif @if (App::isLocale('ar')) left-2 @endif cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
        </div>
        <div class="grid grid-cols-2 pt-10">
            <div class="col-span-2 pb-4 px-5 md:px-10">
                <div class="w-full grid gap-2">
                    <label for="showEndTime" class="underline underline-offset-4">{{ __('messages.dateTime') }}</label>
                    <p id="showDate" class="w-full text-xl px-2 @if (App::isLocale('ar')) ltr @endif"></p>
                    <p id="showTime" class="w-full text-xl px-2 @if (App::isLocale('ar')) ltr @endif"></p>
                </div>
            </div>
            <hr class="col-span-2">
            <div class="col-span-2 pt-4 pb-4 px-5 md:px-10 text-sm md:text-xl font-semibold">
                {{ __('messages.interest') }}
            </div>
            <hr class="col-span-2">
            <p class="col-span-2 px-5 md:px-10 text-red-500 pt-4 text-sm md:text-base font-semibold">{{ __('messages.read') }}:</p>
            <div class="col-span-2 text-sm md:text-base pt-2 px-7 md:px-12 opacity-80">
                <p class="pb-1">{{ __('messages.cancelAllowed') }}</p>
                <p class="py-1">{{ __('messages.onceAllowed') }}</p>
                <p class="pb-1">{{ __('messages.toDelete') }}</p>
            </div>
            <div class="col-span-2 flex items-center gap-1 text-sm md:text-base pt-2 pb-4 px-5 md:px-10">
                <input type="checkbox" id="acceptAll" class="checkbox cursor-pointer bg-gray-50 border-black focus:ring-3 focus:ring-blue-300 h-4 w-4 rounded">
                <label for="acceptAll" class="cursor-pointer font-semibold">{{ __('messages.acceptAll') }}</label>
            </div>
            <hr class="col-span-2">
            <div class="col-span-2 flex w-full pt-4 pb-8 px-5 md:px-10 text-sm md:text-base justify-between items-center text-white">
                <button class="btnBook cursor-not-allowed bg-gray-400 py-1 px-5 rounded-md">{{ __('messages.bookNow') }}</button>
                <button onclick="document.getElementById('myModal').close();" class="confBook hidden bg-blue-500 hover:bg-blue-800 py-1 px-5 rounded-md">{{ __('messages.bookNow') }}</button>
            </div>
        </div>
    </div>
</dialog>

<dialog id="myModalBooked" class="w-full md:w-1/2 xl:w-1/3 rounded-xl shadow bg-gray-100 h-fit">
    <div class="w-full relative">
        <div onclick="document.getElementById('myModalBooked').close();" class="absolute top-2 @if (App::isLocale('en')) right-2 @endif @if (App::isLocale('ar')) left-2 @endif cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
        </div>
        <div class="grid grid-cols-2 pt-10">
            <div class="col-span-2 pb-4 px-5 md:px-10">
                <p id="dateTime" class="text-red-500 text-base pb-2"></p>
                <div class="w-full grid gap-2">
                    <label for="showEndTime" class="underline underline-offset-4">{{ __('messages.dateTime') }}</label>
                    <p id="showDateBooked" class="w-full text-xl px-2 @if (App::isLocale('ar')) ltr @endif"></p>
                    <p id="showTimeBooked" class="w-full text-xl px-2 @if (App::isLocale('ar')) ltr @endif"></p>
                </div>
            </div>
            <div class="col-span-2 flex w-full pt-4 pb-8 px-5 md:px-10 text-sm md:text-base justify-center items-center text-white">
                <div class="bg-gray-300 text-red-500 py-1 px-5 rounded-md">{{ __('messages.yourBooking') }}</div>
            </div>
        </div>
    </div>
</dialog>

<script>
    $(document).ready(function() {
        let id;
        let bookingElement;
        let date;

        $(document).on('click', '.btnBooking', function () {
            document.getElementById('myModal').showModal();

            id = $(this).find("#id").data("id");
            bookingElement = $(this);

            date = $(this).find("#date").data("id");
            let bookingTime = $(this).find("#time").data("id");

            $('#showDate').text(date);
            $('#showTime').text(bookingTime);
        });

        $(document).on('click', '.bookedBtn', function () {
            document.getElementById('myModalBooked').showModal();

            let bookedDate = $(this).find("#date").data("id");
            let bookedTime = $(this).find("#time").data("id");
            let checkDate = $(this).find("#checkDate").data("id");
            let differenceDate = $(this).find("#differenceDate").data("id");

            $('#showDateBooked').text(bookedDate);
            $('#showTimeBooked').text(bookedTime);

            if(checkDate == 'now') {
                $('#dateTime').text('{{ __("messages.startedNow") }}');
            } else if(checkDate == 'not started yet') {
                $('#dateTime').text(differenceDate);
            } else {
                $('#dateTime').text('');
            }
        });

        $('.checkbox').click(function() {
            $('.btnBook').toggleClass('hidden');
            $('.confBook').toggleClass('hidden');
        });

        $('.confBook').click(function() {
            $.ajax({
                url: '/DocBooker/booking/' + id + '/' + date,
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response === 'booked') {
                        Swal.fire({
                            title: '{{ __("messages.bookedSucc") }}',
                            showConfirmButton: false,
                            timer: 2500,
                            background: 'linear-gradient(90deg, rgba(139, 192, 74, 1) 1%, rgba(0, 116, 217, 1) 60%, rgba(0, 116, 217, 1) 100%)',
                            color: 'white',
                            toast: true,
                            timerProgressBar: true,
                        });

                        bookingElement.removeClass('btnBooking bg-gray-500 hover:bg-gray-800');
                        bookingElement.addClass('bookedBtn bg-blue-500 hover:bg-blue-800');

                    } else {
                        Swal.fire({
                            title: '{{ __("messages.errorOnce") }}',
                            showConfirmButton: false,
                            timer: 2500,
                            background: 'red',
                            color: 'white',
                            toast: true,
                            timerProgressBar: true,
                        });
                    }
                }
            });
        });
    })
</script>
