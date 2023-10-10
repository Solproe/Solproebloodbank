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

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-4">
                    {{ __('Login') }}
                </x-button>
            </div>

            <div class="flex items-center justify-center mt-4">
                <br>
                <span>Or login with social media</span>
            </div>
            <div class="flex items-center justify-center mt-4">
                <!-- Facebook -->
                <a style="color: #3b5998;" href="{{ url('/login-facebook') }}" role="button"><i
                        class="fab fa-facebook-f fa-2lg mr-3"></i></a>

                <!-- Twitter -->
                {{--  <a style="color:
                        #55acee;" href="#!" role="button"><i
                        class="fab fa-twitter fa-lg mr-3"></i></a> --}}

                <!-- Google -->
                <a href="{{ url('/login-google') }}" style="color: #dd4b39;" href="#!" role="button"><i
                        class="fab fa-google fa-lg mr-3"></i></a>

                <!-- Instagram -->
                <a style="color: #ac2bac;" href="#!" role="button"><i class="fab fa-instagram fa-lg"></i></a>

            </div>
            <br>
        </form>


    </x-authentication-card>
@endsection
