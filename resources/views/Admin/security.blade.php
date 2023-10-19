<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body class="bg-gray-900 @if (App::isLocale('ar')) rtl @endif">
    <a href="{{ route('profile') }}" class="absolute shadow z-10 @if (App::isLocale('ar')) right-5 @endif @if (App::isLocale('en')) left-5 @endif top-5 text-blue-500 text-lg cursor-pointer flex gap-2 items-center">
        <svg class="fill-blue-500 @if (App::isLocale('en')) transform rotate-180 fill-blue-500 @endif" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="22px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <polygon points="160,115.4 180.7,96 352,256 180.7,416 160,396.7 310.5,256 "/>
        </svg>
        {{ __('messages.back') }}
    </a>
    <div class="flex items-center justify-center h-screen w-screen">
        <form action="{{ route('changePass') }}" method="POST" class="">
            @csrf
            @method('post')
            <div class="grid grid-cols-2 gap-4 p-5 w-fit bg-white rounded-xl shadow-md w-screen md:w-96 container">
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
                <button type="submit" class="focus:outline-none text-white text-sm bg-blue-500 hover:bg-blue-800 rounded-2xl py-2 px-8 transition duration-150 ease-in">
                    {{ __('messages.update') }}
                </button>
            </div>
        </form>
    </div>
</body>
</html>
