<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Awards') }}
        </h2>
    </x-slot>
    @livewire('admin.awards')
</x-app-layout>
