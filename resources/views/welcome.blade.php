<x-guest-layout>
    <!-- Main Hero Content -->
    <div class="container max-w-lg px-4 py-32 mx-auto text-left bg-center bg-no-repeat bg-cover md:max-w-none md:text-center" style="background-image: url('{{ asset('images/food2.jpg') }}')">
        <div class="bg-black bg-opacity-50 p-6 rounded-lg">
            <h1 class="font-mono text-3xl font-extrabold text-transparent bg-clip-text bg-white md:text-center sm:leading-none lg:text-5xl">
                <span class="inline md:block">Discover the Finest Dining Experience</span>
            </h1>
            <div class="mx-auto mt-2 text-green-50 md:text-center lg:text-lg">
                Explore a world of culinary delights at your choice of restaurants.
            </div>
            <div class="flex flex-col items-center mt-12 text-center">
            <span class="relative inline-flex w-full md:w-auto">
              <a href="{{ route('restaurants.index') }}" type="button" class="inline-flex items-center justify-center px-6 py-2 text-base font-bold leading-6 text-white bg-pink-200 rounded-full lg:w-full md:w-auto hover:bg-pink-500 focus:outline-none">
                 Explore Restaurants
</a>


            </span>
            </div>
        </div>
    </div>
    <!-- End Main Hero Content -->

    <!-- Additional Sections -->
    <section class="px-2 py-32 bg-pink-100 md:px-0">
        <div class="container items-center max-w-6xl px-8 mx-auto xl:px-5">
            <div class="flex flex-wrap items-center sm:-mx-3">
                <div class="w-full md:w-1/2 md:px-3">
                    <div class="w-full pb-6 space-y-4 sm:max-w-md lg:max-w-lg lg:space-y-4 lg:pr-0 md:pb-0">
                        <h3 class="text-xl">OUR STORY</h3>
                        <h2 class="text-4xl text-purple-600">Welcome to TasteCircle</h2>
                        <p class="mx-auto text-base text-gray-500 sm:max-w-md lg:text-xl md:max-w-3xl">
                            At TasteCircle, we connect food enthusiasts with the best dining option in town. Our platform brings together a variety of famous dishes. Whether you're in the mood for a casual bite or a luxurious meal, we've got you covered.
                        </p>
                    </div>
                </div>
                <div class="w-full md:w-1/2">
                    <div class="w-full h-auto overflow-hidden rounded-md shadow-xl sm:rounded-xl">
                        <img src="{{ asset('images/food.jpg') }}" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section class="py-20 bg-pink-50">
        <div class="container items-center max-w-6xl px-4 px-10 mx-auto sm:px-20 md:px-32 lg:px-16">
            <div class="flex flex-wrap items-center -mx-3">
                <div class="order-1 w-full px-3 lg:w-1/2 lg:order-0">
                    <div class="w-full lg:max-w-md">
                        <h2 class="mb-4 text-2xl font-bold">About Us</h2>
                        <h2 class="mb-4 text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-pink-400 to-purple-500">
                            Why Choose TasteCircle?</h2>
                        <p class="mb-4 font-medium tracking-tight text-gray-400 xl:mb-6">
                            TasteCircle is your ultimate destination for exploring a wide array of dishes from all around the world. We provide:
                        </p>
                        <ul>
                            <li class="flex items-center py-2 space-x-4 xl:py-3">
                                <svg class="w-8 h-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path>
                                </svg>
                                <span class="font-medium text-gray-500">Wide Range of Dishes from all around the world</span>
                            </li>
                            <li class="flex items-center py-2 space-x-4 xl:py-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="font-medium text-gray-500">Easy Reservations</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="w-full px-3 mb-12 lg:w-1/2 order-0 lg:order-1 lg:mb-0">
                    <img class="mx-auto sm:max-w-sm lg:max-w-full" src="https://cdn.pixabay.com/photo/2020/12/31/12/28/cook-5876388_960_720.png" alt="feature image">
                </div>
            </div>
        </div>
    </section>

    <!-- Our Menu Section -->
</x-guest-layout>
