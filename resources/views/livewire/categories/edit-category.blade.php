<div>
    <form wire:submit.prevent="update">
        <x-jet-dialog-modal wire:model="isOpenEdit">
            <x-slot name="title">{{ __('Category')}}</x-slot>
            <x-slot name="content">
                <div class="mb-4">
                    <x-jet-label for="category.name" value="{{__('Name')}} *" />
                    <x-jet-input wire:model="category.name" wire:keydown.enter="update" type="text" class="w-full" />
                    <x-jet-input-error for="category.name" />
                </div>
                <div class="mb-4">
                    <x-jet-label for="category.description" value="{{__('description')}} *" />
                    <x-jet-input wire:model="category.description" wire:keydown.enter="update" type="text" class="w-full" />
                    <x-jet-input-error for="category.description" />
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

