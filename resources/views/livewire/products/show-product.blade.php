<div>
    <x-jet-dialog-modal wire:model="isOpenShow">
        <x-slot name="title">
            <div
                class="modal-close absolute top-0 right-0 z-50 mt-4 mr-4 flex cursor-pointer flex-col items-center text-sm text-black">
                <button wire:click="resetData">
                    <svg class="fill-current text-red-700 hover:text-red-500" xmlns="http://www.w3.org/2000/svg"
                        width="18" height="18" viewBox="0 0 18 18">
                        <path
                            d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                        </path>
                    </svg>
                </button>
            </div>
        </x-slot>
        <x-slot name="content">
            <div class="overflow-hidden bg-white sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">{{ __('Article Information') }}</h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        {{ $product->created_at->format('d-m-Y h:ia') }}</p>
                </div>
                <div class="border-t border-gray-200">
                    <dl>
                        <div class="group-list bg-white">
                            <dt class="title-list">{{ __('Code') }}</dt>
                            <dd class="item-list">{!! DNS1D::getBarcodeSVG($product->code, 'C39', 1, 48) !!}</dd>
                        </div>
                        <div class="group-list bg-gray-50">
                            <dt class="title-list">{{ __('Name') }}</dt>
                            <dd class="item-list capitalize">{{ $product->name }}
                            </dd>
                        </div>
                        <div class="group-list bg-white">
                            <dt class="title-list">{{ __('Description') }}</dt>
                            <dd class="item-list">{{ $product->description }}
                            </dd>
                        </div>
                        <div class="group-list bg-gray-50">
                            <dt class="title-list">{{ __('Category') }}</dt>
                            <dd class="item-list">{{ $product->category->name }}
                            </dd>
                        </div>
                        <div class="group-list bg-white">
                            <dt class="title-list">{{ __('Sale Price') }}</dt>
                            <dd class="item-list">${{ $product->sale_price }}
                            </dd>
                        </div>
                        <div class="group-list bg-gray-50">
                            <dt class="title-list">{{ __('Stock') }}</dt>
                            <dd class="item-list">{{ $product->stock }}
                                Unidad/es</dd>
                        </div>
                        <div class="group-list bg-white">
                            <dt class="title-list">{{ __('More') }}</dt>
                            <dd class="item-list">
                                <ul role="list" class="divide-y divide-gray-200 rounded-md border border-gray-200">
                                    <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
                                        <div class="flex w-0 flex-1 items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="{{ $product->stock ? 'text-green-500' : 'text-red-500' }} h-5 w-5 flex-shrink-0"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M3 4a1 1 0 011-1h3a1 1 0 011 1v3a1 1 0 01-1 1H4a1 1 0 01-1-1V4zm2 2V5h1v1H5zM3 13a1 1 0 011-1h3a1 1 0 011 1v3a1 1 0 01-1 1H4a1 1 0 01-1-1v-3zm2 2v-1h1v1H5zM13 3a1 1 0 00-1 1v3a1 1 0 001 1h3a1 1 0 001-1V4a1 1 0 00-1-1h-3zm1 2v1h1V5h-1z"
                                                    clip-rule="evenodd" />
                                                <path
                                                    d="M11 4a1 1 0 10-2 0v1a1 1 0 002 0V4zM10 7a1 1 0 011 1v1h2a1 1 0 110 2h-3a1 1 0 01-1-1V8a1 1 0 011-1zM16 9a1 1 0 100 2 1 1 0 000-2zM9 13a1 1 0 011-1h1a1 1 0 110 2v2a1 1 0 11-2 0v-3zM7 11a1 1 0 100-2H4a1 1 0 100 2h3zM17 13a1 1 0 01-1 1h-2a1 1 0 110-2h2a1 1 0 011 1zM16 17a1 1 0 100-2h-3a1 1 0 100 2h3z" />
                                            </svg>
                                            <span class="ml-2 w-0 flex-1 truncate">
                                                {{ $product->stock ? 'Active' : 'Inactive' }}
                                            </span>
                                        </div>
                                    </li>
                                    <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
                                        <div class="flex w-0 flex-1 items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="h-5 w-5 flex-shrink-0 text-gray-400" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path
                                                    d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                                            </svg>
                                            <span class="ml-2 w-0 flex-1 truncate">
                                                {{ $product->referrals->count()
                                                    ? implode(',', $product->referrals->pluck('supplier.company_name')->all())
                                                    : 'No Especificado' }}
                                            </span>
                                        </div>
                                        <div class="ml-4 flex-shrink-0">
                                            <span class="font-medium text-indigo-600">
                                                {{ __('Suppliers') }} </span>
                                        </div>
                                    </li>
                                </ul>
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
        </x-slot>
    </x-jet-dialog-modal>
</div>
