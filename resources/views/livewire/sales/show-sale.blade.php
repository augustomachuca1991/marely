<div>

    <x-jet-dialog-modal wire:model="isOpenShow">
        <x-slot name="title">{{ __('Show Product') }}</x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <figure class="md:flex bg-slate-100 rounded-xl p-8 md:p-0 dark:bg-slate-800">
                    <img class="w-24 h-24 md:w-48 md:h-auto md:rounded-none rounded-full mx-auto"
                        src="{{ $product->profile_photo_url }}" alt="{{ $product->name }}" width="384" height="512">
                    <div class="pt-6 md:p-8 text-center md:text-left space-y-4">
                        <blockquote>
                            <p class="text-lg font-medium">
                                {{ $product->code }} - {{ $product->name }}
                            </p>
                        </blockquote>
                        <figcaption class="font-medium">
                            <div class="text-sky-500 dark:text-sky-400">
                                {{ $product->description }}
                            </div>
                            <div class="text-slate-700 dark:text-slate-500">
                                provider, ${{ $product->sale_price }}
                            </div>
                        </figcaption>
                    </div>
                </figure>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('isOpenShow' , false)">{{ __('Close') }}</x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
