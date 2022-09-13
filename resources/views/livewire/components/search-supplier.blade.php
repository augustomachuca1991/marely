<div>
    <fieldset class="w-full space-y-1 text-gray-800">
        <label for="Search">{{ __('Search Supplier') }}</label>
        <div class="relative">
            <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                <button type="button" title="search" class="p-1 focus:outline-none focus:ring">
                    <svg fill="currentColor" viewBox="0 0 512 512" class="h-4 w-4 text-gray-800">
                        <path
                            d="M479.6,399.716l-81.084-81.084-62.368-25.767A175.014,175.014,0,0,0,368,192c0-97.047-78.953-176-176-176S16,94.953,16,192,94.953,368,192,368a175.034,175.034,0,0,0,101.619-32.377l25.7,62.2L400.4,478.911a56,56,0,1,0,79.2-79.195ZM48,192c0-79.4,64.6-144,144-144s144,64.6,144,144S271.4,336,192,336,48,271.4,48,192ZM456.971,456.284a24.028,24.028,0,0,1-33.942,0l-76.572-76.572-23.894-57.835L380.4,345.771l76.573,76.572A24.028,24.028,0,0,1,456.971,456.284Z">
                        </path>
                    </svg>
                </button>
            </span>
            <input wire:model="search" wire:keyup="$set('suggestionSupplier' , true)" type="search" name="Search"
                placeholder="Search..."
                class="w-32 rounded-md border-gray-300 bg-gray-100 py-2 pl-10 text-sm text-gray-800 focus:border-cyan-600 focus:bg-gray-50 focus:outline-none sm:w-auto">
        </div>
        @if ($suggestionSupplier && $search != '')
            <div
                class="absolute inset-x-0 mx-5 mt-4 max-h-72 overflow-y-auto rounded-md border bg-white px-6 py-3 dark:border-transparent dark:bg-gray-800">
                @if ($suppliers->count())
                    @foreach ($suppliers as $item)
                        <a wire:click="addSupplier({{ $item }})" href="#" class="block py-1">
                            <h3 class="font-medium text-gray-700 hover:underline dark:text-gray-100">
                                {{ $item->company_name }}</h3>
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">{{ $item->location }}
                            </p>
                        </a>
                    @endforeach
                @else
                    <p class="text-gray-700">No result</p>
                @endif
            </div>
        @endif
    </fieldset>
</div>
