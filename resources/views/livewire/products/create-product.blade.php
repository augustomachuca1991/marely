<div>
    <x-jet-button wire:click="$set('isOpenCreate' , true)">
        <div class="flex">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-600" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                  </svg>
            </div>
            <div>
                {{__('New Product')}}
            </div>
        </div>
    </x-jet-button>
    <form wire:submit.prevent="store">
        <x-jet-dialog-modal wire:model='isOpenCreate'>
            <x-slot name="title">{{ __('New Product') }}</x-slot>
            <x-slot name="content">
                <div class="mb-4">
                    @if ($photo)
                        <x-jet-label value="{{__('Photo Preview:')}}" />
                        <img class="object-none object-center bg-yellow-300" src="{{ $photo->temporaryUrl() }}">
                        <label for="file-upload-edit"
                            class="relative cursor-pointer rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-0 focus-within:ring-offset-0 focus-within:ring-indigo-500">
                            <span class="mb-1">{{__('Change')}}</span>
                            <input wire:model="photo" id="file-upload-edit" name="file-upload-edit"
                                type="file" class="sr-only">
                        </label>
                    @else
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-7 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                    viewBox="0 0 48 48" aria-hidden="true">
                                    <path
                                        d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                    {{-- <input type="file" wire:model="photo"> --}}
                                    <label for="file-upload-edit"
                                        class="relative cursor-pointer rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-0 focus-within:ring-offset-0 focus-within:ring-indigo-500">
                                        <span class="mb-1">{{__('Select Photo')}}</span>
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
                            <x-jet-label value="{{__('Code')}} *" />
                            <x-jet-input wire:model="code" type="text" class="w-full" />
                            <x-jet-input-error for="code" />
                        </div>
                        <div>
                            <x-jet-label value="{{__('Name')}} *" />
                            <x-jet-input wire:model="name" type="text" class="w-full" />
                            <x-jet-input-error for="name" />
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="grid md:grid-cols-3 gap-2">
                        <div>
                            <x-jet-label value="{{__('Stock')}} *" />
                            <x-jet-input wire:model="stock" type="number" class="w-full" />
                            <x-jet-input-error for="stock" />
                        </div>
                        <div>
                            <x-jet-label value="{{__('List price')}} *" />
                            <x-jet-input wire:model="list_price" type="text" class="w-full" placeholder="0.00" />
                            <x-jet-input-error for="list_price" />
                        </div>
                        <div>
                            <x-jet-label value="{{__('Sale price')}} *" />
                            <x-jet-input wire:model="sale_price" type="text" class="w-full" placeholder="0.00" />
                            <x-jet-input-error for="sale_price" />
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <x-jet-label value="{{__('Description')}} *" />
                    <textarea wire:model="description" class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="description" id="description" cols="30" rows="3"></textarea>
                    <x-jet-input-error for="description" />
                </div>
                <div class="mb-4">
                    <x-jet-label value="{{__('Category')}} *" for="category" />
                    <select wire:model="category" name="category" class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="" disabled>{{__('Select Category')}}</option>
                        @foreach (\App\Models\Category::All() as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
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
                    <p class="text-right text-gray-500 italic">(*) campos obligatorios</p>
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$set('isOpenCreate' , false)">{{ __('Close') }}</x-jet-secondary-button>
                <x-jet-button type="submit">{{ __('Save') }}</x-jet-button>
            </x-slot>
        </x-jet-dialog-modal>
    </form>
</div>
