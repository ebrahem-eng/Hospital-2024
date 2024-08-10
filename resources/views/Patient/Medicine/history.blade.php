<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Medicine History Table</title>

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

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Medicine History Table</h4>
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
                                                    <th>Medicine Name</th>
                                                    <th>Medicine Calibres</th>
                                                    <th>Medicine Details</th>
                                                    <th>Inspection Result</th>
                                                    <th>Inspection Details</th>
                                                    <th>Medicine Repeat In Day</th>
                                                    <th>Medicine Duration(Week)</th>
                                                    <th>Medicine Quantityt</th>
                                                    <th>Medicine Daily Appointment</th>
                                                    <th>Another Details</th>
                                                    <th>Created Date Inspection</th>
                                                    <th>Last Update Date</th>
                            
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($medicineInspections as $medicineInspection)
                                                    <tr>
                                                        <td>
                                                            {{ $medicineInspection->id }}
                                                        </td>
                                                        <td>{{ $medicineInspection->medicine->name }}</td>
                                                        <td>{{ $medicineInspection->medicine->calibres }}</td>
                                                        <td>{{ $medicineInspection->medicine->details }}</td>

                                                        <td>{{ $medicineInspection->inspection->resultInspection }}</td>
                                                        <td>{{ $medicineInspection->inspection->details }}</td>

                                                        <td>{{ $medicineInspection->repeat_day }}</td>
                                                        <td>{{ $medicineInspection->duration }}</td>
                                                        <td>{{ $medicineInspection->quantity }}</td>
                                                        <td>{{ $medicineInspection->daily_appointment }}</td>
                                                        <td>{{ $medicineInspection->details }}</td>

                                                        <td>{{ $medicineInspection->created_at }}</td>
                                                        <td>{{ $medicineInspection->updated_at }}</td>

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

    @include('layouts.Patient.LinkJS')
</body>

</html>
