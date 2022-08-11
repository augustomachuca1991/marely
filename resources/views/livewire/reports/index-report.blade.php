<div>

    <section>
        <header class="space-y-4 bg-white p-4 sm:px-8 sm:py-6 lg:p-4 xl:px-8 xl:py-6">
            <h2 class="font-semibold text-gray-900">{{ __('Sales') }}</h2>
            {{-- <div class="flex items-center justify-between">

                <div class="grid grid-cols-2 justify-items-end gap-2">
                    <div class="flex">
                        <div>
                            <x-jet-input wire:model="from" type="date" max="{{ now()->format('Y-m-d') }}" name="from"
                                id="form"></x-jet-input>
                            <x-jet-input-error for="from" />
                        </div>
                        <div>
                            <x-jet-input wire:model="to" type="date" max="{{ now()->format('Y-m-d') }}"
                                name="to" id="to"></x-jet-input>
                            <x-jet-input-error for="to" />

                        </div>
                        <a wire:click="filterDate"
                            class="group flex cursor-pointer items-center rounded-md bg-red-500 p-1 text-sm font-medium text-white shadow-sm hover:bg-red-400">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="mx-2"
                                aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>

                        </a>
                       
                    </div>
                    <div><select wire:model="perUser"
                            class="form-select rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            name="user" id="user">
                            <option value="" selected disabled>{{ __('by user') }}</option>
                            @foreach (App\Models\User::all() as $item)
                                <option class="capitalize" value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select></div>
                </div>
            </div> --}}

            <div class="container mx-auto">
                <div class="grid grid-rows-1 gap-2 lg:grid-cols-2 lg:justify-items-end">

                    <div x-data="{
                        open: @entangle('selectUser'),
                        toggle() {
                            this.open = this.open ? this.close() : true
                        },
                        close() {
                            this.open = false
                        }
                    }">
                        <label id="listbox-label" class="block text-sm font-medium text-gray-700"> Filter By User
                        </label>
                        <div class="relative">
                            <button type="button" @click="toggle()"
                                class="relative w-full cursor-default rounded-md border border-gray-300 bg-white py-2 pl-3 pr-10 text-left shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm"
                                aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label">
                                <span wire:model="user" class="flex items-center">
                                    <img src="{{ $user ? $user->profile_photo_url : 'https://ui-avatars.com/api/?name=SelectedUser&color=7F9CF5&background=EBF4FF' }}"
                                        alt="" class="h-6 w-6 flex-shrink-0 rounded-full">
                                    <span class="ml-3 block truncate capitalize">
                                        {{ $user ? $user->name : 'Seleccione Vendedor' }}
                                    </span>
                                </span>
                                <span
                                    class="pointer-events-none absolute inset-y-0 right-0 ml-3 flex items-center pr-2">
                                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </span>
                            </button>
                            <ul x-show="open" @click.outside="close()" style="display: none"
                                class="absolute z-10 mt-1 max-h-56 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
                                tabindex="-1" role="listbox" aria-labelledby="listbox-label"
                                aria-activedescendant="listbox-option-3">
                                @foreach (App\Models\User::all() as $item)
                                    <li wire:click="selectedUser({{ $item }})"
                                        class="relative cursor-default select-none py-2 pl-3 pr-9 text-gray-900"
                                        id="listbox-option-0" role="option">
                                        <div class="flex items-center">
                                            <img src="{{ $item->profile_photo_url }}" alt="{{ $item->name }}"
                                                class="h-6 w-6 flex-shrink-0 rounded-full">
                                            <!-- Selected: "font-semibold", Not Selected: "font-normal" -->
                                            <span class="ml-3 block truncate font-normal capitalize">
                                                {{ $item->name }}
                                            </span>
                                        </div>
                                        @if ($user && $user->id == $item->id)
                                            <span
                                                class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600">
                                                <!-- Heroicon name: solid/check -->
                                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </span>
                                        @endif

                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div>


                        <div class="flex items-stretch space-x-1 lg:justify-end">

                            <div class="w-48 flex-initial">
                                <label id="listbox-label" class="block text-sm font-medium text-gray-700"> From Date
                                </label>
                                <x-jet-input wire:model="from" type="date" max="{{ now()->format('Y-m-d') }}"
                                    class="{{ $errors->has('from') ? 'border rounded-md border-red-500' : '' }} w-full" />
                                <x-jet-input-error for="from" />
                            </div>

                            <div class="w-48 flex-initial">
                                <label id="listbox-label" class="block text-sm font-medium text-gray-700"> To Date
                                </label>
                                <x-jet-input wire:model="to" type="date" max="{{ now()->format('Y-m-d') }}"
                                    class="{{ $errors->has('to') ? 'border rounded-md border-red-500' : '' }} w-full" />
                                <x-jet-input-error for="to" />
                            </div>
                            <div
                                class="{{ $errors->has('to') || $errors->has('from') ? 'self-center' : 'self-end mb-1' }} flex-none">
                                <x-jet-danger-button wire:click="filterDate">buscar</x-jet-danger-button>
                            </div>
                        </div>


                        {{-- <x-jet-danger-button wire:click="filterDate">buscar</x-jet-danger-button> --}}
                        {{-- <x-jet-input-error for="to" />
                        <x-jet-input-error for="from" /> --}}
                    </div>
                </div>
            </div>
            <form class="group relative">
                <svg width="20" height="20" fill="currentColor"
                    class="pointer-events-none absolute left-3 top-1/2 -mt-2.5 text-gray-400 group-focus-within:text-blue-500"
                    aria-hidden="true">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
                </svg>
                <input wire:model="search"
                    class="w-full appearance-none rounded-md py-2 pl-10 text-sm leading-6 text-gray-900 placeholder-gray-400 shadow-sm ring-1 ring-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    type="text" aria-label="Filter sales" placeholder="Filter sales...">
            </form>
        </header>
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">

                        @if ($sales->count())
                            <table class="table-auto min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th scope="col"
                                            class="bg-gray-50 px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                            #
                                        </th>
                                        <th scope="col"
                                            class="bg-gray-50 px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                            {{ __('Saller') }}
                                        </th>
                                        <th scope="col"
                                            class="bg-gray-50 px-6 py-3 text-right text-xs font-medium uppercase tracking-wider text-gray-500">
                                            {{ __('Articles') }}
                                        </th>
                                        <th scope="col"
                                            class="bg-gray-50 px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                            {{ __('Date') }}
                                        </th>
                                        <th scope="col"
                                            class="bg-gray-50 px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                            {{ __('Total') }}
                                        </th>

                                        <th scope="col" class="bg-gray-50 px-6 py-3">
                                            <span class="sr-only">{{ __('Actions') }}</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    @foreach ($sales as $index => $item)
                                        <tr>
                                            <td class="whitespace-nowrap px-6 py-4">
                                                {{ $index + 1 }}

                                            </td>
                                            <td class="whitespace-nowrap px-6 py-4">
                                                <div class="text-sm font-medium text-gray-900 capitalize">
                                                    {{ $item->user->name }}
                                                </div>
                                            </td>
                                            <td class="whitespace-nowrap px-6 py-4">
                                                @foreach ($item->products as $i => $product)
                                                    <div
                                                        class="{{ $i % 2 == 0 ? 'text-gray-900' : 'text-gray-500' }} text-sm">
                                                        <p  class="text-right capitalize">{{ $product->name }}({{ $product->pivot->quantity }}) -
                                                        ${{ $product->pivot->price_to_date }}</p></div>
                                                @endforeach
                                            </td>
                                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                                                {{ $item->created_at->format('d/m/Y h:i:s') }}
                                            </td>
                                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                                                ${{ $item->amount }}
                                            </td>
                                            <td class="whitespace-nowrap px-6 py-4 text-right text-sm font-medium text-green-700 hover:text-green-500">
                                                <a href="{{ route('reports.pdf', $item->id) }}" target="_blank"
                                                    class="cursor-pointer inline-flex">{{__('Print')}}<svg xmlns="http://www.w3.org/2000/svg"
                                                        class="h-6 w-6 " fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                                                    </svg></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <!-- More rows... -->
                                </tbody>
                            </table>
                            <!---paginations-->
                            <div class="border-gray-200 bg-white px-4 py-3 sm:px-6">
                                {{ $sales->links() }}
                            </div>
                        @else
                            <div class="border-gray-200 bg-white px-4 py-3 text-gray-500 sm:px-6">
                                No hay resultado para la búsqueda
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-4 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full text-center table-auto">
                            <thead class="border-b bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-4 text-sm font-medium text-gray-900">
                                        #
                                    </th>
                                    <th scope="col" class="px-6 py-4 text-sm font-medium text-gray-900">
                                        {{ __('Saller') }}
                                    </th>
                                    <th scope="col" class="px-6 py-4 text-sm font-medium text-gray-900">
                                        {{ __('Articles') }}
                                    </th>
                                    <th scope="col" class="px-6 py-4 text-sm font-medium text-gray-900">
                                        {{ __('Date') }}
                                    </th>
                                    <th scope="col" class="px-6 py-4 text-sm font-medium text-gray-900">
                                        {{ __('Total') }}
                                    </th>
                                    <th scope="col" class="sr-only px-6 py-4 text-sm font-medium text-gray-900">
                                        {{ __('Actions') }}
                                    </th>
                                </tr>
                            </thead class="border-b">
                            <tbody>
                                @if ($sales->count())
                                    @foreach ($sales as $index => $item)
                                        <tr class="border-b bg-white">
                                            <td class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900">
                                                {{ $index + 1 }}</td>
                                            <td
                                                class="whitespace-nowrap px-6 py-4 text-sm font-light capitalize text-gray-900">
                                                {{ $item->user->name }}
                                            </td>
                                            <td class="whitespace-nowrap px-6 py-4 text-sm font-light text-gray-900">
                                                <ul class="w-96 text-gray-900">
                                                    @foreach ($item->products as $product)
                                                        <li class="capitalize">{{ $product->name }}
                                                            ({{ $product->pivot->quantity }})
                                                            -
                                                            ${{ $product->pivot->price_to_date }}
                                                            
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td class="whitespace-nowrap px-6 py-4 text-sm font-light text-gray-900">
                                                {{ $item->created_at->format('d/m/Y h:i:s') }}

                                            </td>
                                            <td class="whitespace-nowrap px-6 py-4 text-sm font-light text-gray-900">
                                                ${{ $item->amount }}
                                            </td>
                                            <td class="whitespace-nowrap px-6 py-4 text-sm font-light text-gray-900">
                                                <a href="{{ route('reports.pdf', $item->id) }}" target="_blank"
                                                    class="cursor-pointer"><svg xmlns="http://www.w3.org/2000/svg"
                                                        class="h-6 w-6 text-cyan-600" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                                                    </svg></a>
                                            </td>
                                        </tr class="border-b bg-white">
                                    @endforeach
                                @else
                                    <tr class="border-b bg-white">
                                        <td colspan="5"
                                            class="whitespace-nowrap px-6 py-4 text-center text-sm font-medium text-gray-900">
                                            {{ __('No Data') }}</td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{ $sales->links() }} --}}
    </section>
</div>
