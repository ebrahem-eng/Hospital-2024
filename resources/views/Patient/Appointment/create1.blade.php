<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Add Appointment</title>

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

                    <div class="col-10 col-md-6 col-lg-12">
                        <div class="card">
                            <form method="get" action="{{ route('patient.appointment.create2') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-header">
                                    <h4>Add Appointment</h4>
                                </div>

                                {{-- message Section --}}
                                @if (session('success_message'))
                                    <div class="alert alert-success" id="success-alert">
                                        <button type="button" class="close" onclick="closeAlert('success-alert')"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        {{ session('success_message') }}
                                    </div>
                                @endif

                                @if (session('error_message'))
                                    <div class="alert alert-danger" id="error-alert">
                                        <button type="button" class="close" onclick="closeAlert('error-alert')"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        {{ session('error_message') }}
                                    </div>
                                @endif



                                {{-- end  message Section --}}

                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">

                                            <div class="col-5">
                                                <label>Choose Doctor</label>
                                                <select class="form-control" name="doctorID" required="">
                                                    @foreach ($doctors as $doctor)
                                                        <option value="{{ $doctor->id }}">
                                                            {{ $doctor->name }} - {{ $doctor->specialization->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>


                                    </div>
                                </div>

                                <div class="card-footer text-center">
                                    <button class="btn btn-primary" type="submit">Next</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </section>
            </div>

        </div>
    </div>

    @include('layouts.Patient.LinkJS')
</body>

</html>
