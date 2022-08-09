<div>
    <section>
        <header class="space-y-4 bg-white p-4 sm:px-8 sm:py-6 lg:p-4 xl:px-8 xl:py-6">
            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-gray-900">{{ __('Sales') }}</h2>

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
                            {{-- <svg width="20" height="20" fill="currentColor" class="mr-2" aria-hidden="true">
                                <path
                                    d="M10 5a1 1 0 0 1 1 1v3h3a1 1 0 1 1 0 2h-3v3a1 1 0 1 1-2 0v-3H6a1 1 0 1 1 0-2h3V6a1 1 0 0 1 1-1Z" />
                            </svg> --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="mx-2"
                                aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>

                        </a>
                        {{-- <x-jet-secondary-button type="button" wire:click="filterDate">Buscar</x-jet-secondary-button> --}}
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
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-4 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full text-center">
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
                                                            {{-- <div class="text-sm text-gray-500">
                                                        {{ $product->code }}
                                                    </div> --}}
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
                                                <a href="{{route('reports.pdf' , $item->id)}}" target="_blank" class="cursor-pointer" wire:click="download"><svg xmlns="http://www.w3.org/2000/svg"
                                                        class="h-6 w-6 text-cyan-600" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor" stroke-width="2">
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
        {{ $sales->links() }}
    </section>
</div>
