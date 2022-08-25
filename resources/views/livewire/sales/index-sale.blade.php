<div>
    <h2 class="mt-0 mb-2 text-4xl font-medium leading-tight text-cyan-600">{{ __('My Shop') }}
        <svg xmlns="http://www.w3.org/2000/svg" class="inline-flex h-6 w-6" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
        </svg>
    </h2>
    <div
        class="w-6/6 my-2 flex flex-col items-center space-y-1 overflow-hidden bg-white p-3 shadow-lg sm:rounded-lg md:flex-row md:space-y-0">
        <div class="flex w-full md:w-3/6">
            <button class="hidden p-1 outline-none focus:outline-none md:block"><svg
                    class="h-5 w-5 cursor-pointer text-gray-600" fill="none" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg></button>
            <input wire:model="search" type="search" name="searchProducts" id="searchProducts"
                placeholder="Buscar por nombre, categorias, descripcion, etc..."
                class="w-full border-gray-300 bg-transparent pl-4 text-sm outline-none focus:outline-none">
        </div>
        <div class="flex w-full md:w-1/6">

            <select name="status" id="status" wire:model="byStatus"
                class="w-full border-gray-300 bg-transparent text-sm outline-none focus:outline-none">
                <option value="">{{ __('Active') }}</option>
                <option value="1">{{ __('Inactive') }}</option>
                <option value="2">{{ __('All') }}</option>
            </select>
        </div>
        <div class="flex w-full md:w-1/6">

            <select name="supplier" id="supplier" wire:model="bySupplier"
                class="w-full border-gray-300 bg-transparent text-sm outline-none focus:outline-none">
                <option value="">{{ __('Supliers') }}</option>
            </select>
        </div>
        <div class="flex w-full md:w-1/6">
            <select wire:model="byCategory" name="imagen_type" id="imagen_type"
                class="w-full rounded-r-md border-gray-300 bg-transparent text-sm outline-none focus:outline-none">
                <option value="">{{ __('All Categories') }}</option>
                @foreach (\App\Models\Category::all() as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="overflow-hidden sm:rounded-lg">
        @if ($products->count())
            <div class="grid grid-rows-1 gap-3 md:grid-cols-2 md:gap-2">
                @foreach ($products as $item)
                    <div>
                        {{-- <div
                            class="mx-auto flex max-w-md overflow-hidden rounded-lg bg-white shadow-lg dark:bg-gray-800">
                            <div class="w-1/3 bg-cover"
                                style="background-image: url('{{$item->profile_photo_url}}'); object-fit:cover">
                            </div>

                            <div class="w-2/3 p-4 md:p-4">
                                <h1 class="text-2xl font-bold text-gray-800 dark:text-white">{{$item->name}}</h1>

                                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">{{$item->descripcion}}</p>

                                <div class="item-center mt-2 flex">
                                    <svg class="h-5 w-5 fill-current text-gray-700 dark:text-gray-300"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                    </svg>

                                    <svg class="h-5 w-5 fill-current text-gray-700 dark:text-gray-300"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                    </svg>

                                    <svg class="h-5 w-5 fill-current text-gray-700 dark:text-gray-300"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                    </svg>

                                    <svg class="h-5 w-5 fill-current text-gray-500" viewBox="0 0 24 24">
                                        <path
                                            d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                    </svg>

                                    <svg class="h-5 w-5 fill-current text-gray-500" viewBox="0 0 24 24">
                                        <path
                                            d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                    </svg>
                                </div>

                                <div class="item-center mt-3 flex justify-between">
                                    <h1 class="text-lg font-bold text-gray-700 dark:text-gray-200 md:text-xl">$220</h1>
                                    <button
                                        class="transform rounded bg-gray-800 px-2 py-1 text-xs font-bold uppercase text-white transition-colors duration-200 hover:bg-gray-700 focus:bg-gray-700 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:bg-gray-600">Add
                                        to Cart</button>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div
                            class="{{ $item->stock ? 'bg-white' : 'bg-red-300' }} mx-auto max-w-md overflow-hidden rounded-xl shadow-md md:max-w-2xl">
                            <div class="md:flex">
                                <div class="md:shrink-0">
                                    <img class="h-36 w-full object-cover md:h-full md:w-24"
                                        src="{{ $item->profile_photo_url }}" alt="{{ $item->name }}">
                                </div>
                                <div class="p-8">
                                    <div class="text-sm font-semibold uppercase tracking-wide text-indigo-500">
                                        {{ $item->name }}</div>
                                    <a href="#" wire:click="show({{ $item }})"
                                        class="mt-1 block text-lg font-medium leading-tight text-black hover:underline">
                                        {{ $item->description }}</a>
                                    <p class="mt-2 text-slate-500">$ {{ $item->sale_price }}</p>
                                    <div class="mt-6 grid grid-cols-1 justify-items-end">
                                        <div>
                                            @if ($item->stock)
                                                <button wire:click="add_to_cart({{ $item }})"
                                                    class="rounded-full px-4 py-1 text-sm font-semibold text-purple-600 hover:border-transparent hover:bg-purple-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-offset-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-flex h-3 w-4"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                        stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                                    </svg>{{ __('Add To Cart') }}
                                                </button>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        <div class="mx-auto flex max-w-sm flex-col items-center justify-center">
                            <div wire:click="show({{ $item }})"
                                class="h-64 w-full cursor-pointer rounded-lg bg-gray-300 bg-cover bg-center shadow-md"
                                style="background-image: url({{ $item->profile_photo_url }})">
                            </div>

                            <div
                                class="-mt-10 w-56 overflow-hidden rounded-lg bg-white shadow-lg dark:bg-gray-800 md:w-64">
                                <h3
                                    class="py-2 text-center font-bold uppercase tracking-wide text-gray-800 hover:text-blue-500 dark:text-white">
                                    {{ $item->name }}</h3>

                                <div class="flex items-center justify-between bg-gray-200 px-3 py-2 dark:bg-gray-700">
                                    <span
                                        class="font-bold text-gray-800 dark:text-gray-200">${{ $item->sale_price }}</span>
                                    @if ($item->stock)
                                        <button wire:click="add_to_cart({{ $item }})"
                                            class="transform rounded bg-gray-800 px-2 py-1 text-xs font-semibold uppercase text-white transition-colors duration-200 hover:bg-gray-700 focus:bg-gray-700 focus:outline-none dark:hover:bg-gray-600 dark:focus:bg-gray-600">{{ __('Add to cart') }}</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            {{ $products->links() }}
        @endif
    </div>
    @if ($isOpenShow)
        <livewire:sales.show-sale :product="$product"></livewire:sales.show-sale>
    @endif
</div>
