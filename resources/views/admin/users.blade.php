<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Manage Users') }}
        </h2>
    </x-slot>
    @livewire('admin.users')
</x-app-layout>
