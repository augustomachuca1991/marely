div>

    <x-jet-dialog-modal wire:model="isOpenShow">
        <x-slot name="title">{{ __('Show Product') }}</x-slot>
        <x-slot name="content">
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="bg-white">
                <div
                    class="mx-auto grid max-w-2xl grid-cols-1 items-center gap-y-16 gap-x-8 py-24 px-4 sm:px-6 sm:py-32 lg:max-w-7xl lg:grid-cols-2 lg:px-8">
                    <div>
                        <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">{{$product->name}}</h2>
                        <p class="mt-4 text-gray-500">{{$product->description}}</p>

                        <dl class="mt-16 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 sm:gap-y-16 lg:gap-x-8">
                            <div class="border-t border-gray-200 pt-4">
                                <dt class="font-medium text-gray-900">{{__('Stock')}}</dt>
                                <dd class="mt-2 text-sm text-gray-500">{{$product->stock}}</dd>
                            </div>

                            <div class="border-t border-gray-200 pt-4">
                                <dt class="font-medium text-gray-900">{{__('Sale Price')}}</dt>
                                <dd class="mt-2 text-sm text-gray-500">$ {{$product->sale_price}}</dd>
                            </div>

                            <div class="border-t border-gray-200 pt-4">
                                <dt class="font-medium text-gray-900">{{__('Published')}}</dt>
                                <dd class="mt-2 text-sm text-gray-500">{{now()->subSeconds(now()->diffInSeconds($product->created_at))->diffForHumans() }}</dd>
                            </div>

                            {{-- <div class="border-t border-gray-200 pt-4">
                                <dt class="font-medium text-gray-900">Finish</dt>
                                <dd class="mt-2 text-sm text-gray-500">Hand sanded and finished with natural oil</dd>
                            </div>

                            <div class="border-t border-gray-200 pt-4">
                                <dt class="font-medium text-gray-900">Includes</dt>
                                <dd class="mt-2 text-sm text-gray-500">Wood card tray and 3 refill packs</dd>
                            </div>

                            <div class="border-t border-gray-200 pt-4">
                                <dt class="font-medium text-gray-900">Considerations</dt>
                                <dd class="mt-2 text-sm text-gray-500">Made from natural materials. Grain and color vary
                                    with each item.</dd>
                            </div> --}}
                        </dl>
                    </div>
                    <div class="grid grid-cols-2 grid-rows-2 gap-4 sm:gap-6 lg:gap-8">
                        <img src="{{$product->profile_photo_url}}"
                            alt="Walnut card tray with white powder coated steel divider and 3 punchout holes."
                            class="rounded-lg bg-gray-100">
                        
                    </div>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('isOpenShow' , false)">{{ __('Close') }}</x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>