<div>
    <div
        class="w-6/6 flex flex-col items-center space-y-1 overflow-hidden bg-white p-3 shadow-lg sm:rounded-lg md:flex-row md:space-y-0">
        <div class="flex w-full md:w-3/6">
            <button class="hidden p-1 outline-none focus:outline-none md:block">
                <svg class="h-5 w-5 cursor-pointer text-gray-600" fill="none" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </button>
            <input wire:model.debounce.300ms="search" type="search" name="searchProducts" id="searchProducts"
                placeholder="Buscar por nombre, categorias, descripcion, etc..." class="form-control w-full pl-4">
        </div>
        <div class="flex w-full md:w-1/6">
            <select name="status" id="status" wire:model="byStatus" class="form-control w-full">
                <option value="">{{ __('All') }}</option>
                <option value="1">{{ __('Active') }}</option>
                <option value="2">{{ __('Inactive') }}</option>
            </select>
        </div>
        <div class="flex w-full md:w-1/6">
            <select name="supplier" id="supplier" wire:model="bySupplier" class="form-control w-full">
                <option value="">{{ __('Suppliers') }}</option>
                @foreach (\App\Models\Supplier::all() as $item)
                    <option value="{{ $item->id }}">{{ $item->company_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex w-full md:w-1/6">
            <select wire:model="byCategory" name="imagen_type" id="imagen_type"
                class="form-control w-full rounded-r-md">
                <option value="">{{ __('Categories') }}</option>
                @foreach (\App\Models\Category::all() as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="mt-3">
        <!--## componente crear productos ##-->
        <livewire:products.create-product></livewire:products.create-product>
    </div>
    {{-- <div class="mt-6 overflow-hidden sm:rounded-lg">
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full table-auto divide-y divide-gray-200 md:table-fixed">
                            <thead>
                                <tr>
                                    <th scope="col" class="title-table">
                                        <a href="#" wire:click="orderName">{{ __('Article') }}</a>
                                    </th>
                                    <th scope="col" class="title-table">
                                        {{ __('Category') }}
                                    </th>
                                    <th scope="col" class="title-table">
                                        {{ __('Stock') }}
                                    </th>
                                    <th scope="col" class="title-table">
                                        {{ __('List Price') }}
                                    </th>
                                    <th scope="col" class="title-table">
                                        {{ __('Sale Price') }}
                                    </th>
                                    <th scope="col" class="title-table">
                                        {{ __('') }}
                                    </th>
                                    <th scope="col" class="bg-gray-50 px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                <tr wire:loading.delay colspan="7">
                                    <td class="td-style">
                                        <x-loading></x-loading>
                                    </td>
                                </tr>
                                @if ($products->count())
                                    @foreach ($products as $index => $item)
                                        <tr wire:loading.remove>
                                            <td class="td-style">
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
                                                            <div class="text-sm font-medium capitalize">

                                                                {{ $item->name }}
                                                            </div>
                                                        </a>
                                                        <div class="text-sm text-gray-500">
                                                            {{ $item->description }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="td-style">
                                                <div class="text-sm capitalize text-gray-500">
                                                    {{ $item->category->name }}
                                                </div>
                                            </td>
                                            <td class="td-style text-sm text-gray-500">
                                                {{ $item->stock }}
                                            </td>
                                            <td class="td-style text-sm text-gray-500">
                                                $ {{ $item->list_price }}
                                            </td>
                                            <td class="td-style text-sm text-gray-500">
                                                $ {{ $item->sale_price }}
                                            </td>
                                            <td class="td-style">
                                                <span
                                                    class="{{ $item->stock < 1 ? 'bg-red-200 text-red-800' : 'bg-green-200 text-green-800' }} inline-flex rounded-full px-2 text-xs font-semibold leading-5">
                                                    {{ $item->stock < 1 ? __('Inactive') : __('Active') }}
                                                </span>
                                            </td>
                                            <td class="td-style text-right text-sm font-medium">

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
                                                                wire:click="confirmDelete({{ $item }})">
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
                                        <td colspan="7" class="td-style">
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
    </div> --}}
    <div class="my-3">

        <div class="journal-scroll hidden overflow-auto rounded-lg shadow md:block">
            <x-table>
                <x-slot name="thead">
                    <th class="thead cursor-pointer" wire:click="orderName">{{ __('Article') }}</th>
                    <th class="thead w-20">{{ __('Stock') }}</th>
                    <th class="thead w-24">{{ __('Status') }}</th>
                    <th class="thead w-24">{{ __('Price') }}</th>
                    <th class="thead sr-only w-32">{{ __('Actions') }}</th>
                </x-slot>
                <x-slot name="tbody">
                    <tr wire:loading.delay colspan="5">
                        <td class="tdetail">
                            <x-loading></x-loading>
                        </td>
                    </tr>
                    @if ($products->count())
                        @foreach ($products as $index => $item)
                            <tr wire:loading.remove class="{{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">

                                <td class="tdetail">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <img class="h-10 w-10 rounded-full object-cover"
                                                src="{{ $item->profile_photo_url }}" alt="{{ $item->name }}">

                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium">

                                                {{ $item->name }}
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                {{ $item->description }}
                                            </div>
                                            <div>
                                                <a href="#" wire:click="show({{ $item }})"
                                                    class="text-blue-500 hover:underline">{{ $item->code }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="tdetail">
                                    {{ $item->stock }} Unidades
                                </td>
                                <td class="tdetail">
                                    <span
                                        class="{{ $item->stock < 1 ? 'bg-gray-200 text-gray-800' : 'bg-green-200 text-green-800' }} span-badge">
                                        {{ $item->stock < 1 ? __('Inactive') : __('Active') }}
                                    </span>
                                </td>
                                <td class="tdetail">
                                    <div class="text-sm font-medium capitalize">
                                        precio venta ${{ $item->sale_price }}
                                    </div>
                                    <div class="text-sm capitalize text-gray-500">
                                        precio lista ${{ $item->list_price }}
                                    </div>
                                </td>
                                <td class="tdetail">
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
                                            <div><a href="#" wire:click="confirmDelete({{ $item }})">
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
                            <td colspan="5" class="tdetail">
                                <p> No se encontraron resultados</p>
                            </td>
                        </tr>
                    @endif
                </x-slot>
            </x-table>
        </div>
        <x-table-responsive>
            <x-slot name="item">
                @if ($products->count())
                    @foreach ($products as $item)
                        <div class="space-y-3 rounded-lg bg-white p-4 shadow">
                            <div class="flex items-center space-x-2 text-sm">
                                <div>
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <img class="h-10 w-10 rounded-full object-cover"
                                                src="{{ $item->profile_photo_url }}" alt="{{ $item->name }}">

                                        </div>
                                        <div class="ml-4">
                                            <div>
                                                <a href="#" wire:click="show({{ $item }})"
                                                    class="text-blue-500 hover:underline">{{ $item->code }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-gray-500">{{ $item->stock }} unidad/es</div>
                                <div>
                                    <span
                                        class="{{ $item->stock < 1 ? 'bg-gray-200 text-gray-800' : 'bg-green-200 text-green-800' }} span-badge">
                                        {{ $item->stock < 1 ? __('Inactive') : __('Active') }}
                                    </span>
                                </div>
                            </div>
                            <div class="text-sm capitalize text-gray-700">
                                {{ $item->name }}
                            </div>
                            <div class="text-sm font-medium capitalize text-black">
                                precio venta ${{ $item->sale_price }}
                                <div class="text-gray-500">
                                    precio lista ${{ $item->list_price }}
                                </div>
                            </div>
                            <div>
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
                                        <div><a href="#" wire:click="confirmDelete({{ $item }})">
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
                            </div>
                        </div>
                    @endforeach
                @else
                    no data
                @endif

            </x-slot>
        </x-table-responsive>

        <div wire:loading.remove class="my-2">
            {{ $products->links() }}
        </div>
    </div>


    @if ($isOpenEdit)
        <livewire:products.edit-product :product="$product"></livewire:products.edit-product>
    @endif

    @if ($isOpenShow)
        <livewire:products.show-product :product="$product"></livewire:products.show-product>
    @endif
</div>
