<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title> Appointment Table </title>

    @include('layouts.Doctor.LinkHeader')


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

            @include('layouts.Doctor.Header')

            <div class="main-sidebar sidebar-style-2">


                @include('layouts.Doctor.Sidebar')
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
                                                    <th>Action</th>
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


                                                        <td>
                                                            <div class="btn-group">
                                                                <button type="button"
                                                                    class="btn btn-secondary dropdown-toggle"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    <span class="visually-hidden">Detail</span>
                                                                </button>
                                                                @if ($appointment->status == 0)
                                                                    <div class="dropdown-menu">
                                                                        <form
                                                                            action="{{ route('doctor.appointment.finished', $appointment->id) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('put')
                                                                            <button class="dropdown-item"
                                                                                type="submit">Finished</button>
                                                                        </form>

                                                                        <form
                                                                            action="{{ route('doctor.appointment.dontCome', $appointment->id) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('put')
                                                                            <button class="dropdown-item"
                                                                                type="submit">Didnt Come</button>
                                                                        </form>

                                                                        <form
                                                                            action="{{ route('doctor.appointment.canceled', $appointment->id) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('put')
                                                                            <button type="button" class="dropdown-item"
                                                                                style="color: red" data-toggle="modal"
                                                                                data-target="#cancelAppointmentModal"
                                                                                data-backdrop="static">
                                                                                Canceled
                                                                            </button>
                                                                        </form>

                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </td>

                                                    </tr>

                                                    <!-- Add this to your Blade file where you want to display the modal -->
                                                    <div class="modal fade" id="cancelAppointmentModal" tabindex="-1"
                                                        role="dialog" aria-labelledby="cancelAppointmentModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="cancelAppointmentModalLabel">Cancel
                                                                        Appointment</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form
                                                                        action="{{ route('doctor.appointment.canceled', $appointment->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('put')
                                                                        <div class="form-group">
                                                                            <label for="cancelReason">Cancellation
                                                                                Reason</label>
                                                                            <input type="text" class="form-control"
                                                                                id="cancelReason" name="cancelReason"
                                                                                required>
                                                                        </div>
                                                                        <button type="submit"
                                                                            class="btn btn-danger">Confirm
                                                                            Cancellation</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
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

    @include('layouts.Doctor.LinkJS')
    <script>
        $(document).ready(function() {
            $('#cancelAppointmentModal').on('shown.bs.modal', function() {
                $('#cancelReason').focus();
            });
        });
    </script>
</body>

</html>
