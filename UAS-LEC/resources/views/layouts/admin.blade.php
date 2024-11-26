<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link rel="stylesheet" href="{{ asset('sidebar.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.tailwindcss.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.7.1.js" ></script>
    <script src="https://cdn.tailwindcss.com" ></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js" ></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.tailwindcss.js" ></script>
    <script src="https://cdn.tailwindcss.com" ></script>
</head>
<body>
    @include('part.sidebar')
    <div class="content">
        @yield('content')
    </div>
</body>

</html>
