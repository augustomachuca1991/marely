<div>
    <x-jet-dialog-modal wire:model="isOpenShow">
        <x-slot name="title">
            <x-mark-marely class="mx-3 mt-2 h-auto w-64 rounded-lg bg-gray-200 p-2"></x-mark-marely>
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

            {{-- <div class="container mx-auto">

            </div> --}}
            <div class="min-h-screen bg-gray-50">
                <div class="p-4">
                    <div class="rounded-md bg-white p-4">
                        <!-- head-->
                        <div class="grid grid-cols-2 gap-4">
                            <div class="px-2">
                                <h2 class="mb-4 text-xl font-bold capitalize text-gray-700">
                                    {{ $referral->supplier->company_name }}</h2>
                                <p class="text-md capitalize text-gray-500">{{ $referral->supplier->location }} -
                                    <br>
                                    <span
                                        class="text-xs">{{ $referral->supplier->phone_number ? '+54-' . $referral->supplier->phone_number : 'No phone' }}</span>
                                </p>
                            </div>
                            <div class="px-2">
                                <h4 class="text-right">Fecha {{ $referral->created_at->format('d/m/Y') }}</h4>
                                <p class="text-right text-xs text-gray-500">Hora
                                    {{ $referral->created_at->format('h:ia') }}</p>
                            </div>
                        </div>
                        <!-- body-->
                        <div class="mt-6">

                            <div>
                                <div>
                                    {{-- <div class="text-md flex justify-between rounded-md py-2 px-4 font-bold">
                                        <div>
                                            <span>{{ __('Items') }}</span>
                                        </div>
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
                                    </div> --}}
                                    <div>
                                        @foreach ($referral->products as $index => $product)
                                            <div
                                                class="mt-4 flex justify-between space-x-4 border-t text-sm font-normal">
                                                <div><span>{{ $index + 1 }}</span></div>
                                                <div class="justify-self-start">
                                                    {{-- <span> {!! '<img width="110" src="data:image/png;base64,' .
                                                        DNS1D::getBarcodePNG($product->code, 'C39', 1, 96) .
                                                        '" alt="barcode"   />' !!}{{ $product->code }}</span> --}}
                                                     {{$product->code}}
                                                </div>
                                                <div class="flex px-2">
                                                    <span>{{ $product->name }}</span>
                                                </div>
                                                <div class="px-2">
                                                    <span>${{ number_format($product->pivot->unit_price, 2, '.', '') }}
                                                        <i>x{{ $product->pivot->quantity }} unit</i></span>
                                                </div>
                                                <div class="px-2">
                                                    <span
                                                        class="font-semibold text-gray-700">${{ number_format($product->subTotal(), '2', '.', ',') }}</span>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="mt-4 flex justify-between space-x-4 border-t text-sm font-normal">
                                            <div class="flex px-2">

                                            </div>
                                            <div>

                                            </div>
                                            <div class="px-2">

                                            </div>
                                            <div class="px-2 py-3">
                                                <p>{{ $referral->bonification >= 0 ? 'Bonificacion: ' : 'Impuesto: ' }}
                                                    {{ $referral->bonification }} %</p>

                                                <h3 class="text-xl font-semibold">Total $
                                                    {{ number_format($referral->getTotalAmount(), 2, '.', ',') }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- footer-->
                        <footer class="bg-wihte text-gray-900 opacity-60">
                            <div class="container mx-auto flex flex-col divide-gray-600 p-4 md:p-8 lg:flex-row">
                                {{-- <ul
                                        class="space-y-4 self-center py-6 text-center sm:flex sm:justify-around sm:space-y-0 sm:space-x-4 lg:flex-1 lg:justify-start">
                                        <li>
                                            <x-logo-teal-marely class="h-auto w-32"></x-logo-teal-marely>


                                        </li>
                                    </ul> --}}
                                <div class="flex flex-col justify-center pt-6 lg:pt-0">
                                    <div class="flex justify-center space-x-4">
                                        <h4 class="text-right">Nº de remito - #000{{ $referral->id }}</h4>
                                        {{-- <p class="text-right text-xs text-gray-500">Fecha
                                                {{ $referral->created_at->format('d/m/Y h:ia') }}</p> --}}
                                    </div>
                                </div>
                            </div>
                        </footer>
                    </div>
                </div>

            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-danger-button wire:click="cancelOrder({{ $referral }})">{{ __('Cancel Order') }}
            </x-jet-danger-button>
            <x-jet-button class="ml-1" wire:click="editOrder({{ $referral }})">{{ __('Rectify Order') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
