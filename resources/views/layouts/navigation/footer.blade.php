    <div class="container mx-auto px-5 md:px-0">
        <div class="grid md:grid-cols-4 gap-10">
            <div class="md:col-span-2">
                <h2 class="text-xl font-semibold mb-4 text-blue-500">{{ __("messages.patientResources") }}:</h2>
                <ul class="list-disc px-6 text-sm">
                    <li><a href="#">{{ __("messages.health-related") }}</a></li>
                    <li><a href="#">{{ __("messages.patientEducation") }}</a></li>
                </ul>
            </div>
            <div class="md:col-span-3">
                <h2 class="text-xl font-semibold mb-4 text-blue-500">{{ __("messages.footer.accreditations") }}:</h2>
                <p class="text-2sm pb-1">{{ __("messages.footer.acc1") }}</p>
                <ul class="list-disc @if (App::isLocale('en')) pl-6 @endif @if (App::isLocale('ar')) pr-6 @endif text-sm">
                    <li>{{ __("messages.footer.acc1A") }}</li>
                    <li>{{ __("messages.footer.acc1B") }}</li>
                </ul>
            </div>
            <div class="md:col-span-1 relative">
                <div class="absolute bottom-0 @if (App::isLocale('en')) right-0 @endif @if (App::isLocale('ar')) left-0 @endif flex md:gap-10 gap-4 items-center">
                    <a href="#" class="md:text-xl text-md text-green-500"><ion-icon name="logo-facebook"></ion-icon></a>
                    <a href="#" class="md:text-xl text-md text-green-500"><ion-icon name="logo-instagram"></ion-icon></a>
                    <a href="#" class="md:text-xl text-md text-green-500"><ion-icon name="logo-twitter"></ion-icon></a>
                    <a href="#" class="md:text-xl text-md text-green-500"><ion-icon name="logo-google"></ion-icon></a>
                </div>
            </div>
        </div>
        <div class="border-t border-gray-700 mt-4 pt-4">
            <div class="md:flex justify-between items-center relative">
                <div class="pb-2 md:pb-0">
                    <p class="text-sm text-gray-400">&copy; {{ __("messages.footer.rights") }}</p>
                </div>
                <div class="absolute @if (App::isLocale('en')) right-0 @endif @if (App::isLocale('ar')) left-0 @endif">
                    <a href="#" class="text-sm text-gray-400 hover:text-white">{{ __("messages.footer.privacy") }}</a>
                    <span class="md:mx-2 text-gray-400">|</span>
                    <a href="#" class="text-sm text-gray-400 hover:text-white">{{ __("messages.footer.terms") }}</a>
                </div>
            </div>
        </div>
    </div>
