@extends('layouts.guest')

@section('content')
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header mt-2">{{ __('Reset Password') }}</div>


                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                                {{ session('status') }}
                            </div>
                        @endif

                        <x-validation-errors class="mb-4" />
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="block">
                                <x-label for="email" value="{{ __('Enter your email address') }}"
                                    class="mt-3 text-md font-medium"></x-label>
                                <x-input id="email" class="block mt-4 w-full " type="email" name="email"
                                    :value="old('email')" required required autocomplete="email" autofocus />
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4 mt-4">
                                    <x-button type="submit">
                                        {{ __('Send Password Reset Link') }}
                                    </x-button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-authentication-card>
@endsection
