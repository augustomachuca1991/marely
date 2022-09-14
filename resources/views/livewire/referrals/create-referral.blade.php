<div class="flex">
    <a wire:click="$set('isOpenCreate' , true)"
        class="group flex w-full cursor-pointer flex-col items-center justify-center rounded-md border-2 border-dashed border-slate-300 py-3 text-sm font-medium leading-6 text-slate-900 hover:border-solid hover:border-sky-500 hover:bg-white hover:text-sky-500">
        <svg class="mb-1 text-slate-400 group-hover:text-sky-500" width="20" height="20" fill="currentColor"
            aria-hidden="true">
            <path d="M10 5a1 1 0 0 1 1 1v3h3a1 1 0 1 1 0 2h-3v3a1 1 0 1 1-2 0v-3H6a1 1 0 1 1 0-2h3V6a1 1 0 0 1 1-1Z" />
        </svg>
        {{ __('New Referral') }}
    </a>

    <form wire:submit.prevent="store">
        <x-jet-dialog-modal wire:model='isOpenCreate'>
            <x-slot name="title">
                <div
                    class="modal-close absolute top-0 right-0 z-50 mt-4 mr-4 flex cursor-pointer flex-col items-center text-sm text-black">
                    <button type="button" wire:click="$set('isOpenCreate' , false)">
                        <svg class="fill-current text-red-700 hover:text-red-500" xmlns="http://www.w3.org/2000/svg"
                            width="18" height="18" viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg>
                    </button>
                </div>
            </x-slot>
            <x-slot name="content">
                <div class="mb-4">
                    <div class="mb-6 md:mb-10">
                        <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">
                            {{ __('Purchase Order') }}
                        </h2>

                        <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">Esta sección dará de
                            alta las nuevas ordenes de compra.</p>
                    </div>
                    <!-- ### componente para buscar proveedor ### -->
                    <livewire:components.search-supplier></livewire:components.search-supplier>
                </div>
                @if ($supplier)
                    <div class="mb-4">
                        <div class="lg:flex lg:items-center lg:justify-between">
                            <div class="min-w-0 flex-1">
                                <h2 class="text-xl font-bold uppercase leading-7 text-gray-700 sm:truncate sm:text-3xl">
                                    {{ $supplier->company_name }}</h2>
                                <div class="mt-1 flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap sm:space-x-6">

                                    <div class="mt-2 flex items-center text-sm capitalize text-gray-500">
                                        <!-- Heroicon name: solid/location-marker -->
                                        <svg class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        {{ $supplier->location }}
                                    </div>
                                    <div class="mt-2 flex items-center text-sm text-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path
                                                d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                        </svg>
                                        {{ $supplier->phone_number }}
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5 flex lg:mt-0 lg:ml-4">
                                <span class="hidden sm:block">
                                    <button type="button" wire:click="quit"
                                        class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5 text-gray-500"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4" />
                                        </svg>
                                        {{ __('Remove') }}
                                    </button>
                                </span>


                                <div class="relative ml-3 sm:hidden">
                                    <div class="absolute right-0 mt-2 -mr-1 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                        role="menu" aria-orientation="vertical" aria-labelledby="mobile-menu-button"
                                        tabindex="-1">
                                        <!-- Active: "bg-gray-100", Not Active: "" -->
                                        <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                            tabindex="-1" id="mobile-menu-item-0">{{ __('Remove') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="mb-4">
                        <!-- ### componente para buscar producto ### -->
                        <livewire:components.search-product></livewire:components.search-product>
                    </div>
                    <div class="mb-4">
                        <fieldset class="w-full space-y-1 text-gray-800">
                            <label for="files" class="hidden text-sm font-medium">Cargar los Items</label>
                            <div class="flex">
                                <div
                                    class="rounded-md border-2 border-dashed border-gray-300 bg-gray-100 px-8 py-12 text-gray-600">
                                    @if (count($productsAdd))
                                        <div class="w-full">
                                            <div class="mx-3">
                                                <div class="flow-root">
                                                    <ul role="list" class="-my-6 divide-y divide-gray-200">
                                                        @foreach ($productsAdd as $index => $add)
                                                            <li class="flex py-6">
                                                                <div
                                                                    class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                                                    <img src="{{ $add['profile_photo_url'] }}"
                                                                        alt="{{ $add['name'] }}"
                                                                        class="h-full w-full object-cover object-center">
                                                                </div>

                                                                <div class="ml-4 flex flex-1 flex-col">
                                                                    <div>
                                                                        <div
                                                                            class="flex justify-between text-base font-medium text-gray-900">
                                                                            <h3>
                                                                                <a href="#"> {{ $add['name'] }}
                                                                                </a>
                                                                            </h3>
                                                                            @if ($editMode && $index == $i)
                                                                                <fieldset
                                                                                    class="w-full space-y-1 text-gray-800">
                                                                                    <label for="price"
                                                                                        class="hidden text-sm font-medium">Total
                                                                                        price</label>
                                                                                    <div class="flex">
                                                                                        <input type="text"
                                                                                            wire:model="productsAdd.{{ $index }}.list_price"
                                                                                            name="price"
                                                                                            id="price"
                                                                                            placeholder="99,99"
                                                                                            class="flex w-32 flex-1 rounded-l-md border border-gray-300 bg-gray-100 text-right text-gray-800 focus:ring-inset focus:ring-cyan-600 sm:text-sm">
                                                                                        <span
                                                                                            class="pointer-events-none flex items-center rounded-r-md bg-gray-300 px-3 sm:text-sm">$</span>
                                                                                    </div>
                                                                                </fieldset>
                                                                            @else
                                                                                <p class="ml-4 inline-flex">
                                                                                    <a wire:click="editPrice({{ $index }} , {{ $add['list_price'] }})"
                                                                                        href="#"><svg
                                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                                            viewBox="0 0 24 24"
                                                                                            fill="currentColor"
                                                                                            class="mx-1 mt-1 h-3 w-3 hover:text-yellow-500">
                                                                                            <path
                                                                                                d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z" />
                                                                                        </svg>
                                                                                    </a>${{ $add['list_price'] }}
                                                                                </p>
                                                                            @endif

                                                                        </div>
                                                                        {{-- <p class="mt-1 text-sm text-gray-500">
                                                                            {!!'<img width="96" src="data:image/png;base64,' . DNS1D::getBarcodePNG($add['code'], 'C39' , 1, 48) . '" alt="barcode"   />'!!} <br> {{$add['code']}}
                                                                        </p> --}}
                                                                    </div>
                                                                    <div
                                                                        class="flex flex-1 items-end justify-between text-sm">

                                                                        <p class="text-gray-500">
                                                                            {{ __('Current Stock') }}({{ $add['stock'] }})
                                                                            -
                                                                            <x-jet-input class="w-24"
                                                                                wire:model="addStock.{{ $index }}"
                                                                                type="number" />
                                                                            <x-jet-input-error
                                                                                for="addStock.{{ $index }}" />
                                                                        </p>

                                                                        <div class="flex">
                                                                            {{-- <button type="button"
                                                                wire:click="sumItem({{ $index }})"
                                                                class="font-medium text-green-600 hover:text-green-500">{{ __('Add') }}</button> --}}
                                                                            <button type="button"
                                                                                wire:click="removeItem({{ $index }})"
                                                                                class="font-medium text-red-600 hover:text-red-500">Remove</button>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <x-jet-input-error
                                                                for="productsAdd.{{ $index }}.id" />
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    @else
                                        <p class="px-3">No hay items seleccionado. Para cargar los items debera
                                            buscar en
                                            la
                                            caja de busqueda "Search Product" y seleccionar el item correspondiente.
                                            Sino
                                            debera
                                            darlo de alta previamente</p>
                                    @endif
                                </div>
                            </div>
                        </fieldset>
                    </div>
                @endif
                <div class="mb-4">
                    <fieldset class="w-full space-y-1 text-gray-800">
                        <label for="boinification" class="block text-sm font-medium">Total Bonification</label>
                        <div class="flex">
                            <input wire:model="bonification" min="0" type="text" name="bonification"
                                id="bonification" placeholder="99,99"
                                class="flex w-16 flex-1 rounded-l-md border border-gray-300 bg-gray-100 text-right text-gray-800 focus:ring-inset focus:ring-cyan-600 sm:text-sm">
                            <span
                                class="pointer-events-none flex items-center rounded-r-md bg-gray-300 px-3 sm:text-sm">%</span>
                        </div>
                    </fieldset>
                </div>
            </x-slot>
            <x-slot name="footer">
                @if (count($productsAdd))
                    <span class="sm:ml-3">
                        <button type="button" wire:click="store"
                            class="inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">

                            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            {{ __('Confirm') }}
                        </button>
                    </span>
                @endif
            </x-slot>
        </x-jet-dialog-modal>
    </form>
</div>
