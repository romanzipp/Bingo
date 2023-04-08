<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    {{ seo()->render() }}

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ manifest('css/app.css') }}" rel="stylesheet">

    <script defer data-domain="bingo.ich.wtf" src="https://p.ich.wtf/js/script.js"></script>

</head>
<body>

    @yield('content')

    <script src="{{ manifest('js/app.js') }}"></script>

</body>
</html>
