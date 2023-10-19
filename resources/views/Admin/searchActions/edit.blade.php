<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body class="antialiased @if (App::isLocale('ar')) rtl @endif">
    <a href="{{ route('search') }}" class="absolute z-10 @if (App::isLocale('ar')) right-5 @endif @if (App::isLocale('en')) left-5 @endif top-5 text-blue-500 text-lg cursor-pointer flex gap-2 items-center">
        <svg class="fill-blue-500 @if (App::isLocale('en')) transform rotate-180 fill-blue-500 @endif" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="22px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <polygon points="160,115.4 180.7,96 352,256 180.7,416 160,396.7 310.5,256 "/>
        </svg>
        {{ __('messages.back') }}
    </a>
    <div class="w-full md:flex flex-col justify-center items-center md:h-screen py-20 md:py-0">
        @foreach ($user as $col)
        <form action="{{ route('editActionInfo', ['id' => $col->id]) }}" method="POST" class="rounded w-full md:w-3/4 shadow p-5 bg-white mb-8">
            @csrf
            @method('post')
            <h3 class="text-md font-semibold mb-5 col-span-2">{{ __("messages.personalInfo") }}</h3>
            <div class="grid grid-cols-2 gap-4">
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
                        <input class="w-full bg-transparent outline-none border-none" type="firstName" name="firstName" id="" placeholder="{{ __("messages.firstName") }}" value="{{ $col->firstName }}" />
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
                        <input class="w-full bg-transparent outline-none border-none" type="lastName" name="lastName" id="" placeholder="{{ __("messages.lastName") }}" value="{{ $col->lastName }}" />
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
                        <input class="w-full bg-transparent outline-none border-none" type="email" name="email" id="" placeholder="{{ __("messages.email") }}" value="{{ $col->email }}" />
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
                        <input class="w-full bg-transparent outline-none border-none" type="tel" name="phone" id="" placeholder="{{ __("messages.phoneNumber") }}" value="{{ $col->phone }}" />
                    </div>
                    @if ($errors->has('phone'))
                        <p class="text-red-500 text-sm mt-1">{{ $errors->first('phone') }}</p>
                    @endif
                </div>
                {{-- <div class="col-span-2 md:col-span-2">
                    <select class="w-1/2 md:w-1/3 xl:w-1/5 px-3 py-1 md:py-1 xl:py-2 border rounded-lg bg-transparent focus:outline-none focus:border-blue-500 cursor-pointer" id="role" name="role">
                        <option value="" disabled selected>Select Role</option>
                        <option value="0">patient</option>
                        <option value="1">admin</option>
                    </select>
                </div> --}}
                <button type="submit" class="w-36 focus:outline-none text-white text-sm bg-blue-500 hover:bg-blue-800 rounded-2xl py-2 px-8 transition duration-150 ease-in">
                    {{ __("messages.update") }}
                </button>
            </div>
        </form>
        <form action="{{ route('editActionPass', ['id' => $col->id]) }}" method="POST" class="w-full rounded shadow md:w-3/4 bg-white p-5">
            @csrf
            @method('post')
            <div class="grid grid-cols-2 gap-4">
                <h3 class="text-md font-semibold pb-5 col-span-2">{{ __('messages.changePass') }}</h3>
                <div class="col-span-2">
                    @if ($errors->has('current_password') or $errors->has('incorrectPass'))
                        <div class="flex items-center shadow border-t-2 border-red-400 py-2 px-3 rounded-2xl gap-2">
                    @else
                        <div class="flex items-center shadow border-t-2 border-blue-400 py-2 px-3 rounded-2xl gap-2">
                    @endif
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                            </svg>
                            <input class="w-full bg-transparent outline-none border-none" type="password" name="current_password" id="" placeholder="{{ __('messages.currPass') }}" />
                        </div>
                    @if ($errors->has('current_password'))
                        <p class="text-red-500 text-sm mt-1">{{ $errors->first('current_password') }}</p>
                    @endif
                    @if ($errors->has('incorrectPass'))
                        <p class="text-red-500 text-sm mt-1">{{ $errors->first('incorrectPass') }}</p>
                    @endif
                </div>
                <div class="col-span-2">
                    @if ($errors->has('new_password'))
                        <div class="flex items-center shadow border-t-2 border-red-400 py-2 px-3 rounded-2xl gap-2">
                    @else
                        <div class="flex items-center shadow border-t-2 border-blue-400 py-2 px-3 rounded-2xl gap-2">
                    @endif
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                            </svg>
                            <input class="w-full bg-transparent outline-none border-none" type="password" name="new_password" id="" placeholder="{{ __("messages.newPass") }}" />
                        </div>
                    @if ($errors->has('new_password'))
                        <p class="text-red-500 text-sm mt-1">{{ $errors->first('new_password') }}</p>
                    @endif
                </div>
                <div class="col-span-2">
                    @if ($errors->has('new_password'))
                        <div class="flex items-center shadow border-t-2 border-red-400 py-2 px-3 rounded-2xl gap-2">
                    @else
                        <div class="flex items-center shadow border-t-2 border-blue-400 py-2 px-3 rounded-2xl gap-2">
                    @endif
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                            </svg>
                            <input class="w-full bg-transparent outline-none border-none" type="password" name="new_password_confirmation" id="" placeholder="{{ __('messages.confNewPass') }}" />
                        </div>
                    @if ($errors->has('new_password'))
                        <p class="text-red-500 text-sm mt-1">{{ $errors->first('new_password') }}</p>
                    @endif
                </div>
                <button type="submit" class="w-36 focus:outline-none text-white text-sm bg-blue-500 hover:bg-blue-800 rounded-2xl py-2 px-8 transition duration-150 ease-in">
                    {{ __('messages.update') }}
                </button>
            </div>
        </form>
        @endforeach
    </div>
</body>

@if(session('updatedPatient'))
    @if (App::isLocale('ar'))
    <script>
        Swal.fire({
            position: 'top-start',
            title: '{{ session('updatedPatient') }}',
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
            title: '{{ session('updatedPatient') }}',
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

@if(session('changedPass'))
    @if (App::isLocale('ar'))
    <script>
        Swal.fire({
            position: 'top-start',
            title: '{{ session('changedPass') }}',
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
            title: '{{ session('changedPass') }}',
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

</html>
