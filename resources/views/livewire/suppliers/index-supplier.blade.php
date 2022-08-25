<div>
    <div
        class="xl:mt-18 relative z-0 my-auto mb-12 overflow-hidden rounded-xl bg-white shadow-md ring-1 ring-slate-900/5 dark:bg-slate-800">
        <section>
            <header class="dark:highlight-white/10 space-y-4 rounded-t-xl p-4 sm:px-8 sm:py-6 lg:p-4 xl:px-8 xl:py-6">
                <div class="flex items-center justify-between">
                    <h2 class="font-semibold text-slate-900 dark:text-white">{{ __('Suppliers') }}</h2>
                    <livewire:suppliers.create-supplier></livewire:suppliers.create-supplier>
                </div>
                <div
                    class="group dark:highlight-white/10 relative rounded-md dark:bg-slate-700 dark:focus-within:bg-transparent">
                    <svg width="20" height="20" fill="currentColor"
                        class="pointer-events-none absolute left-3 top-1/2 -mt-2.5 text-slate-400 group-focus-within:text-blue-500 dark:text-slate-500">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z">
                        </path>
                    </svg><input wire:model="search" type="text" aria-label="Search suppliers"
                        placeholder="Search suppliers..."
                        class="w-full appearance-none rounded-md bg-transparent py-2 pl-10 text-sm leading-6 text-slate-900 shadow-sm ring-1 ring-slate-200 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:text-slate-100 dark:ring-0 dark:placeholder:text-slate-500 dark:focus:ring-2">
                </div>
            </header>
        </section>
    </div>
    <div class="bg-white py-6 sm:py-8 lg:py-12 shadow-md rounded-xl ring-1 ring-slate-900/5 dark:bg-slate-800">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
            <!-- text - start -->
            <div class="mb-10 md:mb-16">
                <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">{{ __('Suppliers') }}
                </h2>

                <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">This is a section of some simple
                    filler text, also known as placeholder text. It shares some characteristics of a real written text
                    but is random or otherwise generated.</p>
            </div>
            <!-- text - end -->

            <div class="grid gap-6 sm:grid-cols-2">
                @foreach ($suppliers as $item)
                    <!-- product - start -->
                    <a href="#"
                        class="group relative flex h-56 items-end overflow-hidden rounded-lg bg-teal-100 p-4 shadow-lg">
                        {{-- <img src="https://ui-avatars.com/api/?format=svg&name={{ urlencode($item->company_name) }}&background=random"
                            loading="lazy" alt="Photo by Fakurian Design"
                            class="absolute inset-0 h-36 w-full object-cover object-center transition duration-200 group-hover:scale-110" /> --}}

                        <div
                            class="pointer-events-none absolute inset-0 bg-gradient-to-t from-gray-500 via-transparent to-transparent opacity-50">
                        </div>

                        <div class="relative flex flex-col">
                            {{-- <span class="text-gray-200 uppercase">{{$item->company_name}}</span>
                            <span class="text-lg font-semibold text-white lg:text-xl">{{$item->location}}</span>
                            <span class="text-lg font-semibold text-white lg:text-xl">{{$item->phone_number}}</span> --}}
                            <div class="py-6 md:py-0 md:px-6 text-gray-800">
                                <h1 class="text-4xl font-bold capitalize">{{ $item->company_name }}</h1>
                                <p class="pt-2 pb-4">Fill in the form to start a conversation</p>
                                <div class="space-y-4">
                                    <p class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            class="mr-2 h-5 w-5 sm:mr-6">
                                            <path fill-rule="evenodd"
                                                d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span>{{ $item->location }}</span>
                                    </p>
                                    <p class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            class="mr-2 h-5 w-5 sm:mr-6">
                                            <path
                                                d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z">
                                            </path>
                                        </svg>
                                        <span>+54-{{ $item->phone_number }}</span>
                                    </p>
                                    <p class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            class="mr-2 h-5 w-5 sm:mr-6">
                                            <path
                                                d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z">
                                            </path>
                                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                        </svg>
                                        <span>contact@business.com</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <!-- product - end -->
                @endforeach

            </div>
        </div>
    </div>
</div>
