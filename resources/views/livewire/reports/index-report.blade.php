<div>
    <!-- Search by User - start -->
    <div class="mb-12">
        <div class="mb-2" x-data="{
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
                    <span class="pointer-events-none absolute inset-y-0 right-0 ml-3 flex items-center pr-2">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor" aria-hidden="true">
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
                                <span class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600">
                                    <!-- Heroicon name: solid/check -->
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        fill="currentColor" aria-hidden="true">
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
            <div class="{{ $errors->has('to') || $errors->has('from') ? 'self-center' : 'self-end mb-1' }} flex-none">
                <x-jet-danger-button wire:click="filterDate">buscar</x-jet-danger-button>
            </div>
        </div>
    </div>
    <!-- Search by User - end -->



    <div class="overflow-hidden bg-white pb-6 shadow-xl sm:rounded-lg sm:pb-8 lg:pb-12">
        <!-- banner - start -->
        <div
            class="ms:px-8 relative flex flex-wrap bg-teal-500 px-4 py-3 sm:flex-nowrap sm:items-center sm:justify-center sm:gap-3 sm:pr-8">
            <div
                class="order-1 mb-2 inline-block w-11/12 max-w-screen-sm text-sm text-white sm:order-none sm:mb-0 sm:w-auto md:text-base">
                Este tabla muestra todas las ventas hechas a traves del sistema</div>

            <a href="#"
                class="order-last inline-block w-full whitespace-nowrap rounded-lg bg-teal-600 px-4 py-2 text-center text-xs font-semibold text-white outline-none ring-indigo-300 transition duration-100 hover:bg-teal-700 focus-visible:ring active:bg-teal-800 sm:order-none sm:w-auto md:text-sm">Learn
                more</a>
        </div>
        <!-- table - start -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead>
                    <tr>
                        <th class="sticky left-0 bg-white p-4 text-left">
                            <label class="sr-only" for="row_all">Select All</label>
                            <input class="h-5 w-5 rounded border-gray-200" type="checkbox" id="row_all" />
                        </th>
                        <th class="whitespace-nowrap p-4 text-left font-medium text-gray-900">
                            <div class="flex items-center">
                                {{ __('Article') }}
                                <svg xmlns="http://www.w3.org/2000/svg" class="ml-1.5 h-4 w-4 text-gray-700"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </th>
                        <th class="whitespace-nowrap p-4 text-left font-medium text-gray-900">
                            <div class="flex items-center">
                                {{ __('Date') }}
                                <svg xmlns="http://www.w3.org/2000/svg" class="ml-1.5 h-4 w-4 text-gray-700"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </th>
                        <th class="whitespace-nowrap p-4 text-left font-medium text-gray-900">
                            <div class="flex items-center">
                                Status
                                <svg xmlns="http://www.w3.org/2000/svg" class="ml-1.5 h-4 w-4 text-gray-700"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </th>
                        <th class="whitespace-nowrap p-4 text-left font-medium text-gray-900">
                            <div class="flex items-center">
                                {{ __('Total') }}
                                <svg xmlns="http://www.w3.org/2000/svg" class="ml-1.5 h-4 w-4 text-gray-700"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </th>
                        <th class="whitespace-nowrap p-4 text-left font-medium text-gray-900">
                            <div class="flex items-center">
                                {{ __('Order Number') }}
                                <svg xmlns="http://www.w3.org/2000/svg" class="ml-1.5 h-4 w-4 text-gray-700"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">
                    @foreach ($sales as $index => $item)
                        <tr>
                            <td class="sticky left-0 bg-white p-4">
                                <label class="sr-only" for="row_1">Row 1</label>
                                <input class="h-5 w-5 rounded border-gray-200" type="checkbox" id="row_1" />
                            </td>
                            <td class="whitespace-nowrap p-4 font-medium text-gray-900">
                                <ul class="text-gray-700">
                                    @foreach ($item->products as $i => $product)
                                        <li>{{ $product->name }}({{ $product->pivot->quantity }})</li>
                                    @endforeach
                                </ul>

                            </td>
                            <td class="whitespace-nowrap p-4 text-gray-700">
                                {{ $item->created_at->format('d/m/Y h:ia') }}</td>
                            <td class="whitespace-nowrap p-4 text-gray-700">
                                <strong class="rounded bg-red-100 px-3 py-1.5 text-xs font-medium text-red-700">
                                    Cancelled
                                </strong>
                                {{-- <strong class="rounded bg-green-100 px-3 py-1.5 text-xs font-medium text-green-700">
                                    Paid
                                </strong>
                                <strong class="rounded bg-amber-100 px-3 py-1.5 text-xs font-medium text-amber-700">
                                    Partially Refunded
                                </strong> --}}
                            </td>
                            <td class="whitespace-nowrap p-4 text-gray-700">${{ $item->amount }}</td>
                            <td class="whitespace-nowrap p-4 text-gray-700">
                                <div
                                    class="flex w-3/4 justify-center divide-x-2 divide-gray-700 rounded bg-slate-800 text-gray-100">
                                    <!--btn - print-->
                                    <div x-data="{ tooltipPrint: false }" class="relative z-30 inline-flex">
                                        <form action="{{ route('reports.pdf', $item->id) }}">
                                            <button type="submit" x-on:mouseover="tooltipPrint = true"
                                                x-on:mouseleave="tooltipPrint = false" type="button"
                                                class="px-3 py-1"><svg xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="currentColor" class="h-6 w-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
                                                </svg>

                                            </button>
                                        </form>

                                        <div class="relative" x-cloak x-show.transition.origin.left="tooltipPrint">
                                            <div
                                                class="absolute top-0 z-10 -mt-1 w-auto -translate-x-full -translate-y-full transform rounded-lg bg-yellow-500 p-2 text-sm leading-tight text-white shadow-lg">
                                                {{ __('Print') }}
                                            </div>
                                            <svg class="absolute z-10 h-6 w-6 -translate-x-12 -translate-y-3 transform fill-current stroke-current text-yellow-500"
                                                width="8" height="8">
                                                <rect x="12" y="-10" width="8" height="8"
                                                    transform="rotate(45)" />
                                            </svg>
                                        </div>
                                    </div>
                                    <!--btn - anular-->
                                    <div x-data="{ tooltipAnular: false }" class="relative z-30 inline-flex">

                                        <button type="submit" x-on:mouseover="tooltipAnular = true"
                                            x-on:mouseleave="tooltipAnular = false" type="button"
                                            class="px-3 py-1"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="h-6 w-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m6 4.125l2.25 2.25m0 0l2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                                            </svg>

                                        </button>

                                        <div class="relative" x-cloak x-show.transition.origin.top="tooltipAnular">
                                            <div
                                                class="absolute top-0 z-10 -mt-1 w-auto -translate-x-full -translate-y-full transform rounded-lg bg-yellow-500 p-2 text-sm leading-tight text-white shadow-lg">
                                                {{ __('Anular') }}
                                            </div>
                                            <svg class="absolute z-10 h-6 w-6 -translate-x-12 -translate-y-3 transform fill-current stroke-current text-yellow-500"
                                                width="8" height="8">
                                                <rect x="12" y="-10" width="8" height="8"
                                                    transform="rotate(45)" />
                                            </svg>
                                        </div>
                                    </div>
                                    <!--btn - rectify-->
                                    <div x-data="{ tooltipRectificar: false }" class="relative z-30 inline-flex">
                                        <button x-on:mouseover="tooltipRectificar = true"
                                            x-on:mouseleave="tooltipRectificar = false" type="button"
                                            class="px-3 py-1"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="h-6 w-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                                            </svg>

                                        </button>
                                        <div class="relative" x-cloak
                                            x-show.transition.origin.top="tooltipRectificar">
                                            <div
                                                class="absolute top-0 z-10 -mt-1 w-auto -translate-x-full -translate-y-full transform rounded-lg bg-yellow-500 p-2 text-sm leading-tight text-white shadow-lg">
                                                {{ __('Rectify') }}
                                            </div>
                                            <svg class="absolute z-10 h-6 w-6 -translate-x-12 -translate-y-3 transform fill-current stroke-current text-yellow-500"
                                                width="8" height="8">
                                                <rect x="12" y="-10" width="8" height="8"
                                                    transform="rotate(45)" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- table - end -->
        <!-- banner - end -->
    </div>
    <!-- paginate - start -->
    @if ($sales->count())
        <div class="mt-2">
            {{ $sales->links() }}
        </div>
    @endif
    <!-- paginate - end -->


</div>
