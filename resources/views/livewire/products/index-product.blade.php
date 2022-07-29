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
        {{-- <ul class="divide-y divide-slate-100">
            @foreach ($products as $item)
                <article class="flex items-start space-x-6 p-6 {{ $item->deleted_at ? 'bg-red-100' : '' }}">
                    <img src="{{ $item->profile_photo_url }}" alt="avatar" width="60" height="88"
                        class="flex-none rounded-md bg-gray-100" />
                    <div class="min-w-0 relative flex-auto">
                        <a href="#" wire:click="show({{ $item }})">
                            <h2 class="font-semibold text-gray-900 pr-20 hover:text-blue-500">{{ $item->code }} -
                                {{ $item->name }}</h2>
                        </a>
                        <dl class="mt-2 flex flex-wrap text-sm leading-6 font-medium">
                            <div class="absolute top-0 right-0 flex items-center space-x-1 text-lg">
                                <dt class="text-green-500">
                                    <span class="sr-only">{{ __('price') }}</span>
                                    $
                                </dt>
                                <dd>{{ $item->sale_price }}</dd>
                            </div>
                            <div>
                                <dt class="sr-only">category</dt>
                                <dd class="px-1.5 ring-1 ring-gray-200 rounded bg-yellow-200<">
                                    {{ $item->category->name }}</dd>
                            </div>
                            <div class="ml-2">
                                <dt class="sr-only">{{ __('List Price') }}</dt>
                                <dd>${{ $item->list_price }}</dd>
                            </div>
                            <div>
                                <dt class="sr-only">{{ __('supplier') }}</dt>
                                <dd class="flex items-center">
                                    <svg width="2" height="2" fill="currentColor" class="mx-2 text-gray-300"
                                        aria-hidden="true">
                                        <circle cx="1" cy="1" r="1" />
                                    </svg>
                                    @if (!$item->deleted_at)
                                        {{ __('active') }}
                                    @endif
                                </dd>
                            </div>
                            <div>
                                <dt class="sr-only">stock</dt>
                                <dd class="flex items-center">
                                    <svg width="2" height="2" fill="currentColor" class="mx-2 text-gray-300"
                                        aria-hidden="true">
                                        <circle cx="1" cy="1" r="1" />
                                    </svg>
                                    stock {{ $item->stock }}
                                </dd>
                            </div>
                            <div class="flex-none w-full mt-2 font-normal">
                                <dt class="sr-only">{{ __('description') }}</dt>
                                <dd class="text-gray-500">{{ $item->description }}</dd>
                            </div>
                            <div class="flex-none w-full mt-2 font-normal">
                                <dt class="sr-only">{{ __('description') }}</dt>
                                <dd class="flex">
                                    <a href="#" wire:click="edit({{ $item }})"class="ml-2 ">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-5 w-5 text-yellow-600 hover:text-yellow-400" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    <a href="#" wire:click="delete({{ $item }})" class="ml-2 ">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-5 w-5 text-red-600 hover:text-red-400" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </a>
                                </dd>
                            </div>
                        </dl>
                    </div>
                </article>
            @endforeach
        </ul> --}}
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full rounded-md">
                            <thead class="bg-gray-900 text-white border-b">
                                <tr>
                                    <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                                        # {{ __('Code') }}
                                    </th>
                                    <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                                        {{ __('Name') }}
                                    </th>
                                    <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                                        {{ __('Description') }}
                                    </th>
                                    <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                                        {{ __('Stock') }}
                                    </th>
                                    <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                                        {{ __('List Price - Sale Price') }}
                                    </th>
                                    <th scope="col" class="sr-only text-sm font-medium px-6 py-4 text-left">
                                        {{ __('Actions') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $index => $item)
                                    <tr class=" {{ $index % 2 == 0 ? 'bg-indigo-100' : 'bg-white' }} border-b">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $item->code }}</td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $item->name }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $item->description }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $item->stock }} Unidades
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            $ {{ $item->list_price }} - $ {{ $item->sale_price }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <div class="flex">
                                                <div><a href="#" wire:click="edit({{ $item }})">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-5 w-5 text-yellow-600 hover:text-yellow-400"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                            stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                                <div><a href="#" wire:click="delete({{ $item }})">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-5 w-5 text-red-600 hover:text-red-400"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                            stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </a></div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if ($products->hasMorePages())
        <a wire:click="loadMore" class="cursor-pointer">
            <span class="underline text-blue-500 font-bold">{{ __('Load More') }}</span>
        </a>
    @endif

    @if ($isOpenEdit)
        <livewire:products.edit-product :product="$product"></livewire:products.edit-product>
    @endif

    @if ($isOpenShow)
        <livewire:products.show-product :product="$product"></livewire:products.show-product>
    @endif
</div>
