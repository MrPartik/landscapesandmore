<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="{{ url('fonts/font-awesome/css/font-awesome.css') }}" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <link rel="stylesheet" href="{{ url('/css/kothing/katex.min.css') }}">
        <script src="{{ url('/js/kothing/katex.min.js') }}"></script>
        <link href="{{ url('/css/kothing/kothing-editor.min.css') }}" rel="stylesheet"/>
        <script src="{{ url('/js/kothing/kothing-editor.min.js') }}"></script>
        <script src="//kit.fontawesome.com/304ef5f8a1.js" crossorigin="anonymous"></script>

        @livewireStyles

        @livewireScripts
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="{{ url('js/jquery.min.js') }}"></script>
    </head>
    <body class="font-sans antialiased bg-light">
        <x-jet-banner />
        @include('admin.navigation.index')

        <!-- Page Heading -->
        <header class="d-flex py-3 bg-white shadow-sm border-bottom">
            <div class="container">
                {{ $header }}
            </div>
        </header>

        <!-- Page Content -->
        <main class="container my-5" style="max-width: 1600px;">
            {{ $slot }}
        </main>

        @stack('modals')


        @stack('scripts')
        @yield('extra-js')
    </body>
</html>
