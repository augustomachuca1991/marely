<div>
    <div x-data="{
        open: @entangle('selectUser'),
        toggle() {
            this.open = this.open ? this.close() : true
        },
        close() {
            this.open = false
        }
    }" class="w-full">
        <div>
            <label id="listbox-label" class="mb-1 block text-sm font-medium text-gray-700">
                {{ __('Filter by user') }}
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
                    @foreach ($users as $item)
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
    </div>
</div>
