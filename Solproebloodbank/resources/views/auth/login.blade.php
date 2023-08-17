<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                    autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
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
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                <x-button class="ml-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>

        {{--  <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"
            integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous">
        </script> --}}

        <div class="panel-footer text-center mt-4">

            <p class="mb-4">Login with SocialMedia</p>

            <!-- Facebook -->
            <a href="{{ url('login-facebook') }}">
                <i class="fab fa-facebook-f fa-2x" style="color: #3b5998;"> </i>
            </a>
            {{--
            <!-- Twitter -->
            <i class="fab fa-twitter fa-2x" style="color: #55acee;"></i> --}}

            <!-- Google -->
            <a href="{{ url('login/google') }}">
                <i class="fab fa-google fa-2x" style="color: #dd4b39;"></i>
            </a>


            {{--  <!-- Instagram -->
            <i class="fab fa-instagram fa-2x" style="color: #ac2bac;"></i>
 --}}
            {{-- <!-- Linkedin -->
            <i class="fab fa-linkedin-in fa-2x" style="color: #0082ca;"></i>

            <!-- Pinterest -->
            <i class="fab fa-pinterest fa-2x" style="color: #c61118;"></i>

            <!-- Vkontakte -->
            <i class="fab fa-vk fa-2x" style="color: #4c75a3;"></i>

            <!-- Stack overflow -->
            <i class="fab fa-stack-overflow fa-2x" style="color: #ffac44;"></i>

            <!-- Youtube -->
            <i class="fab fa-youtube fa-2x" style="color: #ed302f;"></i>

            <!-- Slack -->
            <i class="fab fa-slack-hash fa-2x" style="color: #481449;"></i>

            <!-- Github -->
            <i class="fab fa-github fa-2x" style="color: #333333;"></i>

            <!-- Dribbble -->
            <i class="fab fa-dribbble fa-2x" style="color: #ec4a89;"></i>

            <!-- Reddit -->
            <i class="fab fa-reddit-alien fa-2x" style="color: #ff4500;"></i>

            <!-- Whatsapp -->
            <i class="fab fa-whatsapp fa-2x" style="color: #25d366;"></i> --}}
        </div>
    </x-authentication-card>
</x-guest-layout>
