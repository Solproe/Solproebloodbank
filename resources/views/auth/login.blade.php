@extends('layouts.guest')

@section('content')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 text-sm font-medium text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <h1 class="mb-4 mt-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-4xl"><span
                class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">Login</span>
            Bloodbank</h1>
        <p class="text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">
            To login please enter your details</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <br>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required
                    autofocus />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block w-full mt-1" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4 ">
                @if (Route::has('password.request'))
                    <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900
                    focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mr-4"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button
                    class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600
                hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300
                dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                    {{ __('Login') }}
                </x-button>
            </div>
            <br>
        </form>
        <footer class="bg-white rounded-lg shadow dark:bg-gray-200 m-4">
            <div class="w-full max-w-screen-xl mx-auto p-4 md:py-2">
                {{-- <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" /> --}}
                <span class="block text-sm text-blue-500 sm:text-center dark:text-gray-400">© 2023 <a href="#"
                        class="hover:underline">Solproe™</a>. All Rights Reserved.</span>
            </div>
        </footer>
    </x-authentication-card>
@endsection
