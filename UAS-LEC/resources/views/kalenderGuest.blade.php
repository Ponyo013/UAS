@extends('layouts.app')
@section('title', 'Kalender')
@section('content')
<!-- Calendar Page Content -->
<!DOCTYPE html>
<html>

<head>
    <title>Kalender</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
</head>

<body class="bg-gray-100">
    <div class="py-24 flex items-center justify-center min-h-screen">
        <div class="w-full text-black max-w-4xl p-4">
            <div id="calendar"></div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var calenders = @json($events);

            console.log(calenders);

            var calendar = $('#calendar').fullCalendar({
                header: {
                    left: 'title',
                    right: 'today, prev,next'
                },
                events: calenders,
                selectable: true,
                selectHelper: true,
            });
        });
    </script>
</body>
</html>
@endsection
