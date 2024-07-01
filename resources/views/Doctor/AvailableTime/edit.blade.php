<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Update Available Time</title>

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

                    <div class="col-10 col-md-6 col-lg-12">
                        <div class="card">
                            <form method="POST"
                                action="{{ route('doctor.availableTime.update', $availableTime->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="card-header">
                                    <h4>Update Available Time</h4>
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
                                                <label>Choose Day</label>
                                                <select class="form-control" name="day" required="">
                                                    <option value="">Select a Day</option>

                                                    @foreach (['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'] as $day)
                                                        <option value="{{ $day }}"
                                                            {{ $day == $availableTime->dayName ? 'selected' : '' }}>
                                                            {{ $day }}</option>
                                                    @endforeach

                                                </select>
                                            </div>


                                            <div class="col-4">
                                                <label>Inspection Duration (Minutes)</label>
                                                <input type="number" class="form-control" name="inspectionDuration"
                                                    required="" value="{{ $availableTime->inspectionDuration }}">
                                            </div>
                                        </div>

                                        <br>
                                        <div class="row">

                                            <div class="col-4">
                                                <label>Start Inspection Time</label>
                                                <input type="time" class="form-control" name="startTime"
                                                    required="" value="{{ $availableTime->startTime }}">
                                            </div>


                                            <div class="col-4">
                                                <label>End Inspection Time</label>
                                                <input type="time" class="form-control" name="endTime" required=""
                                                    value="{{ $availableTime->endTime }}">
                                            </div>

                                        </div>

                                        <br>

                                    </div>

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

    @include('layouts.Doctor.LinkJS')
</body>

</html>
