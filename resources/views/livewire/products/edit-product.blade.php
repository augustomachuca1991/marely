<div>
    <div>
    <form wire:submit.prevent="update">
        <x-jet-dialog-modal wire:model="isOpenEdit">
            <x-slot name="title">{{ __('Edit Product')}}</x-slot>
            <x-slot name="content">
                <div class="mb-4">
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <x-jet-label value="{{__('Code')}} *" />
                            <x-jet-input wire:model="product.code" type="text" class="w-full" />
                            <x-jet-input-error for="product.code" />
                        </div>
                        <div>
                            <x-jet-label value="{{__('Name')}} *" />
                            <x-jet-input wire:model="product.name" type="text" class="w-full" />
                            <x-jet-input-error for="product.name" />
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="grid md:grid-cols-3 gap-2">
                        <div>
                            <x-jet-label value="{{__('Stock')}} *" />
                            <x-jet-input wire:model="product.stock" type="number" class="w-full" />
                            <x-jet-input-error for="product.stock" />
                        </div>
                        <div>
                            <x-jet-label value="{{__('List price')}} *" />
                            <x-jet-input wire:model="product.list_price" type="text" class="w-full" placeholder="0.00" />
                            <x-jet-input-error for="product.list_price" />
                        </div>
                        <div>
                            <x-jet-label value="{{__('Sale price')}} *" />
                            <x-jet-input wire:model="product.sale_price" type="text" class="w-full" placeholder="0.00" />
                            <x-jet-input-error for="product.sale_price" />
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <x-jet-label value="{{__('Description')}} *" />
                    <textarea wire:model="product.description" class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="description" id="description" cols="30" rows="3"></textarea>
                    <x-jet-input-error for="product.description" />
                </div>
                <div class="mb-4">
                    <x-jet-label value="{{__('Category')}} *" for="category" />
                    <select wire:model="product.category_id" name="category" class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="" disabled>{{__('Select Category')}}</option>
                        @foreach (\App\Models\Category::All() as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="product.category_id"></x-jet-input-error>
                </div>
                <div class="mb-4">
                    <x-jet-label value="imagen *" for="images" />
                    <div class="border-dashed border-2 border-indigo-400 p-1 rounded-md">
                        @if ($product->profile_photo_path)
                            <img class="object-fit" src="{{ $product->profile_photo_url }}">
                        @endif
                    </div>
                </div>
                <div class="mb-4">
                    <p class="text-right text-gray-500 italic">(*) campos obligatorios</p>
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button  wire:click="resetData">{{ __('Close') }}</x-jet-secondary-button>
                <x-jet-button  type="submit">{{ __('Save Change') }}</x-jet-button>
            </x-slot>
        </x-jet-dialog-modal>
    </form>
</div>


</div>
