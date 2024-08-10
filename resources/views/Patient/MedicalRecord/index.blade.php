<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Medical Record Table</title>

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
                                    <h4>Medical Record Table</h4>
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
                                                    <th>Patient Name</th>
                                                    <th>Patient Gender</th>
                                                    <th>Patient Age</th>
                                                    <th>Patient Phone</th>
                                                    <th>Patient Image</th>
                                                    <th>Details</th>
                                                    <th>Receptionist Created Name</th>
                                                    <th>Doctor Created Name</th>
                                                    <th>Created Date</th>
                                                    <th>Last Update Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($medicalRecords as $medicalRecord)
                                                    <tr>
                                                        <td>
                                                            {{ $medicalRecord->id }}
                                                        </td>
                                                        <td>{{ $medicalRecord->doctor->name }}</td>
                                                        <td>
                                                            {{ $medicalRecord->patient->name }}
                                                        </td>
                                                        <td>
                                                            @if ($medicalRecord->patient->gender == 1)
                                                                <div>Male</div>
                                                            @else
                                                                <div>Female</div>
                                                            @endif

                                                        </td>

                                                        <td>
                                                            {{ $medicalRecord->patient->age }}
                                                        </td>

                                                        <td>
                                                            {{ $medicalRecord->patient->phone }}
                                                        </td>

                                                        <td><img src="{{ asset('image/' . $medicalRecord->patient->img) }}"
                                                                style="width: 100px; height: 100px;"></td>

                                                        <td>{{ $medicalRecord->details }}</td>

                                                        <td>{{ $medicalRecord->reciptionist->name ?? '-' }}</td>


                                                        <td>{{ $medicalRecord->doctorCreated->name ?? '-'}}</td>

                                                        <td>
                                                            {{ $medicalRecord->created_at }}
                                                        </td>
                                                        <td>
                                                            {{ $medicalRecord->updated_at }}
                                                        </td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button type="button"
                                                                    class="btn btn-secondary dropdown-toggle"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    <span class="visually-hidden">Detail</span>
                                                                </button>
                                                                <div class="dropdown-menu">
                                                            

                                                                        <a class="dropdown-item"
                                                                        href="{{ route('patient.medicalRecord.inspections', $medicalRecord->id) }}"
                                                                        style="size: 20px;">Inspections</a>
                                                                   
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

    @include('layouts.Patient.LinkJS')
</body>

</html>
