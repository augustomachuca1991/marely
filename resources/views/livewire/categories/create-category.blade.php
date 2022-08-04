<div>
    <x-jet-button class="w-full" wire:click="$set('isOpenCreate' , true)">
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
                {{ __('New Category') }}
            </div>
        </div>
    </x-jet-button>
    <form wire:submit.prevent="store">
        <x-jet-dialog-modal wire:model='isOpenCreate'>
            <x-slot name="title">{{ __('New Category') }}</x-slot>
            <x-slot name="content">
                <div class="mb-4">
                    <x-jet-label value="{{ __('Name') }} *" />
                    <x-jet-input wire:model="name" type="text" class="w-full" />
                    <x-jet-input-error for="name" />
                </div>
                <div class="mb-4">
                    <x-jet-label value="{{ __('Description') }} *" />
                    <x-jet-input wire:model="description" type="text" class="w-full" />
                    <x-jet-input-error for="description" />
                </div>
                <div class="mb-4">
                    <p class="text-right text-gray-500 italic">(*) campos obligatorios</p>
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
