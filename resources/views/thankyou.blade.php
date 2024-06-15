<x-guest-layout>
    <div class="container mx-auto px-5 py-12 flex flex-col items-center justify-center min-h-screen bg-gray-50">
        <div class="bg-white rounded-lg shadow-lg p-10 text-center max-w-md">
            <h1 class="text-3xl font-bold text-pink-500 mb-4">Thank You!</h1>
            <p class="text-gray-700 mb-6">Your reservation has been successfully completed!</p>
            <a href="{{ url('/') }}" class="inline-block px-6 py-2 bg-purple-500 text-white rounded-full hover:bg-purple-700 transition duration-200">Go Back to Home</a>
        </div>
    </div>
</x-guest-layout>
