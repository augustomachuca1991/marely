<div class="bg-white shadow-lg p-12">
    <section>
        <header class="bg-white space-y-4 p-4 sm:px-8 sm:py-6 lg:p-4 xl:px-8 xl:py-6">
            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-gray-900">{{ __('Sales') }}</h2>
                <a wire:click="$emitTo('audits.index-audit' , 'close')"
                    class="hover:bg-red-400 cursor-pointer group flex items-center rounded-md bg-red-500 text-white text-sm font-medium p-1 shadow-sm">
                    <svg width="20" height="20" fill="currentColor" class="mr-2" aria-hidden="true">
                        <path
                            d="M10 5a1 1 0 0 1 1 1v3h3a1 1 0 1 1 0 2h-3v3a1 1 0 1 1-2 0v-3H6a1 1 0 1 1 0-2h3V6a1 1 0 0 1 1-1Z" />
                    </svg>

                </a>
            </div>
            <form class="group relative">
                <svg width="20" height="20" fill="currentColor"
                    class="absolute left-3 top-1/2 -mt-2.5 text-gray-400 pointer-events-none group-focus-within:text-blue-500"
                    aria-hidden="true">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
                </svg>
                <input
                    class="focus:ring-2 focus:ring-blue-500 focus:outline-none appearance-none w-full text-sm leading-6 text-gray-900 placeholder-gray-400 rounded-md py-2 pl-10 ring-1 ring-gray-200 shadow-sm"
                    type="text" aria-label="Filter sales" placeholder="Filter sales...">
            </form>
        </header>
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full text-center">
                            <thead class="border-b bg-gray-50">
                                <tr>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                        #
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                        {{__('Saller')}}
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                        {{__('Articles')}}
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                        {{__('Date')}}
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                        {{__('Total')}}
                                    </th>
                                </tr>
                            </thead class="border-b">
                            <tbody>
                                @foreach ($sales as $index => $item)
                                    <tr class="bg-white border-b">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $index + 1 }}</td>
                                        <td
                                            class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap capitalize">
                                            {{ $item->user->name }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <ul class="w-96 text-gray-900">
                                                @foreach ($item->products as $product)
                                                    <li class="capitalize">{{ $product->name }} ({{$product->pivot->quantity}}) - ${{$product->pivot->price_to_date}}
                                                        {{-- <div class="text-sm text-gray-500">
                                                            {{ $product->code }}
                                                        </div> --}}
                                                    </li>
                                                @endforeach
                                            </ul>

                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $item->created_at->format('d/m/Y h:i:s') }}

                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            ${{ $item->amount }}
                                        </td>
                                    </tr class="bg-white border-b">
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
