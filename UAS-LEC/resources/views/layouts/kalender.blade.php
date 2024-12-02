<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kalender')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>
    @include('part.navbar')
    <div class="content">
        @yield('content')
    </div>
    @include('part.footer')
</body>
</html>
