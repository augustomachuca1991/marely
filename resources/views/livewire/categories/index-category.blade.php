<div>
    <div class="border-b border-gray-200 bg-white p-6 sm:px-20">
        {{-- <div>
            <div class="flex justify-between">
                <div class="flex-none">
                    <x-jet-application-logo class="block h-16 w-auto" />
                </div>
                <div class="self-stretch">
                    <livewire:categories.create-category></livewire:categories.create-category>
                </div>
            </div>
        </div> --}}

        <div class=" text-gray-500">
            <div
                class="w-6/6 flex flex-col items-center space-y-1 overflow-hidden p-3 sm:rounded-lg md:flex-row md:space-y-0">
                <div class="flex w-full md:w-4/6">
                    <button class="hidden p-1 outline-none focus:outline-none md:block"><svg
                            class="h-5 w-5 cursor-pointer text-gray-600" fill="none" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg></button>
                    <input wire:model="search" type="search" name="searchCategories" id="searchCategories"
                        placeholder="Buscar por nombre, categorias, descripcion, etc..."
                        class="w-full border-gray-300 bg-transparent pl-4 text-sm outline-none focus:outline-none">
                </div>
                <div class="flex w-full md:w-1/6">

                    <select name="status" id="status"
                        class="w-full border-gray-300 bg-transparent text-sm outline-none focus:outline-none">
                        <option value="0" selected>{{ __('Active') }}</option>
                        <option value="1">{{ __('Desactive') }}</option>
                        <option value="2">{{ __('All') }}</option>
                    </select>
                </div>
                <div class="flex w-full md:w-1/6">
                    <select wire:model="perPage" name="imagen_type" id="imagen_type"
                        class="w-full rounded-r-md border-gray-300 bg-transparent text-sm outline-none focus:outline-none">
                        <option value="5">5 por pagina</option>
                        <option value="10">10 por pagina</option>
                        <option value="25">25 por pagina</option>
                        <option value="50">50 por pagina</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <section class=" dark:bg-gray-900">
        <div class="container mx-auto px-6 py-10">
            <h1 class="text-center text-3xl font-semibold capitalize text-gray-800 dark:text-white lg:text-4xl">{{__('Categories')}}</h1>

            <div class="mx-auto my-6 max-w-2xl text-center text-gray-500 dark:text-gray-300">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo incidunt ex placeat modi magni quia error
                alias, adipisci rem similique, at omnis eligendi optio eos harum.
            </div>

            <div class="mt-8 grid grid-cols-1 gap-8 md:grid-cols-2 xl:mt-16 xl:grid-cols-4">
                @if ($categories->count())
                    @foreach ($categories as $item)
                        <div
                            class="group flex transform cursor-pointer flex-col items-center rounded-xl border bg-white p-8 transition-colors duration-200 hover:border-transparent hover:bg-cyan-600 dark:border-gray-700 dark:hover:border-transparent">
                            <img class="h-32 w-32 rounded-full object-cover ring-4 ring-gray-300"
                                src="https://ui-avatars.com/api/?name={{ urlencode($item->name) }}&color=f8f8f8&background=263238"
                                alt="{{$item->name}}">

                            <h1
                                class="mt-4 text-2xl font-semibold capitalize text-gray-700 group-hover:text-white dark:text-white">
                                {{$item->name}}</h1>

                            <p class="mt-2 capitalize text-gray-500 group-hover:text-gray-300 dark:text-gray-300">{{$item->description}}</p>

                            <div class="-mx-2 mt-3 flex">
                                <a href="#"
                                    class="mx-2 text-gray-600 hover:text-gray-500 group-hover:text-white dark:text-gray-300 dark:hover:text-gray-300"
                                    aria-label="Calendar">
                                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-flex" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                      </svg>
                                    {{$item->created_at->format('d/m/Y h:ia')}}
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    {{-- <div class="grid gap-2 bg-gray-200 bg-opacity-25 md:grid-cols-3">
        @if ($categories->count())
            @foreach ($categories as $item)
                <div class="border-spacing-2 border p-6">
                    <div class="flex items-center">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($item->name) }}&color=7F9CF5&background=EBF4FF"
                            alt="{{ $item->name }}" class="h-20 w-20 rounded-full object-cover">
                        <div class="ml-4 text-lg font-semibold uppercase leading-7 text-gray-600"><a href="#"
                                wire:click="show({{ $item }})">{{ $item->name }}</a></div>
                    </div>

                    <div class="ml-12">
                        <div class="mt-2 text-sm text-gray-500">
                            {{ $item->description }}
                        </div>

                        <div class="flex justify-end">
                            <div><a href="#" wire:click="edit({{ $item }})">
                                    <div
                                        class="mt-3 flex items-center text-sm font-semibold text-yellow-600 hover:text-yellow-400">
                                        <div class="ml-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path
                                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                            </svg>
                                        </div>
                                        <div>{{ __('Edit') }}</div>
                                    </div>
                                </a>
                            </div>
                            <div><a href="#" wire:click="delete({{ $item }})">
                                    <div
                                        class="mt-3 flex items-center text-sm font-semibold text-red-800 hover:text-red-500">
                                        <div class="ml-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <div>{{ __('Delete') }}</div>
                                    </div>
                                </a></div>
                        </div>

                    </div>
                </div>
            @endforeach
            <div>
                {{ $categories->links() }}
            </div>
        @else
            <div>
                <p class="w-full text-gray-500">no data</p>
            </div>
        @endif

    </div> --}}
    @if ($isOpenShow)
        <livewire:categories.show-category :category="$category"></livewire:categories.show-category>
    @endif


    @if ($isOpenEdit)
        <livewire:categories.edit-category :category="$category"></livewire:categories.edit-category>
    @endif
</div>
