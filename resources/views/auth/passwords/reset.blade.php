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
                class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">Reset</span>
            password.</h1>
        <p class="text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">You requested to reset your password,
            please
            provide the following information.</p>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="block">
                <br>
                <x-label id="email" value="{{ __('Email Address') }}" />
                <x-input id="email" type="email"
                    class="form-control @error('email') is-invalid @enderror block mt-1 w-full" name="email"
                    value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus />
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mt-4 block">
                <x-label id="password" value="{{ __('Password') }} " />
                <x-input id="password" type="password"
                    class="form-control @error('password') is-invalid @enderror block mt-1 w-full" name="password" required
                    autocomplete="new-password" />

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="row mt-4 block">
                <x-label id="password-confirm" value="{{ __('Confirm Password') }}" />
                <x-input id="password-confirm" type="password" class="form-control block mt-1 w-full"
                    name="password_confirmation" required autocomplete="new-password" />

            </div>

            <div class="flex items-center justify-end mt-4 mb-4">
                <x-button
                    class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600
                    hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300
                    dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                    {{ __('Password update') }}
                </x-button>
            </div>

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
