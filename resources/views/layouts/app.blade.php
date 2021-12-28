<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.parts.head')
</head>

<body>
    @yield('content')
</body>

</html>
