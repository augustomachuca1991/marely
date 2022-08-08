<div>
    <div
        class="xl:mt-18 relative z-10 my-auto overflow-hidden rounded-xl bg-white shadow-xl ring-1 ring-slate-900/5 dark:bg-slate-800">
        <section>
            <header class="dark:highlight-white/10 space-y-4 rounded-t-xl p-4 sm:px-8 sm:py-6 lg:p-4 xl:px-8 xl:py-6">
                <div class="flex items-center justify-between">
                    <h2 class="font-semibold text-slate-900 dark:text-white">{{__('Suppliers')}}</h2>
                    <livewire:suppliers.create-supplier></livewire:suppliers.create-supplier>
                </div>
                <div
                    class="group dark:highlight-white/10 relative rounded-md dark:bg-slate-700 dark:focus-within:bg-transparent">
                    <svg width="20" height="20" fill="currentColor"
                        class="pointer-events-none absolute left-3 top-1/2 -mt-2.5 text-slate-400 group-focus-within:text-blue-500 dark:text-slate-500">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z">
                        </path>
                    </svg><input type="text" aria-label="Filter projects" placeholder="Filter projects..."
                        class="w-full appearance-none rounded-md bg-transparent py-2 pl-10 text-sm leading-6 text-slate-900 shadow-sm ring-1 ring-slate-200 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:text-slate-100 dark:ring-0 dark:placeholder:text-slate-500 dark:focus:ring-2">
                </div>
            </header>
        </section>
    </div>
    <section tabindex="-1" class="relative mx-auto max-w-7xl px-4 focus:outline-none sm:px-3 md:px-5">
        <h2 class="sr-only">Testimonials</h2>
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 lg:gap-8">
            <ul class="space-y-8">
                <li class="text-sm leading-6">
                    <figure
                        class="dark:highlight-white/5 relative flex flex-col-reverse rounded-lg bg-slate-50 p-6 dark:bg-slate-800">
                        <blockquote class="mt-6 text-slate-700 dark:text-slate-300">
                            <p>I feel like an idiot for not using Tailwind CSS until now.</p>
                        </blockquote>
                        <figcaption class="flex items-center space-x-4"><img src="https://picsum.photos/200/300"
                                alt="" class="h-14 w-14 flex-none rounded-full object-cover" loading="lazy">
                            <div class="flex-auto">
                                <div class="text-base font-semibold text-slate-900 dark:text-slate-300"><a
                                        href="https://twitter.com/ryanflorence/status/1187951799442886656"
                                        tabindex="0"><span class="absolute inset-0"></span>Ryan Florence</a>
                                </div>
                                <div class="mt-0.5">Remix &amp; React Training</div>
                            </div>
                        </figcaption>
                    </figure>
                </li>
            </ul>
            <ul class="hidden space-y-8 sm:block">
                <li class="text-sm leading-6">
                    <figure
                        class="dark:highlight-white/5 relative flex flex-col-reverse rounded-lg bg-slate-50 p-6 dark:bg-slate-800">
                        <blockquote class="mt-6 text-slate-700 dark:text-slate-300">
                            <p>Have been working with CSS for over ten years and Tailwind just makes my life
                                easier. It is still CSS and you use flex, grid, etc. but just quicker to write
                                and maintain.</p>
                        </blockquote>
                        <figcaption class="flex items-center space-x-4"><img src="https://picsum.photos/200/300"
                                alt="" class="h-14 w-14 flex-none rounded-full object-cover" loading="lazy">
                            <div class="flex-auto">
                                <div class="text-base font-semibold text-slate-900 dark:text-slate-300"><a
                                        href="https://twitter.com/debs_obrien/status/1243255468241420288"
                                        tabindex="0"><span class="absolute inset-0"></span>Debbie
                                        O'Brien</a></div>
                                <div class="mt-0.5">Senior Program Manager at Microsoft</div>
                            </div>
                        </figcaption>
                    </figure>
                </li>
            </ul>
            <ul class="hidden space-y-8 lg:block">
                <li class="text-sm leading-6">
                    <figure
                        class="dark:highlight-white/5 relative flex flex-col-reverse rounded-lg bg-slate-50 p-6 dark:bg-slate-800">
                        <blockquote class="mt-6 text-slate-700 dark:text-slate-300">
                            <p>Skip to the end. Use @tailwindcss.</p>
                        </blockquote>
                        <figcaption class="flex items-center space-x-4"><img src="https://picsum.photos/200/300"
                                alt="" class="h-14 w-14 flex-none rounded-full object-cover" loading="lazy">
                            <div class="flex-auto">
                                <div class="text-base font-semibold text-slate-900 dark:text-slate-300"><a
                                        href="https://twitter.com/kentcdodds/status/1468692023158796289"
                                        tabindex="0"><span class="absolute inset-0"></span>Kent C. Dodds</a>
                                </div>
                                <div class="mt-0.5">Developer and Educator</div>
                            </div>
                        </figcaption>
                    </figure>
                </li>

            </ul>
        </div>
        <div
            class="pointer-events-none sticky inset-x-0 bottom-0 -mt-52 flex justify-center bg-gradient-to-t from-white pt-32 pb-8 opacity-0 transition-opacity duration-300 dark:from-slate-900">
            <button type="button"
                class="relative flex h-12 translate-y-4 items-center rounded-lg bg-slate-900 px-6 text-sm font-semibold text-white transition-transform hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-400 focus:ring-offset-2 dark:bg-slate-700 dark:hover:bg-slate-600">Okay,
                I get the point</button>
        </div>
    </section>
</div>
