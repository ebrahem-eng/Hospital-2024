<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>History Department Room Reservation Table</title>

    @include('layouts.Nurse.LinkHeader')

</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            @include('layouts.Nurse.Header')

            <div class="main-sidebar sidebar-style-2">


                @include('layouts.Nurse.Sidebar')
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>History Dapartment Room Reservation Table</h4>
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
                                                    <th>Enter Date</th>
                                                    <th>Leave Date</th>
                                                    <th>Duration(Day)</th>
                                                    <th>Status</th>
                                                    <th>Reservation By</th>
                                                    <th>Patient Name</th>
                                                    <th>Patient Email</th>
                                                    <th>Patient Phone</th>
                                                    <th>Leave By</th>
                                                    <th>Room Name</th>
                                                    <th>Room Code</th>
                                                    <th>Room Type</th>
                                                    <th>Created Date</th>
                                                    <th>Last Update Date</th>
                                                    {{-- <th>Action</th> --}}
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($departmentPatientRooms as $departmentPatientRoom)
                                                    <tr>
                                                        <td>
                                                            {{ $departmentPatientRoom->id }}
                                                        </td>
                                                        <td>{{ $departmentPatientRoom->enterDate }}</td>

                                                        <td>{{ $departmentPatientRoom->leaveDate }}</td>
                                                        <td>{{ $departmentPatientRoom->duration }}</td>
                                                        <td>
                                                            @if ($departmentPatientRoom->status == 1)
                                                                <div class="badge badge-success">Reserved</div>
                                                            @else
                                                                <div class="badge badge-danger">Not Reserved</div>
                                                            @endif
                                                        </td>
                                                        <td>{{ $departmentPatientRoom->departmentEmployeEnter->name }} </td>
                                                        <td>{{ $departmentPatientRoom->patient->name }}</td>
                                                        <td>{{ $departmentPatientRoom->patient->email }}</td>
                                                        <td>{{ $departmentPatientRoom->patient->phone }}</td>
                                                        <td>{{ $departmentPatientRoom->departmentEmployeLeave->name ?? '-'}}
                                                        </td>
                                                        <td>{{ $departmentPatientRoom->room->name }}</td>
                                                        <td>{{ $departmentPatientRoom->room->code }}</td>
                                                        <td>{{ $departmentPatientRoom->room->type }}</td>
                                                        <td>{{ $departmentPatientRoom->created_at }}</td>
                                                        <td>{{ $departmentPatientRoom->updated_at }}</td>
                                                        {{-- <td>
                                                            <div class="btn-group">
                                                                <button type="button"
                                                                    class="btn btn-secondary dropdown-toggle"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    <span class="visually-hidden">Detail</span>
                                                                </button>
                                                                <div class="dropdown-menu">
                                                            
                                                                    <form
                                                                        action="{{ route('departmentEmploye.departmentRoom.reservation.leave', $departmentPatientRoom->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('put')
                                                                        <button class="dropdown-item" type="submit"
                                                                            style="color: rgb(92, 182, 238)">History Medicine & Medical Supplise History</button>
                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </td> --}}

                                                    </tr>
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

    @include('layouts.Nurse.LinkJS')
</body>

</html>
