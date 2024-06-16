<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TasteCircle – Fine Dining Experiences</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.10.3/dist/cdn.min.js"></script>
</head>
<body>
<div class="bg-pink-100 shadow-md" x-data="{ isOpen: false }">
    <nav class="container px-6 py-8 mx-auto md:flex md:justify-between md:items-center">
        <div class="flex items-center justify-between">
            <a class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-pink-400 to-purple-500 md:text-2xl hover:text-purple-400" href="{{ url('/') }}">
                TasteCircle
            </a>
            <div @click="isOpen = !isOpen" class="flex md:hidden">
                <button type="button" class="text-gray-800 hover:text-gray-400 focus:outline-none focus:text-gray-400" aria-label="toggle menu">
                    <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                        <path fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2z"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div :class="isOpen ? 'flex' : 'hidden'" class="flex-col mt-8 space-y-4 md:flex md:space-y-0 md:flex-row md:items-center md:space-x-10 md:mt-0">
            <a class="text-transparent bg-clip-text bg-gradient-to-r from-pink-400 to-purple-500 hover:text-purple-400" href="{{ url('/') }}">Home</a>
            @if (Auth::check() && Auth::user()->is_admin)
                <a class="text-transparent bg-clip-text bg-gradient-to-r from-pink-400 to-purple-500 hover:text-purple-400"
                   href="{{ route('admin.restaurants.index') }}">Restaurants</a>
                @isset($restaurant)
                    <a class="text-transparent bg-clip-text bg-gradient-to-r from-pink-400 to-purple-500 hover:text-purple-400"
                       href="{{ route('admin.menus.index', ['restaurant' => $restaurant->id]) }}">Our Menu</a>
                    <a class="text-transparent bg-clip-text bg-gradient-to-r from-pink-400 to-purple-500 hover:text-purple-400"
                       href="{{ route('admin.reservations.index', ['restaurant' => $restaurant->id]) }}">Make Reservation</a>
                @else
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-pink-400 to-purple-500">Our Menu</span>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-pink-400 to-purple-500">Make Reservation</span>
                @endisset
            @else
                <a class="text-transparent bg-clip-text bg-gradient-to-r from-pink-400 to-purple-500 hover:text-purple-400"
                   href="{{ route('restaurants.index') }}">Restaurants</a>
                @isset($restaurant)
                    <a class="text-transparent bg-clip-text bg-gradient-to-r from-pink-400 to-purple-500 hover:text-purple-400"
                       href="{{ route('menus.index', ['restaurant' => $restaurant->id]) }}">Our Menu</a>
                    <a class="text-transparent bg-clip-text bg-gradient-to-r from-pink-400 to-purple-500 hover:text-purple-400"
                       href="{{ route('reservations.step.one', ['restaurant' => $restaurant->id]) }}">Make Reservation</a>
                @else
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-pink-400 to-purple-500">Our Menu</span>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-pink-400 to-purple-500">Make Reservation</span>
                @endisset
            @endif

            @auth
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        @if (Auth::user()->is_admin)
                            <x-dropdown-link :href="route('admin.index')">
                                {{ __('Manage Restaurant') }}
                            </x-dropdown-link>
                        @else
                            @isset($restaurant)
                                <x-dropdown-link :href="route('user.reservations.index', ['restaurant' => $restaurant->id])">
                                    {{ __('Manage Your Reservations') }}
                                </x-dropdown-link>
                            @endisset
                        @endif

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                             onclick="event.preventDefault();
                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            @else
                <a href="{{ route('login') }}" class="text-transparent bg-clip-text bg-gradient-to-r from-pink-400 to-purple-500 hover:text-purple-400">
                    {{ __('Login') }}
                </a>
                <a href="{{ route('register') }}" class="text-transparent bg-clip-text bg-gradient-to-r from-pink-400 to-purple-500 hover:text-purple-400">
                    {{ __('Register') }}
                </a>
            @endauth
        </div>
    </nav>
</div>

<div class="font-sans text-gray-900 antialiased min-h-screen">
    {{ $slot }}
</div>

<footer class="bg-gray-800 border-t border-gray-200">
    <div class="container flex flex-wrap items-center justify-center px-4 py-8 mx-auto lg:justify-between">
        <div class="flex flex-wrap justify-center">
            <ul class="flex items-center space-x-4 text-white">
                <li><a href="{{ url('/') }}">Home</a></li>
            </ul>
        </div>
    </div>
</footer>
</body>
</html>
