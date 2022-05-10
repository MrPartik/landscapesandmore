<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Customize Website') }}
        </h2>
    </x-slot>
    @livewire('admin.themes')
</x-app-layout>
