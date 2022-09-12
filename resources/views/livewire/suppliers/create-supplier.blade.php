<div x-id="['dropdown-button']" x-data="{
    open: @entangle('showModal'),
    toggle() {
        this.open = this.open ? this.close() : true
    },
    close() {
        this.open = false
    }
}">

    <div @click="toggle()" :aria-expanded="open" :aria-controls="$id('dropdown-buuton')"
        class="flex transform cursor-pointer items-center rounded-md bg-green-500 px-4 py-2 font-medium capitalize tracking-wide text-white transition-colors duration-300 hover:bg-green-700 focus:outline-none focus:ring focus:ring-green-300 focus:ring-opacity-80">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="mx-1 h-5 w-5">
            <path
                d="M3.375 4.5C2.339 4.5 1.5 5.34 1.5 6.375V13.5h12V6.375c0-1.036-.84-1.875-1.875-1.875h-8.25zM13.5 15h-12v2.625c0 1.035.84 1.875 1.875 1.875h.375a3 3 0 116 0h3a.75.75 0 00.75-.75V15z" />
            <path
                d="M8.25 19.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0zM15.75 6.75a.75.75 0 00-.75.75v11.25c0 .087.015.17.042.248a3 3 0 015.958.464c.853-.175 1.522-.935 1.464-1.883a18.659 18.659 0 00-3.732-10.104 1.837 1.837 0 00-1.47-.725H15.75z" />
            <path d="M19.5 19.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z" />
        </svg>
        <span class="mx-1">{{ __('New Supplier') }}</span>
    </div>

    <!-- modal -->
    <div x-show="open" :id="$id('dropdown-button')" style="display: none" class="relative z-10"
        aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                <div class="min- flex items-end justify-center px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                    <div class="bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                    <span class="sm: hidden sm:inline-block sm:align-middle" aria-hidden="true">​</span>
                    <div @click.outside="close()"
                        class="inline-block transform overflow-hidden rounded-lg bg-white p-5 text-left align-bottom shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-xl sm:align-middle lg:p-16">
                        <form action="" x-on:submit.prevent="$wire.store()">
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
                                                class="mb-2 block text-sm font-medium text-gray-600 dark:text-gray-200">{{
                                                __('Company Name') }}</label>

                                            <input wire:model.defer="company_name"
                                                class="block w-full rounded-md border bg-white px-4 py-2 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-blue-300"
                                                type="text">
                                            <x-jet-input-error for="company_name" />
                                        </div>

                                        <div class="mx-2 mt-4 w-full md:mt-0">
                                            <label
                                                class="mb-2 block text-sm font-medium text-gray-600 dark:text-gray-200">{{
                                                __('Phone Number') }}</label>

                                            <input wire:model.defer="phone_number"
                                                class="block w-full rounded-md border bg-white px-4 py-2 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-blue-300"
                                                type="text">
                                            <x-jet-input-error for="phone_number" />
                                        </div>
                                    </div>
                                    <div class="mt-4 w-full">
                                        <label
                                            class="mb-2 block text-sm font-medium text-gray-600 dark:text-gray-200">{{
                                            __('Location') }}</label>

                                        <textarea wire:model.defer="location"
                                            class="block h-40 w-full rounded-md border bg-white px-4 py-2 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-blue-300"></textarea>
                                        <x-jet-input-error for="location" />
                                    </div>

                                    <div class="mt-6 flex justify-center">
                                        <button wire:click="store" type="submit"
                                            class="transform rounded-md bg-gray-700 px-4 py-2 text-white transition-colors duration-300 hover:bg-gray-600 focus:bg-gray-600 focus:outline-none">
                                            {{ __('New Supplier') }}
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
