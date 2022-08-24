<div>
    <div
        class="xl:mt-18 relative z-0 my-auto mb-12 overflow-hidden rounded-xl bg-white shadow-xl ring-1 ring-slate-900/5 dark:bg-slate-800">
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
    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
            <!-- text - start -->
            <div class="mb-10 md:mb-16">
                <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">Collections</h2>

                <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">This is a section of some simple
                    filler text, also known as placeholder text. It shares some characteristics of a real written text
                    but is random or otherwise generated.</p>
            </div>
            <!-- text - end -->

            <div class="grid gap-6 sm:grid-cols-2">
                @foreach ($suppliers as $item)
                    <!-- product - start -->
                    <a href="#"
                        class="group relative flex h-80 items-end overflow-hidden rounded-lg bg-gray-100 p-4 shadow-lg">
                        <img src="https://ui-avatars.com/api/?format=svg&name={{ urlencode($item->company_name) }}&background=random"
                            loading="lazy" alt="Photo by Fakurian Design"
                            class="absolute inset-0 h-48 w-full object-cover object-center transition duration-200 group-hover:scale-110" />

                        <div
                            class="pointer-events-none absolute inset-0 bg-gradient-to-t from-gray-800 via-transparent to-transparent opacity-50">
                        </div>

                        <div class="relative flex flex-col">
                            <span class="text-gray-200 uppercase">{{$item->company_name}}</span>
                            <span class="text-lg font-semibold text-white lg:text-xl">{{$item->location}}</span>
                            <span class="text-lg font-semibold text-white lg:text-xl">{{$item->phone_number}}</span>
                        </div>
                    </a>
                    <!-- product - end -->
                @endforeach

            </div>
        </div>
    </div>
    {{-- <div class="overflow-hidden bg-gray-50 py-16">
        <div class="container m-auto space-y-8 px-6 text-gray-500 md:px-12">
            <div>
                <span class="text-lg font-semibold text-gray-600">Main features</span>
                <h2 class="mt-4 text-2xl font-bold text-gray-900 md:text-4xl">A technology-first approach to payments
                    <br class="lg:block" hidden> and finance</h2>
            </div>
            <div
                class="mt-16 grid divide-x divide-y overflow-hidden rounded-xl border sm:grid-cols-2 lg:grid-cols-3 lg:divide-y-0 xl:grid-cols-4">
                @foreach ($suppliers as $item)
                    <div class="group relative bg-gray-100 transition hover:z-[1] hover:shadow-2xl lg:hidden xl:block">
                        <div
                            class="relative space-y-8 rounded-lg border-dashed p-8 transition duration-300 group-hover:scale-90 group-hover:border group-hover:bg-white">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($item->company_name) }}&color=417505&background=random"
                                class="w-10 rounded-full" width="512" height="512" alt="burger illustration">

                            <div class="space-y-2">
                                <h5 class="text-xl font-medium text-gray-800 transition group-hover:text-yellow-600">
                                    {{ $item->company_name }}</h5>
                                <p class="text-sm text-gray-600">{{ $item->location }}</p>
                            </div>
                            <a href="#" class="flex items-center justify-between group-hover:text-yellow-600">
                                <span class="text-sm">{{ $item->phone_number }}</span>
                                <span
                                    class="-translate-x-4 text-2xl opacity-0 transition duration-300 group-hover:translate-x-0 group-hover:opacity-100">&RightArrow;</span>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div> --}}
</div>
