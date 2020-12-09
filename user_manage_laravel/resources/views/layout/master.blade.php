<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>

    @yield('ListPost')
    @yield('ListUser')
    @yield('addPost')
    @yield('addUser')
</body>
</html>
