<x-admin-layout>

    <x-slot:title>
        {{__('Suppliers')}}
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <livewire:suppliers.index-supplier></livewire:suppliers.index-supplier>
        </div>
    </div>

</x-admin-layout>
