@extends('layouts.app')

@section('title', 'Newsletter')

@section('content')

<!--^^  penyebab error ^^ -->
<!DOCTYPE html>
<html>

<head>
    <title>Jquery Fullcalandar Integration with PHP and Mysql</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
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
</head>

<body>
    <div class="py-3 pl-4 sm:min-w-screen-sm md:max-w-screen-sm lg:max-w-screen-md xl:max-w-screen-lg ">
        <div class="container mx-auto">
            <div id="calendar"></div>
        </div>
    </div>
</body>

</html>

@endsection