<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title> Surgeries Table </title>

    @include('layouts.Doctor.LinkHeader')

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
                                    <h4> Surgeries Table </h4>
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
                                                    <th>Patient Name</th>
                                                    <th>Patient Email</th>
                                                    <th>Patient Age</th>
                                                    <th>Patient Phone</th>
                                                    <th>Patient Gender</th>
                                                    <th>Surgeries Name</th>
                                                    <th>Surgeries Report</th>
                                                    <th>Surgeries Details</th>
                                                    <th>Surgeries Status</th>
                                                    <th>Surgeries Result</th>
                                                    <th>Surgeries Date</th>
                                                    <th>Surgeries Start Time</th>
                                                    <th>Surgeries End Time</th>
                                                    <th>Room Name</th>
                                                    <th>Room Floor</th>
                                                    <th>Inspection Result</th>
                                                    <th>Inspection Date</th>
                                                    <th>Doctor Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($surgerieses as $surgeries)
                                                    <tr>
                                                        <td>
                                                            {{ $surgeries->id }}
                                                        </td>
                                                        <td>{{ $surgeries->patient->name }}</td>
                                                        <td>{{ $surgeries->patient->email }}</td>
                                                        <td>{{ $surgeries->patient->age }}</td>
                                                        <td>{{ $surgeries->patient->phone }}</td>
                                                        <td>
                                                            @if ($surgeries->patient->gender == 1)
                                                                Male
                                                            @else
                                                                Female
                                                            @endif
                                                        </td>
                                                        <td>{{ $surgeries->name }}</td>
                                                        <td>{{ $surgeries->report }}</td>
                                                        <td>{{ $surgeries->details }}</td>
                                                        <td>
                                                            @if ($surgeries->status == 0)
                                                                Pending
                                                            @elseif($surgeries->status == 1)
                                                                Finished
                                                            @elseif($surgeries->status == 2)
                                                                Canceled
                                                            @endif
                                                        </td>
                                                        <td>{{ $surgeries->surgeriesResult }}</td>
                                                        <td>{{ $surgeries->surgeriesDate }}</td>
                                                        <td>{{ $surgeries->surgeriesStartTime }}</td>
                                                        <td>{{ $surgeries->surgeriesEndTime }}</td>
                                                        <td>{{ $surgeries->room->name }}</td>
                                                        <td>{{ $surgeries->room->floor->name }}</td>
                                                        <td>{{ $surgeries->inspection->resultInspection }}</td>
                                                        <td>{{ $surgeries->inspection->created_at }}</td>
                                                        <td>{{ $surgeries->doctor->name }}</td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button type="button"
                                                                    class="btn btn-secondary dropdown-toggle"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    <span class="visually-hidden">Detail</span>
                                                                </button>
                                                                @if ($surgeries->status == 0)
                                                                    <div class="dropdown-menu">
                                                                        <form
                                                                            action="{{ route('doctor.surgeries.finish', $surgeries->id) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('put')
                                                                            <button class="dropdown-item" type="submit"
                                                                                >Finished</button>
                                                                        </form>

                                                                        <form
                                                                            action="{{ route('doctor.surgeries.cancel', $surgeries->id) }}"
                                                                            method="post">
                                                                            @csrf
                                                                            @method('put')
                                                                            <button class="dropdown-item" type="submit"
                                                                                style="color: red">Canceled</button>
                                                                        </form>

                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </td>

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

    @include('layouts.Doctor.LinkJS')
</body>

</html>
