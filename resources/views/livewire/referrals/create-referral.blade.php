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
            <x-slot name="title">{{ __('New Referral') }}</x-slot>
            <x-slot name="content">
                <div class="mb-4">
                    {{-- <div class="text-gray-500">
                        <div class="relative bg-transparent text-lg text-gray-800">
                            <div class="flex items-center border-b-2 border-teal-500 py-2">
                                <x-jet-input wire:model="supplierText" wire:keydown="$set('suggestionSupplier' , true)"
                                    class="w-11/12 border-none" type="text" placeholder="Search Supplier"
                                    autocomplete>
                                </x-jet-input>
                                <button type="button" class="absolute right-0 top-0 mt-3 mr-4">
                                    <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1"
                                        x="0px" y="0px" viewBox="0 0 56.966 56.966"
                                        style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
                                        width="512px" height="512px">
                                        <path
                                            d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        @if ($suggestionSupplier && $supplierText != '')
                            <ul class="mt-2 w-full border border-gray-100 bg-white">
                                @foreach ($suppliers as $item)
                                    <li wire:click="loadSupplier({{ $item }})"
                                        class="relative cursor-pointer border-b-2 border-gray-100 py-1 pl-8 pr-2 hover:bg-yellow-50 hover:text-gray-900">
                                        <svg class="absolute left-2 top-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <b>{{ $item->company_name }}</b>- {{ $item->location }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif

                    </div> --}}
                    <section class="relative w-full max-w-lg rounded-md px-5 py-4">
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg class="h-5 w-5 text-gray-400" viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </svg>
                            </span>

                            <input wire:model="supplierText" wire:keydown="$set('suggestionSupplier' , true)"
                                type="text"
                                class="w-full rounded-md border bg-white py-3 pl-10 pr-4 text-gray-700 focus:border-blue-500 focus:outline-none focus:ring dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-blue-500"
                                placeholder="Search">
                        </div>
                        @if ($suggestionSupplier && $supplierText != '')
                            <div
                                class="absolute inset-x-0 mx-5 mt-4 max-h-72 overflow-y-auto rounded-md border bg-white px-6 py-3 dark:border-transparent dark:bg-gray-800">
                                @foreach ($suppliers as $item)
                                    <a wire:click="loadSupplier({{ $item }})" href="#" class="block py-1">
                                        <h3 class="font-medium text-gray-700 hover:underline dark:text-gray-100">
                                            {{ $item->company_name }}</h3>
                                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">{{ $item->location }}</p>
                                    </a>
                                @endforeach
                            </div>
                        @endif
                    </section>
                </div>
                @if ($supplier)
                    <div class="mb-4">
                        <div class="lg:flex lg:items-center lg:justify-between">
                            <div class="min-w-0 flex-1">
                                <h2
                                    class="text-2xl font-bold capitalize leading-7 text-gray-900 sm:truncate sm:text-3xl">
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

                                @if (count($productsAdd))
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
                                @endif
                                <div class="relative ml-3 sm:hidden">
                                    <button type="button"
                                        class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                        id="mobile-menu-button" aria-expanded="false" aria-haspopup="true">
                                        More
                                        <!-- Heroicon name: solid/chevron-down -->
                                        <svg class="-mr-1 ml-2 h-5 w-5 text-gray-500"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                    <div class="absolute right-0 mt-2 -mr-1 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                        role="menu" aria-orientation="vertical"
                                        aria-labelledby="mobile-menu-button" tabindex="-1">
                                        <!-- Active: "bg-gray-100", Not Active: "" -->
                                        <a href="#" class="block px-4 py-2 text-sm text-gray-700"
                                            role="menuitem" tabindex="-1" id="mobile-menu-item-0">Edit</a>
                                        <a href="#" class="block px-4 py-2 text-sm text-gray-700"
                                            role="menuitem" tabindex="-1" id="mobile-menu-item-1">View</a>
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
                                    <button type="button" class="absolute right-0 top-0 mt-3 mr-4">
                                        <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1"
                                            x="0px" y="0px" viewBox="0 0 56.966 56.966"
                                            style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
                                            width="512px" height="512px">
                                            <path
                                                d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            @if ($suggestionProduct && $productText != '')
                                <ul class="mt-2 w-full border border-gray-100 bg-white">
                                    @foreach ($products as $itemProduct)
                                        <li wire:click="loadProduct({{ $itemProduct }})"
                                            class="relative cursor-pointer border-b-2 border-gray-100 py-1 pl-8 pr-2 hover:bg-yellow-50 hover:text-gray-900">
                                            <svg class="absolute left-2 top-2 h-4 w-4"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <b>{{ $itemProduct->code }}</b>- {{ $itemProduct->name }}
                                            ({{ $itemProduct->stock }})
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                    @if (count($productsAdd))
                        <div class="mb-4">
                            <div class="mt-8">
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
                                                                <a href="#"> {{ $add['name'] }} </a>
                                                            </h3>
                                                            <p class="ml-4">${{ $add['sale_price'] }}</p>
                                                        </div>
                                                        <p class="mt-1 text-sm text-gray-500">
                                                            {{ $add['code'] }}</p>
                                                    </div>
                                                    <div class="flex flex-1 items-end justify-between text-sm">

                                                        <p class="text-gray-500">
                                                            {{ __('Current Stock') }}({{ $add['stock'] }}) -
                                                            <x-jet-input class="w-24"
                                                                wire:model="addStock.{{ $index }}"
                                                                type="number" />
                                                            <x-jet-input-error for="addStock.{{ $index }}" />
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
                    @endif
                @endif
                <div class="mb-4">
                    <x-jet-label value="{{ __('Bonification %') }}" />
                    <x-jet-input wire:model="bonification" type="number" min="0" />
                    <x-jet-input-error for="bonification" />
                </div>
            </x-slot>
            <x-slot name="footer">
                {{-- {{ $supplier ? $supplier->company_name : '' }}
                {{ $product ? $product->name : '' }} --}}

                {{-- {{var_export($productsAdd)}} --}}
            </x-slot>
        </x-jet-dialog-modal>
    </form>
</div>
