<div>
    <section class="body-font text-gray-600">
        <div class="container mx-auto px-5 py-12">
            <div class="mb-20 flex w-full flex-col flex-wrap items-center text-center">
                <h1 class="title-font mb-2 text-2xl font-medium text-gray-900 sm:text-3xl">{{ __('Suppliers') }}</h1>
                <p class="w-full leading-relaxed text-gray-500 lg:w-1/2">Whatever cardigan tote bag tumblr hexagon
                    brooklyn asymmetrical gentrify, subway tile poke farm-to-table.</p>
            </div>
            <div class="mb-6">
                <livewire:suppliers.create-supplier></livewire:suppliers.create-supplier>
            </div>
            <div class="-m-4 flex flex-wrap">
                @foreach ($suppliers as $item)
                    <div class="p-4 md:w-1/2 xl:w-1/3">
                        <div
                            class="transform rounded-lg border border-gray-200 p-6 transition-colors duration-300 hover:bg-green-200 dark:text-gray-200 dark:hover:bg-green-500">
                            <div
                                class="mb-4 inline-flex h-10 w-10 items-center justify-center rounded-full bg-green-100 text-green-500">

                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="h-6 w-6">
                                    <path
                                        d="M3.375 4.5C2.339 4.5 1.5 5.34 1.5 6.375V13.5h12V6.375c0-1.036-.84-1.875-1.875-1.875h-8.25zM13.5 15h-12v2.625c0 1.035.84 1.875 1.875 1.875h.375a3 3 0 116 0h3a.75.75 0 00.75-.75V15z" />
                                    <path
                                        d="M8.25 19.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0zM15.75 6.75a.75.75 0 00-.75.75v11.25c0 .087.015.17.042.248a3 3 0 015.958.464c.853-.175 1.522-.935 1.464-1.883a18.659 18.659 0 00-3.732-10.104 1.837 1.837 0 00-1.47-.725H15.75z" />
                                    <path d="M19.5 19.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z" />
                                </svg>

                            </div>
                            <h2 class="title-font mb-2 text-xl font-semibold capitalize text-gray-900">
                                {{ $item->company_name }}</h2>
                            <div class="mt-6 grid grid-rows-1 gap-2">
                                <a href="#" class="flex flex-col items-center rounded-md px-4 py-3 text-gray-700">
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                            clip-rule="evenodd" />
                                    </svg>

                                    <span class="mt-2">{{ $item->location }}</span>
                                </a>

                                <a href="#" class="flex flex-col items-center rounded-md px-4 py-3 text-gray-700">
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path
                                            d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                    </svg>

                                    <span
                                        class="mt-2">{{ $item->phone_number ? '+54-' . $item->phone_number : 'No phone' }}</span>
                                </a>

                                <a href="#" class="flex flex-col items-center rounded-md px-4 py-3 text-gray-700">
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path
                                            d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                    </svg>

                                    <span class="mt-2">bussines@example.com</span>
                                </a>
                            </div>
                            <p class="mt-12 flex space-x-2">
                                <a wire:click="edit({{$item}})" class="text-indigo-600 cursor-pointer">{{__('Edit')}}</a>
                                <a wire:click="confirmDelete({{$item}})" class="text-orange-600 cursor-pointer">{{__('Remove')}}</a>
                            </p>
                        </div>
                    </div>
                @endforeach


            </div>

            @if ($suppliers->count())
                <div>
                    {{ $suppliers->links() }}
                </div>
            @endif
            {{-- <button
                class="mx-auto mt-16 flex rounded border-0 bg-green-500 py-2 px-8 text-lg text-white hover:bg-green-600 focus:outline-none">Button</button> --}}

        </div>
    </section>

    @if ($isOpenEdit)
        <livewire:suppliers.edit-supplier :supplier="$supplier"></livewire:suppliers.edit-supplier>
    @endif
</div>
