<div>
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
        <span
            class="inline-block py-1 px-1.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-red-600 text-white rounded-full ml-2">{{ \Cart::session(auth()->id())->getTotalQuantity() }}</span>
    </a>

    <x-jet-dialog-modal wire:model="isOpenShow">
        <x-slot name="title">{{ __('Cart') }}</x-slot>
        <x-slot name="content">
            <div class="mb-4">
                {{-- {{ $this->cart }} --}}
                @if ($this->cart)
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
                            @foreach ($cart->sortBy('id') as $index => $item)
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
                                        <x-jet-input id="v{{ $item->id }}"
                                            wire:change="update_quantity({{ $item->id }} , $('#v' . {{ $item->id }}).val() )"
                                            type="number" class="w-24" value="{{ $item->quantity }}">
                                        </x-jet-input>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        $ {{ \Cart::session(auth()->id())->get($item->id)->getPriceSum() }}
                                    </td>
                                    <td class=" px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="#" wire:click="delete_to_cart({{ $item }})"
                                            class="text-red-500 hover:text-red-400">delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="4" class="text-right"> Total:
                                    ${{ \Cart::session(auth()->id())->getTotal() }} </td>
                            </tr>
                            <!-- More rows... -->
                        </tbody>
                    </table>
                @endif

            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button>{{ __('Close') }}</x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
