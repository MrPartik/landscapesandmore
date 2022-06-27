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
    <style>
        table {
            font-family: arial, sans-serif;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
        .text-danger {
            color: red;
        }
        @page {
            header: page-header;
            footer: page-footer;
        }
    </style>
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
    <body class="@yield('body-class') de_light" id="homepage">
    <htmlpageheader name="page-header">
        <!-- logo begin -->
        <div id="logo" style="text-align: center;">
            <img style="width: 200px; margin-bottom: 10px" class="logo" src="{{ url(env('LOGO_DARK_URL') ?? '/img/logo/logo-wide-green.png')  }}" alt="{{ env('APP_NAME') }}">  <br/> <h1> Michaelangelo's Sustainable Landscape & Design Group</h1>
        </div>
        <hr/>
    </htmlpageheader>
        @yield('body')
    <htmlpagefooter name="page-footer">
        <hr/>
        <span style="text-align:right"> Michaelangelo's Sustainable Landscape & Design Group | {PAGENO}</span>
    </htmlpagefooter>
    </body>
</html>
