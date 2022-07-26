<div>
    <div class="bg-white shadow-lg overflow-hidden sm:rounded-lg flex flex-col md:flex-row items-center w-6/6 p-3 space-y-1 md:space-y-0">
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

            <select name="status" id="status"
                class="w-full text-sm outline-none focus:outline-none bg-transparent border-gray-300">
                <option value="">{{__('Active')}}</option>
                <option value="">{{__('Inactive')}}</option>
                <option value="">{{__('All')}}</option>
            </select>
        </div>
        <div class="flex w-full md:w-1/6">

            <select name="supplier" id="supplier"
                class="w-full text-sm outline-none focus:outline-none bg-transparent border-gray-300">
                <option value="">{{__('Supliers')}}</option>
            </select>
        </div>
        <div class="flex w-full md:w-1/6">
            <select wire:model="byCategory" name="imagen_type" id="imagen_type"
                class="w-full text-sm outline-none focus:outline-none bg-transparent border-gray-300 rounded-r-md">
                <option value="">{{__('All Categories')}}</option>
                @foreach (\App\Models\Category::all() as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="mt-3">
        <livewire:products.create-product></livewire:products.create-product>
    </div>
    <div class="mt-10 bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <ul class="divide-y divide-slate-100">
            @foreach ($products as $item)
            <article class="flex items-start space-x-6 p-6">
                    <img src="{{$item->profile_photo_url}}" alt="avatar" width="60" height="88"
                    class="flex-none rounded-md bg-gray-100" />
                <div class="min-w-0 relative flex-auto">
                    <h2 class="font-semibold text-gray-900 pr-20">{{$item->code}} - {{$item->name}}</h2>
                    <dl class="mt-2 flex flex-wrap text-sm leading-6 font-medium">
                        <div class="absolute top-0 right-0 flex items-center space-x-1 text-lg">
                            <dt class="text-green-500">
                                <span class="sr-only">{{__('price')}}</span>
                                $
                            </dt>
                            <dd>{{$item->sale_price}}</dd>
                        </div>
                        <div>
                            <dt class="sr-only">category</dt>
                            <dd class="px-1.5 ring-1 ring-gray-200 rounded bg-yellow-200<">{{$item->category->name}}</dd>
                        </div>
                        <div class="ml-2">
                            <dt class="sr-only">price</dt>
                            <dd>${{$item->sale_price}}</dd>
                        </div>
                        <div>
                            <dt class="sr-only">{{__('supplier')}}</dt>
                            <dd class="flex items-center">
                                <svg width="2" height="2" fill="currentColor" class="mx-2 text-gray-300"
                                    aria-hidden="true">
                                    <circle cx="1" cy="1" r="1" />
                                </svg>
                                @if (!$item->deleted_at)
                                    {{__('active')}}
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
                                stock {{$item->stock}}
                            </dd>
                        </div>
                        <div class="flex-none w-full mt-2 font-normal">
                            <dt class="sr-only">{{__('description')}}</dt>
                            <dd class="text-gray-500">{{$item->description}}</dd>
                        </div>
                        <div class="flex-none w-full mt-2 font-normal">
                            <dt class="sr-only">{{__('description')}}</dt>
                            <dd class="flex">
                                <a href="#" class="ml-2 ">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-sky-600 hover:text-sky-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>
                                <a href="#"  wire:click="edit({{$item}})"class="ml-2 ">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-600 hover:text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                                <a href="#" class="ml-2 ">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600 hover:text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </a>
                            </dd>
                        </div>
                    </dl>
                </div>
            </article>
            @endforeach
        </ul>
    </div>


    @if ($isOpenEdit)
        <livewire:products.edit-product  :product="$product"></livewire:products.edit-product>
    @endif
</div>
