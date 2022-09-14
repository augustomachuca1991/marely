<div>
    <form wire:submit.prevent="update">
        <x-jet-dialog-modal wire:model="isOpenEdit">
            <x-slot name="title"></x-slot>
            <x-slot name="content">
                <div class="mb-4">

                    <h2 class="text-center text-3xl font-semibold capitalize text-gray-800 dark:text-white">
                        {{ $referral->supplier->company_name }}</h2>

                    {{-- <p class="mt-3 text-center text-gray-600 dark:text-gray-400">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                        </p> --}}

                    <div class="mt-6 grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3">
                        <a href="#"
                            class="flex transform flex-col items-center rounded-md px-4 py-3 text-gray-700 transition-colors duration-300 hover:bg-blue-200 dark:text-gray-200 dark:hover:bg-blue-500">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                    clip-rule="evenodd" />
                            </svg>

                            <span class="mt-2">{{ $referral->supplier->location }}</span>
                        </a>

                        <a href="#"
                            class="flex transform flex-col items-center rounded-md px-4 py-3 text-gray-700 transition-colors duration-300 hover:bg-blue-200 dark:text-gray-200 dark:hover:bg-blue-500">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                            </svg>

                            <span class="mt-2">+{{ $referral->supplier->phone_number }}</span>
                        </a>

                        <a href="#"
                            class="flex transform flex-col items-center rounded-md px-4 py-3 text-gray-700 transition-colors duration-300 hover:bg-blue-200 dark:text-gray-200 dark:hover:bg-blue-500">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                            </svg>

                            <span class="mt-2">Nº de orden - #000{{ $referral->supplier->id }}</span>
                        </a>
                    </div>
                </div>
                <div class="mb-4">
                    <livewire:components.search-product></livewire:components.search-product>
                </div>
                <div class="mb-4">
                    <fieldset class="w-full space-y-1 text-gray-800">
                        <label for="files" class="hidden text-sm font-medium">Cargar los Items</label>
                        <div class="flex">
                            <div
                                class="rounded-md border-2 border-dashed border-gray-300 bg-gray-100 px-8 py-12 text-gray-600">
                                @if (count($products))
                                    <div class="w-full">
                                        <div class="mx-3">
                                            <div class="flow-root">
                                                <ul role="list" class="-my-6 divide-y divide-gray-200">
                                                    @foreach ($products as $i => $item)
                                                        <li class="flex py-6">
                                                            <div
                                                                class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                                                <img src="{{ $item['profile_photo_url'] }}"
                                                                    alt="{{ $item['name'] }}"
                                                                    class="h-full w-full object-cover object-center">
                                                            </div>

                                                            <div class="ml-4 flex flex-1 flex-col">
                                                                <div>
                                                                    <div
                                                                        class="flex justify-between text-base font-medium text-gray-900">
                                                                        <h3>
                                                                            <a href="#"> {{ $item['name'] }}
                                                                            </a>
                                                                        </h3>
                                                                        <fieldset
                                                                            class="w-full space-y-1 text-gray-800">
                                                                            <label for="price"
                                                                                class="hidden text-sm font-medium">Total
                                                                                price</label>
                                                                            <div class="flex">
                                                                                <input type="text"
                                                                                    wire:model="products.{{ $i }}.pivot.unit_price"
                                                                                    name="price" id="price"
                                                                                    placeholder="99,99"
                                                                                    class="flex w-32 flex-1 rounded-l-md border border-gray-300 bg-gray-100 text-right text-gray-800 focus:ring-inset focus:ring-cyan-600 sm:text-sm">
                                                                                <span
                                                                                    class="pointer-events-none flex items-center rounded-r-md bg-gray-300 px-3 sm:text-sm">$</span>
                                                                            </div>
                                                                            <x-jet-input-error
                                                                                for="products.{{ $i }}.pivot.unit_price" />
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="flex flex-1 items-end justify-between text-sm">

                                                                    <p class="text-gray-500">
                                                                        {{ __('Current Stock') }}({{ $item['stock'] }})
                                                                        -
                                                                        <x-jet-input class="w-24"
                                                                            wire:model="products.{{ $i }}.pivot.quantity"
                                                                            type="number" />
                                                                        <x-jet-input-error
                                                                            for="products.{{ $i }}.pivot.quantity" />
                                                                    </p>

                                                                    <div class="flex">
                                                                        <button type="button"
                                                                            wire:click="removeItem({{ $i }})"
                                                                            class="font-medium text-red-600 hover:text-red-500">Remove</button>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <x-jet-input-error for="products.{{ $i }}.id" />
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="mb-4">
                    <fieldset class="w-full space-y-1 text-gray-800">
                        <label for="boinification" class="block text-sm font-medium">Total Bonification</label>
                        <div class="flex">
                            <input wire:model="referral.bonification" min="0" type="text" name="bonification"
                                id="bonification" placeholder="99,99"
                                class="flex w-16 flex-1 rounded-l-md border border-gray-300 bg-gray-100 text-right text-gray-800 focus:ring-inset focus:ring-cyan-600 sm:text-sm">
                            <span
                                class="pointer-events-none flex items-center rounded-r-md bg-gray-300 px-3 sm:text-sm">%</span>
                        </div>
                    </fieldset>
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="resetData">{{ __('Close') }}</x-jet-secondary-button>
                <x-jet-button type="submit">{{ __('Save Change') }}</x-jet-button>
            </x-slot>
        </x-jet-dialog-modal>
    </form>
</div>
