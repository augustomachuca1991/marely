<div class="flex">
    <a wire:click="$set('isOpenCreate' , true)"
        class="group flex w-full cursor-pointer flex-col items-center justify-center rounded-md border-2 border-dashed border-slate-300 py-3 text-sm font-medium leading-6 text-slate-900 hover:border-solid hover:border-sky-500 hover:bg-white hover:text-sky-500">
        <svg class="mb-1 text-slate-400 group-hover:text-sky-500" width="20" height="20" fill="currentColor"
            aria-hidden="true">
            <path d="M10 5a1 1 0 0 1 1 1v3h3a1 1 0 1 1 0 2h-3v3a1 1 0 1 1-2 0v-3H6a1 1 0 1 1 0-2h3V6a1 1 0 0 1 1-1Z" />
        </svg>
        New Referral
    </a>

    <form wire:submit.prevent="store">
        <x-jet-dialog-modal wire:model='isOpenCreate'>
            <x-slot name="title">
                {{-- <x-mark-marely class="mx-3 mt-2 h-auto w-64 rounded-lg bg-gray-200 p-2"></x-mark-marely> --}}
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

                        <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">Esta sección dará de alta las nuevas ordenes de compra.</p>
                    </div>
                    <fieldset class="w-full space-y-1 text-gray-800">
                        <label for="Search">Search Supplier</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                                <button type="button" title="search" class="p-1 focus:outline-none focus:ring">
                                    <svg fill="currentColor" viewBox="0 0 512 512" class="h-4 w-4 text-gray-800">
                                        <path
                                            d="M479.6,399.716l-81.084-81.084-62.368-25.767A175.014,175.014,0,0,0,368,192c0-97.047-78.953-176-176-176S16,94.953,16,192,94.953,368,192,368a175.034,175.034,0,0,0,101.619-32.377l25.7,62.2L400.4,478.911a56,56,0,1,0,79.2-79.195ZM48,192c0-79.4,64.6-144,144-144s144,64.6,144,144S271.4,336,192,336,48,271.4,48,192ZM456.971,456.284a24.028,24.028,0,0,1-33.942,0l-76.572-76.572-23.894-57.835L380.4,345.771l76.573,76.572A24.028,24.028,0,0,1,456.971,456.284Z">
                                        </path>
                                    </svg>
                                </button>
                            </span>
                            <input wire:model="supplierText" wire:keydown="$set('suggestionSupplier' , true)"
                                type="search" name="Search" placeholder="Search..."
                                class="w-32 rounded-md border-gray-300 bg-gray-100 py-2 pl-10 text-sm text-gray-800 focus:border-cyan-600 focus:bg-gray-50 focus:outline-none sm:w-auto">
                        </div>
                        @if ($suggestionSupplier && $supplierText != '')
                            <div
                                class="absolute inset-x-0 mx-5 mt-4 max-h-72 overflow-y-auto rounded-md border bg-white px-6 py-3 dark:border-transparent dark:bg-gray-800">
                                @foreach ($suppliers as $item)
                                    <a wire:click="loadSupplier({{ $item }})" href="#" class="block py-1">
                                        <h3 class="font-medium text-gray-700 hover:underline dark:text-gray-100">
                                            {{ $item->company_name }}</h3>
                                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">{{ $item->location }}
                                        </p>
                                    </a>
                                @endforeach
                            </div>
                        @endif
                    </fieldset>
                </div>
                @if ($supplier)
                    <div class="mb-4">
                        <div class="lg:flex lg:items-center lg:justify-between">
                            <div class="min-w-0 flex-1">
                                <h2
                                    class="text-xl font-bold capitalize leading-7 text-gray-700 sm:truncate sm:text-3xl">
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
                                    {{-- <div class="mt-2 flex items-center text-sm text-gray-500">
                                        <svg class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path
                                                d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z" />
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        $120k &ndash; $140k
                                    </div> --}}
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
                                        {{-- <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                        </svg> --}}
                                        {{ __('Remove') }}
                                    </button>
                                </span>

                                {{-- <span class="ml-3 hidden sm:block">
                                    <button type="button"
                                        class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">

                                        <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 1 1 0 00-1.414 1.414 4 4 0 005.656 0l3-3a4 4 0 00-5.656-5.656l-1.5 1.5a1 1 0 101.414 1.414l1.5-1.5zm-5 5a2 2 0 012.828 0 1 1 0 101.414-1.414 4 4 0 00-5.656 0l-3 3a4 4 0 105.656 5.656l1.5-1.5a1 1 0 10-1.414-1.414l-1.5 1.5a2 2 0 11-2.828-2.828l3-3z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        View
                                    </button>
                                </span> --}}

                                {{-- @if (count($productsAdd))
                                    <span class="sm:ml-3">
                                        <button type="button" wire:click="store"
                                            class="inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">

                                            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            {{ __('Confirm') }}
                                        </button>
                                    </span>
                                @endif --}}
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
                        <div class="text-gray-500">
                            <div class="relative bg-transparent text-lg text-gray-800">
                                <div class="flex items-center border-b-2 border-teal-500 py-2">
                                    <x-jet-input wire:model="productText"
                                        wire:keydown.debounce.500ms="$set('suggestionProduct' , true)"
                                        class="w-11/12 border-none" type="text" placeholder="Search Product">
                                    </x-jet-input>
                                    {{-- <livewire:products.create-product></livewire:products.create-product> --}}
                                </div>
                            </div>
                            @if ($suggestionProduct && $productText != '')
                                <ul class="mt-2 w-full border border-gray-100 bg-white">
                                    @foreach ($products as $itemProduct)
                                        <li wire:click="loadProduct({{ $itemProduct }})"
                                            class="relative inline-flex cursor-pointer border-b-2 border-gray-100 py-1 pl-8 pr-2 hover:bg-indigo-100 hover:text-gray-900">
                                            <svg class="absolute left-2 top-2 h-4 w-4"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            {!! DNS1D::getBarcodeSVG($itemProduct->code, 'UPCE') !!} - {{ $itemProduct->name }}
                                            ({{ $itemProduct->stock }})
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
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
                                                                            {{-- <fieldset class="w-12 space-y-1 text-gray-800">
                                                                <label for="price" class="block text-sm font-medium">Precio de Compra</label>
                                                                <div class="flex">
                                                                    <input type="text" name="price" id="price" placeholder="99 999,99" class="flex flex-1 text-right border sm:text-sm rounded-l-md focus:ring-inset border-gray-300 text-gray-800 bg-gray-100 focus:ring-teal-600">
                                                                    <span class="flex items-center px-3 pointer-events-none sm:text-sm rounded-r-md bg-gray-300">$</span>
                                                                </div>
                                                            </fieldset> --}}
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
                                                                            {!! DNS1D::getBarcodeSVG($add['code'], 'UPCE') !!}
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
                    {{-- <x-jet-label value="{{ __('Bonification %') }}" />
                    <x-jet-input wire:model="bonification" type="number" min="0" />
                    <x-jet-input-error for="bonification" /> --}}
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
                {{-- {{ $supplier ? $supplier->company_name : '' }}
                {{ $product ? $product->name : '' }} --}}

                {{-- {{var_export($productsAdd)}} --}}
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
