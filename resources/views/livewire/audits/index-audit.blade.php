<div>
    <div class="mx-auto px-4 py-16 sm:max-w-xl md:max-w-full md:px-24 lg:max-w-screen-xl lg:px-8 lg:py-20">
        <div class="mb-10 max-w-xl sm:text-center md:mx-auto md:mb-12 lg:max-w-2xl">
            <div>
                <p
                    class="bg-teal-400 mb-4 inline-block rounded-full px-3 py-px text-xs font-semibold uppercase tracking-wider text-teal-900">
                    Brand new
                </p>
            </div>
            <h2
                class="mb-6 max-w-lg font-sans text-3xl font-bold leading-none tracking-tight text-gray-900 sm:text-4xl md:mx-auto">
                <span class="relative inline-block">
                    <svg viewBox="0 0 52 24" fill="currentColor"
                        class="text-blue-gray-100 absolute top-0 left-0 z-0 -mt-8 -ml-20 hidden w-32 sm:block lg:-ml-28 lg:-mt-10 lg:w-32">
                        <defs>
                            <pattern id="d5589eeb-3fca-4f01-ac3e-983224745704" x="0" y="0"
                                width=".135" height=".30">
                                <circle cx="1" cy="1" r=".7"></circle>
                            </pattern>
                        </defs>
                        <rect fill="url(#d5589eeb-3fca-4f01-ac3e-983224745704)" width="52" height="24"></rect>
                    </svg>
                    <span class="relative">Balances</span>
                </span>
                historicos, de ventas y compras
            </h2>
            <p class="text-base text-gray-700 md:text-lg">
                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque rem aperiam, eaque
                ipsa quae.
            </p>
        </div>
        <div
            class="group relative mx-auto mb-4 w-full overflow-hidden rounded border p-px transition-shadow duration-300 hover:shadow-xl lg:mb-8 lg:max-w-4xl">
            <div
                class="bg-purple-400 absolute bottom-0 left-0 h-1 w-full origin-left scale-x-0 transform duration-300 group-hover:scale-x-100">
            </div>
            <div
                class="bg-purple-400 absolute bottom-0 left-0 h-full w-1 origin-bottom scale-y-0 transform duration-300 group-hover:scale-y-100">
            </div>
            <div
                class="bg-purple-400 absolute top-0 left-0 h-1 w-full origin-right scale-x-0 transform duration-300 group-hover:scale-x-100">
            </div>
            <div
                class="bg-purple-400 absolute bottom-0 right-0 h-full w-1 origin-top scale-y-0 transform duration-300 group-hover:scale-y-100">
            </div>
            <div
                class="transition-color relative flex h-full flex-col items-center rounded-sm bg-white py-10 duration-300 sm:flex-row sm:items-stretch">
                <div class="px-12 py-8 text-center">
                    <h6 class="text-4xl font-bold text-red-700 sm:text-5xl">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                            <path d="M11 8.414V18h2V8.414l4.293 4.293 1.414-1.414L12 4.586l-6.707 6.707 1.414 1.414z">
                            </path>
                        </svg> ${{ number_format($out, 2, ',', '.') }}
                    </h6>
                    <p class="text-center md:text-base">
                        Balance total historico invertido hasta el día de la fecha
                    </p>
                </div>
                <div
                    class="group-hover:bg-purple-400 h-1 w-56 transform rounded-full bg-gray-300 transition duration-300 group-hover:scale-110 sm:h-auto sm:w-1">
                </div>
                <div class="px-12 py-8 text-center">
                    <h6 class="text-4xl font-bold text-green-700 sm:text-5xl">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                            <path
                                d="m18.707 12.707-1.414-1.414L13 15.586V6h-2v9.586l-4.293-4.293-1.414 1.414L12 19.414z">
                            </path>
                        </svg>${{ number_format($in, 2, ',', '.') }}
                    </h6>
                    <p class="text-center md:text-base">
                        Balance total historico generado hasta el día de la fecha
                    </p>
                </div>
            </div>
        </div>
        <p class="mx-auto mb-4 text-gray-600 sm:text-center md:px-16 lg:mb-6 lg:max-w-2xl">
            El balance historico tiene {{ $balance > 0 ? 'un deficit' : 'una ganancia' }} de
            ${{ number_format(abs($balance), 2, '.', ',') }} pesos argentinos
        </p>
    </div>

</div>
