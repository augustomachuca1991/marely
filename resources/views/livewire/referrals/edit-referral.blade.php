<div>
    <form wire:submit.prevent="update">
        <x-jet-dialog-modal wire:model="isOpenEdit">
            <x-slot name="title">{{ __('Referrral') }}</x-slot>
            <x-slot name="content">
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
                                                                        {{-- <button type="button"
                                                                wire:click="sumItem({{ $index }})"
                                                                class="font-medium text-green-600 hover:text-green-500">{{ __('Add') }}</button> --}}
                                                                        <button type="button"
                                                                            wire:click="removeItem({{ $i }})"
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
                            </div>
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
