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


    <aside
        class="fixed top-0 z-10 ml-[-100%] flex h-screen w-full flex-col justify-between overflow-auto border-r bg-gradient-to-r from-gray-100 to-gray-300 px-6 pb-3 transition duration-300 md:w-4/12 lg:ml-0 lg:w-[25%] xl:w-[20%] 2xl:w-[15%]">
        <div>
            <div class="-mx-6 px-6 py-4">
                <a href="{{ route('dashboard') }}" title="home">
                    <img src="{{ asset('image/logoMarely4.svg') }}" class="w-full" alt="marely logo">
                </a>
            </div>

            <div class="mt-8 text-center">
                <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}"
                    class="m-auto h-10 w-10 rounded-full object-cover lg:h-28 lg:w-28">
                <h5 class="mt-4 hidden text-xl font-semibold capitalize text-gray-600 lg:block">{{ Auth::user()->name }}
                </h5>
                <span class="hidden text-gray-400 lg:block">admin</span>
            </div>

            <ul class="mt-8 space-y-2 tracking-wide">
                <li>
                    <a href="{{ route('dashboard') }}" aria-label="dashboard"
                        class="{{ request()->routeIs('dashboard') ? 'rounded-xl bg-gradient-to-r from-sky-600 to-cyan-400  text-white' : 'rounded-md text-gray-600' }} relative flex items-center space-x-4 px-4 py-3">
                        <svg class="-ml-1 h-6 w-6" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M6 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2V8ZM6 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2v-1Z"
                                class="fill-current text-cyan-400 dark:fill-slate-600"></path>
                            <path d="M13 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2V8Z"
                                class="fill-current text-cyan-200 group-hover:text-cyan-300"></path>
                            <path d="M13 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-1Z"
                                class="fill-current group-hover:text-sky-300"></path>
                        </svg>
                        <span class="-mr-1 font-medium">{{ __('Dashboard') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('products.index') }}"
                        class="group {{ request()->routeIs('products.index') ? 'rounded-xl bg-gradient-to-r from-sky-600 to-cyan-400  text-white' : 'rounded-md text-gray-600' }} flex items-center space-x-4 px-4 py-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                            <path class="fill-current text-gray-300 group-hover:text-cyan-300" fill-rule="evenodd"
                                d="M7.502 6h7.128A3.375 3.375 0 0118 9.375v9.375a3 3 0 003-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 00-.673-.05A3 3 0 0015 1.5h-1.5a3 3 0 00-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6zM13.5 3A1.5 1.5 0 0012 4.5h4.5A1.5 1.5 0 0015 3h-1.5z"
                                clip-rule="evenodd" />
                            <path class="fill-current text-gray-600 group-hover:text-cyan-600" fill-rule="evenodd"
                                d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 013 20.625V9.375zM6 12a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V12zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75zM6 15a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V15zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75zM6 18a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V18zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75z"
                                clip-rule="evenodd" />
                        </svg>

                        <span class="group-hover:text-gray-700">{{ __('Products') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('suppliers.index') }}"
                        class="group {{ request()->routeIs('suppliers.index') ? 'rounded-xl bg-gradient-to-r from-sky-600 to-cyan-400  text-white' : 'rounded-md text-gray-600' }} flex items-center space-x-4 px-4 py-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                            <path class="fill-current text-gray-500 group-hover:text-cyan-300"
                                d="M3.375 4.5C2.339 4.5 1.5 5.34 1.5 6.375V13.5h12V6.375c0-1.036-.84-1.875-1.875-1.875h-8.25zM13.5 15h-12v2.625c0 1.035.84 1.875 1.875 1.875h.375a3 3 0 116 0h3a.75.75 0 00.75-.75V15z" />
                            <path class="fill-current text-gray-700 group-hover:text-cyan-600"
                                d="M8.25 19.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0zM15.75 6.75a.75.75 0 00-.75.75v11.25c0 .087.015.17.042.248a3 3 0 015.958.464c.853-.175 1.522-.935 1.464-1.883a18.659 18.659 0 00-3.732-10.104 1.837 1.837 0 00-1.47-.725H15.75z" />
                            <path class="fill-current text-gray-900 group-hover:text-cyan-300"
                                d="M19.5 19.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z" />
                        </svg>
                        <span class="group-hover:text-gray-700">{{ __('Suppliers') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('categories.index') }}"
                        class="group {{ request()->routeIs('categories.index') ? 'rounded-xl bg-gradient-to-r from-sky-600 to-cyan-400  text-white' : 'rounded-md text-gray-600' }} flex items-center space-x-4 px-4 py-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path class="fill-current text-gray-300 group-hover:text-cyan-300" fill-rule="evenodd"
                                d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z"
                                clip-rule="evenodd" />
                            <path class="fill-current text-gray-600 group-hover:text-cyan-600"
                                d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z" />
                        </svg>
                        <span class="group-hover:text-gray-700">{{ __('Categories') }}</span>
                    </a>
                </li>
                <li>
                    <div class="relative inline-block">
                        <a href="#" class="group flex items-center space-x-4 px-4 py-3" id="btn-orders">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path class="fill-current text-gray-600 group-hover:text-cyan-600"
                                    d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z" />
                                <path class="fill-current text-gray-500 group-hover:text-cyan-300"
                                    d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z" />
                            </svg>
                            <span class="group-hover:text-gray-700">{{ __('Orders') }}</span>
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 15.713L18.01 9.70299L16.597 8.28799L12 12.888L7.40399 8.28799L5.98999 9.70199L12 15.713Z"
                                    fill="currentColor"></path>
                            </svg>
                        </a>
                        <!-- Dropdown menu -->
                        <div
                            class="menu-orders relative left-0 z-20 mt-2 hidden w-56 overflow-hidden rounded-md bg-white py-2 shadow-xl dark:bg-gray-800">


                            <a href="{{ route('sales.index') }}"
                                class="{{ request()->routeIs('sales.index') ? 'rounded-xl bg-gradient-to-r from-sky-600 to-cyan-400  text-white' : 'rounded-md text-gray-600' }} flex transform px-4 py-3 text-sm capitalize text-gray-600 transition-colors duration-200 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700 dark:hover:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="mx-1 h-5 w-5">
                                    <path fill-rule="evenodd"
                                        d="M9.75 6.75h-3a3 3 0 00-3 3v7.5a3 3 0 003 3h7.5a3 3 0 003-3v-7.5a3 3 0 00-3-3h-3V1.5a.75.75 0 00-1.5 0v5.25zm0 0h1.5v5.69l1.72-1.72a.75.75 0 111.06 1.06l-3 3a.75.75 0 01-1.06 0l-3-3a.75.75 0 111.06-1.06l1.72 1.72V6.75z"
                                        clip-rule="evenodd" />
                                    <path
                                        d="M7.151 21.75a2.999 2.999 0 002.599 1.5h7.5a3 3 0 003-3v-7.5c0-1.11-.603-2.08-1.5-2.599v7.099a4.5 4.5 0 01-4.5 4.5H7.151z" />
                                </svg>
                                {{ __('Sales Order') }}
                            </a>

                            <hr class="border-gray-200 dark:border-gray-700">

                            <a href="{{ route('referrals.index') }}"
                                class="{{ request()->routeIs('referrals.index') ? 'rounded-xl bg-gradient-to-r from-sky-600 to-cyan-400  text-white' : 'rounded-md text-gray-600' }} flex transform px-4 py-3 text-sm capitalize text-gray-600 transition-colors duration-200 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700 dark:hover:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="mx-1 h-5 w-5">
                                    <path
                                        d="M9.97.97a.75.75 0 011.06 0l3 3a.75.75 0 01-1.06 1.06l-1.72-1.72v3.44h-1.5V3.31L8.03 5.03a.75.75 0 01-1.06-1.06l3-3zM9.75 6.75v6a.75.75 0 001.5 0v-6h3a3 3 0 013 3v7.5a3 3 0 01-3 3h-7.5a3 3 0 01-3-3v-7.5a3 3 0 013-3h3z" />
                                    <path
                                        d="M7.151 21.75a2.999 2.999 0 002.599 1.5h7.5a3 3 0 003-3v-7.5c0-1.11-.603-2.08-1.5-2.599v7.099a4.5 4.5 0 01-4.5 4.5H7.151z" />
                                </svg>
                                {{ __('Purchase Order') }}
                            </a>


                        </div>
                    </div>
                </li>
                <li>
                    <a href="{{ route('shops.index') }}"
                        class="group {{ request()->routeIs('shops.index') ? 'rounded-xl bg-gradient-to-r from-sky-600 to-cyan-400  text-white' : 'rounded-md text-gray-600' }} flex items-center space-x-4 px-4 py-3">

                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="h-5 w-5">
                            <path class="text-gray-600 group-hover:text-cyan-600"
                                d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z" />
                        </svg>

                        <span class="group-hover:text-gray-700">{{ __('My Shop') }}</span>
                    </a>
                </li>



            </ul>
        </div>
        <hr class="mt-2 border-gray-300" />
        <div class="-mx-6 flex items-center justify-between border-t px-6 pt-4">
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                class="group flex items-center space-x-4 px-4 py-3">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                    class="h-5 w-5 fill-current dark:text-gray-400">
                    <path
                        d="M440,424V88H352V13.005L88,58.522V424H16v32h86.9L352,490.358V120h56V456h88V424ZM320,453.642,120,426.056V85.478L320,51Z">
                    </path>
                    <rect width="32" height="64" x="256" y="232"></rect>
                </svg>
                <span class="group-hover:text-gray-700">{{ __('Logout') }}</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </aside>

    <div class="ml-auto mb-6 lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">
        <div class="sticky top-0 z-10 h-16 border-b bg-white lg:py-2.5">
            <div class="flex items-center justify-between space-x-4 px-6 2xl:container">
                <h5 hidden class="text-2xl font-medium text-gray-600 lg:block">{{$title}}</h5>
                <button class="-mr-2 h-16 w-12 border-r lg:hidden" id="btn-sidebar">
                    <svg xmlns="http://www.w3.org/2000/svg" class="my-auto h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <div class="flex space-x-4">
                    <!--search bar -->
                    <div hidden class="md:block">
                        <div class="relative flex items-center text-gray-400 focus-within:text-cyan-400">
                            <span class="absolute left-4 flex h-6 items-center border-r border-gray-300 pr-3">
                                <svg xmlns="http://ww50w3.org/2000/svg" class="w-4 fill-current"
                                    viewBox="0 0 35.997 36.004">
                                    <path id="Icon_awesome-search" data-name="search"
                                        d="M35.508,31.127l-7.01-7.01a1.686,1.686,0,0,0-1.2-.492H26.156a14.618,14.618,0,1,0-2.531,2.531V27.3a1.686,1.686,0,0,0,.492,1.2l7.01,7.01a1.681,1.681,0,0,0,2.384,0l1.99-1.99a1.7,1.7,0,0,0,.007-2.391Zm-20.883-7.5a9,9,0,1,1,9-9A8.995,8.995,0,0,1,14.625,23.625Z">
                                    </path>
                                </svg>
                            </span>
                            <input type="search" name="leadingIcon" id="leadingIcon" placeholder="Search here"
                                class="w-full rounded-xl border border-gray-300 py-2.5 pl-14 pr-4 text-sm text-gray-600 outline-none transition focus:border-cyan-300">
                        </div>
                    </div>
                    <!--/search bar -->
                    <button aria-label="search"
                        class="h-10 w-10 rounded-xl border bg-gray-100 focus:bg-gray-100 active:bg-gray-200 md:hidden">
                        <svg xmlns="http://ww50w3.org/2000/svg" class="mx-auto w-4 fill-current text-gray-600"
                            viewBox="0 0 35.997 36.004">
                            <path id="Icon_awesome-search" data-name="search"
                                d="M35.508,31.127l-7.01-7.01a1.686,1.686,0,0,0-1.2-.492H26.156a14.618,14.618,0,1,0-2.531,2.531V27.3a1.686,1.686,0,0,0,.492,1.2l7.01,7.01a1.681,1.681,0,0,0,2.384,0l1.99-1.99a1.7,1.7,0,0,0,.007-2.391Zm-20.883-7.5a9,9,0,1,1,9-9A8.995,8.995,0,0,1,14.625,23.625Z">
                            </path>
                        </svg>
                    </button>
                    <livewire:shops.cart-shop></livewire:shops.cart-shop>
                    <form action="{{ route('profile.show') }}" method="GET">
                        <button type="submit" aria-label="notification"
                            class="h-10 w-10 rounded-xl border bg-gray-100 focus:bg-gray-100 active:bg-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="m-auto h-5 w-5 text-gray-600">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>

                        </button>
                    </form>

                </div>
            </div>
        </div>
        <!-- Responsive Navigation Menu -->
        <div class="menu-sidebar fixed z-10 hidden w-full bg-teal-50 shadow-2xl lg:hidden">
            <div class="space-y-1 pt-2 pb-3">
                <x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-jet-responsive-nav-link>
                <x-jet-responsive-nav-link href="{{ route('products.index') }}" :active="request()->routeIs('products.index')">
                    {{ __('Products') }}
                </x-jet-responsive-nav-link>
                <x-jet-responsive-nav-link href="{{ route('suppliers.index') }}" :active="request()->routeIs('suppliers.index')">
                    {{ __('Suppliers') }}
                </x-jet-responsive-nav-link>
                <x-jet-responsive-nav-link href="{{ route('categories.index') }}" :active="request()->routeIs('categories.index')">
                    {{ __('Categories') }}
                </x-jet-responsive-nav-link>
                <x-jet-responsive-nav-link href="{{ route('shops.index') }}" :active="request()->routeIs('shops.index')">
                    {{ __('My Shop') }}
                </x-jet-responsive-nav-link>
                <x-jet-responsive-nav-link href="{{ route('referrals.index') }}" :active="request()->routeIs('referrals.index')">
                    {{ __('Purchase Order') }}
                </x-jet-responsive-nav-link>
                <x-jet-responsive-nav-link href="{{ route('sales.index') }}" :active="request()->routeIs('sales.index')">
                    {{ __('Sales Order') }}
                </x-jet-responsive-nav-link>
                {{-- <x-jet-responsive-nav-link href="{{ route('audits.index') }}" :active="request()->routeIs('audits.index')">
                    {{ __('Audits') }}
                </x-jet-responsive-nav-link> --}}
            </div>

            <!-- Responsive Settings Options -->
            <div class="border-t border-gray-200 pt-4 pb-1">
                <div class="flex items-center px-4">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <div class="mr-3 shrink-0">
                            <img class="h-10 w-10 rounded-full object-cover"
                                src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </div>
                    @endif

                    <div>
                        <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>

                <div class="mt-3 space-y-1">
                    <!-- Account Management -->
                    <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                        {{ __('Profile') }}
                    </x-jet-responsive-nav-link>

                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                            {{ __('API Tokens') }}
                        </x-jet-responsive-nav-link>
                    @endif

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf

                        <x-jet-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                            {{ __('Log Out') }}
                        </x-jet-responsive-nav-link>
                    </form>

                    <!-- Team Management -->
                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                        <div class="border-t border-gray-200"></div>

                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Team') }}
                        </div>

                        <!-- Team Settings -->
                        <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}"
                            :active="request()->routeIs('teams.show')">
                            {{ __('Team Settings') }}
                        </x-jet-responsive-nav-link>

                        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                            <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                                {{ __('Create New Team') }}
                            </x-jet-responsive-nav-link>
                        @endcan

                        <div class="border-t border-gray-200"></div>

                        <!-- Team Switcher -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Switch Teams') }}
                        </div>

                        @foreach (Auth::user()->allTeams() as $team)
                            <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                        @endforeach
                    @endif

                    {{-- <!-- Cart Shop -->
                    @if (\Cart::session(auth()->id())->getTotalQuantity())
                        <div class="border-t border-gray-200"></div>

                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Cart Shop') }}
                        </div>

                        <!-- add to cart -->
                        <x-jet-responsive-nav-link href="#">
                            <svg width="20" height="20" version="1.1" id="Layer_1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                x="0px" y="0px" viewBox="0 0 20 20"
                                style="enable-background:new 0 0 20 20;" xml:space="preserve">
                                <path
                                    d="M19.61,17.3l-0.52-9.4c-0.06-0.99-0.88-1.77-1.87-1.77h-2.95V4.99c0-2.35-1.91-4.26-4.27-4.26S5.73,2.64,5.73,4.99v1.14
                                    H2.78c-0.99,0-1.81,0.78-1.87,1.77l-0.52,9.4c-0.03,0.51,0.16,1.02,0.51,1.39c0.35,0.37,0.85,0.59,1.36,0.59h15.48
                                    c0.51,0,1.01-0.21,1.36-0.58C19.45,18.31,19.63,17.81,19.61,17.3z M7.26,4.99c0-1.51,1.23-2.74,2.74-2.74s2.74,1.23,2.74,2.74v1.14
                                    H7.26V4.99z M17.99,17.64c-0.04,0.04-0.12,0.11-0.25,0.11H2.26c-0.13,0-0.21-0.07-0.25-0.11c-0.04-0.04-0.1-0.13-0.09-0.26l0.52-9.4
                                    C2.45,7.8,2.6,7.65,2.78,7.65h2.95v1.83c0,0.42,0.34,0.76,0.76,0.76s0.76-0.34,0.76-0.76V7.65h5.48v1.83c0,0.42,0.34,0.76,0.76,0.76
                                    s0.76-0.34,0.76-0.76V7.65h2.95c0.18,0,0.34,0.14,0.35,0.33l0.52,9.4C18.09,17.51,18.03,17.6,17.99,17.64z">
                                </path>
                            </svg>
                            <span
                                class="ml-2 inline-block whitespace-nowrap rounded-full bg-red-600 py-1 px-1.5 text-center align-baseline text-xs font-bold leading-none text-white">{{ \Cart::session(auth()->id())->getTotalQuantity() }}</span>
                        </x-jet-responsive-nav-link>
                    @endif --}}
                </div>
            </div>
        </div>

        <div class="bg-transparent px-6 pt-6 2xl:container">
            {{ $slot }}
        </div>
    </div>


    @livewireScripts
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />
    <script>
        const menuButton = document.querySelector('#btn-sidebar')
        menuButton.addEventListener('click', e => {
            const menu = document.querySelector('.menu-sidebar');
            menu.classList.toggle('hidden');
        })

        const orderButton = document.querySelector('#btn-orders')
        orderButton.addEventListener('click', e => {
            const menuOrder = document.querySelector('.menu-orders');
            menuOrder.classList.toggle('hidden');
        })
    </script>
</body>

</html>
