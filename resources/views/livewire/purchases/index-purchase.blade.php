<div>
    <section>
        <header class="space-y-4 bg-white p-4 sm:px-8 sm:py-6 lg:p-4 xl:px-8 xl:py-6">
            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-slate-900">Remitos</h2>
                {{-- <a href="/new"
                    class="group flex items-center rounded-md bg-sky-500 py-2 pl-2 pr-3 text-sm font-medium text-white shadow-sm hover:bg-sky-400">
                    <svg width="20" height="20" fill="currentColor" class="mr-2" aria-hidden="true">
                        <path
                            d="M10 5a1 1 0 0 1 1 1v3h3a1 1 0 1 1 0 2h-3v3a1 1 0 1 1-2 0v-3H6a1 1 0 1 1 0-2h3V6a1 1 0 0 1 1-1Z" />
                    </svg>
                    New
                </a> --}}
            </div>
            <form class="group relative">
                <svg width="20" height="20" fill="currentColor"
                    class="pointer-events-none absolute left-3 top-1/2 -mt-2.5 text-slate-400 group-focus-within:text-sky-500"
                    aria-hidden="true">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
                </svg>
                <input
                    class="w-full appearance-none rounded-md py-2 pl-10 text-sm leading-6 text-slate-600 placeholder-slate-400 shadow-sm ring-1 ring-slate-200 focus:outline-none focus:ring-2 focus:ring-sky-500"
                    type="text" aria-label="Filter projects" placeholder="Filter projects...">
            </form>
        </header>
        <div
            class="grid grid-cols-1 gap-4 bg-slate-50 p-4 text-sm leading-6 sm:grid-cols-2 sm:px-8 sm:pt-6 sm:pb-8 lg:grid-cols-1 lg:p-4 xl:grid-cols-2 xl:px-8 xl:pt-6 xl:pb-8">


            @foreach (App\Models\Category::all() as $item)
                <a href="/"
                    class="group rounded-md bg-gray-100 p-3 shadow-sm ring-1 ring-slate-200 hover:bg-sky-600 hover:shadow-md hover:ring-sky-600">
                    <dl class="grid grid-cols-2 grid-rows-2 items-center sm:block lg:grid xl:block">
                        <div>
                            <dt class="sr-only">Title</dt>
                            <div class="font-semibold capitalize text-slate-900 group-hover:text-white">
                                {{ $item->name }}
                            </div>
                        </div>
                        <div>
                            <dt class="sr-only">Category</dt>
                            <div class="group-hover:text-sky-200">{{ $item->description }}</div>
                        </div>
                        <div class="col-start-2 row-start-1 row-end-3 sm:mt-4 lg:mt-0 xl:mt-4">
                            <dt class="sr-only">Users</dt>
                            @foreach ($item->products->take(4) as $product)
                                <div
                                    class="inline-flex justify-end -space-x-1.5 sm:justify-start lg:justify-end xl:justify-start">
                                    <img src="{{ $product->profile_photo_url }}" alt="{{ $product->name }}"
                                        class="h-6 w-6 rounded-full bg-slate-100 ring-2 ring-white" loading="lazy">
                                </div>
                            @endforeach

                        </div>
                    </dl>
                </a>
            @endforeach
            <livewire:purchases.create-purchase></livewire:purchases.create-purchase>

        </div>
    </section>
</div>
