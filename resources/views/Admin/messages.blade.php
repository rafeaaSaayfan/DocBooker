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
        <div class="my-16 md:my-5 xl:my-10 xl:w-5/6 md:w-3/4 md:mx-5 xl:mx-20 grid grid-cols-1 gap-5">
            @foreach($messages as $message)
                <div class="grid md:grid-cols-6 shadow-md bg-gray-200 py-8 px-5 gap-3 md:gap-5 xl:gap-10 rounded-xl">
                    <div class="md:col-span-3 xl:col-span-2 flex items-center">
                        <p class="font-semibold">{{ __('messages.fullName') }}</p>
                        <p class="px-3 text-sm">
                        {{ $message->message_owner?->firstName }} {{ $message->message_owner?->lastName }}
                        </p>
                    </div>
                    <div class="md:col-span-3 xl:col-span-2 flex items-center">
                        <p class="font-semibold">{{ __('messages.Emailcontact') }}</p>
                        <p class="px-3 text-sm">
                            <a href="mailto: {{ $message->email }}" class="text-blue-500 underline underline-offset-2">
                                {{ $message->message_owner->email }}
                            </a>
                        </p>
                    </div>
                    <div class="md:col-span-6 xl:col-span-2 flex items-center">
                        <p class="font-semibold">{{ __('messages.phoneNumber') }}:</p>
                        <p class="px-3 text-sm">
                            <a href="tel: {{ $message->phone }}" class="text-blue-500 underline underline-offset-2">
                                <p class="@if (App::isLocale('ar')) ltr @endif">
                                    {{ $message->message_owner?->phone }}
                                </p>
                            </a>
                        </p>
                    </div>
                    <div class="md:col-span-6">
                        <p class="mb-2 font-semibold">{{ __('messages.message') }}:</p>
                        <p class="px-5 text-sm">{{ $message->message }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>

<!-- <script src="{{ asset('storage/assets/js/app.js') }}"></script> -->
<script>

let messagesBtn = document.getElementById("messagesBtn");

messagesBtn.classList.add("bg-blue-500");

</script>

</html>
