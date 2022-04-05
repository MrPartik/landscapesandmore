<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Projects') }}
        </h2>
    </x-slot>
    @livewire('admin.project')
</x-app-layout>
