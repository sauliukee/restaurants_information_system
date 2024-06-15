<x-guest-layout>
    <div class="container w-full px-5 py-6 mx-auto">
        <div class="max-w-2xl mx-auto mb-6 rounded-lg shadow-lg">
            <img class="w-full h-64 object-cover" src="{{ Storage::url($menu->image) }}" alt="Image" />
            <div class="px-6 py-4">
                <h2 class="mb-3 text-2xl font-semibold tracking-tight text-green-600 uppercase">{{ $menu->name }}</h2>
                <p class="leading-normal text-gray-700">{{ $menu->description }}</p>
                <div class="flex items-center justify-between mt-4">
                    <span class="text-xl text-green-600">{{ $menu->price }}</span>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
