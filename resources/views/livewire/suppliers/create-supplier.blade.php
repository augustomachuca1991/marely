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
        class="group flex cursor-pointer items-center rounded-md bg-blue-500 py-2 pl-2 pr-3 text-sm font-medium text-white shadow-sm hover:bg-blue-400">
        <svg width="20" height="20" fill="currentColor" class="mr-2">
            <path d="M10 5a1 1 0 0 1 1 1v3h3a1 1 0 1 1 0 2h-3v3a1 1 0 1 1-2 0v-3H6a1 1 0 1 1 0-2h3V6a1 1 0 0 1 1-1Z">
            </path>
        </svg>{{ __('New') }}
    </div>


    <!-- modal -->
    <div x-show="open" :id="$id('dropdown-button')" style="display: none" class="relative z-10"
        aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div @click.outside="close()"
                    class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <form action="" x-on:submit.prevent="$wire.store()">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div
                                    class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-indigo-100 sm:mx-0 sm:h-10 sm:w-10">

                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                                    </svg>
                                </div>
                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500">Are you sure you want to deactivate your
                                            account?
                                            All of your data will be permanently removed. This action cannot be undone.
                                        </p>
                                    </div>
                                    <div class="overflow-hidden shadow sm:rounded-md">
                                        <div class="bg-white px-4 py-5 sm:p-6">
                                            <div class="grid grid-cols-3 gap-3">
                                                <div class="col-span-3">
                                                    <label for="first-name"
                                                        class="block text-sm font-medium text-gray-700">{{ __('Name') }}</label>
                                                    <input wire:model.defer="company_name" type="text"
                                                        name="first-name" id="first-name" autocomplete="given-name"
                                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                    <x-jet-input-error for="company_name" />
                                                </div>
                                                <div class="col-span-3">
                                                    <label for="city"
                                                        class="block text-sm font-medium text-gray-700">{{ __('Location') }}</label>
                                                    <input wire:model.defer="location" type="text" name="city"
                                                        id="city"
                                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                    <x-jet-input-error for="location" />
                                                </div>
                                                <div class="col-span-3">
                                                    <label for="phone_number"
                                                        class="block text-sm font-medium text-gray-700">{{ __('Phone Number') }}</label>
                                                    <input wire:model.defer="phone_number" type="text"
                                                        autocomplete="phone_number"
                                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                    <x-jet-input-error for="phone_number" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                                            <button wire:click="store" type="button"
                                                class="inline-flex w-full justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">{{ __('Add') }}</button>
                                            <button type="button" @click="close()"
                                                class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">{{ __('Cancel') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
