<div class="relative bg-white" x-id="['dropdown-button']" x-data="{
    open: false,
    openBurger: false,
    toggle() {
        this.open = this.open ? this.close() : true
    },
    close() {
        this.open = false
    }
}">
    <div class="mx-auto max-w-7xl px-4 sm:px-6">
        <div
            class="flex items-center justify-between border-b-2 border-gray-100 py-6 md:justify-start md:space-x-10">
            <div class="flex justify-start lg:w-0 lg:flex-1">
                <a href="{{route('audits.index')}}">Marely</a>
            </div>
            <div class="-my-2 -mr-2 md:hidden">
                <button type="button" @click="openBurger = true"
                    class="inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                    aria-expanded="false">
                    <span class="sr-only">Open menu</span>
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
            <nav class="hidden space-x-10 md:flex">


                <a href="{{ route('reports.index') }}" class="text-base font-medium text-gray-500 hover:text-gray-900">
                    {{ __('Reports') }} </a>
                <a href="{{ route('referrals.index')}}" class="text-base font-medium text-gray-500 hover:text-gray-900">
                    {{ __('Referrals') }} </a>
                <a href="#" class="text-base font-medium text-gray-500 hover:text-gray-900">
                    {{ __('Ernings') }}
                </a>
                <div class="relative" >
                    <button type="button"
                        class="group inline-flex items-center rounded-md bg-white text-base font-medium text-gray-500 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                        aria-expanded="false" @click="toggle()" :aria-expanded="open"
                        :aria-controls="$id('dropdown-buuton')">
                        <span>Solutions</span>
                        <svg class="ml-2 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div x-show="open" :id="$id('dropdown-button')" @click.outside="close()" style="display: none"
                        class="absolute z-10 -ml-4 mt-3 w-screen max-w-md transform px-2 sm:px-0 lg:left-1/2 lg:ml-0 lg:-translate-x-1/2">
                        <div class="overflow-hidden rounded-lg shadow-lg ring-1 ring-black ring-opacity-5">
                            <div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8">
                                <a href="#" class="-m-3 flex items-start rounded-lg p-3 hover:bg-gray-50">
                                    <svg class="h-6 w-6 flex-shrink-0 text-indigo-600"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                    </svg>
                                    <div class="ml-4">
                                        <p class="text-base font-medium text-gray-900">Analytics</p>
                                        <p class="mt-1 text-sm text-gray-500">Get a better understanding of
                                            where your traffic is coming from.</p>
                                    </div>
                                </a>

                                <a href="#" class="-m-3 flex items-start rounded-lg p-3 hover:bg-gray-50">
                                    <!-- Heroicon name: outline/cursor-click -->
                                    <svg class="h-6 w-6 flex-shrink-0 text-indigo-600"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                                    </svg>
                                    <div class="ml-4">
                                        <p class="text-base font-medium text-gray-900">Engagement</p>
                                        <p class="mt-1 text-sm text-gray-500">Speak directly to your customers
                                            in a more meaningful way.</p>
                                    </div>
                                </a>

                                <a href="#" class="-m-3 flex items-start rounded-lg p-3 hover:bg-gray-50">
                                    <!-- Heroicon name: outline/shield-check -->
                                    <svg class="h-6 w-6 flex-shrink-0 text-indigo-600"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                    <div class="ml-4">
                                        <p class="text-base font-medium text-gray-900">Security</p>
                                        <p class="mt-1 text-sm text-gray-500">Your customers&#039; data will be
                                            safe and secure.</p>
                                    </div>
                                </a>

                                <a href="#" class="-m-3 flex items-start rounded-lg p-3 hover:bg-gray-50">
                                    <!-- Heroicon name: outline/view-grid -->
                                    <svg class="h-6 w-6 flex-shrink-0 text-indigo-600"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                                    </svg>
                                    <div class="ml-4">
                                        <p class="text-base font-medium text-gray-900">Integrations</p>
                                        <p class="mt-1 text-sm text-gray-500">Connect with third-party tools
                                            that you&#039;re already using.</p>
                                    </div>
                                </a>

                                <a href="#" class="-m-3 flex items-start rounded-lg p-3 hover:bg-gray-50">
                                    <!-- Heroicon name: outline/refresh -->
                                    <svg class="h-6 w-6 flex-shrink-0 text-indigo-600"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                    </svg>
                                    <div class="ml-4">
                                        <p class="text-base font-medium text-gray-900">Automations</p>
                                        <p class="mt-1 text-sm text-gray-500">Build strategic funnels that will
                                            drive your customers to convert</p>
                                    </div>
                                </a>
                            </div>
                            <div class="space-y-6 bg-gray-50 px-5 py-5 sm:flex sm:space-y-0 sm:space-x-10 sm:px-8">
                                <div class="flow-root">
                                    <a href="#"
                                        class="-m-3 flex items-center rounded-md p-3 text-base font-medium text-gray-900 hover:bg-gray-100">
                                        <!-- Heroicon name: outline/play -->
                                        <svg class="h-6 w-6 flex-shrink-0 text-gray-400"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span class="ml-3">Watch Demo</span>
                                    </a>
                                </div>

                                <div class="flow-root">
                                    <a href="#"
                                        class="-m-3 flex items-center rounded-md p-3 text-base font-medium text-gray-900 hover:bg-gray-100">
                                        <!-- Heroicon name: outline/phone -->
                                        <svg class="h-6 w-6 flex-shrink-0 text-gray-400"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>
                                        <span class="ml-3">Contact Sales</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </nav>
            <div class="hidden items-center justify-end md:flex md:flex-1 lg:w-0">

            </div>
        </div>
    </div>
    <div x-show="openBurger" class="absolute inset-x-0 top-0 origin-top-right transform p-2 transition md:hidden">
        <div class="divide-y-2 divide-gray-50 rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5">
            <div class="px-5 pt-5 pb-6">
                <div class="flex items-center justify-between">
                    <div>
                        <x-jet-application-logo class="h-8 w-auto"></x-jet-application-logo>
                    </div>
                    <div class="-mr-2">
                        <button @click="openBurger = false" type="button"
                            class="inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                            <span class="sr-only">Close menu</span>
                            <!-- Heroicon name: outline/x -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="mt-6">
                    <nav class="grid gap-y-8">
                        <a href="#" class="-m-3 flex items-center rounded-md p-3 hover:bg-gray-50">
                            <!-- Heroicon name: outline/chart-bar -->
                            <svg class="h-6 w-6 flex-shrink-0 text-indigo-600" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                            <span class="ml-3 text-base font-medium text-gray-900"> Analytics </span>
                        </a>

                        <a href="#" class="-m-3 flex items-center rounded-md p-3 hover:bg-gray-50">
                            <!-- Heroicon name: outline/cursor-click -->
                            <svg class="h-6 w-6 flex-shrink-0 text-indigo-600" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                            </svg>
                            <span class="ml-3 text-base font-medium text-gray-900"> Engagement </span>
                        </a>

                        <a href="#" class="-m-3 flex items-center rounded-md p-3 hover:bg-gray-50">
                            <!-- Heroicon name: outline/shield-check -->
                            <svg class="h-6 w-6 flex-shrink-0 text-indigo-600" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                            <span class="ml-3 text-base font-medium text-gray-900"> Security </span>
                        </a>

                        <a href="#" class="-m-3 flex items-center rounded-md p-3 hover:bg-gray-50">
                            <!-- Heroicon name: outline/view-grid -->
                            <svg class="h-6 w-6 flex-shrink-0 text-indigo-600" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                            </svg>
                            <span class="ml-3 text-base font-medium text-gray-900"> Integrations </span>
                        </a>

                        <a href="#" class="-m-3 flex items-center rounded-md p-3 hover:bg-gray-50">
                            <!-- Heroicon name: outline/refresh -->
                            <svg class="h-6 w-6 flex-shrink-0 text-indigo-600" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                            <span class="ml-3 text-base font-medium text-gray-900"> Automations </span>
                        </a>
                    </nav>
                </div>
            </div>
            <div class="space-y-6 py-6 px-5">
                <div class="grid grid-cols-2 gap-y-4 gap-x-8">
                    <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
                        {{ __('Ernings') }}
                    </a>

                    <a href="{{ route('reports.index') }}" class="text-base font-medium text-gray-900 hover:text-gray-700">
                        {{ __('Reports') }}
                    </a>

                    <a href="{{ route('referrals.index')}}" class="text-base font-medium text-gray-900 hover:text-gray-700">
                        {{ __('Referrals') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>