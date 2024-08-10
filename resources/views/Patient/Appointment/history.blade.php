<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title> Appointment Table </title>

    @include('layouts.Patient.LinkHeader')


    <style>
        /* Adjust the z-index value as needed */
        .modal {
            z-index: 1050;
        }

        .modal-backdrop {
            background-color: transparent;
        }
    </style>

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

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4> Appointment Table </h4>
                                </div>

                                {{-- message Section --}}

                                @if (session('success_message'))
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        {{ session('success_message') }}
                                    </div>
                                @endif

                                @if (session('error_message'))
                                    <div class="alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        {{ session('error_message') }}
                                    </div>
                                @endif
                                {{-- end  message Section --}}
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="table-1">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">
                                                        #
                                                    </th>
                                                    <th>Doctor Name</th>
                                                    <th>Doctor Email</th>
                                                    <th>Patient ID</th>
                                                    <th>Patient Name</th>
                                                    <th>Patient Email</th>
                                                    <th>Patient Phone</th>
                                                    <th>Patient Age</th>
                                                    <th>Patient Gender</th>
                                                    <th>Appointment Date</th>
                                                    <th>Appointment Day Name</th>
                                                    <th>Appointment Start Time</th>
                                                    <th>Appointment End Time</th>
                                                    <th>Appointment Status</th>
                                                    <th>Appointment Details</th>
                                                    <th>Created Appointment Date</th>
                                                    <th>Last Updated Date</th>
                                        
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($appointments as $appointment)
                                                    <tr>
                                                        <td>
                                                            {{ $appointment->id }}
                                                        </td>
                                                        <td>{{ $appointment->doctor->name }}</td>
                                                        <td>{{ $appointment->doctor->email }}</td>
                                                        <td>{{ $appointment->patient->id }}</td>
                                                        <td>{{ $appointment->patient->name }}</td>
                                                        <td>{{ $appointment->patient->email }}</td>
                                                        <td>{{ $appointment->patient->phone }}</td>
                                                        <td>{{ $appointment->patient->age }}</td>
                                                        <td>
                                                            @if ($appointment->patient->gender == 1)
                                                                Male
                                                            @else
                                                                Female
                                                            @endif

                                                        </td>
                                                        <td> {{ $appointment->date }}</td>
                                                        <td> {{ $appointment->dayName }}</td>
                                                        <td> {{ $appointment->startTimeAppointment }}</td>
                                                        <td> {{ $appointment->endTimeAppointment }}</td>

                                                        <td>
                                                            @if ($appointment->status == 0)
                                                                Pending
                                                            @elseif($appointment->status == 1)
                                                                Done
                                                            @elseif($appointment->status == 2)
                                                                Didnt Come
                                                            @elseif($appointment->status == 3)
                                                                Canceled
                                                            @endif
                                                        </td>

                                                        <td> {{ $appointment->details }}</td>
                                                        <td>
                                                            {{ $appointment->created_at }}
                                                        </td>
                                                        <td>
                                                            {{ $appointment->updated_at }}
                                                        </td>


                            

                                                    </tr>
                                                            
                                                    </div>
                                                @endforeach

                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
            </div>

        </div>
    </div>

    @include('layouts.Patient.LinkJS')
</body>

</html>
