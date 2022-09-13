<div>
    <div class="text-gray-500">
        <div class="relative bg-transparent text-lg text-gray-800">
            <div class="flex items-center border-b-2 border-teal-500 py-2">
                <x-jet-input wire:model="search" wire:keydown.debounce.500ms="$set('suggestionProduct' , true)"
                    class="w-11/12 border-none" type="text" placeholder="Search Product">
                </x-jet-input>
                {{-- <livewire:products.create-product></livewire:products.create-product> --}}
            </div>
        </div>
        @if ($suggestionProduct && $search != '')
            <ul class="mt-2 w-full border border-gray-100 bg-white">
                @if ($products->count())
                    @foreach ($products as $itemProduct)
                        <li wire:click="addProduct({{ $itemProduct }})"
                            class="relative cursor-pointer border-b-2 border-gray-100 py-1 pl-8 pr-2 hover:bg-indigo-100 hover:text-gray-900">
                            <svg class="absolute left-2 top-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                            {{ $itemProduct->code }} - {{ $itemProduct->name }}
                            ({{ $itemProduct->stock }})
                        </li>
                    @endforeach
                @else
                    <li
                        class="relative cursor-pointer border-b-2 border-gray-100 py-1 pl-8 pr-2 hover:bg-indigo-100 hover:text-gray-900">
                        No result</li>
                @endif
            </ul>
        @endif
    </div>
</div>
