    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5 my-5">
        @forelse ($bookings as $booking)
        <div class="booking col-span-1 p-5 bg-gray-50 rounded-xl shadow-md border">
            @if ($booking['checkDate'] === 'now')
            <p class="text-red-500 font-semibold">{{ __('messages.now') }}</p>

            @elseif ($booking['checkDate'] === 'finished')
            <p class="text-gray-500 font-semibold">{{ __('messages.finished') }}</p>

            @else
            <p class="text-blue-500 font-semibold">{{ __('messages.notStart') }}</p>
            @endif
            <p class="text-md text-green-500 pt-3 @if (App::isLocale('ar')) ltr @endif">{{ $booking['start_date'] }} -> {{ $booking['end_date'] }}</p>
            <div class="py-3">
                <span class="underline underline-offset-4">{{ __('messages.bookedBy') }}</span>
                <a class="px-2" id="name">{{ $booking['firstName'] }} {{ $booking['lastName'] }}</a>
                <p></p>
            </div>
            <div class="py-3">
                <span class="underline underline-offset-4">{{ __('messages.Emailcontact') }}</span>
                <a href="mailto:{{ $booking['email'] }}" class="px-2 text-blue-500" id="email">{{ $booking['email'] }}</a>
            </div>
            <div class="py-3 flex items-center">
                <span class="underline underline-offset-4">{{ __('messages.phone') }}</span>
                <a href="tel:{{ $booking['phone'] }}" class="px-2 text-blue-500">
                    <p class="@if (App::isLocale('ar')) ltr @endif" id="phone">{{ $booking['phone'] }}</p>
                </a>
            </div>
            @if ($booking['status'] == 1)
            <p class="bookedBtn mt-8 py-1 px-3 text-center bg-blue-500 rounded-md text-white">{{ __('messages.booked') }}</p>
            @else
            <p class="mt-8 py-1 px-3 text-center bg-gray-500 rounded-md text-white">{{ __('messages.notBooked') }}</p>
            @endif
            <div class="flex items-center justify-between mt-10 text-white">
                @if ($booking['status'] == 1)
                <button data-id="{{ $booking['id'] }}" class="empty py-1 px-3 rounded-xl bg-red-500 hover:bg-red-800" onclick="document.getElementById('editModal').showModal()">
                    {{ __('messages.Emptying') }}
                </button>
                @endif
                <button data-id="{{ $booking['id'] }}" onclick="document.getElementById('deletModal').showModal()" class="delete py-1 px-3 rounded-xl bg-red-500 hover:bg-red-800">
                    <input type="hidden" data-id="{{ $booking['id'] }}" id="id">
                    {{ __('messages.delete') }}
                </button>
            </div>
        </div>
        <dialog id="editModal" class="w-full h-full bg-transparent">
            <div class="w-full h-full flex items-center justify-center bg-transparent">
                <div class="w-full md:w-1/2 xl:w-1/3 relative bg-gray-100 rounded-xl shadow">
                    <div onclick="document.getElementById('editModal').close();" class="absolute top-2 @if (App::isLocale('en')) right-2 @endif @if (App::isLocale('ar')) left-2 @endif cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </div>
                    <div class="flex py-10 justify-center text-md md:text-xl font-semibold">
                        {{ __('messages.askEmptying') }}
                    </div>
                    <div class="flex w-full py-10 px-10 justify-between items-center text-white">
                        <button onclick="document.getElementById('editModal').close();" class="bg-blue-500 py-1 px-5 rounded-md">
                            {{ __('messages.no') }}
                        </button>
                        <button onclick="document.getElementById('editModal').close();" class="confEmptying bg-red-500 py-1 px-5 rounded-md">{{ __('messages.yes') }}</button>
                    </div>
                </div>
            </div>

        </dialog>
        <dialog id="deletModal" class="w-full h-full bg-transparent">
            <div class="w-full h-full flex items-center justify-center bg-transparent">
                <div class="w-full md:w-1/2 xl:w-1/3 relative bg-gray-100 rounded-xl shadow">
                    <div onclick="document.getElementById('deletModal').close();" class="absolute top-2 @if (App::isLocale('en')) right-2 @endif @if (App::isLocale('ar')) left-2 @endif cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </div>
                    <div class="flex py-10 justify-center text-md md:text-xl font-semibold">
                        {{ __('messages.askDelete') }}
                    </div>
                    <div class="flex w-full py-10 px-10 justify-between items-center text-white">
                        <button onclick="document.getElementById('deletModal').close();" class="bg-blue-500 py-1 px-5 rounded-md">
                            {{ __('messages.no') }}
                        </button>
                        <button onclick="document.getElementById('deletModal').close();" class="confDelete bg-red-500 py-1 px-5 rounded-md">{{ __('messages.yes') }}</button>
                    </div>
                </div>
            </div>

        </dialog>
        @empty
        <div class="col-span-3">
            <p class="text-center">{{ __('messages.noBooking') }}</p>
        </div>
        @endforelse
    </div>

    <script>
        $(document).ready(function() {
            var id;
            var bookingElement;

            $(".booking").each(function() {
                $(".delete").click(function() {
                    id = $(this).data("id");

                    var parentElement = $(this).parent();
                    bookingElement = parentElement.parent();
                });
                $(".empty").click(function() {
                    id = $(this).data("id");
                });
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
            $('.confEmptying').click(function() {
                $.ajax({
                    url: '/DocBooker/dashboard/updateAppointment/' + id,
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response === 'updated') {
                            $('#name').empty();
                            $('#email').empty();
                            $('#phone').empty();
                            $('.bookedBtn').empty();
                            $('.bookedBtn').text('{{ __("messages.notBooked") }}');
                            $('.bookedBtn').removeClass('bg-blue-500');
                            $('.bookedBtn').addClass('bg-gray-500');

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