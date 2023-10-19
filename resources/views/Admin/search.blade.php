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
    <style>

        .radio {
            appearance: none;
            /* border-radius: 50%; */
            width: 16px;
            height: 16px;
            transition: 0.2s all linear;
        }

        .radio:checked {
            border-width: 6px;
        }

    </style>
</head>
<body class="@if (App::isLocale('ar')) rtl @endif">
    @include('Admin.navigation.nav')
    <div class="md:flex" id="content">
        <div class="xl:w-1/6 md:w-1/4"></div>
        <div class="my-20 md:my-5 xl:my-14 xl:w-5/6 md:w-3/4 md:mx-5 xl:mx-20 shadow rounded-xl border p-5">
            <div class="mb-4">
                <form class="w-full flex flex-col gap-4" role="search">
                    @csrf
                    <input type="search" placeholder="{{ __('messages.search') }}..." class="search cursor-text text-black w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                    {{-- <select id="filterBy" class="w-1/2 md:w-1/3 xl:w-1/5 px-3 py-1 md:py-1 xl:py-2 border rounded-lg bg-transparent focus:outline-none focus:border-blue-500 cursor-pointer">
                        <option disabled selected>{{ __('messages.filter') }}</option>
                        <option value="lastName">{{ __('messages.lastName') }}</option>
                        <option value="email">{{ __('messages.emailSearch') }}</option>
                        <option value="phone">{{ __('messages.phoneNumber') }}</option>
                    </select> --}}
                    <div class="flex items-center gap-10">
                        <div class="flex items-center gap-1">
                            <input type="radio" value="lastName" name="choice" id="name" class="radio cursor-pointer rounded-full border border-blue-500">
                            <label for="name" class="cursor-pointer">{{ __('messages.lastName') }}</label>
                        </div>
                        <div class="flex items-center gap-1">
                            <input type="radio" value="email" name="choice" id="email" class="radio cursor-pointer rounded-full border border-blue-500" checked>
                            <label for="email" class="cursor-pointer">{{ __('messages.emailSearch') }}</label>
                        </div>
                        <div class="flex items-center gap-1">
                            <input type="radio" value="phone" name="choice" id="phone" class="radio cursor-pointer rounded-full border border-blue-500">
                            <label for="phone" class="cursor-pointer">{{ __('messages.phoneNumber') }}</label>
                        </div>
                    </div>
                </form>
            </div>
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="w-1/4 py-2 font-semibold bg-gray-100 border hidden lg:table-cell">{{ __('messages.name') }}</th>
                        <th class="w-1/4 py-2 font-semibold bg-gray-100 border hidden lg:table-cell">{{ __('messages.emailSearch') }}</th>
                        <th class="w-1/4 py-2 font-semibold bg-gray-100 border hidden lg:table-cell">{{ __('messages.phoneNumber') }}</th>
                        <th class="w-1/4 py-2 font-semibold bg-gray-100 border hidden lg:table-cell">{{ __('messages.actions') }}</th>
                    </tr>
                </thead>
                <tbody class="searchResult">
                </tbody>

            </table>
        </div>
    </div>
</div>
</body>

@if(session('deleted'))
    @if (App::isLocale('ar'))
    <script>
        Swal.fire({
            position: 'top-start',
            title: '{{ session('deleted') }}',
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
            position: 'top-end',
            title: '{{ session('deleted') }}',
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

{{-- <script src="{{ asset('storage/assets/js/app.js') }}"></script> --}}
<script>

let addPatientBtn = document.getElementById("searchBtn");

addPatientBtn.classList.add("bg-blue-500");

</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        function loadSearch() {
            $.ajax({
                url: "{{ route('getAllUser') }}",
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('.searchResult').html(response);
                }
            });
        }
        loadSearch();
        $('.search').on('input', function() {
            var query = $(this).val();
            var filterBy = $('input[name="choice"]:checked').val();


            if(query) {
                $.ajax({
                    url: "{{ route('getSearch') }}",
                    method: 'POST',
                    data: {
                        query: query,
                        filterBy: filterBy,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('.searchResult').html(response);
                    }
                });
            } else {
                loadSearch();
            }
        });
    });
  </script>

</html>
