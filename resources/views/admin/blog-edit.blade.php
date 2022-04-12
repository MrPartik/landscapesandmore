<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Blog') }}
        </h2>
    </x-slot>
    @livewire('admin.blog-edit')
</x-app-layout>

