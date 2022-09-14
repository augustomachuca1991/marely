<div>
    <div class="mb-10 md:mb-16">
        <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">{{ __('Sales Order') }}
        </h2>

        <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">Esta sección corresponde al histórico de
            ventas realizadas por medio del sitio. Reporta vendedor, artículos, el estado de ventas entre otras cosas.
            También permite imprimir la orden de venta realizada</p>
    </div>




    <livewire:components.select-user></livewire:components.select-user>
    <livewire:components.select-period></livewire:components.select-period>
    {{-- <div class="flex w-7/12 space-x-1">
                <div>
                    <fieldset class="w-full space-y-1 text-gray-800">
                        <label for="from" class="block text-sm font-medium">{{ __('From') }}</label>
                        <div class="flex">
                            <input wire:model="from" type="date" name="from" id="from"
                                class="flex flex-1 rounded-l-md border border-gray-300 text-right text-gray-800 focus:ring-inset focus:ring-green-600 sm:text-sm">
                            <span
                                class="pointer-events-none flex items-center rounded-r-md bg-gray-300 px-3 sm:text-sm"><svg
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="h-6 w-6">
                                    <path
                                        d="M12.75 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM7.5 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM8.25 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM9.75 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM10.5 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM12.75 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM14.25 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM15 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM16.5 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM15 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM16.5 13.5a.75.75 0 100-1.5.75.75 0 000 1.5z" />
                                    <path fill-rule="evenodd"
                                        d="M6.75 2.25A.75.75 0 017.5 3v1.5h9V3A.75.75 0 0118 3v1.5h.75a3 3 0 013 3v11.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3V7.5a3 3 0 013-3H6V3a.75.75 0 01.75-.75zm13.5 9a1.5 1.5 0 00-1.5-1.5H5.25a1.5 1.5 0 00-1.5 1.5v7.5a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5v-7.5z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </div>
                        <x-jet-input-error for="from" />
                    </fieldset>

                </div>
                <div>
                    <fieldset class="w-full space-y-1 text-gray-800">
                        <label for="to" class="block text-sm font-medium">{{ __('To') }}</label>
                        <div class="flex">
                            <input wire:model="to" type="date" name="to" id="to"
                                class="flex flex-1 rounded-l-md border border-gray-300 text-right text-gray-800 focus:ring-inset focus:ring-green-600 sm:text-sm">
                            <span
                                class="pointer-events-none flex items-center rounded-r-md bg-gray-300 px-3 sm:text-sm"><svg
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="h-6 w-6">
                                    <path
                                        d="M12.75 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM7.5 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM8.25 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM9.75 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM10.5 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM12.75 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM14.25 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM15 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM16.5 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM15 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM16.5 13.5a.75.75 0 100-1.5.75.75 0 000 1.5z" />
                                    <path fill-rule="evenodd"
                                        d="M6.75 2.25A.75.75 0 017.5 3v1.5h9V3A.75.75 0 0118 3v1.5h.75a3 3 0 013 3v11.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3V7.5a3 3 0 013-3H6V3a.75.75 0 01.75-.75zm13.5 9a1.5 1.5 0 00-1.5-1.5H5.25a1.5 1.5 0 00-1.5 1.5v7.5a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5v-7.5z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </div>
                        <x-jet-input-error for="to" />
                    </fieldset>
                </div>
                <div class="{{ $errors->has('to') || $errors->has('from') ? 'self-center' : 'self-end' }}">
                    <x-jet-secondary-button wire:click="filterDate">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                            <path fill-rule="evenodd"
                                d="M10.5 3.75a6.75 6.75 0 100 13.5 6.75 6.75 0 000-13.5zM2.25 10.5a8.25 8.25 0 1114.59 5.28l4.69 4.69a.75.75 0 11-1.06 1.06l-4.69-4.69A8.25 8.25 0 012.25 10.5z"
                                clip-rule="evenodd" />
                        </svg>
                    </x-jet-secondary-button>
                </div>
            </div> --}}






    <div class="overflow-hidden bg-white pb-6 shadow-xl sm:rounded-lg sm:pb-8 lg:pb-12">
        <!-- banner - start -->
        <div
            class="ms:px-8 relative flex flex-wrap bg-teal-500 px-4 py-3 sm:flex-nowrap sm:items-center sm:justify-center sm:gap-3 sm:pr-8">
            <div
                class="order-1 mb-2 inline-block w-11/12 max-w-screen-sm text-sm text-white sm:order-none sm:mb-0 sm:w-auto md:text-base">
                Este tabla muestra todas las ventas hechas a traves del sistema</div>
        </div>
        <!-- table - start -->
        <div class="overflow-x-auto">
            @if ($sales->count())
                <table class="min-w-full divide-y divide-gray-200 text-sm">
                    <thead>
                        <tr>

                            <th class="whitespace-nowrap p-4 text-left font-medium text-gray-900">
                                <div class="flex items-center">
                                    {{ __('Saller') }}
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
                                    {{ __('Status') }}
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
                                <div class="sr-only flex items-center">
                                    {{ __('Actions') }}
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

                                <td class="whitespace-nowrap p-4 text-gray-700">
                                    <p class="capitalize">{{ $item->user->name }}</p>
                                    <p class="text-xs text-gray-500">{{ $item->created_at->format('d/m/Y h:ia') }}</p>
                                </td>
                                <td class="whitespace-nowrap p-4 font-medium text-gray-900">
                                    <ul class="text-gray-700">
                                        @foreach ($item->products as $i => $product)
                                            <li>{{ $product->name }} x{{ $product->pivot->quantity }}</li>
                                        @endforeach
                                    </ul>

                                </td>
                                <td class="whitespace-nowrap p-4 text-gray-700">
                                    <strong
                                        class="{{ $item->deleted_at ? 'text-red-700 bg-red-100' : 'text-green-700 bg-green-100' }} rounded px-3 py-1.5 text-xs font-medium">
                                        {{ $item->deleted_at ? __('Cancelled') : __('Paid') }}
                                    </strong>
                                </td>
                                <td class="whitespace-nowrap p-4 text-gray-700">
                                    {{ $item->deleted_at ? '$ 0.00' : '$ ' . $item->amount }}
                                </td>
                                <td class="whitespace-nowrap p-4 text-gray-700">
                                    @if (!$item->deleted_at)
                                        <div class="space-y-2 lg:-mx-1 lg:flex lg:space-y-0">
                                            <a href="{{ route('reports.pdf', $item->id) }}" target="_blank"
                                                class="flex w-full transform items-center justify-center rounded-md bg-slate-600 px-2 py-1 text-white transition-colors duration-200 hover:bg-slate-500 focus:bg-slate-500 focus:outline-none focus:ring focus:ring-slate-300 focus:ring-opacity-40 sm:mx-1 sm:w-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="mx-1 h-5 w-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
                                                </svg>

                                                <span class="mx-1">
                                                    {{ __('Print') }}
                                                </span>
                                            </a>

                                            <button wire:click="confirmRevert({{ $item }})"
                                                class="flex w-full transform items-center justify-center rounded-md bg-orange-600 px-2 py-1 text-white transition-colors duration-200 hover:bg-orange-500 focus:bg-orange-500 focus:outline-none focus:ring focus:ring-orange-300 focus:ring-opacity-40 sm:mx-1 sm:w-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="mx-1 h-5 w-5">
                                                    <path fill-rule="evenodd"
                                                        d="M9.53 2.47a.75.75 0 010 1.06L4.81 8.25H15a6.75 6.75 0 010 13.5h-3a.75.75 0 010-1.5h3a5.25 5.25 0 100-10.5H4.81l4.72 4.72a.75.75 0 11-1.06 1.06l-6-6a.75.75 0 010-1.06l6-6a.75.75 0 011.06 0z"
                                                        clip-rule="evenodd" />
                                                </svg>


                                                <span class="mx-1">
                                                    {{ __('Revert') }}
                                                </span>
                                            </button>

                                            <button
                                                class="flex w-full transform items-center justify-center rounded-md bg-yellow-600 px-2 py-1 text-slate-900 transition-colors duration-200 hover:bg-yellow-500 hover:text-slate-700 focus:bg-yellow-500 focus:outline-none focus:ring focus:ring-yellow-300 focus:ring-opacity-40 sm:mx-1 sm:w-auto">

                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="mx-1 h-5 w-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                                </svg>

                                                <span class="mx-1">
                                                    {{ __('Rectify') }}
                                                </span>
                                            </button>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="mt-6 w-full">
                    <p class="text-center text-gray-500"><strong>{{ __('No Data') }}</strong></p>
                </div>
            @endif
        </div>
        <!-- table - end -->
    </div>


    <div class="bg-gray-200 dark:bg-gray-800">
        <div class="container mx-auto flex items-center overflow-y-auto whitespace-nowrap px-6 py-4">
            <a href="#" class="text-gray-600 dark:text-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path
                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                </svg>
            </a>

            <span class="mx-5 text-gray-500 rtl:-scale-x-100 dark:text-gray-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd" />
                </svg>
            </span>

            <a href="#" class="text-gray-600 hover:underline dark:text-gray-200">
                Account
            </a>

            <span class="mx-5 text-gray-500 rtl:-scale-x-100 dark:text-gray-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd" />
                </svg>
            </span>

            <a href="#" class="text-gray-600 hover:underline dark:text-gray-200">
                Profile
            </a>

            <span class="mx-5 text-gray-500 rtl:-scale-x-100 dark:text-gray-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd" />
                </svg>
            </span>

            <a href="#" class="text-blue-600 hover:underline dark:text-blue-400">
                Settings
            </a>
        </div>
    </div>

    <!-- paginate - start -->
    @if ($sales->count())
        <div class="mt-2">
            {{ $sales->links() }}
        </div>
    @endif


</div>
