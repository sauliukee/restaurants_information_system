<x-guest-layout>
    <div class="container w-full px-5 py-6 mx-auto">
        <div class="flex items-center min-h-screen bg-gray-50">
            <div class="flex-1 max-w-4xl mx-auto bg-white rounded-lg shadow-xl">
                <div class="flex flex-col md:flex-row">
                    <div class="md:h-1/2 md:w-1/2">
                        <img class="object-cover w-full h-full" src="{{ asset('images/cafe.jpg') }}" alt="Image">
                    </div>
                    <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                        <div class="w-full">
                            <h3 class="mb-4 text-2xl font-bold text-pink-300">Make Reservation</h3>
                            <div class="w-full bg-gray-200 rounded-full mb-4">
                                <div class="w-1/3 p-1 text-xs font-medium leading-none text-center text-pink-100 bg-pink-300 rounded-full">Step 1</div>
                            </div>
                            <form method="POST" action="{{ route('reservations.store.step.one', ['restaurant' => $restaurant->id]) }}">
                                @csrf
                                <div class="mb-4">
                                    <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                                    <input type="text" id="first_name" name="first_name" value="{{ $reservation->first_name ?? '' }}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm sm:text-sm" />
                                    @error('first_name') <div class="text-sm text-red-400">{{ $message }}</div> @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                                    <input type="text" id="last_name" name="last_name" value="{{ $reservation->last_name ?? '' }}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm sm:text-sm" />
                                    @error('last_name') <div class="text-sm text-red-400">{{ $message }}</div> @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                    <input type="email" id="email" name="email" value="{{ $reservation->email ?? '' }}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm sm:text-sm" />
                                    @error('email') <div class="text-sm text-red-400">{{ $message }}</div> @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="tel_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                                    <input type="text" id="tel_number" name="tel_number" value="{{ $reservation->tel_number ?? ''}}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm sm:text-sm" />
                                    @error('tel_number') <div class="text-sm text-red-400">{{ $message }}</div> @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="res_date" class="block text-sm font-medium text-gray-700">Reservation Date</label>
                                    <input type="text" id="res_date" name="res_date" value="{{ $reservation->res_date ?? '' }}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm sm:text-sm" />
                                    <span class="text-xs">Please choose the time between 17:00-23:00.</span>
                                    @error('res_date') <div class="text-sm text-red-400">{{ $message }}</div> @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="guest_number" class="block text-sm font-medium text-gray-700">Guest Number</label>
                                    <input type="number" id="guest_number" name="guest_number" value="{{ $reservation->guest_number ?? '' }}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm sm:text-sm" />
                                    @error('guest_number') <div class="text-sm text-red-400">{{ $message }}</div> @enderror
                                </div>
                                <div class="mt-6 flex justify-end">
                                    <button type="submit" class="w-full px-4 py-2 text-white bg-pink-300 rounded-lg hover:bg-pink-500">Next</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            flatpickr("#res_date", {
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                minDate: "today",
                maxDate: new Date().fp_incr(7), // 7 days from today
                time_24hr: true
            });
        });
    </script>
</x-guest-layout>
