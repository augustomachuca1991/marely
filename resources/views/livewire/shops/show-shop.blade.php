<div>
    <x-jet-dialog-modal wire:model=isOpenShow>
        <x-slot name=title>{{ __('Show Product') }}</x-slot>
        <x-slot name=content>

    <section class="bg-white dark:bg-gray-800">
        <div class="container px-6 py-8 mx-auto">
            <div class="items-center lg:flex">
                <div class="lg:w-1/2">
                    <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-100">{{$product->name}}</h2>

                    <p class="mt-4 text-gray-500 dark:text-gray-400 lg:max-w-md">
                        {{$product->description}}
                    </p>
                    <p>Disponible {{$product->stock}}</p>

                    <div class="flex items-center mt-6 -mx-2">
                        <a class="mx-2" href="#" aria-label="Sale Price">

                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-700 fill-current dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z" />
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd" />
                              </svg>
                              <span class="text-xs text-gray-500">${{$product->sale_price}}</span>
                        </a>

                        <a class="mx-2" href="#" aria-label="Category">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-700 fill-current dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                              </svg>
                              <span class="text-xs text-gray-500">{{$product->category->name}}</span>
                        </a>
                    </div>
                </div>

                <div class="mt-8 lg:mt-0 lg:w-1/2">
                    <div class="flex items-center justify-center lg:justify-end">
                        <div class="max-w-lg">
                            <img class="object-cover object-center w-full h-64 rounded-md shadow" src="{{$product->profile_photo_url}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        </x-slot>
        <x-slot name=footer>
            <x-jet-secondary-button wire:click="resetData">{{ __('Close') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
