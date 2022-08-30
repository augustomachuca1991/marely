<div>
    {{-- <x-jet-button class="w-auto" wire:click="$set('isOpenCreate' , true)">
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
    </x-jet-button> --}}
    <a href="#" wire:click="$set('isOpenCreate' , true)" rel="noopener noreferrer" class="hidden items-center gap-2 md:flex">
        <svg xmlns="http://www.w3.org/2000/svg" role="img" viewBox="0 0 24 24" fill="currentColor"
            class="h-4 w-4 fill-current">
            <path
                d="M6 3a3 3 0 00-3 3v2.25a3 3 0 003 3h2.25a3 3 0 003-3V6a3 3 0 00-3-3H6zM15.75 3a3 3 0 00-3 3v2.25a3 3 0 003 3H18a3 3 0 003-3V6a3 3 0 00-3-3h-2.25zM6 12.75a3 3 0 00-3 3V18a3 3 0 003 3h2.25a3 3 0 003-3v-2.25a3 3 0 00-3-3H6zM17.625 13.5a.75.75 0 00-1.5 0v2.625H13.5a.75.75 0 000 1.5h2.625v2.625a.75.75 0 001.5 0v-2.625h2.625a.75.75 0 000-1.5h-2.625V13.5z" />
        </svg>
        <span class="hover:underline focus-visible:underline">{{ __('New Category') }}</span>
    </a>
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
