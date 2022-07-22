<div>

    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
        <div>
            <div class="flex justify-between">
                <div class="flex-none">
                    <x-jet-application-logo class="block h-12 w-auto" />
                </div>
                <div class="self-stretch">
                    <livewire:categories.create-category></livewire:categories.create-category>
                </div>
            </div>
        </div>

        <div class="mt-8 text-2xl text-center uppercase">
            {{ __('List Categories') }}
        </div>

        <div class="mt-6 text-gray-500">
            <div
                class="overflow-hidden sm:rounded-lg flex flex-col md:flex-row items-center w-6/6 p-3 space-y-1 md:space-y-0">
                <div class="flex w-full md:w-4/6">
                    <button class="hidden md:block p-1 outline-none focus:outline-none"><svg
                            class=" w-5 text-gray-600 h-5 cursor-pointer" fill="none" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg></button>
                    <input wire:model="search" type="search" name="searchCategories" id="searchCategories"
                        placeholder="Buscar por nombre, categorias, descripcion, etc..."
                        class="w-full pl-4 text-sm outline-none focus:outline-none bg-transparent border-gray-300">
                </div>
                <div class="flex w-full md:w-1/6">

                    <select name="status" id="status"
                        class="w-full text-sm outline-none focus:outline-none bg-transparent border-gray-300">
                        <option value="0" selected>{{ __('Active') }}</option>
                        <option value="1">{{ __('Desactive') }}</option>
                        <option value="2">{{ __('All') }}</option>
                    </select>
                </div>
                <div class="flex w-full md:w-1/6">
                    <select wire:model="perPage" name="imagen_type" id="imagen_type"
                        class="w-full text-sm outline-none focus:outline-none bg-transparent border-gray-300 rounded-r-md">
                        <option value="5">5 por pagina</option>
                        <option value="10">10 por pagina</option>
                        <option value="25">25 por pagina</option>
                        <option value="50">50 por pagina</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1">
        <div class="p-6">
            <div class="flex items-center">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400">
                    <path
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                    </path>
                </svg>
                <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a
                        href="https://laravel.com/docs">Category</a></div>
            </div>

            <div class="ml-12">
                <div class="mt-2 text-sm text-gray-500">
                    description
                </div>

                <a href="https://laravel.com/docs">
                    <div class="mt-3 flex items-center text-sm font-semibold text-yellow-700">
                        <div>{{ __('Show') }}</div>

                        <div class="ml-1 text-yellow-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </div>
                    </div>
                </a>

            </div>
        </div>
    </div>
</div>
