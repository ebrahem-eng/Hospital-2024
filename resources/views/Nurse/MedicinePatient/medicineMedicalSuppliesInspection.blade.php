<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Medicine And Medical Supplies Patient Inspection Table</title>

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
                                    <h4>Medicine Patient Inspection Table</h4>
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
                                                    <th>Action</th>
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
                                                        <td>
                                                            <div class="btn-group">
                                                                <button type="button"
                                                                    class="btn btn-secondary dropdown-toggle"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    <span class="visually-hidden">Detail</span>
                                                                </button>
                                                                <div class="dropdown-menu">

                                                                    <form
                                                                        action="{{ route('nurse.medicine.medicalSupplies.patient.medicine.given.history', $medicineInspection->id) }}"
                                                                        method="GET">
                                                                        @csrf
                                                                        <input type="hidden" value="{{$medicineInspection->id}}" name="medicineInsPatientID"  /> 
                                                                        <input type="hidden" value="{{$patientRoomID}}" name="patientRoomID"/>
                                                                        <button class="dropdown-item" type="submit"
                                                                            style="color: rgb(92, 238, 175)">
                                                                            <p>
                                                                                Given History
                                                                                & Add Given
                                                                            </p>
                                                                        </button>
                                                                    </form>

                                                                </div>
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

                <section class="section">

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Medical Supplies Patient Inspection Table</h4>
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
                                                    <th>Medical Supplies Name</th>
                                                    <th>Medical Supplies Type</th>
                                                    <th>Medical Supplies Details</th>
                                                    <th>Quantity</th>
                                                    <th>Created Date Inspection</th>
                                                    <th>Last Update Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($medicalSuppliesInspections as $medicalSuppliesInspection)
                                                    <tr>
                                                        <td>
                                                            {{ $medicalSuppliesInspection->id }}
                                                        </td>
                                                        <td>{{ $medicalSuppliesInspection->medicalSupplies->name }}
                                                        </td>
                                                        <td>{{ $medicalSuppliesInspection->medicalSupplies->type }}
                                                        </td>
                                                        <td>{{ $medicalSuppliesInspection->medicalSupplies->details }}
                                                        </td>

                                                        <td>{{ $medicalSuppliesInspection->quantity }}</td>

                                                        <td>{{ $medicalSuppliesInspection->created_at }}</td>
                                                        <td>{{ $medicalSuppliesInspection->updated_at }}</td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button type="button"
                                                                    class="btn btn-secondary dropdown-toggle"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    <span class="visually-hidden">Detail</span>
                                                                </button>
                                                                <div class="dropdown-menu">

                                                                    <form
                                                                        action="{{ route('nurse.medicine.medicalSupplies.patient.medicalSupplies.given.history', $medicalSuppliesInspection->id) }}"
                                                                        method="GET">
                                                                        @csrf
                                                                        <input type="hidden" value="{{$medicalSuppliesInspection->id}}" name="medicalSuppliesInsID"  /> 
                                                                        <input type="hidden" value="{{$patientRoomID}}" name="patientRoomID"/>
                                                                        <button class="dropdown-item" type="submit"
                                                                            style="color: rgb(107, 92, 238)"> Given
                                                                            History
                                                                            & Add Given</button>
                                                                    </form>

                                                                </div>
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

    @include('layouts.Nurse.LinkJS')
</body>

</html>
