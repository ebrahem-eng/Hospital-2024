<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Inspection Medical Record Table</title>

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
                                    <h4>Inspection Medical Record Table</h4>
                                </div>
                                <div style="margin-left: 20px;">
                                    <form
                                    action="{{ route('doctor.inspection.medicalRecord.create', $medicalRecordID) }}"
                                    method="GET">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">
                                        Add New Inspection
                                    </button>
    
                                </form>
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
                                                    <th>Action</th>
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
                                                            <br>
                                                            <br>
                                                            @if($inspection->medicine->isNotEmpty())
                                                            <form>
                                                                <button class="btn btn-primary">
                                                                    Details
                                                                </button>
                                                            </form>
                                                            @endif
                                                        </td>

                                                        <td>
                                                            @foreach ($inspection->medicalSupplies as $medicalSupplies)
                                                            {{ $medicalSupplies->medicalSupplies->name }}
                                                            @endforeach

                                                            <br>
                                                            <br>
                                                            @if($inspection->medicalSupplies->isNotEmpty())
                                                            <form>
                                                                <button class="btn btn-primary">
                                                                    Details
                                                                </button>
                                                            </form>
                                                            @endif
                                                        </td>

                                                        <td>
                                                            @if ($inspection->surgeries)
                                                                @foreach ($inspection->surgeries as $surgeries)
                                                                    {{ $surgeries->name }}
                                                                    <br>
                                                                    <br>
                                                                    <form>
                                                                        <button class="btn btn-primary">
                                                                            Details
                                                                        </button>
                                                                    </form>
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
                                                                        href="{{ route('doctor.medicalRecord.edit', $inspection->id) }}"
                                                                        style="size: 20px;">Edit</a>

                                                                
                                                                    <form
                                                                        action="{{ route('doctor.medicalRecord.soft.delete', $inspection->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button class="dropdown-item" type="submit"
                                                                            style="color: red">Delete</button>
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

    @include('layouts.Doctor.LinkJS')
</body>

</html>
