<div>
    <div  class="relative z-10"
        aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                <div class="min- flex items-end justify-center px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                    <div class="bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                    <span class="sm: hidden sm:inline-block sm:align-middle" aria-hidden="true">​</span>
                    <div
                        class="inline-block transform overflow-hidden rounded-lg bg-white p-5 text-left align-bottom shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-xl sm:align-middle lg:p-16">
                        <form action="" x-on:submit.prevent="$wire.update()">
                            <section>
                                <h2 class="text-center text-3xl font-semibold text-gray-800 dark:text-white">
                                    {{ __('New Supplier') }}
                                </h2>
                                <p class="mt-3 text-center text-gray-600 dark:text-gray-400">
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                                </p>
                                <div class="mt-6">
                                    <div class="-mx-2 items-center md:flex">
                                        <div class="mx-2 w-full">
                                            <label
                                                class="mb-2 block text-sm font-medium text-gray-600 dark:text-gray-200">{{ __('Company Name') }}</label>

                                            <input wire:model.defer="supplier.company_name"
                                                class="block w-full rounded-md border bg-white px-4 py-2 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-blue-300"
                                                type="text">
                                            <x-jet-input-error for="supplier.company_name" />
                                        </div>

                                        <div class="mx-2 mt-4 w-full md:mt-0">
                                            <label
                                                class="mb-2 block text-sm font-medium text-gray-600 dark:text-gray-200">{{ __('Phone Number') }}</label>

                                            <input wire:model.defer="supplier.phone_number"
                                                class="block w-full rounded-md border bg-white px-4 py-2 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-blue-300"
                                                type="text">
                                            <x-jet-input-error for="supplier.phone_number" />
                                        </div>
                                    </div>
                                    <div class="mt-4 w-full">
                                        <label
                                            class="mb-2 block text-sm font-medium text-gray-600 dark:text-gray-200">{{ __('Location') }}</label>

                                        <textarea wire:model.defer="supplier.location"
                                            class="block h-40 w-full rounded-md border bg-white px-4 py-2 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-blue-300"></textarea>
                                        <x-jet-input-error for="supplier.location" />
                                    </div>

                                    <div class="mt-6 flex justify-center space-x-1">
                                        <button wire:click="close" type="button"
                                            class="transform rounded-md bg-gray-700 px-4 py-2 text-white transition-colors duration-300 hover:bg-gray-600 focus:bg-gray-600 focus:outline-none">
                                            {{ __('Cancel') }}
                                        </button>
                                        <button  type="submit"
                                            class="transform rounded-md bg-gray-700 px-4 py-2 text-white transition-colors duration-300 hover:bg-gray-600 focus:bg-gray-600 focus:outline-none">
                                            {{ __('Save Change') }}
                                        </button>
                                    </div>
                                </div>
                            </section>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
