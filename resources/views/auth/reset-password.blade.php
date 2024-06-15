<x-guest-layout>
    <div class="container max-w-lg px-4 py-32 mx-auto text-left bg-center bg-no-repeat bg-cover md:max-w-none md:text-center" style="background-image: url('{{ asset('images/food2.jpg') }}')">
        <div class="bg-black bg-opacity-50 p-6 rounded-lg">
            <h1 class="font-mono text-3xl font-extrabold text-transparent bg-clip-text bg-white md:text-center sm:leading-none lg:text-5xl">
                <span class="inline md:block">Reset Your Password</span>
            </h1>
            <div class="mx-auto mt-2 text-green-50 md:text-center lg:text-lg">
                Don't worry, we've got you covered. Enter your email to reset your password.
            </div>
            <div class="flex flex-col items-center mt-12 text-center">
                <span class="relative inline-flex w-full md:w-auto">
                    <form method="POST" action="{{ route('password.store') }}">
                        @csrf

                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <!-- Email Address -->
                        <div class="mb-4">
                            <x-input-label for="email" :value="__('Email')" class="text-white" />
                            <x-text-input id="email" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm sm:text-sm" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
                        </div>

                        <!-- Password -->
                        <div class="mb-4">
                            <x-input-label for="password" :value="__('Password')" class="text-white" />
                            <x-text-input id="password" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm sm:text-sm" type="password" name="password" required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-4">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-white" />
                            <x-text-input id="password_confirmation" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm sm:text-sm" type="password" name="password_confirmation" required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-400" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="px-6 py-2 text-base font-bold leading-6 text-white bg-pink-400 rounded-full lg:w-full md:w-auto hover:bg-pink-500 focus:outline-none">
                                {{ __('Reset Password') }}
                            </x-primary-button>
                        </div>
                    </form>
                </span>
            </div>
        </div>
    </div>
</x-guest-layout>
