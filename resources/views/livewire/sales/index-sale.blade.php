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
            <div class="grid grid-rows-1 gap-3 md:grid-cols-2 md:gap-2 lg:grid-cols-3">
                @foreach ($products as $item)
                    <div>
                        <div
                            class="{{ $item->stock ? 'bg-white' : 'bg-red-300' }} mx-auto max-w-md overflow-hidden rounded-xl shadow-md md:max-w-2xl">
                            <div class="md:flex">
                                <div class="md:shrink-0">
                                    <img class="h-48 w-full object-cover md:h-full md:w-48"
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
                        </div>
                    </div>
                @endforeach

            </div>
            {{ $products->links() }}
            {{-- @if ($products->hasMorePages())
                <a wire:click="loadMore" class="cursor-pointer">
                    <span class="underline text-blue-500 font-bold">{{ __('Load More') }}</span>
                </a>
            @endif --}}
        @endif
    </div>
    @if ($isOpenShow)
        <livewire:sales.show-sale :product="$product"></livewire:sales.show-sale>
    @endif
</div>
