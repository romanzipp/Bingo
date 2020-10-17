<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    {{ seo()->render() }}

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ manifest('css/app.css') }}" rel="stylesheet">

</head>
<body class="font-sans">

    @yield('content')

    <script src="{{ manifest('js/app.js') }}"></script>

</body>
</html>
