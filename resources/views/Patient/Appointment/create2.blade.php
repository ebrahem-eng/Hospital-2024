<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Add Appointment</title>

    @include('layouts.Patient.LinkHeader')

</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            @include('layouts.Patient.Header')

            <div class="main-sidebar sidebar-style-2">


                @include('layouts.Patient.Sidebar')
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">

                    <div class="col-10 col-md-6 col-lg-12">
                        <div class="card">
                            <form method="get" action="{{ route('patient.appointment.create3') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-header">
                                    <h4>Add Appointment</h4>
                                </div>

                                {{-- message Section --}}
                                @if (session('success_message'))
                                    <div class="alert alert-success" id="success-alert">
                                        <button type="button" class="close" onclick="closeAlert('success-alert')"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        {{ session('success_message') }}
                                    </div>
                                @endif

                                @if (session('error_message'))
                                    <div class="alert alert-danger" id="error-alert">
                                        <button type="button" class="close" onclick="closeAlert('error-alert')"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        {{ session('error_message') }}
                                    </div>
                                @endif



                                {{-- end  message Section --}}

                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">

                                            <div class="col-4">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <p>
                                                           Day Available 
                                                        </p>
                                                        <ul style="max-height: 150px; overflow-y: auto; padding-left: 20px;">
                                                            @foreach($doctorDays as $doctorDay)
                                                
                                                                <li class="text-success">
                                                                    {{ $doctorDay->dayName}}
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                                
                                            </div>
                            
                                
                                            <div class="col-4">
                                                <label>Appointment Date</label>
                                                <input type="date" class="form-control" name="dateAppointment" id="dateAppointment" required="">
                                                <p id="dayName"></p>
                                            </div>
                                            
                                            <div class="col-3">
                                                <!-- Add a hidden input field for the day name -->
                                                <input type="hidden" name="dayName" id="hiddenDayName">
                                            </div>

                                            <div class="col-3">
                                 
                                                <input type="hidden" name="doctorID" value="{{$doctorID}}">
                                            </div>
                                
                                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                            <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
                                
                                            <script>
                                                $(document).ready(function () {
                                                    // Triggered when the date input changes
                                                    $('#dateAppointment').on('change', function () {
                                                        // Get the selected date
                                                        var selectedDate = $(this).val();
                                
                                                        // Use Moment.js to format the date and get the day name
                                                        var dayName = moment(selectedDate).format('dddd');
                                
                                                        // Display the day name
                                                        $('#dayName').text('Selected day: ' + dayName);
                                
                                                        // Set the day name in the hidden input field
                                                        $('#hiddenDayName').val(dayName);
                                                    });
                                                });
                                            </script>
                                        </div>
                                
                                    </div>
                                </div>
                                
                                <div class="card-footer text-center">
                                    <button class="btn btn-primary" type="submit">Next</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </section>
            </div>

        </div>
    </div>

    @include('layouts.Patient.LinkJS')
</body>

</html>
