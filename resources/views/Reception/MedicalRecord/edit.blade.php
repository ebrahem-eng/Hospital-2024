<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Update Medical Record</title>

    @include('layouts.Reception.LinkHeader')

</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            @include('layouts.Reception.Header')

            <div class="main-sidebar sidebar-style-2">


                @include('layouts.Reception.Sidebar')
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">

                    <div class="col-10 col-md-6 col-lg-12">
                        <div class="card">
                            <form method="POST" action="{{ route('reception.medicalRecord.update' , $medicalRecord->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-header">
                                    <h4>Update Medical Record</h4>
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
                                                <label>Patient ID</label>
                                                <input type="number" class="form-control" name="patientID"
                                                    required="" placeholder="#" value="{{$medicalRecord->paitentID}}" readonly>
                                            </div>

                                            <div class="col">
                                                <label>Details</label>
                                                <input type="text" class="form-control" name="details"
                                                    required="" value="{{$medicalRecord->details}}">
                                            </div>
                                        </div>
                                        
                                        <br>

                                        <div class="row">
                                            <div class="col-3">
                                                <label>Doctors</label>
                                                <select class="form-control select2" name="doctorID" required>
                                                    @foreach ($doctors as $doctor)
                                                        <option value="{{ $doctor->id }}" {{ $medicalRecord->doctorID === $doctor->id ? 'selected' : '' }}>
                                                            {{ $doctor->name }}</option>
                                                    @endforeach

                                                </select>
                                            </div>

                                        </div>

                                        <br>

                                    </div>

                                </div>
                                <div class="card-footer text-center">
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </section>
            </div>

        </div>
    </div>

    @include('layouts.Reception.LinkJS')
</body>

</html>
