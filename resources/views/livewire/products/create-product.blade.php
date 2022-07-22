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
                    <x-jet-label value="{{__('Code')}} *" />
                    <x-jet-input wire:model="code" type="text" class="w-full" />
                    <x-jet-input-error for="code" />
                </div>
                <div class="mb-4">
                    <x-jet-label value="{{__('Name')}} *" />
                    <x-jet-input wire:model="name" type="text" class="w-full" />
                    <x-jet-input-error for="name" />
                </div>
                <div class="mb-4">
                    <x-jet-label value="{{__('Description')}} *" />
                    <x-jet-input wire:model="description" type="text" class="w-full" />
                    <x-jet-input-error for="description" />
                </div>
                <div class="mb-4">
                    <x-jet-label value="{{__('Stock')}} *" />
                    <x-jet-input wire:model="stock" type="number" class="w-full" />
                    <x-jet-input-error for="stock" />
                </div>
                <div class="mb-4">
                    <div class="grid md:grid-cols-2 gap-2">
                        <div>
                            <x-jet-label value="{{__('List price')}} *" />
                            <x-jet-input wire:model="list_price" type="text" class="w-full" />
                            <x-jet-input-error for="list_price" /></div>
                        <div>
                            <x-jet-label value="{{__('Sale price')}} *" />
                            <x-jet-input wire:model="sale_price" type="text" class="w-full" />
                            <x-jet-input-error for="sale_price" />
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <x-jet-label value="{{__('Category')}}" for="category" />
                    <select wire:model="category" name="category" class="w-full uppercase">
                        @foreach (\App\Models\Category::All() as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="category"></x-jet-input-error>
                </div>
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
