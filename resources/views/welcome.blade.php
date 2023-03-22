<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Luan') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="icon" type="image/svg+xml" href="{{ asset('image/favicon1.svg') }}">

    <!-- Styles -->
    @livewireStyles

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>

        .img-box {
            width: 40%;
            height: 80%;
            position: absolute;
            bottom: 100px;
            right: 100px;
        }

        .img-box img {
            height: 100%;
            position: absolute;
            left: 50%;
            bottom: 10px;
            transform: translateX(-50%);
            transition: bottom 1s, left 1s;
        }

        .img-box .main-img {
            width: 100%;
            height: auto;
            min-width: 280px;
        }


        .img-box .back-img {
            width: 80%;
            height: auto;
            min-width: 320px;
        }

        .img-box:hover .back-img {
            bottom: 40px;
        }

        .img-box:hover .main-img {
            left: 54%;
        }
    </style>
</head>

<body>
    <div class="relative w-full overflow-hidden">
        <header>
            <nav class="absolute w-full">
                <div class="relative z-10 bg-white">
                    <div class="w-full m-auto md:px-12 lg:py-0 lg:px-10">
                        <div class="flex flex-wrap items-center justify-between gap-6 py-4 md:gap-0">
                            <div class="flex w-full justify-between px-6 md:w-max md:px-0">
                                <a href="{{ route('welcome') }}" aria-label="logo">
                                    <img src="{{ asset('image/logo_header_luan.svg') }}" class="w-48" alt="tailus logo" width="144" height="68">
                                </a>

                                <button aria-label="humburger" id="hamburger" class="relative -mr-2 h-10 w-10 md:hidden">
                                    <div aria-hidden="true" id="line" class="transtion inset-0 m-auto h-0.5 w-6 rounded bg-gray-500 duration-300">
                                    </div>
                                    <div aria-hidden="true" id="line2" class="transtion inset-0 m-auto mt-2 h-0.5 w-6 rounded bg-gray-500 duration-300">
                                    </div>
                                </button>
                            </div>
                            <div class="mobile-links hidden w-full flex-wrap items-center justify-end space-y-4 rounded-xl bg-white p-6 md:flex md:w-8/12 md:flex-nowrap md:space-y-0 md:space-x-4 md:divide-x md:bg-transparent md:p-0 lg:w-7/12">
                                <div class="mr-2 block w-full md:w-max">
                                    <!--nav link-->
                                </div>
                                @if (Route::has('login'))
                                <div class="w-full space-y-4 md:flex md:w-max md:space-y-0 md:space-x-4">
                                    @auth
                                    <a href="{{ route('dashboard') }}" type="button" title="Start buying" class="w-full rounded-xl py-3 px-6 text-center transition hover:bg-pink-100 sm:w-max md:ml-2">
                                        <span class="block font-semibold text-pink-600">
                                            Dashboard
                                        </span>
                                    </a>
                                    @else
                                    <a href="{{ route('login') }}" type="button" title="Start buying" class="w-full rounded-xl py-3 px-6 text-center transition hover:bg-pink-100 sm:w-max md:ml-2">
                                        <span class="block font-semibold text-pink-600">
                                            Login
                                        </span>
                                    </a>
                                    @if (Route::has('register'))
                                    <a href="{{ route('register') }}" type="button" title="Start buying" class="w-full rounded-xl bg-pink-600 py-3 px-6 text-center transition hover:bg-pink-700 focus:bg-pink-500 active:bg-pink-800 sm:w-max">
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
                <div aria-hidden="true" class="m-auto -mt-5 h-4 w-full bg-pink-400 opacity-50 blur md:-mt-4 md:opacity-30"></div>
            </nav>
        </header>
        <div class="flex min-h-screen bg-gradient-to-b from-white to-pink-50">
            <div class="container m-auto px-6 py-20 md:px-12 md:pb-0 md:pt-40 lg:py-0 lg:px-10">
                <div class="flex flex-wrap gap-12">
                    <div class="lg:w-6/12 lg:pt-32 lg:pb-20">
                        <div class="mt-8 space-y-8 lg:-mr-24 xl:-mr-0">
                            <h1 class="text-4xl font-bold md:text-5xl lg:leading-tight text-transparent bg-clip-text bg-gradient-to-r from-[#F29100] to-[#D60B51]">Luan Boutique – Tu
                                estilo ideal</h1>
                            <p class="text-lg text-gray-600">Aquí encontraras todo lo que buscas en Prendas,
                                Temporada Otoño Invierno 2023</p>

                            <x-social-links></x-social-links>

                            <div class="flex space-x-4">
                                <form action="{{ route('login') }}">
                                    <button type="submit" title="Start buying" class="w-full rounded-xl bg-luanYellow py-3 px-6 text-center transition hover:bg-pink-700 focus:bg-pink-500 active:bg-pink-800 sm:w-max">
                                        <span class="block font-semibold text-white">
                                            INGRESAR
                                        </span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="bottom-0 hidden lg:block md:w-full lg:absolute lg:-right-6 lg:w-[60%] xl:-right-18">
                        <!-- <img src="{{ asset('image/bg_girl.png') }}" class="ml-48 md:mr-0" alt="girl background" loading="lazy" width="400" height="100"> -->
                        <div class="img-box ml-48 lg:ml-0">
                            <img src="{{ asset('image/pattern_luan_gradient.svg') }}" alt="back img" class="back-img">
                            <!-- <img src="{{ asset('image/bg_girl.png') }}" alt="main img" class="main-img"> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @livewireScripts
    <script>
        const menuButton = document.querySelector('#hamburger')
        menuButton.addEventListener('click', e => {
            const menu = document.querySelector('.mobile-links');
            menu.classList.toggle('hidden');
        })
    </script>
</body>

</html>
