@php
$checkEmpty = false;
@endphp
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5 my-5 px-3 md:px-0">
    @forelse ($bookings as $booking)
    @if ($booking['status'] == 0 && $booking['checkDate'] == 'not started yet')
    <div class="booking col-span-1 p-5 bg-gray-50 rounded-xl shadow-md border flex flex-col justify-center items-center">
        <p class="text-xl text-black font-semibold @if (App::isLocale('ar')) ltr @endif">{{ $booking['start_date'] }} -> {{ $booking['end_date'] }}</p>
        <div class="flex items-center justify-between mt-10 text-white">
            <button data-id="{{ $booking['id'] }}" data-date="{{ $booking['date'] }}" onclick="document.getElementById('bookingModel').showModal()" class="bookBtn py-1 px-10 rounded-xl font-semibold bg-blue-400 hover:bg-blue-800">
                {{ __('messages.bookNow') }}
            </button>
        </div>
    </div>
    @php
    $checkEmpty = false;
    @endphp
    @elseif($booking['status'] == 1 && $booking['checkDate'] == 'not started yet' && $patientId == $booking['patientId'])
    <div class="booking col-span-1 p-5 bg-gray-50 rounded-xl shadow-md border border-red-200 flex flex-col justify-center items-center">
        <p class="text-xl text-black font-semibold @if (App::isLocale('ar')) ltr @endif">{{ $booking['start_date'] }} -> {{ $booking['end_date'] }}</p>
        <p class="text-red-500 py-2">{{ $booking['differenceDate'] }}</p>
        <div class="flex items-center justify-between text-white">
            <div class="py-1 px-10 rounded-xl font-semibold bg-gray-200 text-red-500">
                {{ __('messages.yourBooking') }}
            </div>
        </div>
    </div>
    @php
    $checkEmpty = false;
    @endphp
    @elseif($booking['status'] == 1 && $booking['checkDate'] == 'now' && $patientId == $booking['patientId'])
    <div class="booking col-span-1 p-5 bg-gray-50 rounded-xl shadow-md border border-red-200 flex flex-col justify-center items-center">
        <p class="text-xl text-black font-semibold @if (App::isLocale('ar')) ltr @endif">{{ $booking['start_date'] }} -> {{ $booking['end_date'] }}</p>
        <p class="text-red-500 py-2">{{ __('messages.startedNow') }}</p>
        <div class="flex items-center justify-between text-white">
            <div class="py-1 px-10 rounded-xl font-semibold bg-gray-200 text-red-500">
                {{ __('messages.yourBooking') }}
            </div>
        </div>
    </div>
    @php
    $checkEmpty = false;
    @endphp
    @else
    @php
    $checkEmpty = true;
    @endphp
    @endif
    <dialog id="bookingModel" class="w-full h-full bg-transparent">
        <div class="w-full h-full flex items-center justify-center bg-transparent">
            <div class="w-full md:w-1/2 xl:w-1/3 relative bg-gray-100 rounded-xl shadow">
                <div onclick="document.getElementById('bookingModel').close();" class="absolute top-2 @if (App::isLocale('en')) right-2 @endif @if (App::isLocale('ar')) left-2 @endif cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </div>
                <div class="pt-10 pb-4 px-10 text-sm md:text-xl md:text-xl font-semibold">
                    {{ __('messages.interest') }}
                </div>
                <hr>
                <p class="px-10 text-red-500 pt-4 text-sm md:text-base font-semibold">{{ __('messages.read') }}:</p>
                <div class="text-sm md:text-base pt-2 px-12 opacity-80">
                    <p class="pb-1">{{ __('messages.cancelAllowed') }}</p>
                    <p class="py-1">{{ __('messages.onceAllowed') }}</p>
                    <p class="pb-1">{{ __('messages.toDelete') }}</p>
                </div>
                <div class="flex items-center gap-1 pt-2 pb-4 px-10 text-sm md:text-base">
                    <input type="checkbox" id="acceptAll" class="checkbox cursor-pointer bg-gray-50 border-black focus:ring-3 focus:ring-blue-300 h-4 w-4 rounded">
                    <label for="acceptAll" class="cursor-pointer font-semibold">{{ __('messages.acceptAll') }}</label>
                </div>
                <hr>
                <div class="flex w-full pt-4 pb-8 px-10 justify-between items-center text-white text-sm md:text-base">
                    <button class="btnBook cursor-not-allowed bg-gray-400 py-1 px-5 rounded-md">{{ __('messages.bookNow') }}</button>
                    <button onclick="document.getElementById('bookingModel').close();" class="confBook hidden bg-blue-500 hover:bg-blue-800 py-1 px-5 rounded-md">{{ __('messages.bookNow') }}</button>
                </div>
            </div>
        </div>
    </dialog>
    @empty
    @php
    $checkEmpty = true;
    @endphp
    @endforelse
    @if ($checkEmpty)
    <div class="col-span-3">
        <p class="text-center">{{ __('messages.noBooking') }}</p>
    </div>
    @endif
</div>

<script>
    $(document).ready(function() {
        var id;
        var date;
        var parentElement;

        $(".booking").each(function() {
            var bookingElement;
            $(".bookBtn").click(function() {
                id = $(this).data("id");
                date = $(this).data('date');

                parentElement = $(this).parent();
                bookingElement = parentElement.parent();
            });
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

                        parentElement.empty();
                        parentElement.html(`
                            <div class="py-1 px-10 rounded-xl font-semibold bg-gray-300 text-red-500">
                                {{ __('messages.yourBooking') }}
                            </div>
                        `);

                    } else if (response === 'notBooked') {
                        Swal.fire({
                            title: '{{ __("messages.errorOnce") }}',
                            showConfirmButton: false,
                            timer: 2500,
                            background: 'red',
                            color: 'white',
                            toast: true,
                            timerProgressBar: true,
                        });
                    } else if (typeof response === 'object' && response.error) {
                        Swal.fire({
                            title: 'Error',
                            text: response.error,
                            showConfirmButton: false,
                            timer: 2500,
                            background: 'red',
                            color: 'white',
                            toast: true,
                            timerProgressBar: true,
                        });

                        console.log(response.error);
                        
                    }
                },
                error: function(xhr, status, error) {
                    let errorMsg = 'Error';
                    if (xhr.responseJSON && xhr.responseJSON.error) {
                        errorMsg = xhr.responseJSON.error;
                    } else if (xhr.responseText) {
                        errorMsg = xhr.responseText;
                    }
                    Swal.fire({
                        title: 'Error',
                        text: errorMsg,
                        showConfirmButton: false,
                        timer: 2500,
                        background: 'red',
                        color: 'white',
                        toast: true,
                        timerProgressBar: true,
                    });
                    console.log(errorMsg);

                }
            });
        });
    })
</script>