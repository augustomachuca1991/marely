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

            <div class="container mx-auto">
                <div class="grid grid-cols-2 gap-4">
                    <div class="px-2">
                        <h2 class="mb-4 text-xl font-bold text-gray-700">{{ $referral->supplier->company_name }}</h2>
                        <p class="capitalize text-gray-500">{{ $referral->supplier->location }} -
                            +54-{{ $referral->supplier->phone_number }}</p>
                    </div>
                    <div class="px-2">
                        <h4 class="text-right">Nº de remito - #000{{ $referral->id }}</h4>
                        <p class="text-right text-xs text-gray-500">Fecha
                            {{ $referral->created_at->format('d/m/Y h:ia') }}</p>
                    </div>
                </div>
            </div>
            <div class="min-h-screen bg-gray-50">
                <div>
                    <div class="p-4">
                        <div class="rounded-md bg-white p-4">
                            <div>

                                <div>
                                    <div>
                                        <div class="text-md flex justify-between rounded-md py-2 px-4 font-bold">
                                            <div>
                                                <span>{{ __('Code') }}</span>
                                            </div>
                                            <div>
                                                <span>{{ __('Article') }}</span>
                                            </div>
                                            <div>
                                                <span>{{ __('Price Unit') }}</span>
                                            </div>
                                            <div>
                                                <span>{{ __('Importe') }}</span>
                                            </div>
                                        </div>
                                        <div>
                                            @foreach ($referral->products as $product)
                                                <div
                                                    class="mt-4 flex justify-between space-x-4 border-t text-sm font-normal">
                                                    <div class="flex px-2">
                                                        <span>{{$product->code}}</span>
                                                    </div>
                                                    <div>
                                                        <span>{{ $product->name }} x {{ $product->pivot->quantity }}</span>
                                                    </div>
                                                    <div class="px-2">
                                                        <span>${{ $product->pivot->unit_price }}</span>
                                                    </div>
                                                    <div class="px-2">
                                                        <span>${{ number_format($product->pivot->quantity * $product->pivot->unit_price, '2' , '.' , ',') }}</span>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <div
                                                class="mt-4 flex justify-between space-x-4 border-t text-sm font-normal">
                                                <div class="flex px-2">
                                                    
                                                </div>
                                                <div>
                                                    
                                                </div>
                                                <div class="px-2">
                                                    
                                                </div>
                                                <div class="px-2 py-3">
                                                    <p>{{$referral->bonification >= 0 ? 'Bonificacion: ' : 'Impuesto: '}} {{$referral->bonification}} %</p>
                                                    
                                                    <h3 class="text-xl font-semibold">Total $ {{number_format($total , 2 , '.' , ',') }}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">

        </x-slot>
    </x-jet-dialog-modal>
</div>
