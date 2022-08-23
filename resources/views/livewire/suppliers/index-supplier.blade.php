<div>
    <div
        class="xl:mt-18 relative z-10 my-auto mb-12 overflow-hidden rounded-xl bg-white shadow-xl ring-1 ring-slate-900/5 dark:bg-slate-800">
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
    
<div class="py-16 bg-gray-50 overflow-hidden">
    <div class="container m-auto px-6 space-y-8 text-gray-500 md:px-12">
        <div>
            <span class="text-gray-600 text-lg font-semibold">Main features</span>
            <h2 class="mt-4 text-2xl text-gray-900 font-bold md:text-4xl">A technology-first approach to payments <br class="lg:block" hidden> and finance</h2>
        </div>
        <div class="mt-16 grid border divide-x divide-y rounded-xl overflow-hidden sm:grid-cols-2 lg:divide-y-0 lg:grid-cols-3 xl:grid-cols-4">
            {{-- <div class="relative group bg-white transition hover:z-[1] hover:shadow-2xl">
                <div class="relative p-8 space-y-8">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode('Efren Lopez') }}&color=417505&background=random" class="w-10 rounded-full" width="512" height="512" alt="burger illustration">
                    
                    <div class="space-y-2">
                        <h5 class="text-xl text-gray-800 font-medium transition group-hover:text-yellow-600">First feature</h5>
                        <p class="text-sm text-gray-600">Neque Dolor, fugiat non cum doloribus aperiam voluptates nostrum.</p>
                    </div>
                    <a href="#" class="flex justify-between items-center group-hover:text-yellow-600">
                        <span class="text-sm">Read more</span>
                        <span class="-translate-x-4 opacity-0 text-2xl transition duration-300 group-hover:opacity-100 group-hover:translate-x-0">&RightArrow;</span>
                    </a>
                </div>
            </div>
            <div class="relative group bg-white transition hover:z-[1] hover:shadow-2xl">
                <div class="relative p-8 space-y-8">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode('Efren Lopez') }}&color=417505&background=random" class="w-10" width="512" height="512" alt="burger illustration">
                    
                    <div class="space-y-2">
                        <h5 class="text-xl text-gray-800 font-medium transition group-hover:text-yellow-600">Second feature</h5>
                        <p class="text-sm text-gray-600">Neque Dolor, fugiat non cum doloribus aperiam voluptates nostrum.</p>
                    </div>
                    <a href="#" class="flex justify-between items-center group-hover:text-yellow-600">
                        <span class="text-sm">Read more</span>
                        <span class="-translate-x-4 opacity-0 text-2xl transition duration-300 group-hover:opacity-100 group-hover:translate-x-0">&RightArrow;</span>
                    </a>
                </div>
            </div>
            <div class="relative group bg-white transition hover:z-[1] hover:shadow-2xl">
                <div class="relative p-8 space-y-8">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode('Efren Lopez') }}&color=417505&background=random" class="w-10" width="512" height="512" alt="burger illustration">
                    
                    <div class="space-y-2">
                        <h5 class="text-xl text-gray-800 font-medium transition group-hover:text-yellow-600">Third feature</h5>
                        <p class="text-sm text-gray-600">Neque Dolor, fugiat non cum doloribus aperiam voluptates nostrum.</p>
                    </div>
                    <a href="#" class="flex justify-between items-center group-hover:text-yellow-600">
                        <span class="text-sm">Read more</span>
                        <span class="-translate-x-4 opacity-0 text-2xl transition duration-300 group-hover:opacity-100 group-hover:translate-x-0">&RightArrow;</span>
                    </a>
                </div>
            </div> --}}
            @foreach ($suppliers as $item)
            <div class="relative group bg-gray-100 transition hover:z-[1] hover:shadow-2xl lg:hidden xl:block">
                <div class="relative p-8 space-y-8 border-dashed rounded-lg transition duration-300 group-hover:bg-white group-hover:border group-hover:scale-90">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($item->company_name) }}&color=417505&background=random" class="w-10 rounded-full" width="512" height="512" alt="burger illustration">
                    
                    <div class="space-y-2">
                        <h5 class="text-xl text-gray-800 font-medium transition group-hover:text-yellow-600">{{$item->company_name}}</h5>
                        <p class="text-sm text-gray-600">{{$item->location}}</p>
                    </div>
                    <a href="#" class="flex justify-between items-center group-hover:text-yellow-600">
                        <span class="text-sm">{{$item->phone_number}}</span>
                        <span class="-translate-x-4 opacity-0 text-2xl transition duration-300 group-hover:opacity-100 group-hover:translate-x-0">&RightArrow;</span>
                    </a>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</div>   
                                
    {{-- <section tabindex="-1" class="relative mx-auto max-w-7xl px-4 focus:outline-none sm:px-3 md:px-5">
        <h2 class="sr-only">{{__('List Suppliers')}}</h2>
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 lg:gap-8">

            @foreach ($suppliers as $item)
                <ul class="space-y-8">
                    <li class="text-sm leading-6">
                        <figure
                            class="dark:highlight-white/5 relative flex flex-col-reverse rounded-lg bg-slate-50 shadow-md p-6 dark:bg-slate-800">
                            <blockquote class="mt-6 text-slate-700 dark:text-slate-300">
                                <p ><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 pr-2 text-gray-500 inline-flex" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>{{ $item->phone_number ? '+'.$item->phone_number : 'No Phone' }}</p>
                                
                            </blockquote>
                            <figcaption class="flex items-center space-x-4"><img
                                    src="https://ui-avatars.com/api/?name={{ urlencode($item->company_name) }}&color=417505&background=random"
                                    alt="{{ $item->company_name }}" class="h-14 w-14 flex-none rounded-full object-cover"
                                    loading="lazy">
                                <div class="flex-auto">
                                    <div class="text-base font-semibold text-slate-900 dark:text-slate-300"><a
                                            href="#"
                                            tabindex="0"><span class="absolute inset-0"></span>{{ $item->company_name }}</a>
                                    </div>
                                    <div class="mt-0.5">{{ $item->location }}</div>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                </ul>
            @endforeach
        </div>
        {{$suppliers->links()}}
    </section> --}}
</div>
