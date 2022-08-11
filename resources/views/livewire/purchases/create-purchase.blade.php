<div class="flex">
    <a wire:click="$set('isOpenCreate' , true)"
        class="group flex w-full cursor-pointer flex-col items-center justify-center rounded-md border-2 border-dashed border-slate-300 py-3 text-sm font-medium leading-6 text-slate-900 hover:border-solid hover:border-sky-500 hover:bg-white hover:text-sky-500">
        <svg class="mb-1 text-slate-400 group-hover:text-sky-500" width="20" height="20" fill="currentColor"
            aria-hidden="true">
            <path d="M10 5a1 1 0 0 1 1 1v3h3a1 1 0 1 1 0 2h-3v3a1 1 0 1 1-2 0v-3H6a1 1 0 1 1 0-2h3V6a1 1 0 0 1 1-1Z" />
        </svg>
        New Referral
    </a>

    <form wire:submit.prevent="store">
        <x-jet-dialog-modal wire:model='isOpenCreate'>
            <x-slot name="title">{{ __('New Referral') }}</x-slot>
            <x-slot name="content">
                <div class="mb-4">
                    <div class="text-gray-500">
                        <div class="relative bg-transparent text-lg text-gray-800">
                            <div class="flex items-center border-b-2 border-teal-500 py-2">
                                <x-jet-input wire:model="supplierText" wire:keydown="$set('suggestionSupplier' , true)"
                                    class="w-11/12 border-none" type="text" placeholder="Search Supplier"
                                    autocomplete>
                                </x-jet-input>
                                <button type="button" class="absolute right-0 top-0 mt-3 mr-4">
                                    <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1"
                                        x="0px" y="0px" viewBox="0 0 56.966 56.966"
                                        style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
                                        width="512px" height="512px">
                                        <path
                                            d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        @if ($suggestionSupplier && $supplierText != '')
                            <ul class="mt-2 w-full border border-gray-100 bg-white">
                                @foreach ($suppliers as $item)
                                    <li wire:click="loadSupplier({{ $item }})"
                                        class="relative cursor-pointer border-b-2 border-gray-100 py-1 pl-8 pr-2 hover:bg-yellow-50 hover:text-gray-900">
                                        <svg class="absolute left-2 top-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <b>{{ $item->company_name }}</b>- {{ $item->location }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif

                    </div>
                </div>
                <div class="mb-4">
                    <div class="text-gray-500">
                        <div class="relative bg-transparent text-lg text-gray-800">
                            <div class="flex items-center border-b-2 border-teal-500 py-2">
                                <x-jet-input wire:model="productText" wire:keydown="$set('suggestionProduct' , true)"
                                    class="w-11/12 border-none" type="text" placeholder="Search Product">
                                </x-jet-input>
                                <button type="button" class="absolute right-0 top-0 mt-3 mr-4">
                                    <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1"
                                        x="0px" y="0px" viewBox="0 0 56.966 56.966"
                                        style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
                                        width="512px" height="512px">
                                        <path
                                            d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        @if ($suggestionProduct && $productText != '')
                            <ul class="mt-2 w-full border border-gray-100 bg-white">
                                @foreach ($products as $itemProduct)
                                    <li wire:click="loadProduct({{ $itemProduct }})"
                                        class="relative cursor-pointer border-b-2 border-gray-100 py-1 pl-8 pr-2 hover:bg-yellow-50 hover:text-gray-900">
                                        <svg class="absolute left-2 top-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <b>{{ $itemProduct->code }}</b>- {{ $itemProduct->name }} ({{$itemProduct->stock}})
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </x-slot>
            <x-slot name="footer">
                {{ $supplier ? $supplier->company_name : '' }}
                {{ $product ? $product->name : '' }}
            </x-slot>
        </x-jet-dialog-modal>
    </form>
</div>
