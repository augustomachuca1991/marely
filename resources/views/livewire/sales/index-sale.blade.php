<div>
    <h2 class="font-medium leading-tight text-4xl mt-0 mb-2 text-indigo-600">{{ __('Product List') }}</h2>
    {{-- <a wire:click="" class="cursor-pointer"><svg width="20" height="20" version="1.1" id="Layer_1"
            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            viewBox="0 0 20 20" style="enable-background:new 0 0 20 20;" xml:space="preserve">
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
            class="inline-block py-1 px-1.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-red-600 text-white rounded-full ml-2">{{ \Cart::session(auth()->id())->getTotalQuantity() }}</span>
    </a> --}}
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
                                        {{ $item->category->name }}</div>
                                    <a href="#"
                                        class="block mt-1 text-lg leading-tight font-medium text-black hover:underline">
                                        {{ $item->name }}</a>
                                    <p class="mt-2 text-slate-500">{{ $item->description }}</p>
                                    <div class="grid grid-cols-2 gap-2 justify-between mt-6">
                                        <div>
                                            <input type="number"
                                                class="text-xs form-control block w-full px-2 py-1 font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-purple-600 focus:outline-none"
                                                id="exampleNumber0" placeholder="{{ __('Quantity') }}" />
                                        </div>
                                        <div>
                                            <button wire:click="add_to_cart({{ $item }})"
                                                class="px-4 py-1 text-sm text-purple-600 font-semibold rounded-full  hover:text-white hover:bg-purple-600 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-offset-2">{{ __('Add') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            @if ($products->hasMorePages())
                <a wire:click="loadMore" class="cursor-pointer">
                    <span class="underline text-blue-500 font-bold">{{ __('Load More') }}</span>
                </a>
            @endif
        @endif


    </div>
</div>
