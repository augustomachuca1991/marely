<div>
    <form wire:submit.prevent="update">
        <x-jet-dialog-modal wire:model="isOpenEdit">
            <x-slot name="title">{{ __('Edit Product') }}</x-slot>
            <x-slot name="content">
                <div class="mb-4">
                    <x-jet-label value="{{ __('Photo') }} *" />
                    <div
                        class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-3 pt-3 pb-4">
                        <div class="space-y-1 text-center">
                            {{ __('Photo Preview:') }}
                            <img width="240" height="140"
                                src="{{ $photoEdit ? $photoEdit->temporaryUrl() : $product->profile_photo_url }}">
                            <label for="photoEdit"
                                class="relative cursor-pointer rounded-md font-medium text-indigo-600 focus-within:outline-none focus-within:ring-0 focus-within:ring-indigo-500 focus-within:ring-offset-0 hover:text-indigo-500">
                                <span class="mb-1">{{ __('Change') }}</span>
                                <input wire:model="photoEdit" id="photoEdit" name="photoEdit" type="file"
                                    class="sr-only">
                            </label>
                            <x-jet-input-error for="photoEdit" />
                        </div>
                    </div>

                </div>
                <div class="mb-4">
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <x-jet-label value="{{ __('Code') }} *" />
                            <x-jet-input wire:model="product.code" type="text" class="w-full" />
                            <x-jet-input-error for="product.code" />
                        </div>
                        <div>
                            <x-jet-label value="{{ __('Name') }} *" />
                            <x-jet-input wire:model="product.name" type="text" class="w-full" />
                            <x-jet-input-error for="product.name" />
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="grid gap-2 md:grid-cols-2">
                        <div>
                            <x-jet-label value="{{ __('Stock') }}" />
                            {{-- <x-jet-input wire:model="product.stock" type="number" class="w-full" />
                            <x-jet-input-error for="product.stock" /> --}}
                            <p>{{ $product->stock }} unidades</p>
                        </div>
                        <div>
                            <x-jet-label value="{{ __('List Price') }}" />
                            {{-- <x-jet-input wire:model="product.list_price" type="text" class="w-full"
                                placeholder="0.00" />
                            <x-jet-input-error for="product.list_price" /> --}}
                            <p>$ {{ $product->list_price }}</p>
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <fieldset class="w-full space-y-1 text-gray-800">
                        <label for="price" class="block text-sm font-medium">{{ __('Sale Price') }} *</label>
                        <div class="flex">
                            <input type="text" wire:model="product.sale_price" name="price" id="price"
                                placeholder="999,99"
                                class="flex flex-1 rounded-l-md border border-gray-300 bg-gray-100 text-right text-gray-800 focus:ring-inset focus:ring-teal-600 sm:text-sm">
                            <span
                                class="pointer-events-none flex items-center rounded-r-md bg-gray-300 px-3 sm:text-sm">$</span>
                        </div>
                    </fieldset>
                    <x-jet-input-error for="product.sale_price" />

                </div>
                <div class="mb-4">
                    <x-jet-label value="{{ __('Description') }} *" />
                    <textarea wire:model="product.description"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        name="description" id="description" cols="30" rows="3"></textarea>
                    <x-jet-input-error for="product.description" />
                </div>
                <div class="mb-4">
                    <x-jet-label value="{{ __('Category') }} *" for="category" />
                    <select wire:model="product.category_id" name="category"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="" disabled>{{ __('Select Category') }}</option>
                        @foreach (\App\Models\Category::All() as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="product.category_id"></x-jet-input-error>
                </div>

                <div class="mb-4">
                    <p class="text-right italic text-gray-500">(*) campos obligatorios</p>
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="resetData">{{ __('Close') }}</x-jet-secondary-button>
                <x-jet-button type="submit">{{ __('Save Change') }}</x-jet-button>
            </x-slot>
        </x-jet-dialog-modal>
    </form>
</div>
