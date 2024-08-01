<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Medicine Given History Table</title>

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
                                    <h4>Medicine Given History Table</h4>
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
                                    <form method="GET" action="{{route('nurse.medicine.medicalSupplies.patient.medicine.medicalSupplies.create.given')}}">
                                        @csrf
                                        <input type="hidden" value="{{$patientRoomID}}" name="patientRoomID"/>
                                        <input type="hidden" value="{{$medicineInsPatientID}}" name="medicineInsPatientID"  /> 
                                        <button 
                                        class="btn btn-primary" type="submit">
                                        <span >Add Givens</span>
                                    </button>
                                    </form>

                                <br>
            
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="table-1">
                                     
                                            <thead>
                                                
                                                <tr>
                                                    <th class="text-center">
                                                        #
                                                    </th>
                                                    <th>Given Date</th>
                                                    <th>Given Day</th>
                                                    <th>Hour</th>
                                                    <th>Nurse Name</th>
                                                    <th>Nurse Email</th>
                                                    <th>Nurse Phone</th>
                                                    <th>Created Date</th>
                                                    <th>Last Update Date</th>

                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($medicineGivens as $medicineGiven)
                                                    <tr>
                                                        <td>{{ $medicineGiven->id }}</td>
                                                        <td>{{ $medicineGiven->date }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($medicineGiven->date)->format('l') }}</td>
                                                        <td>{{ $medicineGiven->hour }}</td>
                                                        <td>{{ $medicineGiven->nurse->name }}</td>
                                                        <td>{{ $medicineGiven->nurse->email }}</td>
                                                        <td>{{ $medicineGiven->nurse->phone }}</td>
                                                        <td>{{ $medicineGiven->created_at }}</td>
                                                        <td>{{ $medicineGiven->updated_at }}</td>
                                                        
                                                   

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
