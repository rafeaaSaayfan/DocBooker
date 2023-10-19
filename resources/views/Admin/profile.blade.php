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
        <div class="py-16 md:py-5 xl:py-10 xl:w-5/6 md:w-3/4 md:mx-5 xl:mx-20 shadow-2xl h-fit">
            <h2 class="text-xl font-bold py-5 mb-5 md:py-0 md:pb-5 text-center col-span-2">{{ __("messages.title") }}</h2>
            <div class="w-fit px-5">
                <a href="{{ route('security') }}" class="text-blue-700 underline underline-offset-4 text-sm flex items-center gap-1">
                    <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" width="22" class="fill-blue-700"><g id="Change_password">
                        <path d="M464.4326,147.54a9.8985,9.8985,0,0,0-17.56,9.1406,214.2638,214.2638,0,0,1-38.7686,251.42c-83.8564,83.8476-220.3154,83.874-304.207-.0088a9.8957,9.8957,0,0,0-16.8926,7.0049v56.9a9.8965,9.8965,0,0,0,19.793,0v-34.55A234.9509,234.9509,0,0,0,464.4326,147.54Z"/>
                        <path d="M103.8965,103.9022c83.8828-83.874,220.3418-83.8652,304.207-.0088a9.8906,9.8906,0,0,0,16.8926-6.9961v-56.9a9.8965,9.8965,0,0,0-19.793,0v34.55C313.0234-1.3556,176.0547,3.7509,89.9043,89.9012A233.9561,233.9561,0,0,0,47.5674,364.454a9.8985,9.8985,0,0,0,17.56-9.1406A214.2485,214.2485,0,0,1,103.8965,103.9022Z"/>
                        <path d="M126.4009,254.5555v109.44a27.08,27.08,0,0,0,27,27H358.5991a27.077,27.077,0,0,0,27-27v-109.44a27.0777,27.0777,0,0,0-27-27H153.4009A27.0805,27.0805,0,0,0,126.4009,254.5555ZM328,288.13a21.1465,21.1465,0,1,1-21.1465,21.1464A21.1667,21.1667,0,0,1,328,288.13Zm-72,0a21.1465,21.1465,0,1,1-21.1465,21.1464A21.1667,21.1667,0,0,1,256,288.13Zm-72,0a21.1465,21.1465,0,1,1-21.1465,21.1464A21.1667,21.1667,0,0,1,184,288.13Z"/>
                        <path d="M343.6533,207.756V171.7538a87.6533,87.6533,0,0,0-175.3066,0V207.756H188.14V171.7538a67.86,67.86,0,0,1,135.7208,0V207.756Z"/></g>
                    </svg>
                    <p>{{ __("messages.changePass") }}</p>
                </a>
            </div>
            <div class="w-full grid grid-cols-2 gap-5 bg-white px-5 pt-8">
                <form action="{{ route ('updateInfo')}}" method="POST" class="col-span-2 md:col-span-2 rounded"  enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="col-span-full grid grid-cols-4 gap-3 md:gap-5 border-y border-gray-300 py-10">
                        @foreach ($pictures as $picture)
                        {{-- 1 --}}
                        <div class="col-span-2 md:col-span-2 xl:col-span-1 flex flex-col items-center justify-center gap-3">
                            <div>
                                <label for="currentPhoto" class="block font-semibold text-xs mb-5">{{ __("messages.HomePhoto") }}</label>
                                <img src="{{ asset('' . $picture->homePhoto . '') }}" alt="" class="rounded-full w-36 h-36 md:w-40 md:h-40 object-cover">
                            </div>
                            <div class="border-1 shadow rounded-xl md:px-4 py-1">
                                <label for="homePhoto" class="cursor-pointer text-blue-500 py-1 md:px-4 px-2">
                                    {{ __("messages.change") }}
                                </label>
                                <input type="file" name="homePhoto" id="homePhoto" class="hidden">
                            </div>
                            @if ($errors->has('homePhoto'))
                                <p class="text-red-500 text-sm mt-1">{{ $errors->first('homePhoto') }}</p>
                            @endif
                        </div>
                        {{-- 2 --}}
                        <div class="col-span-2 md:col-span-2 xl:col-span-1 flex flex-col items-center justify-center gap-3">
                            <div>
                                <label for="currentPhoto" class="block font-semibold text-xs mb-5">{{ __("messages.ourDoctorPhoto") }}</label>
                                <img src="{{ asset('' . $picture->ourDocPhoto . '') }}" alt="" class="rounded-full w-36 h-36 md:w-40 md:h-40 object-cover">
                            </div>
                            <div class="border-1 shadow rounded-xl md:px-4 py-1">
                                <label for="ourDocPhoto" class="cursor-pointer text-blue-500 py-1 md:px-4 px-2">
                                    {{ __("messages.change") }}
                                </label>
                                <input type="file" name="ourDocPhoto" id="ourDocPhoto" class="hidden">
                            </div>
                        </div>
                        {{-- 3 --}}
                        <div class="col-span-2 md:col-span-2 xl:col-span-1 flex flex-col items-center justify-center gap-3 mt-6 md:mt-6 xl:mt-0">
                            <div>
                                <label for="currentPhoto" class="block font-semibold text-xs mb-5">{{ __("messages.clinicPhoto") }}</label>
                                <img src="{{ asset('' . $picture->clinic1 . '') }}" alt="" class="rounded-full w-36 h-36 md:w-40 md:h-40 object-cover">
                            </div>
                            <div class="border-1 shadow rounded-xl md:px-4 py-1">
                                <label for="clinic1" class="cursor-pointer text-blue-500 py-1 md:px-4 px-2">
                                    {{ __("messages.change") }}
                                </label>
                                <input type="file" name="clinic1" id="clinic1" class="hidden">
                            </div>
                        </div>
                        {{-- 4 --}}
                        <div class="col-span-2 md:col-span-2 xl:col-span-1 flex flex-col items-center justify-center gap-3 mt-6 md:mt-6 xl:mt-0">
                            <div>
                                <label for="currentPhoto" class="block font-semibold text-xs mb-5">{{ __("messages.clinicPhoto") }}</label>
                                <img src="{{ asset('' . $picture->clinic2 . '') }}" alt="" class="rounded-full w-36 h-36 md:w-40 md:h-40 object-cover">
                            </div>
                            <div class="border-1 shadow rounded-xl md:px-4 py-1">
                                <label for="clinic2" class="cursor-pointer text-blue-500 py-1 md:px-4 px-2">
                                    {{ __("messages.change") }}
                                </label>
                                <input type="file" name="clinic2" id="clinic2" class="hidden">
                            </div>
                        </div>
                        {{-- 5 --}}
                        <div class="col-span-2 md:col-span-2 xl:col-span-1 flex flex-col items-center justify-center gap-3 mt-6 md:mt-6 xl:mt-0">
                            <div>
                                <label for="currentPhoto" class="block font-semibold text-xs mb-5">{{ __("messages.clinicPhoto") }}</label>
                                <img src="{{ asset('' . $picture->clinic3 . '') }}" alt="" class="rounded-full w-36 h-36 md:w-40 md:h-40 object-cover">
                            </div>
                            <div class="border-1 shadow rounded-xl md:px-4 py-1">
                                <label for="clinic3" class="cursor-pointer text-blue-500 py-1 md:px-4 px-2">
                                    {{ __("messages.change") }}
                                </label>
                                <input type="file" name="clinic3" id="clinic3" class="hidden">
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <h3 class="text-md font-semibold mb-5 col-span-2 pt-10">{{ __("messages.personalInfo") }}</h3>
                    <div class="grid grid-cols-2 gap-4 border-b border-gray-300 pb-5">
                        <div class="col-span-2 md:col-span-1">
                        @if ($errors->has('firstName') or $errors->has(''))
                            <div class="flex items-center shadow border-t-2 border-red-400 py-2 px-3 rounded-2xl gap-2">
                        @else
                            <div class="flex items-center shadow border-t-2 border-blue-400 py-2 px-3 rounded-2xl gap-2">
                        @endif
                                <svg fill="none" viewBox="0 0 48 48" width="22" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="24" cy="11" class="fill-blue-500 stroke-blue-500" r="7" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"/>
                                    <path d="M4 41C4 32.1634 12.0589 25 22 25" class="stroke-blue-500" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"/>
                                    <path d="M31 42L41 32L37 28L27 38V42H31Z" class="fill-blue-500 stroke-blue-500" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"/>
                                </svg>
                                <input class="w-full bg-transparent outline-none border-none" type="firstName" name="firstName" id="" placeholder="{{ __("messages.firstName") }}" value="{{ auth()->user()->firstName }}" />
                            </div>
                            @if ($errors->has('firstName'))
                                <p class="text-red-500 text-sm mt-1">{{ $errors->first('firstName') }}</p>
                            @endif
                        </div>
                        <div class="col-span-2 md:col-span-1">
                        @if ($errors->has('lastName') or $errors->has(''))
                            <div class="flex items-center shadow border-t-2 border-red-400 py-2 px-3 rounded-2xl gap-2">
                        @else
                            <div class="flex items-center shadow border-t-2 border-blue-400 py-2 px-3 rounded-2xl gap-2">
                        @endif
                                <svg fill="none" viewBox="0 0 48 48" width="22" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="24" cy="11" class="fill-blue-500 stroke-blue-500" r="7" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"/>
                                    <path d="M4 41C4 32.1634 12.0589 25 22 25" class="stroke-blue-500" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"/>
                                    <path d="M31 42L41 32L37 28L27 38V42H31Z" class="fill-blue-500 stroke-blue-500" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"/>
                                </svg>
                                <input class="w-full bg-transparent outline-none border-none" type="lastName" name="lastName" id="" placeholder="{{ __("messages.lastName") }}" value="{{ auth()->user()->lastName }}" />
                            </div>
                            @if ($errors->has('lastName'))
                                <p class="text-red-500 text-sm mt-1">{{ $errors->first('lastName') }}</p>
                            @endif
                        </div>
                        <div class="col-span-2 md:col-span-1">
                        @if ($errors->has('email') or $errors->has(''))
                            <div class="flex items-center shadow border-t-2 border-red-400 py-2 px-3 rounded-2xl gap-2">
                        @else
                            <div class="flex items-center shadow border-t-2 border-blue-400 py-2 px-3 rounded-2xl gap-2">
                        @endif
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                </svg>
                                <input class="w-full bg-transparent outline-none border-none" type="email" name="email" id="" placeholder="{{ __("messages.email") }}" value="{{ auth()->user()->email }}" />
                            </div>
                            @if ($errors->has('email'))
                                <p class="text-red-500 text-sm mt-1">{{ $errors->first('email') }}</p>
                            @endif
                        </div>
                        <div class="col-span-2 md:col-span-1">
                        @if ($errors->has('phone') or $errors->has(''))
                            <div class="flex items-center shadow border-t-2 border-red-400 py-2 px-3 rounded-2xl gap-2">
                        @else
                            <div class="flex items-center shadow border-t-2 border-blue-400 py-2 px-3 rounded-2xl gap-2">
                        @endif
                                <svg class="feather feather-phone stroke-blue-500 fill-none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="22" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                                </svg>
                                <input class="w-full bg-transparent outline-none border-none @if (App::isLocale('ar')) ltr @endif" type="tel" name="phone" id="" placeholder="{{ __("messages.phoneNumber") }}" value="{{ auth()->user()->phone }}" />
                            </div>
                            @if ($errors->has('phone'))
                                <p class="text-red-500 text-sm mt-1">{{ $errors->first('phone') }}</p>
                            @endif
                        </div>
                    </div>
                    <button type="submit" class="focus:outline-none text-white text-sm bg-blue-500 hover:bg-blue-800 rounded-2xl py-2 px-8 transition duration-150 ease-in mt-5 mb-10">
                        {{ __("messages.update") }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@if(session('updated'))
    @if (App::isLocale('ar'))
    <script>
        Swal.fire({
            position: 'top-start',
            title: '{{ session('updated') }}',
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
            title: '{{ session('updated') }}',
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

@if(session('updatedPic'))
    @if (App::isLocale('ar'))
    <script>
        Swal.fire({
            position: 'top-start',
            title: '{{ session('updatedPic') }}',
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
            title: '{{ session('updatedPic') }}',
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

@if(session('updatedAll'))
    @if (App::isLocale('ar'))
    <script>
        Swal.fire({
            position: 'top-start',
            title: '{{ session('updatedAll') }}',
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
            title: '{{ session('updatedAll') }}',
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

@if(session('changed'))
    @if (App::isLocale('ar'))
    <script>
        Swal.fire({
            position: 'top-start',
            title: '{{ session('changed') }}',
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
            title: '{{ session('changed') }}',
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

</body>

<script src="{{ asset('storage/assets/js/app.js') }}"></script>
<script>

let profileBtn = document.getElementById("profileBtn");

profileBtn.classList.add("bg-blue-500");

</script>

</html>
