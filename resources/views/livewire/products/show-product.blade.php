<div>
    <x-jet-dialog-modal wire:model="isOpenShow">
        <x-slot name="title">
            <div
                class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-black text-sm z-50">
                <button wire:click="resetData">
                    <svg class="fill-current text-black hover:text-red-700" xmlns="http://www.w3.org/2000/svg"
                        width="18" height="18" viewBox="0 0 18 18">
                        <path
                            d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                        </path>
                    </svg>
                </button>
            </div>
        </x-slot>
        <x-slot name="content">
            <div
                class="py-8 px-8 max-w-lg mx-auto bg-white rounded-xl shadow-lg space-y-2 sm:py-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-6">
                <img class="block mx-auto h-24 md:h-56 rounded-md sm:mx-0 sm:shrink-0"
                    src="{{ $product->profile_photo_url }}" alt="Woman's Face">
                <div class="text-center space-y-2 sm:text-left">
                    <div class="space-y-0.5">
                        <p class="text-lg text-black font-semibold">
                            {{ $product->name }}
                        </p>
                        <p class="text-slate-500 font-medium">
                            {{ $product->description }}
                        </p>
                    </div>
                    {{-- <button class="px-4 py-1 text-sm text-purple-600 font-semibold rounded-full border border-purple-200 hover:text-white hover:bg-purple-600 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-offset-2">Message</button> --}}
                    <span class="text-gray-500 text-xs">{{ $product->code }}</span>
                    <p>${{ $product->sale_price }}</p>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            {{-- <x-jet-secondary-button wire:click="resetData">{{ __('Close') }}</x-jet-secondary-button> --}}
        </x-slot>
    </x-jet-dialog-modal>
</div>
