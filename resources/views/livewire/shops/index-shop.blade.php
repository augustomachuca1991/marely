<div>

    <div class="flex justify-center space-x-2">
        <a href="#" wire:click="show"
            class="inline-block items-center rounded px-6 py-2.5 text-xs font-medium uppercase leading-tight transition duration-150 ease-in-out">
            <svg width="20" height="20" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20"
                style="enable-background:new 0 0 20 20;" xml:space="preserve">
                <path
                    d="M19.61,17.3l-0.52-9.4c-0.06-0.99-0.88-1.77-1.87-1.77h-2.95V4.99c0-2.35-1.91-4.26-4.27-4.26S5.73,2.64,5.73,4.99v1.14
                                    H2.78c-0.99,0-1.81,0.78-1.87,1.77l-0.52,9.4c-0.03,0.51,0.16,1.02,0.51,1.39c0.35,0.37,0.85,0.59,1.36,0.59h15.48
                                    c0.51,0,1.01-0.21,1.36-0.58C19.45,18.31,19.63,17.81,19.61,17.3z M7.26,4.99c0-1.51,1.23-2.74,2.74-2.74s2.74,1.23,2.74,2.74v1.14
                                    H7.26V4.99z M17.99,17.64c-0.04,0.04-0.12,0.11-0.25,0.11H2.26c-0.13,0-0.21-0.07-0.25-0.11c-0.04-0.04-0.1-0.13-0.09-0.26l0.52-9.4
                                    C2.45,7.8,2.6,7.65,2.78,7.65h2.95v1.83c0,0.42,0.34,0.76,0.76,0.76s0.76-0.34,0.76-0.76V7.65h5.48v1.83c0,0.42,0.34,0.76,0.76,0.76
                                    s0.76-0.34,0.76-0.76V7.65h2.95c0.18,0,0.34,0.14,0.35,0.33l0.52,9.4C18.09,17.51,18.03,17.6,17.99,17.64z">
                </path>
            </svg>
            @if ($carts->count())
                <span
                    class="ml-2 inline-block whitespace-nowrap rounded-full bg-red-600 py-1 px-1.5 text-center align-baseline font-bold leading-none text-white">{{ \Cart::session(auth()->id())->getTotalQuantity() }}</span>
            @endif
        </a>
    </div>

    <x-jet-dialog-modal wire:model="isOpenShow">
        <x-slot name="title">{{ __('Cart') }}</x-slot>
        <x-slot name="content">
            <div class="mb-4">
                {{-- {{ $this->cart }} --}}
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th scope="col"
                                class="bg-gray-50 px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                {{ __('Name') }}
                            </th>
                            <th scope="col"
                                class="bg-gray-50 px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                {{ __('Quantity') }}
                            </th>
                            <th scope="col"
                                class="bg-gray-50 px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                {{ __('Price') }}
                            </th>
                            <th scope="col" class="bg-gray-50 px-6 py-3">
                                <span class="sr-only">{{ __('Actions') }}</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        @foreach ($carts->sortBy('id') as $index => $item)
                            <tr>
                                <td class="whitespace-nowrap px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <img class="h-10 w-10 rounded-full object-cover"
                                                src="{{ $item->associatedModel->profile_photo_url }}"
                                                alt="{{ $item->name }}">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $item->name }}
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                disponible {{ $item->associatedModel->stock }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    {{-- {{ var_export($quantities) }} --}}
                                    <x-jet-input wire:model="quantities.{{ $index }}" min="1"
                                        wire:change="update_quantity({{ $item}} , {{ $index }})"
                                        type="number" class="{{ $errors->has('quantities.'.$index) ? 'border rounded-md border-red-500' : 'w-24' }}">
                                    </x-jet-input>
                                    <x-jet-input-error for="quantities.{{$index}}" />
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                                    $ {{ \Cart::session(auth()->id())->get($item->id)->getPriceSum() }}
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-right text-sm font-medium">
                                    <a href="#" wire:click="delete_to_cart({{ $item->id }} , {{$index}})">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-5 w-5 text-red-600 hover:text-red-400" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                        <!-- More rows... -->
                    </tbody>
                </table>

            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button class="mr-2" wire:click="$set('isOpenShow' , false)">{{ __('Close') }}
            </x-jet-secondary-button>
            @if ($carts->count())
                <x-jet-button wire:click="confirmSale">{{ __('Confirm') }}</x-jet-button>
            @endif
        </x-slot>
    </x-jet-dialog-modal>


    <x-jet-dialog-modal wire:model="isOpenNext">
        <x-slot name="title">
            <x-jet-application-mark class="block h-9 w-auto" />
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
            
            @if ($sale)
            <div class="mb-4">
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-4 sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <table class="min-w-full text-center">
                                    <thead class="border-b bg-gray-50">
                                        <tr>

                                            <th scope="col" class="px-6 py-4 text-sm font-medium text-gray-900">
                                                {{ __('Article') }}
                                            </th>
                                            <th scope="col" class="px-6 py-4 text-sm font-medium text-gray-900">
                                                {{ __('Quantity') }}
                                            </th>
                                            <th scope="col" class="px-6 py-4 text-sm font-medium text-gray-900">
                                                {{ __('Unit Price') }}
                                            </th>
                                            <th scope="col" class="px-6 py-4 text-sm font-medium text-gray-900">
                                                {{ __('SubTotal') }}
                                            </th>
                                        </tr>
                                    </thead class="border-b">
                                    <tbody>
                                        @foreach ($sale->products as $product)
                                            <tr class="border-b bg-white">
                                                <td
                                                    class="whitespace-nowrap px-6 py-4 text-sm font-light text-gray-900">
                                                    {{ $product->name }}
                                                </td>
                                                <td
                                                    class="whitespace-nowrap px-6 py-4 text-sm font-light text-gray-900">
                                                    {{ $product->pivot->quantity }} unidades
                                                </td>
                                                <td
                                                    class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900">
                                                    $ {{ $product->pivot->price_to_date }}
                                                </td>
                                                <td
                                                    class="whitespace-nowrap px-6 py-4 text-sm font-light text-gray-900">
                                                    $ {{ $product->pivot->price_to_date * $product->pivot->quantity }}
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="4" class="p-2 text-right"> Total:
                                                ${{ $sale->amount }} </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button class="mr-2" wire:click="resetData">{{ __('Close') }}
            </x-jet-secondary-button>
            @if ($sale)
                <a href="{{ route('reports.pdf', $sale->id) }}" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-flex h-5 w-5 text-green-700" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                    </svg>
                    {{ __('Print') }}
                </a>
            @endif

        </x-slot>
    </x-jet-dialog-modal>

</div>
