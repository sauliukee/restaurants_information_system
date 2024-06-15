<x-guest-layout>
    <div class="container w-full px-5 py-6 mx-auto">
        <div class="grid lg:grid-cols-4 gap-y-6">
            @foreach($restaurants as $restaurant)
                <!-- Restaurant Card -->
                <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg restaurant-card">
                    <img class="w-full h-48"
                         src="{{ Storage::url($restaurant->image) }}" alt="Image" />
                    <div class="px-6 py-4">
                        <a href="{{ route('restaurants.show', $restaurant->id) }}">
                            <h4 class="mb-3 text-xl font-semibold tracking-tight text-pink-300 hover:text-green uppercase">
                                {{ $restaurant->name }}
                            </h4>
                        </a>
                        <p class="text-gray-700 text-base">
                            {{ $restaurant->description }}
                        </p>
                        <p class="text-gray-700 text-sm">
                            {{ $restaurant->location }}
                        </p>
                        <div class="button-container mt-4">
                            <a href="{{ route('menus.index', ['restaurant' => $restaurant->id]) }}" class="menu-button">Menu</a>
                            <a href="{{ route('reservations.step.one', ['restaurant' => $restaurant->id]) }}" class="reservation-button">Make Reservation</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <style>
        .restaurant-card {
            border: 1px solid #ccc;
            padding: 16px;
            text-align: center;
            background-color: #fff;
        }

        .restaurant-card img {
            width: 100%;
            height: auto;
            border-bottom: 1px solid #ccc;
        }

        .restaurant-card h4 {
            margin: 16px 0 8px 0;
            color: #333;
        }

        .restaurant-card p {
            color: #666;
            font-size: 14px;
            margin: 8px 0;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            margin-top: 16px;
        }

        .menu-button,
        .reservation-button {
            display: inline-block;
            padding: 6px 12px; /* Reduced padding for smaller buttons */
            margin: 4px;
            color: #fff;
            text-decoration: none;
            border: 1px solid #f8c3d8; /* Adjusted pink border color */
            border-radius: 4px;
            background-color: #f8c3d8; /* Adjusted pink background color */
            transition: background-color 0.3s, color 0.3s;
        }

        .menu-button:hover,
        .reservation-button:hover {
            background-color: #e4a8bd; /* Slightly darker pink on hover */
            border-color: #e4a8bd; /* Slightly darker pink border on hover */
            color: #fff; /* White text on hover */
        }
    </style>
</x-guest-layout>
