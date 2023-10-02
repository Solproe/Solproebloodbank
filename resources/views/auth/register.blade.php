@extends('adminlte::page')

@vite(['resources/css/app.css', 'resources/js/app.js'])

@section('title', 'BloodBank')

@section('content_header')
    <h1>User Registration</h1>
@stop

@section('content')

    <div class="mt-1 mb-2 border rounded card-body card container-fluid border-info col-md-6">


        {{--  <x-authentication-card> --}}
        {{--  <x-slot name="logo">
                <x-authentication-card-logo />
            </x-slot> --}}

        <x-validation-errors class="mb-1" />

        <div class="mb-2 text-lg card-header">{{ __('Please enter user information') }}</div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-2 row">
                <x-label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</x-label>

                <div class="col-md-6">
                    <x-input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                        name="name" value="" required autocomplete="name" autofocus />

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <x-label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</x-label>

                <div class="col-md-6">
                    <x-input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="" required autocomplete="email" />

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <x-label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</x-label>

                <div class="col-md-6">
                    <x-input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password" />

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <x-label for="password-confirm"
                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</x-label>

                <div class="col-md-6">
                    <x-input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        required autocomplete="new-password" />
                </div>
            </div>

            <div class="mb-0 row">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="float-right btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
            <div class="flex items-center justify-center mt-4">
                <br>
                <span>Or Register with social media</span>
            </div>
            <div class="flex items-center justify-center mt-4">

                <!-- Facebook -->
                <a href="{{ url('/login-facebook') }}" style="color: #3b5998;" href="#!" role="button"><i
                        class="fab fa-facebook-f fa-lg mr-3"></i></a>

                <!-- Twitter -->
                <a style="color:
                        #55acee;" href="#!" role="button"><i
                        class="fab fa-twitter fa-lg mr-3"></i></a>

                <!-- Google -->
                <a href="{{ url('/login-google') }}" style="color: #dd4b39;" href="#!" role="button"><i
                        class="fab fa-google fa-lg mr-3"></i></a>

                <!-- Instagram -->
                <a style="color: #ac2bac;" href="#!" role="button"><i class="fab fa-instagram fa-lg"></i></a>

            </div>
            <br>
        </form>

        {{--  </x-authentication-card> --}}
    </div>
@endsection
