<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Marely') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="icon" type="image/png" href="{{ asset('image/favicon.svg') }}">

    <!-- Styles -->
    @livewireStyles

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <div class="relative w-full overflow-hidden">
        <header>
            <nav class="absolute w-full">
                <div class="relative z-10 bg-white">
                    <div class="container m-auto md:px-12 lg:py-0 lg:px-10">
                        <div class="flex flex-wrap items-center justify-between gap-6 py-4 md:gap-0">
                            <div class="flex w-full justify-between px-6 md:w-max md:px-0">
                                <a href="{{ route('welcome') }}" aria-label="logo">
                                    <img src="{{ asset('image/logoMarely4.svg') }}" class="w-48" alt="tailus logo"
                                        width="144" height="68">
                                </a>

                                <button aria-label="humburger" id="hamburger"
                                    class="relative -mr-2 h-10 w-10 md:hidden">
                                    <div aria-hidden="true" id="line"
                                        class="transtion inset-0 m-auto h-0.5 w-6 rounded bg-gray-500 duration-300">
                                    </div>
                                    <div aria-hidden="true" id="line2"
                                        class="transtion inset-0 m-auto mt-2 h-0.5 w-6 rounded bg-gray-500 duration-300">
                                    </div>
                                </button>
                            </div>
                            <div
                                class="hidden w-full flex-wrap items-center justify-end space-y-4 rounded-xl bg-gray-300 p-6 md:flex md:w-8/12 md:flex-nowrap md:space-y-0 md:space-x-4 md:divide-x md:bg-transparent md:p-0 lg:w-7/12">
                                <div class="block w-full md:w-max">
                                    {{-- <ul class="space-y-4 font-medium tracking-wide text-gray-500 md:flex md:space-y-0">
                                        <li>
                                            <a href="#" class="block md:px-4">
                                                <div
                                                    class="relative text-teal-600 before:absolute before:-bottom-7 before:mx-auto before:mt-auto before:h-1 before:w-full before:rounded-t-full before:bg-teal-500">
                                                    <span>Link</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="group block md:px-4">
                                                <div
                                                    class="group relative before:absolute before:-bottom-7 before:mt-auto before:h-0.5 before:w-full before:origin-left before:scale-x-0 before:rounded-full before:bg-teal-800 before:transition group-hover:before:scale-x-100">
                                                    <span class="group-hover:text-teal-500">Link</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="group block md:px-4">
                                                <div
                                                    class="group relative before:absolute before:-bottom-7 before:mx-auto before:mt-auto before:h-0.5 before:w-full before:scale-x-0 before:rounded-full before:bg-teal-800 before:transition group-hover:before:scale-x-100">
                                                    <span class="group-hover:text-teal-500">Link</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul> --}}
                                </div>
                                @if (Route::has('login'))
                                    <div class="w-full space-y-4 md:flex md:w-max md:space-y-0 md:space-x-4">
                                        @auth
                                            <a href="{{ route('dashboard') }}" type="button" title="Start buying"
                                                class="w-full rounded-xl py-3 px-6 text-center transition focus:bg-teal-100 active:bg-teal-200 sm:w-max">
                                                <span class="block font-semibold text-teal-600">
                                                    Dashboard
                                                </span>
                                            </a>
                                        @else
                                            <a href="{{ route('login') }}" type="button" title="Start buying"
                                                class="w-full rounded-xl py-3 px-6 text-center transition focus:bg-teal-100 active:bg-teal-200 sm:w-max">
                                                <span class="block font-semibold text-teal-600">
                                                    Login
                                                </span>
                                            </a>
                                            @if (Route::has('register'))
                                                <a href="{{ route('register') }}" type="button" title="Start buying"
                                                    class="w-full rounded-xl bg-teal-600 py-3 px-6 text-center transition hover:bg-teal-700 focus:bg-teal-500 active:bg-teal-800 sm:w-max">
                                                    <span class="block font-semibold text-white">
                                                        Register
                                                    </span>
                                                </a>
                                            @endif
                                        @endauth

                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div aria-hidden="true" class="w-12/12 m-auto -mt-6 h-4 bg-teal-600 opacity-30 blur md:-mt-4"></div>
            </nav>
        </header>
        <div class="flex min-h-screen bg-gradient-to-b from-white to-teal-50">
            <div class="container m-auto px-6 py-20 md:px-12 md:pb-0 md:pt-40 lg:py-0 lg:px-10">
                <div class="flex flex-wrap gap-12">
                    <div class="lg:w-6/12 lg:pt-32 lg:pb-20">
                        <div class="mt-8 space-y-8 lg:-mr-24 xl:-mr-0">
                            <h1 class="text-4xl font-bold text-gray-800 md:text-5xl lg:leading-tight">Uncompromised
                                Versatility –When it Matters the Most.</h1>
                            <p class="text-lg text-gray-600">Quod rerum dolor ab harum facere quo nihil labore
                                necessitatibus tempora?</p>

                            <div class="flex space-x-4">
                                <button type="button" title="Start buying"
                                    class="w-full rounded-xl bg-teal-600 py-3 px-6 text-center transition hover:bg-teal-700 focus:bg-teal-500 active:bg-teal-800 sm:w-max">
                                    <span class="block font-semibold text-white">
                                        Book Demo
                                    </span>
                                </button>
                                <button type="button" title="Start buying"
                                    class="w-full rounded-xl py-3 px-6 text-center transition focus:bg-teal-100 active:bg-teal-200 sm:w-max">
                                    <div class="flex">
                                        <span class="block font-semibold text-teal-700">
                                            Our showreel
                                        </span>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div
                        class="bottom-0 hidden md:-right-32 md:ml-auto md:block md:w-full lg:absolute lg:-right-32 lg:w-[60%] xl:-right-48">
                        <img src="{{ asset('image/dashboard.png') }}" class="ml-48 lg:ml-0" alt="gril on an horse"
                            loading="lazy" width="1053" height="772">
                    </div>
                </div>
            </div>
        </div>
    </div>

    @livewireScripts
</body>

</html>
