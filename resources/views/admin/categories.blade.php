<x-admin-layout>
    <x-slot:title>
        {{__('Categories')}}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <livewire:categories.index-category></livewire:categories.index-category>
            </div>
        </div>
    </div>
</x-admin-layout>
