<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
</head>
<body>
    <main>
        @include('partials/navbar')
        @yield('content')
    </main>
</body>
</html>