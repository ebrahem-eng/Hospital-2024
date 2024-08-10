<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Inspection Medical Record Table</title>

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
                                    <h4>Inspection Medical Record Table</h4>
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
                                                    <th>Result Inspection</th>
                                                    <th>Details Inspection</th>
                                                    <th>Medicine Name</th>
                                                    <th>Medical Supplies</th>
                                                    <th>Surgeries</th>
                                                    <th>Patient Image</th>
                                                    <th>Created Date</th>
                                                    <th>Last Update Date</th>

                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($inspections as $inspection)
                                                    <tr>
                                                        <td>
                                                            {{ $inspection->id }}
                                                        </td>
                                                        <td>{{ $inspection->resultInspection }}</td>

                                                        <td>{{ $inspection->details }}</td>
                                                        <td>
                                                            @foreach ($inspection->medicine as $medicine)
                                                                {{ $medicine->medicine->name }}/{{ $medicine->medicine->calibres }}
                                                            @endforeach


                                                        </td>

                                                        <td>
                                                            @foreach ($inspection->medicalSupplies as $medicalSupplies)
                                                                {{ $medicalSupplies->medicalSupplies->name }}
                                                            @endforeach
                                                        </td>

                                                        <td>
                                                            @if ($inspection->surgeries)
                                                                @foreach ($inspection->surgeries as $surgeries)
                                                                    {{ $surgeries->name }}
                                                                @endforeach
                                                            @else
                                                                No surgeries associated with this inspection.
                                                            @endif
                                                            <br>
                                                            <br>
                                                        </td>




                                                        <td><img src="{{ asset('image/' . $inspection->medicalRecord->patient->img) }}"
                                                                style="width: 100px; height: 100px;"></td>



                                                        <td>
                                                            {{ $inspection->created_at }}
                                                        </td>
                                                        <td>
                                                            {{ $inspection->updated_at }}
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
