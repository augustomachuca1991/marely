<div>
    <x-jet-button class="w-full">+{{ __('New Category') }}</x-jet-button>
    <x-jet-dialog-modal wire:model='isOpenCreate'>
        <x-slot name="title">{{ __('New Category') }}</x-slot>
        <x-slot name="content">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat voluptates tempore a, in recusandae earum
            dolores omnis vero. Magni hic nostrum quis odio reprehenderit repellat, amet eaque vero blanditiis autem.
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('isOpenCreate' , false)">{{ __('Close') }}</x-jet-secondary-button>

        </x-slot>
    </x-jet-dialog-modal>
</div>
