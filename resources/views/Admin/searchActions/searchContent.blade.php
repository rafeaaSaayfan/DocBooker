@foreach ($searchResults as $result)
    <tr class="bg-gray-50 flex lg:table-row flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0 shadow-md">
        <td class="w-full md:bg-gray-50 lg:w-1/4 pb-2 text-sm border border-b block lg:table-cell lg:static rounded-md">
            <span class="lg:hidden bg-white shadow px-2 py-1 text-xs font-semibold uppercase rounded">{{ __('messages.name') }}</span>
            <div class="py-2 text-center">
                {{ $result->firstName }} {{ $result->lastName }}
            </div>
        </td>
        <td class="w-full md:bg-gray-50 lg:w-1/4 text-sm pb-2 border border-b block lg:table-cell lg:static rounded-md">
            <span class="lg:hidden bg-white shadow px-2 py-1 text-xs font-semibold uppercase rounded">{{ __('messages.emailSearch') }}</span>
            <div class="py-2 text-center">
                <a href="mailto: {{ $result->email }}" class="underline underline-offset-4 text-blue-500">{{ $result->email }}</a>
            </div>
        </td>
        <td class="w-full md:bg-gray-50 lg:w-1/4 text-sm border pb-2 border-b block lg:table-cell lg:static">
            <span class="lg:hidden bg-white shadow px-2 py-1 text-xs font-semibold uppercase rounded">{{ __('messages.phoneNumber') }}</span>
            <div class="py-2 text-center">
                <a href="tel: {{ $result->phone }}" class="underline underline-offset-4 text-blue-500">
                    <p class=" @if (App::isLocale('ar')) ltr @endif">{{ $result->phone }}</p>
                </a>
            </div>
        </td>
        <td class="w-full md:bg-gray-50 lg:w-1/4 text-sm border border-b block lg:table-cell lg:static">
            <span class="lg:hidden bg-white shadow px-2 py-1 text-xs font-semibold uppercase rounded">{{ __('messages.actions')}}</span>
            <div class="flex items-center justify-center gap-4 text-center py-2">
                <a href="{{ route('editPage', ['id' => $result->id]) }}" class="bg-blue-500 px-3 py-2 text-white rounded-md">{{ __('messages.edit') }}</a>
                <a href="{{ route('deletePage', ['id' => $result->id]) }}" class="bg-red-500 px-3 py-2 text-white rounded-md">{{ __('messages.delete') }}</a>
            </div>
        </td>
    </tr>
@endforeach
