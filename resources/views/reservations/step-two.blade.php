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
                            <div class="w-full bg-gray-200 rounded-full">
                                <div class="w-100 p-1 text-xs font-medium leading-none text-center text-pink-100 bg-pink-300 rounded-full">Step 2</div>
                            </div>
                            <form method="POST" action="{{ route('reservations.store.step.two', ['restaurant' => $restaurant->id]) }}">
                                @csrf
                                <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">
                                <div class="sm:col-span-6 pt-5">
                                    <label for="status" class="block text-sm font-medium text-gray-700">Table</label>
                                    <div class="mt-1">
                                        <select id="table_id" name="table_id" class="form-multiselect block w-full mt-1">
                                            @foreach($tables as $table)
                                                <option value="{{ $table->id }}" @selected($table->id == $reservation->table_id)>{{ $table->name }}
                                                    ({{ $table->guest_number }} Guests)</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('table_id')
                                    <div class="text-sm text-red-400">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mt-6 p-4 flex justify-between">
                                    <a href="{{ route('reservations.step.one', ['restaurant' => $restaurant->id]) }}" class="px-4 py-2 bg-pink-300 hover:bg-pink-500 rounded-lg text-white">Previous</a>
                                    <button type="submit" class="px-4 py-2 bg-pink-300 hover:bg-pink-500 rounded-lg text-white">Make Reservation</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
