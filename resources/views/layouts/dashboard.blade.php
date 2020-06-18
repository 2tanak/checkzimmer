<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Inter:400,500,600,700&display=swap&subset=cyrillic" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}?ver={{ time() }}" rel="stylesheet">
</head>
<body>
    @yield('content')
    <script src="{{ asset('js/app.js') }}?ver={{ time() }}" defer></script>
</body>
</html>
