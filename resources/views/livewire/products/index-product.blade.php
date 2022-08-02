<div>
    <div
        class="bg-white shadow-lg overflow-hidden sm:rounded-lg flex flex-col md:flex-row items-center w-6/6 p-3 space-y-1 md:space-y-0">
        <div class="flex w-full md:w-3/6">
            <button class="hidden md:block p-1 outline-none focus:outline-none"><svg
                    class=" w-5 text-gray-600 h-5 cursor-pointer" fill="none" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg></button>
            <input wire:model="search" type="search" name="searchProducts" id="searchProducts"
                placeholder="Buscar por nombre, categorias, descripcion, etc..."
                class="w-full pl-4 text-sm outline-none focus:outline-none bg-transparent border-gray-300">
        </div>
        <div class="flex w-full md:w-1/6">

            <select name="status" id="status" wire:model="byStatus"
                class="w-full text-sm outline-none focus:outline-none bg-transparent border-gray-300">
                <option value="">{{ __('Active') }}</option>
                <option value="1">{{ __('Inactive') }}</option>
                <option value="2">{{ __('All') }}</option>
            </select>
        </div>
        <div class="flex w-full md:w-1/6">

            <select name="supplier" id="supplier" wire:model="bySupplier"
                class="w-full text-sm outline-none focus:outline-none bg-transparent border-gray-300">
                <option value="">{{ __('Supliers') }}</option>
            </select>
        </div>
        <div class="flex w-full md:w-1/6">
            <select wire:model="byCategory" name="imagen_type" id="imagen_type"
                class="w-full text-sm outline-none focus:outline-none bg-transparent border-gray-300 rounded-r-md">
                <option value="">{{ __('All Categories') }}</option>
                @foreach (\App\Models\Category::all() as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="mt-3">
        <livewire:products.create-product></livewire:products.create-product>
    </div>
    <div class="mt-6  overflow-hidden sm:rounded-lg">
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200 table-auto md:table-fixed">
                            <thead>
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Article') }}
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Category') }}
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Stock') }}
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('List Price') }}
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Sale Price') }}
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('') }}
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @if ($products->count())
                                    @foreach ($products as $index => $item)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0">
                                                        <a href="#" wire:click="show({{ $item }})">
                                                            <img class="h-10 w-10 rounded-full object-cover"
                                                                src="{{ $item->profile_photo_url }}"
                                                                alt="{{ $item->name }}">
                                                        </a>

                                                    </div>
                                                    <div class="ml-4">
                                                        <a href="#" wire:click="show({{ $item }})"
                                                            class="text-gray-900 hover:text-blue-700">
                                                            <div class="text-sm font-medium ">

                                                                {{ $item->name }}
                                                            </div>
                                                        </a>
                                                        <div class="text-sm text-gray-500">
                                                            {{ $item->description }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-500 capitalize">
                                                    {{ $item->category->name }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $item->stock }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                $ {{ $item->list_price }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                $ {{ $item->sale_price }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $item->deleted_at ? 'bg-red-200 text-red-800' : 'bg-green-200 text-green-800' }} ">
                                                    {{ $item->deleted_at ? 'Inactive' : 'Active' }}
                                                </span>
                                            </td>
                                            <td class=" px-6 py-4 whitespace-nowrap text-right text-sm font-medium">

                                                @if (!$item->deleted_at)
                                                    <div class="flex">
                                                        <div><a href="#" wire:click="edit({{ $item }})">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="h-5 w-5 text-yellow-600 hover:text-yellow-400"
                                                                    viewBox="0 0 20 20" fill="currentColor">
                                                                    <path
                                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                                                </svg>
                                                            </a>
                                                        </div>
                                                        <div><a href="#"
                                                                wire:click="delete({{ $item }})">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="h-5 w-5 text-red-600 hover:text-red-400"
                                                                    viewBox="0 0 20 20" fill="currentColor">
                                                                    <path fill-rule="evenodd"
                                                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                        clip-rule="evenodd" />
                                                                </svg>
                                                            </a>
                                                        </div>
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="7" class="px-6 py-4 whitespace-nowrap">
                                            <p> No se encontraron resultados para
                                                "<span class="text-blue-600">
                                                    {{ $search ? $search : ($byStatus ? $byStatus : ($byCategory ? $byCategory : '')) }}
                                                </span>"
                                            </p>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{ $products->links() }}
    {{-- @if ($products->hasMorePages())
        <a wire:click="loadMore" class="cursor-pointer">
            <span class="underline text-blue-500 font-bold">{{ __('Load More') }}</span>
        </a>
    @endif --}}

    @if ($isOpenEdit)
        <livewire:products.edit-product :product="$product"></livewire:products.edit-product>
    @endif

    @if ($isOpenShow)
        <livewire:products.show-product :product="$product"></livewire:products.show-product>
    @endif
</div>
