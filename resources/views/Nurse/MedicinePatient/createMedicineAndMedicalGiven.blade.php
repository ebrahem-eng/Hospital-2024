<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Create Given</title>

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

                    <div class="col-10 col-md-6 col-lg-12">
                        <div class="card">
                            <form method="POST" action="{{ route('nurse.medicine.medicalSupplies.patient.medicine.medicalSupplies.store.given') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-header">
                                    <h4>Create Given</h4>
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
                                            <div class="col-3">
                                                <label>Date</label>
                                                <input type="date" class="form-control" name="date"
                                                    required="" placeholder="#">
                                            </div>

                                            <div class="col-3">
                                                <label>Hour</label>
                                                <input type="time" class="form-control" name="hour"
                                                    required="">
                                            </div>
                                        </div>

                                        <br>

                                    </div>
                                    <input type="hidden" value="{{$patientRoomID}}" name="patientRoomID"/>
                                    <input type="hidden" value="{{$medicalSuppliesInsID}}" name="medicalSuppliesInsID"  /> 
                                    <input type="hidden" value="{{$medicineInsPatientID}}" name="medicineInsPatientID"  /> 
                                </div>
                                <div class="card-footer text-center">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </section>
            </div>

        </div>
    </div>

    @include('layouts.Nurse.LinkJS')
</body>

</html>
