<div>

    <section class="rounded-xl bg-white shadow-xl ring-1 ring-slate-900/5 dark:bg-slate-800">
        <div class="container mx-auto px-6 py-10">
            <h1 class="text-center text-3xl font-semibold capitalize text-gray-800 dark:text-white lg:text-4xl">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="my-auto mb-2 inline-flex h-8 w-8 text-teal-300">
                    <path
                        d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z" />
                </svg>

                {{ __('My Shop') }}
            </h1>

            <p class="mx-auto my-6 max-w-2xl text-center text-gray-500 dark:text-gray-300">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo incidunt ex placeat modi magni quia error
                alias, adipisci rem similique, at omnis eligendi optio eos harum.
            </p>

            <div
                class="w-6/6 my-2 flex flex-col items-center space-y-1 overflow-hidden bg-white p-3 sm:rounded-lg md:flex-row md:space-y-0">
                <div class="flex w-full md:w-3/6">
                    <button class="hidden p-1 outline-none focus:outline-none md:block"><svg
                            class="h-5 w-5 cursor-pointer text-gray-600" fill="none" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg></button>
                    <input wire:model="search" type="search" name="searchProducts" id="searchProducts"
                        placeholder="Buscar por nombre, categorias, descripcion, etc..."
                        class="w-full border border-gray-300 bg-transparent pl-4 text-sm transition duration-300 focus:outline-none focus:ring-2 focus:ring-teal-400">
                </div>
                <div class="flex w-full md:w-1/6">

                    <select name="status" id="status" wire:model="byStatus"
                        class="w-full border border-gray-300 bg-transparent text-sm transition duration-300 focus:outline-none focus:ring-2 focus:ring-teal-400">
                        <option value="">{{ __('Active') }}</option>
                        <option value="1">{{ __('Inactive') }}</option>
                        <option value="2">{{ __('All') }}</option>
                    </select>
                </div>
                <div class="flex w-full md:w-1/6">

                    <select name="supplier" id="supplier" wire:model="bySupplier"
                        class="w-full border border-gray-300 bg-transparent text-sm transition duration-300 focus:outline-none focus:ring-2 focus:ring-teal-400">
                        <option value="">{{ __('Suppliers') }}</option>
                    </select>
                </div>
                <div class="flex w-full md:w-1/6">
                    <select wire:model="byCategory" name="imagen_type" id="imagen_type"
                        class="w-full rounded-r-md border border-gray-300 bg-transparent text-sm transition duration-300 focus:outline-none focus:ring-2 focus:ring-teal-400">
                        <option value="">{{ __('Categories') }}</option>
                        @foreach (\App\Models\Category::all() as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mt-8 grid grid-cols-1 gap-8 md:grid-cols-2 xl:mt-16 xl:grid-cols-3">
                @foreach ($products as $item)
                    @if ($item->stock)
                        <div class="flex flex-col items-center">
                            <img wire:click="show({{ $item }})"
                                class="aspect-square w-full cursor-pointer rounded-xl object-cover"
                                src="{{ $item->profile_photo_url }}" alt="{{ $item->name }}">

                            <h1 class="mt-4 text-2xl font-semibold capitalize text-gray-700 dark:text-white">
                                {{ $item->name }}
                            </h1>

                            <p class="mt-2 capitalize text-gray-500 dark:text-gray-300">{{ $item->description }}</p>
                            <p class="mt-2 capitalize text-gray-400 dark:text-gray-300">{{ $item->category->name }}</p>


                            <div class="-mx-2 mt-3 flex">


                                <div class="mx-2 text-gray-600 hover:text-gray-500 dark:text-gray-300 dark:hover:text-gray-300"
                                    aria-label="sale price">
                                    ${{ $item->sale_price }}
                                </div>
                                <button wire:click="add_to_cart({{ $item }})"
                                    class="transform rounded bg-gray-800 px-2 py-1 text-xs font-semibold uppercase text-white transition delay-150 duration-200 ease-in-out hover:-translate-y-1 hover:scale-100 hover:bg-gray-600 focus:bg-gray-600 focus:outline-none">{{ __('Add to cart') }}</button>

                            </div>
                        </div>
                    @endif
                @endforeach

            </div>
        </div>
    </section>
    @if ($products->count())
        <div class="mt-2">
            {{ $products->links() }}
        </div>
    @endif
    @if ($isOpenShow)
        <livewire:shops.show-shop :product="$product"></livewire:shops.show-shop>
    @endif
</div>
