{{-- navigation menu --}}

<nav class="bg-gray-100">

    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">

        <div class="relative flex items-center justify-between h-16">
            
            @auth

                <div class="absolute inset-y-0 right-0 flex items-center" >
                    
                        <!-- Start Authentication menu -->

                       {{-- <div x-show="open" x-on:click.away="open = false"
                            class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                            <!-- Active: "bg-gray-100", Not Active: "" -->
                            <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-gray-700"
                                role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                            <a href="{{ route('admin.home') }}" class="block px-4 py-2 text-sm text-gray-700"
                                role="menuitem" tabindex="-1" id="user-menu-item-0">Dashboard</a>
                            <!--<a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>-->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700"
                                    role="menuitem" tabindex="-1" id="user-menu-item-2" onclick="event.preventDefault();
                                    this.closest('form').submit();">Sign out
                                </a>
                            </form>
                        </div>--}}
                        <!-- end Authentication menu -->

                    </div>
                    <!-- End Profile dropdown -->

                </div>
            @else
                {{--<div class="flex items-center justify-center sm:items-stretch sm:justify-start">

                    <a href="{{ route('login') }}"
                        class="text-gray-900 hover:bg-gray-300 hover:text-white px-3 py-2 rounded-md text-xl text-right font-medium">
                        Login</a>
                    <a href="{{ route('register') }}"
                        class="text-gray-900 hover:bg-gray-300 hover:text-white px-3 py-2 rounded-md text-xl text-right font-medium">
                        Register</a>

                </div>--}}
            @endauth
            <!-- end Authentication-->
        </div>

    </div>

   
</nav>
