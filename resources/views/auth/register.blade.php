@extends('adminlte::page')

@vite(['resources/css/app.css', 'resources/js/app.js'])
<link href="{{ asset('css/style.css') }}"rel="stylesheet">

@section('title', 'BloodBank')

@section('content_header')
    <h2 class="mb-2 mt-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-4xl"><span
            class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">User register,<i>You requested
                to user register, please provide the following information.</i></span>

    </h2>

@stop

@section('content')
    <x-validation-errors class="mb-1" />
    <form method="POST" action="{{ route('data') }}">
        @csrf
        <form>
            <div class="grid gap-6 mb-4 md:grid-cols-5">
                {{--   <div>

                </div> --}}
                <div>
                    <figure
                        class="relative max-w-xxs transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
                        <a href="#">
                            <img class="rounded-lg"
                                src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/content/content-gallery-3.png"
                                alt="image description">
                        </a>
                    </figure>
                    <label for="file-upload" class="subir">
                        <i class="fas fa-cloud-upload-alt"></i> uploand file
                    </label>
                    <input id="file-upload" onchange='cambiar()' type="file" style='display: none;' />
                    <div id="info"></div>
                    <label for="hazards" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Occupational
                        hazards</label>
                    <select id="hazards"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-24 min-w-full
                        dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Select Occupational hazards</option>
                        <option value="US">Equidad</option>
                        <option value="CA">Positiva</option>
                        <option value="FR">France</option>
                        <option value="DE">Germany</option>
                    </select>
                </div>
                <div>
                    <label for="id_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Id
                        Type</label>
                    <select id="id_type"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-24 min-w-full
                        dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Select a id type</option>
                        <option value="US">United States</option>
                        <option value="CA">Canada</option>
                        <option value="FR">France</option>
                        <option value="DE">Germany</option>
                    </select>
                    <label for="gender"
                        class="block mb-2 mt-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
                    <select id="gender"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-24 min-w-full
                        p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Select a gender</option>
                        <option value="US">Female</option>
                        <option value="CA">Male</option>
                        <option value="FR">Other</option>
                    </select>
                    <label for="address"
                        class="block mb-2 mt-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                    <input type="text" id="address"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-24 min-w-full
                        dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Your address" required>
                    <label for="Health"
                        class="block mb-2 mt-3 text-sm font-medium text-gray-900 dark:text-white">Health</label>
                    <select id="Health"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-24 min-w-full
                        p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Select a health</option>
                        <option value="US">Sanitas</option>
                        <option value="CA">NUeva EPS</option>
                        <option value="FR">Salud totas</option>
                    </select>
                </div>
                <div>
                    <label for="id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Identification number</label>
                    <input type="number" id="id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-24 min-w-full
                        dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="identification number" required>
                    <label for="birthdate"
                        class="block mb-2 mt-2 text-sm font-medium text-gray-900 dark:text-white">Birthdate</label>
                    <div class="relative max-w-sm">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2
                                    2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input datepicker datepicker-autohide type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500
                            block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                            dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Birthdate">
                    </div>
                    <label for="email-address-icon"
                        class="block mb-2 mt-2 text-sm font-medium text-gray-900 dark:text-white">Your
                        Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                                <path
                                    d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                                <path
                                    d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                            </svg>
                        </div>
                        <input type="text" id="email-address-icon"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5
                            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="name@solproe.com">
                    </div>
                    <label for="roles" class="block mb-2 mt-3 text-sm font-medium text-gray-900 dark:text-white">Roles
                        and permission</label>
                    <select id="roles"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-24 min-w-full
                        p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Roles and permission</option>
                        <option value="US">Systems</option>
                        <option value="CA">Human talent</option>
                        <option value="FR">Human talent</option>
                    </select>
                </div>
                <div>
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First
                        name</label>
                    <input type="text" id="first_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 blockw-24 min-w-full
                        p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="first name" required>
                    <label for="education"
                        class="block w-full mb-2 mt-2 text-sm font-medium text-gray-900 dark:text-white">Education</label>
                    <select id="education"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500
                            block-24 min-w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Education level</option>
                        <option value="US">primary school</option>
                        <option value="CA">secondary school</option>
                        <option value="FR">university</option>
                        <option value="DE">master's program</option>
                    </select>
                    <label for="phone" class="block mb-2 mt-2 text-sm font-medium text-gray-900 dark:text-white">Phone
                        number</label>
                    <input type="tel" id="phone"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full
                            p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="phone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required>
                </div>
                <div class="grid gap-6 mb-4 md:grid-cols-5">
                    <div>
                        <label for="last_name"
                            class="block mb-2 text-sm font-small text-gray-900 dark:text-white">Lastname</label>
                        <input type="text" id="last_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block-24 min-w-full
                                     p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="last name" required>
                        <label for="Profession"
                            class="block mb-2 mt-2 text-sm font-medium text-gray-900 dark:text-white">Profession/trade</label>
                        <input type="text" id="profession"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500
                            block-24 min-w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Profession/trade" required>
                        <label for="retirement"
                            class="block mb-2 mt-2 text-sm font-medium text-gray-900 dark:text-white">Retirement</label>
                        <select id="retirement"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-48
                            p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Select a retirement</option>
                            <option value="US">Colpensiones</option>
                            <option value="CA">Horizonte</option>
                            <option value="FR">Proteccion</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label for="password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                    <input type="password" id="password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full
                        p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="•••••••••" required>
                </div>
                <div>
                    <label for="confirm_password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm
                        password</label>
                    <input type="password" id="confirm_password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full
                         p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="•••••••••" required>
                </div>
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full
             sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Submit</button>
        </form>
        <footer class="bg-white rounded-lg shadow dark:bg-gray-200 m-2">
            <div class="w-full max-w-screen-xl mx-auto p-4 md:py-2">
                {{-- <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" /> --}}
                <span class="block text-sm text-blue-500 sm:text-center dark:text-gray-400">© 2023 <a href="#"
                        class="hover:underline">Solproe™</a>. All Rights Reserved.</span>
            </div>
        </footer>
    </form>
    <script>
        function cambiar() {
            var pdrs = document.getElementById('file-upload').files[0].name;
            document.getElementById('info').innerHTML = pdrs;
        }
    </script>
@endsection
