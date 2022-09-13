<x-admin-layout>
    <x-slot:title>
        {{ __('Audits') }}
        </x-slot>

        <div class="py-6">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

                <livewire:audits.index-audit></livewire:audits.index-audit>

            </div>
        </div>
</x-admin-layout>
