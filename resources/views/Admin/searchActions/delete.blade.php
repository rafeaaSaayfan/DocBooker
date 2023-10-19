<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body class="bg-gray-900 @if (App::isLocale('ar')) rtl @endif">
    <div class="flex items-center justify-center w-screen h-screen">
        <form action="{{ route('deleteAction', ['id' => $id]) }}" method="post" class="xl:w-1/3 bg-white shadow-md py-5 px-5 rounded-md">
            @csrf
            @method('delete')
            <p class="">{{ __('messages.deleteQuest') }}</p>
            <div class="flex items-center justify-between pt-20">
                <a href="{{ route('search') }}" class="cursor-pointer text-white bg-blue-500 px-5 py-2 rounded-md shadow-md">{{ __('messages.no') }}</a>
                <input type="submit" class="cursor-pointer text-white bg-red-500 px-5 py-2 rounded-md shdaow-md" value="{{ __('messages.yes') }}">
            </div>
        </form>
    </div>
</body>
</html>
