<div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
    <div class="pt-2 pb-3 space-y-1">
        <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
            {{ __('Home') }}
        </x-responsive-nav-link>

        @if (Auth::check() && Auth::user()->is_admin)
            <x-responsive-nav-link :href="route('admin.restaurants.index')" :active="request()->routeIs('admin.restaurants.index')">
                {{ __('Restaurants') }}
            </x-responsive-nav-link>
            @isset($restaurant)
                <x-responsive-nav-link :href="route('admin.menus.index', ['restaurant' => $restaurant->id])" :active="request()->routeIs('admin.menus.index')">
                    {{ __('Our Menu') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin.reservations.index', ['restaurant' => $restaurant->id])" :active="request()->routeIs('admin.reservations.index')">
                    {{ __('Make Reservation') }}
                </x-responsive-nav-link>
            @else
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-pink-400 to-purple-500">Our Menu</span>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-pink-400 to-purple-500">Make Reservation</span>
            @endisset
        @else
            <x-responsive-nav-link :href="route('restaurants.index')" :active="request()->routeIs('restaurants.index')">
                {{ __('Restaurants') }}
            </x-responsive-nav-link>
            @isset($restaurant)
                <x-responsive-nav-link :href="route('menus.index', ['restaurant' => $restaurant->id])" :active="request()->routeIs('menus.index')">
                    {{ __('Our Menu') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('reservations.step.one', ['restaurant' => $restaurant->id])" :active="request()->routeIs('reservations.step.one')">
                    {{ __('Make Reservation') }}
                </x-responsive-nav-link>
            @else
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-pink-400 to-purple-500">Our Menu</span>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-pink-400 to-purple-500">Make Reservation</span>
            @endisset
        @endif
    </div>

    <!-- Responsive Settings Options -->
    @auth
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                @if (Auth::user()->is_admin)
                    <x-responsive-nav-link :href="route('admin.index')">
                        {{ __('Manage Restaurant') }}
                    </x-responsive-nav-link>
                @else
                    <x-responsive-nav-link :href="route('user.reservations.index')">
                        {{ __('Manage Your Reservations') }}
                    </x-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                                           onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    @endauth
</div>
