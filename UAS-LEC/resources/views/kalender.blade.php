@extends('layouts.admin')

@section('title', 'Kalender')

@section('content')
<!-- Kalender -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="py-3 pl-4 sm:min-w-screen-sm md:max-w-screen-sm lg:max-w-screen-md xl:max-w-screen-lg ">
    <div class="container mx-auto">
        <div id="calendar"></div>
    </div>
</div>

<!-- Modal -->
<div id="createCalenderModal" class="hidden fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 overflow-auto z-30">
    <div class="bg-white rounded-lg p-6 w-full sm:w-[480px] md:w-[600px] lg:w-[800px]">
        <h2 class="text-xl font-semibold mb-4">Buat Tanggal Kunjugan Baru</h2>

        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Nama Kunjungan</label>
            <input type="text" id="title" name="title" class="form-control mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" required>
        </div>
        <div class="mb-4">
            <label for="start_date" class="block text-sm font-medium text-gray-700">Tanggal Awal Kunjungan</label>
            <input type="date" id="start_date" name="start_date" class="form-control mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" required>
        </div>

        <div class="mb-4">
            <label for="end_date" class="block text-sm font-medium text-gray-700">Tanggal Akhir Kunjungan</label>
            <input type="date" id="end_date" name="end_date" class="form-control mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" required>
            <span class="text-red-500 text-sm" id="titleError"></span>
        </div>
        <div class="flex justify-between items-center">
            <button id="closeModalBtn" class="bg-gray-500 text-white px-4 py-2 rounded-lg">Batal</button>
            <button type="submit" id="saveBtn" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">Terbitkan</button>
        </div>

    </div>
</div>
<script>
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

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

            // Prevent selection of past dates
            selectAllow: function(selectInfo) {
                // Check if the selected start date is before today
                return moment(selectInfo.start).isSameOrAfter(moment(), 'day');
            },

            // Create new event
            select: function(start, end, allDay) {
                // Show the modal
                document.getElementById('createCalenderModal').classList.remove('hidden');

                // Update form inputs with selected dates
                document.getElementById('start_date').value = moment(start).format('YYYY-MM-DD');
                document.getElementById('end_date').value = moment(end).format('YYYY-MM-DD');

                // Remove any existing click handlers and bind the new one
                $('#saveBtn').off('click').on('click', function() {
                    var title = $('#title').val();
                    var start_date = $('#start_date').val();
                    var end_date = $('#end_date').val();

                    // Validation: Check if end_date is earlier than start_date
                    if (moment(end_date).isBefore(moment(start_date))) {
                        alert("End date cannot be earlier than start date!");
                        return;
                    }

                    $.ajax({
                        url: "{{ route('kalender.store') }}",
                        type: "POST",
                        dataType: 'json',
                        data: {
                            title: title,
                            start_date: start_date,
                            end_date: end_date,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            $('#calendar').fullCalendar('renderEvent', {
                                'title': response.title,
                                'start': response.start_date,
                                'end': response.end_date,
                            });
                            console.log(response);
                            document.getElementById('createCalenderModal').classList.add('hidden');
                        },
                        error: function(error) {
                            if (error.responseJSON.errors.title) {
                                $('#titleError').text(error.responseJSON.errors.title);
                            }
                        }
                    });
                });
            },

            //drag and drop
            editable: true,
            eventDrop: function(event) {
                var id = event.id;
                var start_date = moment(event.start).format('YYYY-MM-DD');
                var end_date = moment(event.end).format('YYYY-MM-DD');
                $.ajax({
                    url: "{{ route('kalender.update', '') }}" + '/' + id,
                    type: "PATCH",
                    dataType: 'json',
                    data: {
                        start_date,
                        end_date
                    },
                    success: function(response) {
                        Swal.fire({
                            position: "middle",
                            icon: "success",
                            title: "Your work has been saved",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    },
                    error: function(error) {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Something went wrong!",
                        });
                    }
                });
            },

            //event click
            eventClick: function(event) {
                var id = event.id;
                if (confirm('Are you sure to delete?')) {

                    $.ajax({
                        url: "{{ route('kalender.destroy', '') }}" + '/' + id,
                        type: "DELETE",
                        dataType: 'json',

                        success: function(response) {
                            Swal.fire({
                                position: "middle",
                                icon: "success",
                                title: "Your event deleted already",
                                showConfirmButton: false,
                                timer: 1500
                            });
                        },
                        error: function(error) {
                            Swal.fire({
                                icon: "error",
                                title: "Oops...",
                                text: "Something went wrong!",
                            });
                        }
                    });
                }
            },
        });

        $("#createCalenderModal").on("hidden.bs.modal", function() {
            $('#saveBtn').off('click'); // Unbind click event when modal is closed
        });

        // close modal
        $('#closeModalBtn').on('click', function() {
            document.getElementById('createCalenderModal').classList.add('hidden');
        });
    });
</script>


@endsection