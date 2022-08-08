<div>
    <h2 class="font-medium leading-tight text-4xl mt-0 mb-2 text-cyan-600">{{ __('My Shop') }}
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-flex" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
        </svg>
    </h2>
    <div
        class="my-2 bg-white shadow-lg overflow-hidden sm:rounded-lg flex flex-col md:flex-row items-center w-6/6 p-3 space-y-1 md:space-y-0">
        <div class="flex w-full md:w-3/6">
            <button class="hidden md:block p-1 outline-none focus:outline-none"><svg
                    class=" w-5 text-gray-600 h-5 cursor-pointer" fill="none" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg></button>
            <input wire:model="search" type="search" name="searchProducts" id="searchProducts"
                placeholder="Buscar por nombre, categorias, descripcion, etc..."
                class="w-full pl-4 text-sm outline-none focus:outline-none bg-transparent border-gray-300">
        </div>
        <div class="flex w-full md:w-1/6">

            <select name="status" id="status" wire:model="byStatus"
                class="w-full text-sm outline-none focus:outline-none bg-transparent border-gray-300">
                <option value="">{{ __('Active') }}</option>
                <option value="1">{{ __('Inactive') }}</option>
                <option value="2">{{ __('All') }}</option>
            </select>
        </div>
        <div class="flex w-full md:w-1/6">

            <select name="supplier" id="supplier" wire:model="bySupplier"
                class="w-full text-sm outline-none focus:outline-none bg-transparent border-gray-300">
                <option value="">{{ __('Supliers') }}</option>
            </select>
        </div>
        <div class="flex w-full md:w-1/6">
            <select wire:model="byCategory" name="imagen_type" id="imagen_type"
                class="w-full text-sm outline-none focus:outline-none bg-transparent border-gray-300 rounded-r-md">
                <option value="">{{ __('All Categories') }}</option>
                @foreach (\App\Models\Category::all() as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="overflow-hidden  sm:rounded-lg">
        @if ($products->count())
            <div class="grid grid-rows-1 gap-3 md:gap-2 md:grid-cols-2 lg:grid-cols-3 ">
                @foreach ($products as $item)
                    <div>
                        <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl">
                            <div class="md:flex">
                                <div class="md:shrink-0">
                                    <img class="h-48 w-full object-cover md:h-full md:w-48"
                                        src="{{ $item->profile_photo_url }}" alt="{{ $item->name }}">
                                </div>
                                <div class="p-8">
                                    <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">
                                        {{ $item->name }}</div>
                                    <a href="#" wire:click="show({{ $item }})"
                                        class="block mt-1 text-lg leading-tight font-medium text-black hover:underline">
                                        {{ $item->description }}</a>
                                    <p class="mt-2 text-slate-500">$ {{ $item->sale_price }}</p>
                                    <div class="grid grid-cols-1 mt-6 justify-items-end">
                                        <div>
                                            <button wire:click="add_to_cart({{ $item }})"
                                                class="px-4 py-1 text-sm text-purple-600 font-semibold rounded-full  hover:text-white hover:bg-purple-600 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-offset-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-4 inline-flex"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                                </svg>{{ __('Add To Cart') }}</button>
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
