<div>

    <div class="flex space-x-2 justify-center">
        <a href="#" wire:click="show"
            class="inline-block px-6 py-2.5 font-medium text-xs leading-tight uppercase rounded  transition duration-150 ease-in-out items-center">
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
                    class="inline-block py-1 px-1.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-red-600 text-white rounded-full ml-2">{{ \Cart::session(auth()->id())->getTotalQuantity() }}</span>
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
                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                {{ __('Name') }}
                            </th>
                            <th scope="col"
                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                {{ __('Quantity') }}
                            </th>
                            <th scope="col"
                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                {{ __('Price') }}
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50">
                                <span class="sr-only">{{ __('Actions') }}</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($carts->sortBy('id') as $index => $item)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
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
                                                {{ $item->associatedModel->category->name }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{-- {{ var_export($quantities) }} --}}
                                    <x-jet-input wire:model="quantities.{{ $index }}" min="1"
                                        wire:change="update_quantity({{ $item->id }} , {{ $index }} )"
                                        type="number" class="w-24">
                                    </x-jet-input>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    $ {{ \Cart::session(auth()->id())->get($item->id)->getPriceSum() }}
                                </td>
                                <td class=" px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="#" wire:click="delete_to_cart({{ $item->id }})">
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
            <x-jet-button wire:click="confirmSale">{{ __('Confirm') }}</x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>


    <x-jet-dialog-modal wire:model="isOpenNext">
        <x-slot name="title">
            <x-jet-application-mark class="block h-9 w-auto" />
            <div
            class=" modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-black text-sm z-50">
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
            <div class="mb-4">
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <table class="min-w-full text-center">
                                    <thead class="border-b bg-gray-50">
                                        <tr>

                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                                {{ __('Article') }}
                                            </th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                                {{ __('Quantity') }}
                                            </th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                                {{ __('Unit Price') }}
                                            </th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                                {{ __('SubTotal') }}
                                            </th>
                                        </tr>
                                    </thead class="border-b">
                                    <tbody>
                                        @foreach ($carts as $item)
                                            <tr class="bg-white border-b">
                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{ $item->associatedModel->name }}
                                                </td>
                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{ $item->quantity }} uidades
                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                    ${{ $item->price }}
                                                </td>
                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    ${{ \Cart::session(auth()->id())->get($item->id)->getPriceSum() }}
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="4" class="text-right p-2"> Total:
                                                ${{ \Cart::session(auth()->id())->getTotal() }} </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            {{-- <x-jet-secondary-button class="mr-2" wire:click="$set('isOpenNext' , false)">{{ __('Print') }}
            </x-jet-secondary-button> --}}
            <x-jet-button wire:click="next">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-flex text-green-700" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                </svg>
                {{ __('Print') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

</div>
