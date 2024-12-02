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
    <div class="mt-48 mb-8 md:mt-20">
        <div class="flex items-center justify-center">
            <div class="w-full text-black max-w-4xl p-4">
                <div id="calendar"></div>
            </div>
        </div>
        <div class="mt-2 text-center">
            <a href="{{ route('welcome') }}" class="bg-[#AF1740] text-white px-4 py-2 rounded-md font-semibold hover:bg-[#CC2B52] transition duration-300">Kembali ke Halaman Utama</a>
        </div>
    </div>
</body>
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

</html>
@endsection