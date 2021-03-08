<!doctype html>
<html lang=""{{ str_replace('_', '-', app()->getLocale()) }}"">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @livewireStyles
    <title>{{ config('app.name') }}</title>
</head>
<body>

<nav class="flex justify-between bg-secondary w-full py-3.5">
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
    </div>
    <div></div>
</nav>

{{$slot}}

@livewireScripts
</body>
</html>
