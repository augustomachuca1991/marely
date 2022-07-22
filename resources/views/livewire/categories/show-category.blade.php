<div>
    <x-jet-dialog-modal wire:model="isOpenShow">
        <x-slot name="title">{{ __('Category')}}</x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <figure class="relative flex flex-col-reverse rounded-lg p-6 dark:bg-blue-800 dark:highlight-white/5">
                    <figcaption class="flex items-center space-x-4">
                        <img src="https://ui-avatars.com/api/?name={{urlencode($category->name)}}&color=7F9CF5&background=EBF4FF" alt="{{$category->name}}" class="flex-none w-24 h-24 rounded-full object-cover" loading="lazy">
                        <div class="flex-auto p-3">
                            <div class="text-base text-blue-900 font-semibold dark:text-blue-300">
                                <a href="https://twitter.com/debs_obrien/status/1243255468241420288" tabindex="0">
                                    <span class="absolute inset-0"></span>
                                    {{$category->name}}
                                </a>
                            </div>
                            <div class="mt-0.5 text-gray-700">{{$category->description}}</div>
                        </div>
                    </figcaption>
                </figure>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button  wire:click="resetData">{{ __('Close') }}</x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
