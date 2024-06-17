<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex justify-end mb-4">
                    <a href="{{ route('admin.restaurants.create') }}" class="px-4 py-2 bg-purple-400 hover:bg-purple-700 rounded-lg text-white">New Restaurant</a>
                </div>

                <table class="min-w-full bg-white">
                    <thead>
                    <tr>
                        <th class="py-2 px-6 bg-gray-200 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Name</th>
                        <th class="py-2 px-6 bg-gray-200 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Image</th>
                        <th class="py-2 px-6 bg-gray-200 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Description</th>
                        <th class="py-2 px-6 bg-gray-200 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($restaurants as $restaurant)
                        <tr>
                            <td class="py-4 px-6 text-sm font-medium text-gray-900">{{ $restaurant->name }}</td>
                            <td class="py-4 px-6">
                                @if ($restaurant->image)
                                    <img src="{{ asset('storage/' . $restaurant->image) }}" class="w-16 h-16 rounded" alt="{{ $restaurant->name }}">
                                @else
                                    <span class="text-sm text-gray-500">No Image</span>
                                @endif
                            </td>
                            <td class="py-4 px-6 text-sm text-gray-900">{{ $restaurant->description }}</td>
                            <td class="py-4 px-6 text-sm text-gray-900">
                                <div class="flex space-x-2">
                                    <a href="{{ route('admin.restaurants.edit', $restaurant->id) }}" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg text-white">Edit</a>
                                    <form method="POST" action="{{ route('admin.restaurants.destroy', $restaurant->id) }}" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>
