<div>
    <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
        <!-- text - start -->
        <div class="mb-10 md:mb-16">
            <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">{{ __('Purchase Order') }}
            </h2>

            <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">This is a section of some simple
                filler text, also known as placeholder text. It shares some characteristics of a real written text
                but is random or otherwise generated.</p>
        </div>
        <section class="rounded-xl shadow-xl ring-1 ring-slate-900/5">
            <header class="space-y-4 rounded-t-xl bg-slate-700 p-4 sm:px-8 sm:py-6 lg:p-4 xl:px-8 xl:py-6">
                <div class="flex items-center justify-between">
                    <h2 class="font-semibold text-gray-100">Remitos</h2>
                </div>
                <form class="group relative">
                    <svg width="20" height="20" fill="currentColor"
                        class="pointer-events-none absolute left-3 top-1/2 -mt-2.5 text-slate-100 group-focus-within:text-sky-300"
                        aria-hidden="true">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
                    </svg>
                    <input wire:model="search"
                        class="w-full appearance-none rounded-md bg-slate-600 py-2 pl-10 text-sm leading-6 text-gray-50 placeholder-slate-400 shadow-sm ring-1 ring-slate-200 focus:border-sky-400 focus:bg-gray-700 focus:outline-none focus:ring-2"
                        type="text" aria-label="Filter referrrals" placeholder="Filter referrrals...">
                </form>
            </header>
            <div
                class="grid grid-cols-1 gap-4 bg-slate-50 p-4 text-sm leading-6 sm:grid-cols-2 sm:px-8 sm:pt-6 sm:pb-8 lg:grid-cols-1 lg:p-4 xl:grid-cols-2 xl:px-8 xl:pt-6 xl:pb-8">

                <livewire:referrals.create-referral></livewire:referrals.create-referral>
                @foreach ($referrals as $item)
                    <a wire:click="show({{ $item }})"
                        class="group cursor-pointer rounded-md bg-gray-100 p-3 shadow-sm ring-1 ring-slate-200 hover:bg-sky-600 hover:shadow-md hover:ring-sky-600">
                        <dl class="grid grid-cols-2 grid-rows-2 items-center sm:block lg:grid xl:block">
                            <div>
                                <dt class="sr-only">{{ __('Company Name') }}</dt>
                                <div class="font-semibold capitalize text-slate-900 group-hover:text-white">
                                    {{ $item->supplier->company_name }} -
                                    <span
                                        class="text-sm text-gray-600 group-hover:text-white">{{ $item->created_at->format('d/m/Y H:ia') }}</span>
                                </div>
                            </div>
                            <div>
                                <dt class="sr-only">{{ __('Location') }}</dt>
                                <div class="group-hover:text-sky-200">{{ $item->supplier->location }}</div>
                            </div>

                            <div>
                                <dt class="sr-only">{{ __('Phone Number') }}</dt>
                                <div class="group-hover:text-sky-100">{{ $item->supplier->phone_number }}</div>
                            </div>
                            <div class="col-start-2 row-start-1 row-end-3 sm:mt-4 lg:mt-0 xl:mt-4">
                                <dt class="sr-only">Users</dt>
                                <div class="flex flex-col items-center justify-center">
                                    <div class="flex -space-x-4">
                                        @foreach ($item->products as $index => $product)
                                            @if ($index < 4)
                                                <img alt="{{ $product->name }}"
                                                    class="h-12 w-12 rounded-full border border-gray-300 bg-gray-500"
                                                    src="{{ $product->profile_photo_url }}">
                                            @endif
                                        @endforeach
                                        @if ($item->products->count() > 4)
                                            <span
                                                class="flex h-12 w-12 items-center justify-center rounded-full border border-gray-300 bg-gray-50 font-semibold text-gray-800">+{{ ($item->products->count()  - 4
                                                )}}</span>
                                        @endif


                                    </div>
                                </div>
                                {{-- @foreach ($item->products as $product)
                                    <div
                                        class="inline-flex justify-end -space-x-1.5 sm:justify-start lg:justify-end xl:justify-start">
                                        <img src="{{ $product->profile_photo_url }}" alt="{{ $product->name }}"
                                            class="h-6 w-6 rounded-full bg-slate-100 ring-2 ring-white" loading="lazy">
                                    </div>
                                @endforeach --}}

                            </div>
                        </dl>
                    </a>
                @endforeach


            </div>
            @if ($referrals->count())
                {{ $referrals->links() }}
            @endif
        </section>
    </div>
    @if ($isOpenShow)
        <livewire:referrals.show-referral :referral="$referral"></livewire:referrals.show-referral>
    @endif

    @if ($isOpenEdit)
        <livewire:referrals.edit-referral :referral="$referral"></livewire:referrals.edit-referral>
    @endif
</div>
