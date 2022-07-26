<div>
    <x-jet-button wire:click="$set('isOpenCreate' , true)">
        <div class="flex">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-600" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                        clip-rule="evenodd" />
                </svg>
            </div>
            <div>
                {{ __('New Product') }}
            </div>
        </div>
    </x-jet-button>
    <form wire:submit.prevent="store">
        <x-jet-dialog-modal wire:model='isOpenCreate'>
            <x-slot name="title">{{ __('New Product') }}</x-slot>
            <x-slot name="content">
                <div class="mb-4">
                    @if ($photo)
                        <x-jet-label value="{{ __('Photo Preview:') }}" />
                        <img class="bg-yellow-300 object-none object-center" src="{{ $photo->temporaryUrl() }}">
                        <label for="file-upload-edit"
                            class="relative cursor-pointer rounded-md font-medium text-indigo-600 focus-within:outline-none focus-within:ring-0 focus-within:ring-indigo-500 focus-within:ring-offset-0 hover:text-indigo-500">
                            <span class="mb-1">{{ __('Change') }}</span>
                            <input wire:model="photo" id="file-upload-edit" name="file-upload-edit" type="file"
                                class="sr-only">
                        </label>
                    @else
                        <div
                            class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-7">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                    viewBox="0 0 48 48" aria-hidden="true">
                                    <path
                                        d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <label for="file-upload-edit"
                                    class="relative cursor-pointer rounded-md font-medium text-indigo-600 focus-within:outline-none focus-within:ring-0 focus-within:ring-indigo-500 focus-within:ring-offset-0 hover:text-indigo-500">
                                    <span class="mb-1">{{ __('Select Photo') }}</span>
                                    <input wire:model="photo" id="file-upload-edit" name="file-upload-edit"
                                        type="file" class="sr-only">
                                </label>
                                <p class="text-xs text-gray-500">
                                    PNG, JPG, JPEG up to 1024KB
                                </p>
                                <div wire:loading wire:target="photo">Uploading...</div>
                            </div>
                        </div>
                    @endif
                    {{-- <input type="file" wire:model="photo"> --}}
                    <x-jet-input-error for="photo" />
                </div>
                <div class="mb-4">
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <x-jet-label value="{{ __('Code') }} *" />
                            <x-jet-input wire:model="code" type="text" class="w-full" />
                            <x-jet-input-error for="code" />
                        </div>
                        <div>
                            <x-jet-label value="{{ __('Name') }} *" />
                            <x-jet-input wire:model="name" type="text" class="w-full" />
                            <x-jet-input-error for="name" />
                        </div>
                    </div>
                </div>
                {{-- <div class="mb-4">
                    <div class="grid gap-2 md:grid-cols-3">
                        <div>
                            <x-jet-label value="{{ __('Stock') }} *" />
                            <x-jet-input wire:model="stock" type="number" class="w-full" />
                            <x-jet-input-error for="stock" />
                        </div>
                        <div>
                            <x-jet-label value="{{ __('List Price') }} *" />
                            <div>
                                
                                <div class="relative rounded-md shadow-sm">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                        <span class="text-gray-500 sm:text-sm"> $ </span>
                                    </div>
                                    <input type="text" name="list_price" id="list_price" wire:model="list_price"
                                        class="block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-indigo-300 focus:ring-indigo-200"
                                        placeholder="0.00">
                                    
                                </div>
                            </div>
                            <x-jet-input-error for="list_price" />
                        </div>
                        <div>
                            <x-jet-label value="{{ __('Sale Price') }} *" />
                            <div>
                                
                                <div class="relative rounded-md shadow-sm">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                        <span class="text-gray-500 sm:text-sm"> $ </span>
                                    </div>
                                    <input type="text" name="sale_price" id="sale_price" wire:model="sale_price"
                                        class="block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-indigo-300 focus:ring-indigo-200"
                                        placeholder="0.00">
                                    
                                </div>
                            </div>
                            <x-jet-input-error for="sale_price" />
                        </div>
                    </div>
                </div> --}}
                <div class="mb-4">
                    {{-- <x-jet-label value="{{ __('Sale Price') }} *" />
                    <input type="text" name="sale_price" id="sale_price" wire:model="sale_price"
                        class="block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-indigo-300 focus:ring-indigo-200"
                        placeholder="0.00"> --}}
                    <fieldset class="w-full space-y-1 text-gray-800">
                        <label for="salePrice" class="block text-sm font-medium">{{ __('Sale Price') }} *</label>
                        <div class="flex">
                            <input wire:model="sale_price" type="text" name="salePrice" id="salePrice" placeholder="999,99"
                                class="flex flex-1 rounded-l-md border border-gray-300 bg-gray-100 text-right text-gray-800 focus:ring-inset focus:ring-teal-600 sm:text-sm">
                            <span
                                class="pointer-events-none flex items-center rounded-r-md bg-gray-300 px-3 sm:text-sm">$</span>
                        </div>
                    </fieldset>
                    <x-jet-input-error for="sale_price" />
                </div>
                <div class="mb-4">
                    <x-jet-label value="{{ __('Description') }} *" />
                    <textarea wire:model="description"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        name="description" id="description" cols="30" rows="3"></textarea>
                    <x-jet-input-error for="description" />
                </div>
                <div class="mb-4">
                    <x-jet-label value="{{ __('Category') }} *" for="category" />
                    <select wire:model="category" name="category"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="" disabled>{{ __('Select Category') }}</option>
                        @foreach (\App\Models\Category::All() as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="category"></x-jet-input-error>
                </div>
                {{-- <div class="mb-4">
                    <x-jet-label value="{{__('Supplier')}}" />
                    <x-jet-input wire:model="supplier" type="text" class="w-full" />
                    <x-jet-input-error for="supplier" />
                </div> --}}
                <div class="mb-4">
                    <p class="text-right italic text-gray-500">(*) campos obligatorios</p>
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$set('isOpenCreate' , false)">{{ __('Close') }}
                </x-jet-secondary-button>
                <x-jet-button type="submit">{{ __('Save') }}</x-jet-button>
            </x-slot>
        </x-jet-dialog-modal>
    </form>
</div>
