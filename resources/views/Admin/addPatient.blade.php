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
        <div class="xl:w-5/6 md:w-3/4 md:mx-5 xl:mx-20 flex flex-col items-center justify-center h-screen">
            <div class="w-full">
                <form class="bg-white border shadow-md py-3 px-5 rounded-xl" action="{{ route('addPatient') }}" method="POST">
                    @csrf
                    @method('post')
                    <h1 class="text-center py-5 text-lg font-semibold">{{ __("messages.addPatient") }}</h1>
                    <div class="grid grid-cols-2 gap-2">
                        <div class="col-span-1 mb-5">
                            @if ($errors->has('firstName') or $errors->has('errorAdded'))
                                <div class="flex items-center shadow-md border-t-2 border-red-400 py-2 px-3 rounded-2xl gap-2">
                            @else
                                <div class="flex items-center shadow-md border-t-2 border-blue-400 py-2 px-3 rounded-2xl gap-2">
                            @endif
                                    <svg fill="none" viewBox="0 0 48 48" width="22" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="24" cy="11" class="fill-blue-500 stroke-blue-500" r="7" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"/>
                                        <path d="M4 41C4 32.1634 12.0589 25 22 25" class="stroke-blue-500" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"/>
                                        <path d="M31 42L41 32L37 28L27 38V42H31Z" class="fill-blue-500 stroke-blue-500" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"/>
                                    </svg>
                                    <input class="w-full bg-transparent outline-none border-none" type="firstName" name="firstName" value="{{ old('firstName') }}" id="" placeholder="{{ __("messages.firstName") }}" />
                                </div>
                                @if ($errors->has('firstName'))
                                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('firstName') }}</p>
                                @endif
                        </div>
                        <div class="col-span-1 mb-5">
                            @if ($errors->has('lastName') or $errors->has('errorAdded'))
                                <div class="flex items-center shadow-md border-t-2 border-red-400 py-2 px-3 rounded-2xl gap-2">
                            @else
                                <div class="flex items-center shadow-md border-t-2 border-blue-400 py-2 px-3 rounded-2xl gap-2">
                            @endif
                                    <svg fill="none" viewBox="0 0 48 48" width="22" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="24" cy="11" class="fill-blue-500 stroke-blue-500" r="7" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"/>
                                        <path d="M4 41C4 32.1634 12.0589 25 22 25" class="stroke-blue-500" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"/>
                                        <path d="M31 42L41 32L37 28L27 38V42H31Z" class="fill-blue-500 stroke-blue-500" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"/>
                                    </svg>
                                    <input class="w-full bg-transparent outline-none border-none" type="lastName" name="lastName" value="{{ old('lastName') }}" id="" placeholder="{{ __("messages.lastName") }}" />
                                </div>
                                @if ($errors->has('lastName'))
                                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('lastName') }}</p>
                                @endif
                        </div>
                        <div class="col-span-2 mb-5">
                            @if ($errors->has('email') or $errors->has('errorAdded'))
                                <div class="flex items-center shadow-md border-t-2 border-red-400 py-2 px-3 rounded-2xl gap-2">
                            @else
                                <div class="flex items-center shadow-md border-t-2 border-blue-400 py-2 px-3 rounded-2xl gap-2">
                            @endif
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                    </svg>
                                    <input class="w-full bg-transparent outline-none border-none" type="email" name="email" value="{{ old('email') }}" id="" placeholder="{{ __("messages.email") }}" />
                                </div>
                                @if ($errors->has('email'))
                                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('email') }}</p>
                                @endif
                        </div>
                        <div class="col-span-2 mb-5">
                            @if ($errors->has('phone') or $errors->has('errorAdded'))
                                <div class="flex items-center shadow-md border-t-2 border-red-400 py-2 px-3 rounded-2xl gap-2">
                            @else
                                <div class="flex items-center shadow-md border-t-2 border-blue-400 py-2 px-3 rounded-2xl gap-2">
                            @endif
                                    <svg class="feather feather-phone stroke-blue-500 fill-none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="22" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                                    </svg>
                                    <input class="w-full bg-transparent outline-none border-none" type="tel" name="phone" value="{{ old('phone') }}" id="" placeholder="{{ __("messages.phoneNumber") }}" />
                                </div>
                                @if ($errors->has('phone'))
                                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('phone') }}</p>
                                @endif
                        </div>
                        <div class="col-span-2 mb-5">
                            @if ($errors->has('password') or $errors->has('errorAdded'))
                                <div class="flex items-center shadow-md border-t-2 border-red-400 py-2 px-3 rounded-2xl gap-2">
                            @else
                                <div class="flex items-center shadow-md border-t-2 border-blue-400 py-2 px-3 rounded-2xl gap-2">
                            @endif
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                    </svg>
                                    <input class="w-full bg-transparent outline-none border-none" type="password" name="password" id="" placeholder="{{ __("messages.password") }}" />
                                </div>
                                @if ($errors->has('password'))
                                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('password') }}</p>
                                @endif
                        </div>
                        <div class="col-span-2 mb-5">
                            @if ($errors->has('password') or $errors->has('errorAdded'))
                                <div class="flex items-center shadow-md border-t-2 border-red-400 py-2 px-3 rounded-2xl gap-2">
                            @else
                                <div class="flex items-center shadow-md border-t-2 border-blue-400 py-2 px-3 rounded-2xl gap-2">
                            @endif
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                    </svg>
                                    <input class="w-full bg-transparent outline-none border-none" type="password" name="password_confirmation" id="" placeholder="{{ __("messages.confirmPass") }}" />
                                </div>
                                @if ($errors->has('password'))
                                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('password') }}</p>
                                @endif
                        </div>
                    </div>
                    <button type="submit" class="flex mt-2 items-center justify-center focus:outline-none text-white text-sm sm:text-base bg-blue-500 hover:bg-blue-800 rounded-2xl py-2 px-20 transition duration-150 ease-in gap-2">
                        <span class="uppercase">{{ __("messages.add") }}</span>
                        <span>
                            <svg width="22" class="@if (App::isLocale('ar')) transform rotate-180 @endif" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
@if(session('added'))
    @if (App::isLocale('ar'))
    <script>
        Swal.fire({
            position: 'top-start',
            title: '{{ session('added') }}',
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
            title: '{{ session('added') }}',
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

<script src="{{ asset('storage/assets/js/app.js') }}"></script>
<script>

    let addPatientBtn = document.getElementById("addPatientBtn");

    addPatientBtn.classList.add("bg-blue-500");

</script>

</html>
