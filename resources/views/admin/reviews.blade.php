<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Customer Reviews') }}
        </h2>
    </x-slot>
    @livewire('admin.reviews')
</x-app-layout>
