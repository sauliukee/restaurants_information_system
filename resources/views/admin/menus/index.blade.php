<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="flex justify-end m-2 p-2">
            <a href="{{ route('admin.menus.create') }}" class="px-4 py-2 bg-purple-400 hover:bg-purple-700 rounded-lg text-white">New Menu</a>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Image
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
            </tr>
            </thead>

            <tbody>
            @foreach($menus as $menu)
                <tr class="odd:bg-white even:bg-gray-50 border-b">
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $menu->name }}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        @if ($menu->image)
                            <img src="{{ asset('storage/' . $menu->image) }}" class="w-16 h-16 rounded" alt="{{ $menu->name }}">
                        @else
                            <span>No Image</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $menu->price }}
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.menus.edit', $menu->id) }}" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg text-white">Edit</a>
                            <form class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white"
                                  method="POST"
                                  action="{{ route('admin.menus.destroy', $menu->id) }}"
                                  onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-admin-layout>
