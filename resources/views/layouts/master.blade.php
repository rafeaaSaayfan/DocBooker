
@include('layouts.navigation.header')

<body class="antialiased @if (App::isLocale('ar')) rtl @endif"  x-data="{ isOpen : false}">

    <nav class="navbar bg-white fixed w-full z-20 top-0 left-0">
        @include('layouts.navigation.nav')
    </nav>

    <section class="">
        @yield('content')
    </section>

    <footer class="bg-black text-white py-8">
        @include('layouts.navigation.footer')
    </footer>

</body>

</html>
