<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'MyShoe') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

</head>
<body>
<header class="sticky top-0">
    <div class="flex justify-end bg-gray-300">
        @if(Route::has('login'))
            <div class="flex justify-between py-1 px-2">
                @auth
                    <div x-data="{ open: false}">
                        <button @click="open = !open"
                                class="block focus:outline-none cursor-pointer text-gray-700 hover:text-black flex"
                        >
                            My Accound({{ auth()->user()->name }})
                        </button>
                        <div x-show="open" @click.away="open = false"
                             x-transition:enter="transition ease-out duration-100"
                             x-transition:enter-start="transform opacity-0 scale-95"
                             x-transition:enter-end="transform opacity-95 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="transform opacity-95 scale-100"
                             x-transition:leave-end="transform opacity-0 scale-95"
                             class="absolute right-1 py-2 px-1 bg-white rounded-sm shadow-md show text-sm opacity-95"
                        >
                            <a href="{{ (auth()->user()->role == 1) ? route('admin.dashboard') : route('user.dashboard')}}"
                               class="block px-3 py-1 text-gray-700 rounded
                                        hover:bg-green-500 hover:text-white"
                            >
                                Dashboard
                            </a>

                            <a href="{{ route('profile.show') }}" class="block px-3 py-1 text-gray-700 rounded
                                 hover:bg-green-500 hover:text-white">
                                Settings
                            </a>


                            <form method="POST" action="{{ route('logout') }}" class="block px-3 py-1 text-gray-700 rounded border-t
                               hover:bg-green-500 hover:text-white">
                                @csrf
                                <button type="submit" class="w-full text-left outline-none">
                                    Logout
                                </button>
                            </form>
                        </div>

                    </div>
                    {{--                @if(auth()->user()->role == 1)--}}

                    {{--                @else--}}

                    {{--                @endif--}}
                @else
                    <a href="{{ route('login') }}" class="mr-1 text-black hover:text-gray-700">Login</a>
                    <a href="{{ route('register') }}" class="mx-1 text-black hover:text-gray-700">Register</a>
                @endauth
            </div>
        @endif
    </div>

    <nav class="flex justify-between bg-primary w-full py-3.5">
        <a href="{{ route('home') }}" class="text-2xl ml-3 text-gray-100 hover:text-white">
            MyShoe
        </a>
        <ul class="flex justify-around text-lg text-gray-200">
            <li class="mx-2.5 hover:text-white cursor-pointer">
                <a href="{{ route('home') }}">
                    Home
                </a>
            </li>
            <li class="mx-2.5 hover:text-white cursor-pointer">
                <a href="{{ route('home') }}">
                    About Us
                </a>
            </li>
            <li class="mx-2.5 hover:text-white cursor-pointer">
                <a href="{{ route('shop') }}">
                    Shop
                </a>
            </li>
            <li class="mx-2.5 hover:text-white cursor-pointer">
                <a href="{{ route('cart') }}">
                    Cart
                </a>
            </li>
            <li class="mx-2.5 hover:text-white cursor-pointer">
                <a href="{{ route('home') }}">
                    Contact Us
                </a>
            </li>
        </ul>
        <div></div>
    </nav>
</header>

<main>
    {{ $slot }}
</main>

<footer class="text-gray-600 body-font">
    <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
        <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
            <span class="ml-3 text-xl">MyShoe</span>
        </a>
        <p class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4">
            © 2021 MyShoe
        </p>
    </span>
    </div>
</footer>
@livewireScripts
</body>
</html>
