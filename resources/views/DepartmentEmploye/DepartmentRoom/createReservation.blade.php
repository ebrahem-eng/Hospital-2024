<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Add Room Reservation</title>

    @include('layouts.DepartmentEmploye.LinkHeader')

    <script>
        function calculateDuration() {
            const enterDate = document.getElementById('enterDate').value;
            const leaveDate = document.getElementById('leaveDate').value;

            if (enterDate && leaveDate) {
                const startDate = new Date(enterDate);
                const endDate = new Date(leaveDate);
                const duration = (endDate - startDate) / (1000 * 60 * 60 * 24);

                document.getElementById('duration').value = duration;
            }
        }
    </script>
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            @include('layouts.DepartmentEmploye.Header')

            <div class="main-sidebar sidebar-style-2">
                @include('layouts.DepartmentEmploye.Sidebar')
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="col-10 col-md-6 col-lg-12">
                        <div class="card">
                            <form method="POST" action="{{route('departmentEmploye.departmentRoom.reservation.store')}}" enctype="multipart/form-data">
                                @csrf

                                  

                                <div class="card-header">
                                    <h4>Add Room Reservation</h4>
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
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-4">
                                                <label>Enter Date</label>
                                                <input type="date" class="form-control" name="enterDate" id="enterDate" required="" onchange="calculateDuration()">
                                            </div>

                                            <div class="col-4">
                                                <label>Leave Date</label>
                                                <input type="date" class="form-control" name="leaveDate" id="leaveDate" required="" onchange="calculateDuration()">
                                            </div>

                                            <div class="col-4">
                                                <label>Duration(Day)</label>
                                                <input type="number" class="form-control" name="duration" id="duration" required="" readonly>
                                            </div>
                                        </div>

                                        <br>

                                        <div class="row">
                                            <div class="col-3">
                                                <label>Room</label>
                                                <select class="form-control select2" name="roomID" required>
                                                    @foreach ($rooms as $room)
                                                    <option value="{{$room->id}}">{{$room->name}} - {{$room->code}} - {{$room->type}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-3">
                                                <label>Patient</label>
                                                <select class="form-control select2" name="patientID" required>
                                                    @foreach ($patients as $patient)
                                                    <option value="{{$patient->id}}">{{$patient->name}} - {{$patient->email}}</option>
                                                    @endforeach
                                                </select>
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

    @include('layouts.DepartmentEmploye.LinkJS')
</body>

</html>
