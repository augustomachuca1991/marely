<x-admin-layout>

    <x-slot:title>
        {{__('My Shop')}}
    </x-slot>

    <div class="py-6 rounded-sm">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <livewire:sales.index-sale></livewire:sales.index-sale> --}}
            <livewire:shops.index-shop></livewire:shops.index-shop>
        </div>
    </div>

</x-admin-layout>
