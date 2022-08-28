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
                        <option value="">{{ __('Supliers') }}</option>
                    </select>
                </div>
                <div class="flex w-full md:w-1/6">
                    <select wire:model="byCategory" name="imagen_type" id="imagen_type"
                        class="w-full rounded-r-md border border-gray-300 bg-transparent text-sm transition duration-300 focus:outline-none focus:ring-2 focus:ring-teal-400">
                        <option value="">{{ __('All Categories') }}</option>
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

                                {{-- <a href="#"
                                class="mx-2 text-gray-600 hover:text-gray-500 dark:text-gray-300 dark:hover:text-gray-300"
                                aria-label="Github">
                                <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.026 2C7.13295 1.99937 2.96183 5.54799 2.17842 10.3779C1.395 15.2079 4.23061 19.893 8.87302 21.439C9.37302 21.529 9.55202 21.222 9.55202 20.958C9.55202 20.721 9.54402 20.093 9.54102 19.258C6.76602 19.858 6.18002 17.92 6.18002 17.92C5.99733 17.317 5.60459 16.7993 5.07302 16.461C4.17302 15.842 5.14202 15.856 5.14202 15.856C5.78269 15.9438 6.34657 16.3235 6.66902 16.884C6.94195 17.3803 7.40177 17.747 7.94632 17.9026C8.49087 18.0583 9.07503 17.99 9.56902 17.713C9.61544 17.207 9.84055 16.7341 10.204 16.379C7.99002 16.128 5.66202 15.272 5.66202 11.449C5.64973 10.4602 6.01691 9.5043 6.68802 8.778C6.38437 7.91731 6.42013 6.97325 6.78802 6.138C6.78802 6.138 7.62502 5.869 9.53002 7.159C11.1639 6.71101 12.8882 6.71101 14.522 7.159C16.428 5.868 17.264 6.138 17.264 6.138C17.6336 6.97286 17.6694 7.91757 17.364 8.778C18.0376 9.50423 18.4045 10.4626 18.388 11.453C18.388 15.286 16.058 16.128 13.836 16.375C14.3153 16.8651 14.5612 17.5373 14.511 18.221C14.511 19.555 14.499 20.631 14.499 20.958C14.499 21.225 14.677 21.535 15.186 21.437C19.8265 19.8884 22.6591 15.203 21.874 10.3743C21.089 5.54565 16.9181 1.99888 12.026 2Z">
                                    </path>
                                </svg>
                            </a> --}}
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
        <livewire:sales.show-sale :product="$product"></livewire:sales.show-sale>
    @endif
</div>
