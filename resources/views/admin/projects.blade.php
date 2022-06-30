<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Portfolio') }}
        </h2>
    </x-slot>
    @livewire('admin.projects')
</x-app-layout>
