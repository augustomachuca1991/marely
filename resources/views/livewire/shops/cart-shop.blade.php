<div>
    <button aria-label="shopping-bag" wire:click="show"
        class="flex h-10 w-10 items-center space-x-1.5 rounded-xl border bg-gray-100 focus:bg-gray-100 active:bg-gray-200">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            class="m-auto h-5 w-5 text-gray-600">
            <path fill-rule="evenodd"
                d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 004.25 22.5h15.5a1.875 1.875 0 001.865-2.071l-1.263-12a1.875 1.875 0 00-1.865-1.679H16.5V6a4.5 4.5 0 10-9 0zM12 3a3 3 0 00-3 3v.75h6V6a3 3 0 00-3-3zm-3 8.25a3 3 0 106 0v-.75a.75.75 0 011.5 0v.75a4.5 4.5 0 11-9 0v-.75a.75.75 0 011.5 0v.75z"
                clip-rule="evenodd" />
        </svg>
        @if ($carts->getContent()->count())
            <span
                class="rounded-full bg-red-500 px-1 py-0.5 text-xs text-white">{{ \Cart::session(auth()->id())->getTotalQuantity() }}</span>
        @endif
    </button>

    <x-jet-dialog-modal wire:model="isOpenShow">
        <x-slot name="title"></x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <!-- {{ $this->cart }} -->
                @if ($carts->getContent()->count())
                    {{-- <table class="min-w-full divide-y divide-gray-200">
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
                                        <!-- {{ var_export($quantities) }} -->
                                        <x-jet-input wire:model="quantities.{{ $index }}" min="1"
                                            wire:change="update_quantity({{ $item }} , {{ $index }})"
                                            type="number"
                                            class="{{ $errors->has('quantities.' . $index) ? 'border rounded-md border-red-500' : 'w-24' }}">
                                        </x-jet-input>
                                        <x-jet-input-error for="quantities.{{ $index }}" />
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                                        $ {{ \Cart::session(auth()->id())->get($item->id)->getPriceSum() }}
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 text-right text-sm font-medium">
                                        <a href="#"
                                            wire:click="delete_to_cart({{ $item->id }} , {{ $index }})">
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
                    </table> --}}
                    <div class="flex max-w-3xl flex-col space-y-4 bg-gray-50 p-6 text-gray-800 sm:p-10">
                        <h2 class="text-center text-2xl font-semibold">{{ __('Shopping cart') }}</h2>
                        <ul class="flex flex-col divide-y divide-gray-300">
                            @foreach ($carts->getContent()->sortBy('id') as $index => $item)
                                <li class="flex flex-col py-6 sm:flex-row sm:justify-between">
                                    <div class="flex w-full space-x-2 sm:space-x-4">
                                        <img class="h-20 w-20 flex-shrink-0 rounded border-transparent bg-gray-500 object-cover outline-none sm:h-32 sm:w-32"
                                            src="{{ $item->associatedModel->profile_photo_url }}"
                                            alt="{{ $item->associatedModel->name }}">
                                        <div class="flex w-full flex-col justify-between pb-4">
                                            <div class="flex w-full justify-between space-x-2 pb-2">
                                                <div class="space-y-1">
                                                    <h3 class="text-lg font-semibold capitalize leading-snug sm:pr-8">
                                                        {{ $item->associatedModel->name }}
                                                    </h3>
                                                    <p class="text-sm text-gray-600">
                                                        {{ $item->associatedModel->stock }} disponible</p>
                                                </div>
                                                <div class="text-right">
                                                    <p class="text-lg font-semibold">$
                                                        {{ number_format($carts->get($item->id)->getPriceSum(), 2, '.', '') }}
                                                    </p>
                                                    <p class="text-sm text-gray-400">
                                                        ${{ $item->associatedModel->sale_price }} x unidad</p>
                                                </div>
                                            </div>
                                            <div class="flex divide-x text-sm">
                                                <button type="button"
                                                    wire:click="delete_to_cart({{ $item->id }} , {{ $index }})"
                                                    class="flex items-center space-x-1 px-2 py-1 pl-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                        class="h-4 w-4 fill-current">
                                                        <path
                                                            d="M96,472a23.82,23.82,0,0,0,23.579,24H392.421A23.82,23.82,0,0,0,416,472V152H96Zm32-288H384V464H128Z">
                                                        </path>
                                                        <rect width="32" height="200" x="168"
                                                            y="216">
                                                        </rect>
                                                        <rect width="32" height="200" x="240"
                                                            y="216">
                                                        </rect>
                                                        <rect width="32" height="200" x="312"
                                                            y="216">
                                                        </rect>
                                                        <path
                                                            d="M328,88V40c0-13.458-9.488-24-21.6-24H205.6C193.488,16,184,26.542,184,40V88H64v32H448V88ZM216,48h80V88H216Z">
                                                        </path>
                                                    </svg>
                                                    <span>Remove</span>
                                                </button>
                                                <x-jet-input wire:model="quantities.{{ $index }}" min="1"
                                                    wire:change="update_quantity({{ $item }} , {{ $index }})"
                                                    type="number"
                                                    class="{{ $errors->has('quantities.' . $index) ? 'border rounded-md border-red-500' : 'flex items-center space-x-1 px-2 py-1 w-16' }}">
                                                </x-jet-input>
                                                <x-jet-input-error for="quantities.{{ $index }}" />
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                        <div class="space-y-1 text-right">
                            <p>{{ __('Total amount') }}:
                                <span class="font-semibold">$
                                    {{ number_format($carts->getTotal(), 2, '.', '') }}</span>
                            </p>
                            <p class="text-sm text-gray-600">{{ __('Not including taxes') }}</p>
                            <div class="form-control">
                                <label class="label cursor-pointer">
                                    <span class="label-text">{{ __('Cash') }}</span>
                                    {{-- <input type="checkbox" checked="checked" class="checkbox checkbox-accent" /> --}}
                                    <x-jet-checkbox wire:model='isCash'></x-jet-checkbox>
                                </label>
                            </div>
                            @if ($isCash)
                                <div class="my-4">
                                    <fieldset
                                        class="w-full space-y-1 rounded-md border border-gray-100 bg-gray-100 px-4 py-3 text-gray-800 shadow-md">
                                        <label for="price"
                                            class="block text-sm font-medium">{{ __('Pays with') }}</label>
                                        <div class="flex">
                                            <input wire:model='pay' type="text" name="price" id="price"
                                                placeholder="999,99"
                                                class="flex flex-1 rounded-l-md border border-gray-300 bg-gray-100 text-right text-gray-800 focus:ring-inset focus:ring-green-600 sm:text-sm">
                                            <span
                                                class="pointer-events-none flex items-center rounded-r-md bg-gray-300 px-3 sm:text-sm">$</span>

                                        </div>
                                        <x-jet-input-error for="pay" />
                                        <label class="mt-3 block">
                                            {{-- <input type="email" name="email" id="email" placeholder="user@email.xyz"
                                            class="block w-full rounded-md border border-gray-200 bg-white px-4 py-3 text-sm text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-blue-300" /> --}}
                                            <span class="text-xs">{{ __('Return') }} $ {{ $returned }}</span>
                                        </label>

                                        <button type="button" wire:click='calculate({{ $carts->getTotal() }})'
                                            class="mt-2 flex items-center rounded py-1.5 px-2 text-sm text-blue-600 transition-colors duration-300 hover:text-blue-400 focus:outline-none dark:text-blue-400 dark:hover:text-blue-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="h-4 w-4">
                                                <path fill-rule="evenodd"
                                                    d="M6.32 1.827a49.255 49.255 0 0111.36 0c1.497.174 2.57 1.46 2.57 2.93V19.5a3 3 0 01-3 3H6.75a3 3 0 01-3-3V4.757c0-1.47 1.073-2.756 2.57-2.93zM7.5 11.25a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H8.25a.75.75 0 01-.75-.75v-.008zm.75 1.5a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H8.25zm-.75 3a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H8.25a.75.75 0 01-.75-.75v-.008zm.75 1.5a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V18a.75.75 0 00-.75-.75H8.25zm1.748-6a.75.75 0 01.75-.75h.007a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75h-.007a.75.75 0 01-.75-.75v-.008zm.75 1.5a.75.75 0 00-.75.75v.008c0 .414.335.75.75.75h.007a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75h-.007zm-.75 3a.75.75 0 01.75-.75h.007a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75h-.007a.75.75 0 01-.75-.75v-.008zm.75 1.5a.75.75 0 00-.75.75v.008c0 .414.335.75.75.75h.007a.75.75 0 00.75-.75V18a.75.75 0 00-.75-.75h-.007zm1.754-6a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75h-.008a.75.75 0 01-.75-.75v-.008zm.75 1.5a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75h-.008zm-.75 3a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75h-.008a.75.75 0 01-.75-.75v-.008zm.75 1.5a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V18a.75.75 0 00-.75-.75h-.008zm1.748-6a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75h-.008a.75.75 0 01-.75-.75v-.008zm.75 1.5a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75h-.008zm-8.25-6A.75.75 0 018.25 6h7.5a.75.75 0 01.75.75v.75a.75.75 0 01-.75.75h-7.5a.75.75 0 01-.75-.75v-.75zm9 9a.75.75 0 00-1.5 0V18a.75.75 0 001.5 0v-2.25z"
                                                    clip-rule="evenodd" />
                                            </svg>


                                            <span class="mx-2">{{ __('Calculate') }}</span>
                                        </button>
                                    </fieldset>

                                    {{-- <label class="mt-3 block" for="email">
                                        <input type="email" name="email" id="email" placeholder="user@email.xyz"
                                            class="block w-full rounded-md border border-gray-200 bg-white px-4 py-3 text-sm text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-blue-300" />
                                    </label> --}}


                                </div>
                            @endif
                        </div>
                        <div class="flex justify-end space-x-4">
                            <button wire:click="resetData" type="button"
                                class="rounded-md border border-teal-600 px-6 py-2">{{ __('Empty Cart') }}
                            </button>
                            <!--<button type="button"
                                class="rounded-md border border-teal-600 bg-teal-600 px-6 py-2 text-gray-50">
                                <span class="sr-only sm:not-sr-only">Continue to</span>Checkout
                            </button>-->
                        </div>
                    </div>
                @else
                    <p class="text-center italic text-gray-500">El Carrito se encuentra vacio</p>
                @endif

            </div>
        </x-slot>
        <x-slot name="footer">
            {{-- <x-jet-secondary-button class="mr-2" wire:click="$set('isOpenShow' , false)">{{ __('Close') }}
            </x-jet-secondary-button>
            @if ($carts->getContent()->count())
                <x-jet-button wire:click="confirmSale">{{ __('Confirm') }}</x-jet-button>
            @endif --}}
            <button type="button" wire:click="$set('isOpenShow' , false)"
                class="mr-2 rounded-md border border-teal-600 px-6 py-2">{{ __('Back to shop') }}
            </button>
            @if ($carts->getContent()->count())
                <button type="button" wire:click="confirmSale"
                    class="rounded-md border border-teal-600 bg-teal-600 px-6 py-2 text-gray-50">{{ __('Continue to checkout') }}
                </button>
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
                <div
                    class="container mx-auto flex max-w-md flex-col space-y-4 divide-y divide-gray-700 bg-gray-900 p-6 text-gray-100 sm:w-96 sm:p-10">
                    <h2 class="text-2xl font-semibold">Order items</h2>
                    <ul class="flex flex-col space-y-2 pt-4">
                        @foreach ($sale->products as $product)
                            <li class="flex items-start justify-between">
                                <h3>{{ $product->name }}, {{ $product->description }}
                                    <span class="text-sm text-teal-400">x{{ $product->pivot->quantity }}</span>
                                </h3>
                                <div class="text-right">
                                    <span
                                        class="block">${{ number_format($product->pivot->price_to_date * $product->pivot->quantity, 2, '.', '') }}</span>
                                    <span class="text-sm text-gray-400">à ${{ $product->pivot->price_to_date }}</span>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="space-y-2 pt-4">
                        <div>
                            <div class="flex justify-between">
                                <span>Subtotal</span>
                                <span>${{ $sale->amount}}</span>
                            </div>
                            <div class="flex items-center space-x-2 text-xs">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    class="mt-1 h-3 w-3 fill-current text-teal-400">
                                    <path
                                        d="M485.887,263.261,248,25.373A31.791,31.791,0,0,0,225.373,16H64A48.055,48.055,0,0,0,16,64V225.078A32.115,32.115,0,0,0,26.091,248.4L279.152,486.125a23.815,23.815,0,0,0,16.41,6.51q.447,0,.9-.017a23.828,23.828,0,0,0,16.79-7.734L486.581,296.479A23.941,23.941,0,0,0,485.887,263.261ZM295.171,457.269,48,225.078V64A16.019,16.019,0,0,1,64,48H225.373L457.834,280.462Z">
                                    </path>
                                    <path
                                        d="M148,96a52,52,0,1,0,52,52A52.059,52.059,0,0,0,148,96Zm0,72a20,20,0,1,1,20-20A20.023,20.023,0,0,1,148,168Z">
                                    </path>
                                </svg>
                                <span class="text-gray-400">Spend $20.00, get 20% off</span>
                            </div>
                        </div>
                        <div class="flex justify-between">
                            <span>Discount</span>
                            <span>-$0.00</span>
                        </div>
                    </div>
                    <div class="space-y-2 pt-4">
                        <div class="flex justify-between">
                            <span>Service fee</span>
                            <span>$0.00</span>
                        </div>
                        <div class="flex flex-col">
                            <div class="flex justify-between">
                                <span>Delivery fee</span>
                                <span>$0.00</span>
                            </div>
                            <a rel="noopener noreferrer" href="#"
                                class="text-xs text-teal-400 hover:underline">How do our fees work?</a>
                        </div>
                        <div class="space-y-6">
                            <div class="flex justify-between">
                                <span>Total</span>
                                <span class="font-semibold">${{ $sale->amount}}</span>
                            </div>
                            <div class="w-full rounded border border-teal-400 bg-teal-400 py-2 text-center">
                                <a href="{{ route('reports.pdf', $sale->id) }}" target="_blank"
                                    class="w-full font-semibold text-gray-900">Print
                                    receipt</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        </x-slot>
        <x-slot name="footer">
            {{-- <x-jet-secondary-button class="mr-2" wire:click="resetData">{{ __('Close') }}
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
            @endif --}}

        </x-slot>
    </x-jet-dialog-modal>

</div>
