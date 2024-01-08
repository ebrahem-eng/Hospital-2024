<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Add Medical Supplies Inspection</title>

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
                    <div class="section-header">
                        <h1>Medical Supplies</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                            <div class="breadcrumb-item">Medical Supplies</div>
                        </div>
                    </div>
                    <div class="section-body">
                        {{-- <h2 class="section-title">September 2018</h2> --}}
                        <div class="row">
                            <div class="col-12">
                                <div class="activities">

                                    <div class="col-6 col-md-6 col-lg-6">
                                        <div class="card">

                                            <form method="get"
                                                action="{{ route('doctor.inspection.medicalSupplies.store.inspection') }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4>Choose Medical Supplies</h4>
                                                    </div>

                                                    {{-- message Section --}}

                                                    @if (session('success_message'))
                                                        <div class="alert alert-success">
                                                            <button type="button" class="close" data-dismiss="alert"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            {{ session('success_message') }}
                                                        </div>
                                                    @endif

                                                    @if (session('error_message'))
                                                        <div class="alert alert-danger">
                                                            <button type="button" class="close" data-dismiss="alert"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            {{ session('error_message') }}
                                                        </div>
                                                    @endif
                                                    {{-- end  message Section --}}

                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label>Choose Medical Supplies</label>
                                                            <select class="form-control" name="medicalSuppliesID"
                                                                required="">
                                                                @foreach ($allMedicalSupplies as $medicalSupplieses)
                                                                    <option value="{{ $medicalSupplieses->id }}">
                                                                        {{ $medicalSupplieses->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Quantity</label>
                                                            <input type="number" class="form-control" name="quantity"
                                                                required="" placeholder="Quantity">
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="inspectionID"
                                                        value="{{ $inspectionID }}">
                                                    <div class="card-footer text-center">
                                                        <button class="btn btn-primary" type="submit">Choose</button>

                                                    </div>
                                                </div>
                                            </form>

                                            <form method="get"
                                                action="{{ route('doctor.inspection.medicalRecord.choose.medicine', $inspectionID) }}">
                                                @csrf
                                                <input type="hidden" name="patientID" value="{{ $patientID }}">
                                                <button class="btn btn-primary" type="submit">Next</button>
                                            </form>

                                        </div>

                                    </div>

                                    @foreach ($medicalSupplies as $key => $medicalSupply)
                                        <div class="activity">
                                            <div class="activity-icon bg-primary text-white shadow-primary">
                                                <i class="fas fa-heartbeat"></i>

                                            </div>
                                            <div class="activity-detail">
                                                <div class="mb-2">
                                                    {{-- <span class="text-job text-primary">2 min ago</span> --}}
                                                    <span class="bullet"></span>
                                                    <a class="text-job" href="#">View Medical Supplies Details</a>
                                                    <div class="float-right dropdown">
                                                        <a href="#" data-toggle="dropdown"><i
                                                                class="fas fa-heartbeat"></i>
                                                        </a>
                                                        <div class="dropdown-menu">
                                                            <div class="dropdown-title">Options</div>
                                                            <a href="#" class="dropdown-item has-icon"><i
                                                                    class="fas fa-eye"></i> View</a>
                                                            <a href="#" class="dropdown-item has-icon"><i
                                                                    class="fas fa-list"></i> Detail</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a href="#" class="dropdown-item has-icon text-danger"
                                                                data-confirm="Wait, wait, wait...|This action can't be undone. Want to take risks?"
                                                                data-confirm-text-yes="Yes, IDC"><i
                                                                    class="fas fa-trash-alt"></i> Archive</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p>Medical Supplies Name "<a
                                                        href="#">{{ $medicalSupply->name }}</a>" with Quantity
                                                    {{ $medicalSuppliesQuantities[$key] }}.</p>
                                            </div>
                                        </div>
                                    @endforeach


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
