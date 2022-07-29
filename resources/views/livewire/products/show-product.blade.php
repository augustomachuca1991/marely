<div>
    <x-jet-dialog-modal wire:model="isOpenShow">
        <x-slot name="title">{{ __('Show Product')}}</x-slot>
        <x-slot name="content">
            <div class="mb-4">
                {{-- {{$product}} --}}
                <div class="py-8 px-8 max-w-sm mx-auto bg-white rounded-xl shadow-lg space-y-2 sm:py-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-6">
                    <img class="block mx-auto h-24 rounded-md sm:mx-0 sm:shrink-0" src="{{$product->profile_photo_url}}" alt="Woman's Face">
                    <div class="text-center space-y-2 sm:text-left">
                        <div class="space-y-0.5">
                        <p class="text-lg text-black font-semibold">
                            {{$product->name}}
                        </p>
                        <p class="text-slate-500 font-medium">
                            {{$product->description}}
                        </p>
                        </div>
                        {{-- <button class="px-4 py-1 text-sm text-purple-600 font-semibold rounded-full border border-purple-200 hover:text-white hover:bg-purple-600 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-offset-2">Message</button> --}}
                        <span class="text-gray-500 text-xs">{{$product->code}}</span>
                        <p>${{$product->sale_price}}</p>
                    </div>
                </div>

            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button  wire:click="resetData">{{ __('Close') }}</x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
