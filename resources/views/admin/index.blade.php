<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
        <script src="//cdn.jsdelivr.net/npm/apexcharts"></script>
        <script src="{{ url('vendor/livewire-charts/app.js') }}"></script>
        @livewire('admin.dashboard')
</x-app-layout>
