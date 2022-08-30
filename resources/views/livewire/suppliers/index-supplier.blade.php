<div>
    {{-- <div
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
    <div class="rounded-xl bg-white py-6 shadow-md ring-1 ring-slate-900/5 dark:bg-slate-800 sm:py-8 lg:py-12">
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


                        <div
                            class="pointer-events-none absolute inset-0 bg-gradient-to-t from-gray-500 via-transparent to-transparent opacity-50">
                        </div>

                        <div class="relative flex flex-col">
                            <div class="py-6 text-gray-800 md:py-0 md:px-6">
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
    </div> --}}

    <section class="body-font text-gray-600">
        <div class="container mx-auto px-5 py-24">
            <div class="mb-20 flex w-full flex-col flex-wrap items-center text-center">
                <h1 class="title-font mb-2 text-2xl font-medium text-gray-900 sm:text-3xl">{{ __('Suppliers') }}</h1>
                <p class="w-full leading-relaxed text-gray-500 lg:w-1/2">Whatever cardigan tote bag tumblr hexagon
                    brooklyn asymmetrical gentrify, subway tile poke farm-to-table.</p>
            </div>
            <div class="-m-4 flex flex-wrap">
                @foreach ($suppliers as $item)
                    <div class="p-4 md:w-1/2 xl:w-1/3">
                        <div class="rounded-lg border border-gray-200 p-6">
                            <div
                                class="mb-4 inline-flex h-10 w-10 items-center justify-center rounded-full bg-green-100 text-green-500">

                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="h-6 w-6">
                                    <path
                                        d="M3.375 4.5C2.339 4.5 1.5 5.34 1.5 6.375V13.5h12V6.375c0-1.036-.84-1.875-1.875-1.875h-8.25zM13.5 15h-12v2.625c0 1.035.84 1.875 1.875 1.875h.375a3 3 0 116 0h3a.75.75 0 00.75-.75V15z" />
                                    <path
                                        d="M8.25 19.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0zM15.75 6.75a.75.75 0 00-.75.75v11.25c0 .087.015.17.042.248a3 3 0 015.958.464c.853-.175 1.522-.935 1.464-1.883a18.659 18.659 0 00-3.732-10.104 1.837 1.837 0 00-1.47-.725H15.75z" />
                                    <path d="M19.5 19.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z" />
                                </svg>

                            </div>
                            <h2 class="title-font mb-2 text-lg font-medium text-gray-900">{{$item->company_name}}</h2>
                            <p class="text-base leading-relaxed">{{$item->location}}</p>

                        </div>
                    </div>
                @endforeach


            </div>
            <button
                class="mx-auto mt-16 flex rounded border-0 bg-green-500 py-2 px-8 text-lg text-white hover:bg-green-600 focus:outline-none">Button</button>
        </div>
    </section>
</div>
