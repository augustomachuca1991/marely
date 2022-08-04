<div>
    <x-jet-dialog-modal wire:model="isOpenShow">
        <x-slot name="title">
            {{-- <x-jet-application-mark class="block h-9 w-auto" /> --}}
            <div
                class="modal-close absolute top-0 right-0 z-50 mt-4 mr-4 flex cursor-pointer flex-col items-center text-sm text-black">
                <button wire:click="resetData">
                    <svg class="fill-current text-red-700 hover:text-red-500"
                        xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                        <path
                            d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                        </path>
                    </svg>
                </button>
            </div>
        </x-slot>
        <x-slot name="content">
            <div
                class="mx-auto max-w-lg space-y-2 rounded-xl bg-white py-8 px-8 shadow-lg sm:flex sm:items-center sm:space-y-0 sm:space-x-6 sm:py-4">
                <img class="mx-auto block h-24 rounded-md sm:mx-0 sm:shrink-0 md:h-56"
                    src="{{ $product->profile_photo_url }}" alt="Woman's Face">
                <div class="space-y-2 text-center sm:text-left">
                    <div class="space-y-0.5">
                        <p class="text-lg font-semibold text-black">
                            {{ $product->name }}
                        </p>
                        <p class="font-medium text-slate-500">
                            {{ $product->description }}
                        </p>
                    </div>
                    {{-- <button class="px-4 py-1 text-sm text-purple-600 font-semibold rounded-full border border-purple-200 hover:text-white hover:bg-purple-600 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-offset-2">Message</button> --}}
                    <span class="text-xs text-gray-500">{{ $product->code }}</span>
                    <p>${{ $product->sale_price }}</p>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            {{-- <x-jet-secondary-button wire:click="resetData">{{ __('Close') }}</x-jet-secondary-button> --}}
        </x-slot>
    </x-jet-dialog-modal>
</div>
