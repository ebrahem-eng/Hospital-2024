<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Medical Machine Request Table</title>

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
                                    <h4>Medical Machine Request Table</h4>
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
                                                    <th>Medical Machine Name</th>
                                                    <th>Medical Machine Details</th>
                                                    <th>Medical Machine Image</th>
                                                    <th>Store Keeper Accept Name</th>
                                                    <th>Store Keeper Accept Email</th>
                                                    <th>Admin Name</th>
                                                    <th>Admin Email</th>
                                                    <th>Request Status</th>
                                                    <th>Refuse Cause</th>
                                                    <th>Details Request</th>
                                                    <th>Created Date</th>
                                                    <th>Last Updated Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($medicalMachineRequests as $medicalMachineRequest)
                                                    <tr>
                                                        <td>
                                                            {{ $medicalMachineRequest->id }}
                                                        </td>
                                                        <td>{{ $medicalMachineRequest->doctor->name }}</td>
                                                        <td>
                                                            {{ $medicalMachineRequest->medicalMachine->name }}
                                                        </td>
                                                        <td>
                                                            {{ $medicalMachineRequest->medicalMachine->details }}

                                                        </td>

                                                        <td><img src="{{ asset('image/' . $medicalMachineRequest->medicalMachine->img) }}"
                                                                style="width: 100px; height: 100px;"></td>

                                                        <td>
                                                            {{ $medicalMachineRequest->storeKeeper->name ?? '-' }}
                                                        </td>

                                                        <td>
                                                            {{ $medicalMachineRequest->storeKeeper->email ?? '-' }}
                                                        </td>

                                                        <td>
                                                            {{ $medicalMachineRequest->admin->name ?? '-' }}
                                                        </td>



                                                        <td> {{ $medicalMachineRequest->admin->email ?? '-' }}</td>

                                                        <td>
                                                            @if($medicalMachineRequest->status == 0)
                                                            Pending Store Keeper Accept
                                                            @elseif($medicalMachineRequest->status == 1)
                                                            Pending Admin Accept
                                                            @elseif($medicalMachineRequest->status == 2)
                                                             Accepted
                                                             @elseif($medicalMachineRequest->status == 3)
                                                             Refused
                                                             @elseif($medicalMachineRequest->status == 4)
                                                             Canceled
                                                             @endif
                                                        </td>

                                                        <td>{{ $medicalMachineRequest->refuseCause ?? '-' }}</td>

                                                        <td>{{ $medicalMachineRequest->detailsRequest }}</td>

                                                        <td>
                                                            {{ $medicalMachineRequest->created_at }}
                                                        </td>
                                                        <td>
                                                            {{ $medicalMachineRequest->updated_at }}
                                                        </td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button type="button"
                                                                    class="btn btn-secondary dropdown-toggle"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    <span class="visually-hidden">Detail</span>
                                                                </button>
                                                                @if($medicalMachineRequest->status == 0)
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('doctor.medicalMachineRequest.edit', $medicalMachineRequest->id) }}"
                                                                        style="size: 20px;">Edit</a>

                                                                    <form
                                                                        action="{{ route('doctor.medicalMachineRequest.cancel', $medicalMachineRequest->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('put')
                                                                        <button class="dropdown-item" type="submit"
                                                                            style="color: red">Cancel</button>
                                                                    </form>

                                                                </div>
                                                                @endif
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
