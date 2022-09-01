<div class="container border border-gray-100 rounded-lg">
    <div class="space-y-2 px-6 py-2">
        <h3 class="text-2xl font-bold leading-none sm:text-5xl">{{ __('Categories') }}</h3>
        <p class="max-w-2xl text-gray-600">At a assumenda quas cum earum ut itaque commodi saepe rem aspernatur
            quam natus quis nihil quod, hic explicabo doloribus magnam neque, exercitationem eius sunt!</p>
    </div>
    <div class="bg-gray-50 px-8 py-2 text-gray-800">
        <div class="container mx-auto flex items-center justify-center py-2 md:justify-between">
            <livewire:categories.create-category></livewire:categories.create-category>
            <div class="w-5/6 bg-transparent">
                <div
                    class="flex flex-col items-center space-y-1 overflow-hidden p-3 sm:rounded-lg md:flex-row md:space-y-0">
                    <div class="inline-flex w-full md:w-4/6">
                        <button class="hidden p-1 outline-none focus:outline-none md:block">
                            <svg class="h-5 w-5 cursor-pointer text-gray-600" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                        <input wire:model="search" type="search" name="searchCategories" id="searchCategories"
                            placeholder="Buscar por nombre, categorias, descripcion, etc..."
                            class="form-control w-full pl-4">
                    </div>
                    <div class="w-full md:w-1/6">
                        <select name="status" id="status" class="form-control w-full">
                            <option value="0" selected>{{ __('Active') }}</option>
                            <option value="1">{{ __('Desactive') }}</option>
                            <option value="2">{{ __('All') }}</option>
                        </select>
                    </div>
                    <div class="w-full md:w-1/6">
                        <select wire:model="perPage" name="page" id="page"
                            class="form-control w-full rounded-r-md">
                            <option value="5">5 por pagina</option>
                            <option value="10">10 por pagina</option>
                            <option value="25">25 por pagina</option>
                            <option value="50">50 por pagina</option>
                        </select>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <section class="bg-gray-100 py-6 text-gray-800">
        <div class="container mx-auto space-y-16 p-4 sm:p-10">
            <div class="grid w-full grid-cols-1 gap-6 md:grid-cols-2">
                @foreach ($categories as $item)
                    <div class="flex space-x-6">
                        <img alt="{{ $item->name }}"
                            class="mb-4 h-56 flex-1 flex-shrink-0 rounded-md bg-gray-500 bg-center object-cover"
                            src="https://ui-avatars.com/api/?name={{ urlencode($item->name) }}&background=cef2ef&color=269a8f&format=svg">
                        <div class="flex flex-col">
                            <h4 class="text-xl font-semibold capitalize">{{ $item->name }}</h4>
                            <p class="text-sm text-gray-600">{{ $item->description }}</p>
                            <div class="mt-2 flex space-x-2">
                                <a wire:click="edit({{$item}})" rel="noopener noreferrer" href="#" title="Edit"
                                    class="text-yellow-600 hover:text-yellow-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="h-4 w-4">
                                        <path
                                            d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z" />
                                    </svg>

                                </a>
                                <a wire:click="confirmDelete({{$item}})"rel="noopener noreferrer" href="#" title="LinkedIn"
                                    class="text-red-600 hover:text-red-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="h-4 w-4">
                                        <path fill-rule="evenodd"
                                            d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z"
                                            clip-rule="evenodd" />
                                    </svg>

                                </a>
                                <a wire:click="show({{$item}})" rel="noopener noreferrer" href="#" title="GitHub" class="text-blue-600 hover:text-blue-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="h-4 w-4">
                                        <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                        <path fill-rule="evenodd"
                                            d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z"
                                            clip-rule="evenodd" />
                                    </svg>

                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @if ($categories->count())
        {{ $categories->links() }}
    @endif
    @if ($isOpenShow)
        <livewire:categories.show-category :category="$category"></livewire:categories.show-category>
    @endif


    @if ($isOpenEdit)
        <livewire:categories.edit-category :category="$category"></livewire:categories.edit-category>
    @endif
</div>
