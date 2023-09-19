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
        </form>
        <div class="mt-4 text-center panel-footer">

            <!-- Facebook -->
            <a href="{{ url('login-facebook') }}">
                <i class="fab fa-facebook-f fa-2x" style="color: #3b5998;"> </i>
            </a>

            <!-- Twitter -->
            <i class="fab fa-twitter fa-2x" style="color: #55acee;"></i>

            <!-- Google -->
            <a href="{{ url('login/google') }}">
                <i class="fab fa-google fa-2x" style="color: #dd4b39;"></i>
            </a>

            <!-- Whatsapp -->
            <i class="fab fa-whatsapp fa-2x" style="color: #25d366;"></i>
        </div>

        @if (JoelButcher\Socialstream\Socialstream::show())
            <x-socialstream />
        @endif
    </x-authentication-card>
@endsection
