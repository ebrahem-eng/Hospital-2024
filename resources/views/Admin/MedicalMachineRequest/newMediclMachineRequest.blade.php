<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Medical Machine Request Table</title>

    @include('layouts.Admin.LinkHeader')

</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            @include('layouts.Admin.Header')

            <div class="main-sidebar sidebar-style-2">


                @include('layouts.Admin.Sidebar')
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
                                                    <th class="text-center">#</th>
                                                    <th>Doctor Name</th>
                                                    <th>Medical Machine Name</th>
                                                    <th>Medical Machine Details</th>
                                                    <th>Medical Machine Image</th>
                                                    <th>Medical Machine Quantity</th>
                                                    <th>Store Keeper Name</th>
                                                    <th>Store Keeper Email</th>
                                                    <th>Admin Name</th>
                                                    <th>Admin Email</th>
                                                    <th>Request Status</th>
                                                    <th>Refuse Cause</th>
                                                    <th>Details Request</th>
                                                    <th>Taken Date</th>
                                                    <th>Return Date Doctor</th>
                                                    <th>Status Store Keeper Returned</th>
                                                    <th>Return Date Store Keeper</th>
                                                    <th>Created Date</th>
                                                    <th>Last Updated Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($medicalMachineRequests as $medicalMachineRequest)
                                                <tr>
                                                    <td>{{ $medicalMachineRequest->id }}</td>
                                                    <td>{{ $medicalMachineRequest->doctor->name }}</td>
                                                    <td>{{ $medicalMachineRequest->medicalMachine->name }}</td>
                                                    <td>{{ $medicalMachineRequest->medicalMachine->details }}</td>
                                                    <td><img src="{{ asset('image/' . $medicalMachineRequest->medicalMachine->img) }}" style="width: 100px; height: 100px;"></td>
                                                    <td>{{ $medicalMachineRequest->quantity }}</td>
                                                    <td>{{ $medicalMachineRequest->storeKeeper->name ?? '-' }}</td>
                                                    <td>{{ $medicalMachineRequest->storeKeeper->email ?? '-' }}</td>
                                                    <td>{{ $medicalMachineRequest->admin->name ?? '-' }}</td>
                                                    <td>{{ $medicalMachineRequest->admin->email ?? '-' }}</td>
                                                    <td>
                                                        @if($medicalMachineRequest->status == 0)
                                                        Pending Store Keeper Accept
                                                        @elseif($medicalMachineRequest->status == 1)
                                                        Accepted By Store Keeper Pending Admin Accept
                                                        @elseif($medicalMachineRequest->status == 2)
                                                        Accepted By Admin
                                                        @elseif($medicalMachineRequest->status == 3)
                                                        Reject By Store Keeper
                                                        @elseif($medicalMachineRequest->status == 4)
                                                        Reject By Admin
                                                        @elseif($medicalMachineRequest->status == 5)
                                                        Canceled By Doctor
                                                        @endif
                                                    </td>
                                                    <td>{{ $medicalMachineRequest->refuseCause ?? '-' }}</td>
                                                    <td>{{ $medicalMachineRequest->detailsRequest }}</td>
                                                    <td>{{ $medicalMachineRequest->takenDate }}</td>
                                                    <td>{{ $medicalMachineRequest->returnDateDoctor }}</td>
                                                    <td>
                                                        @if($medicalMachineRequest->statusStoreKeeperReturned == 0)
                                                        Pending Doctor Returned
                                                        @else
                                                        Returned Successfully
                                                        @endif
                                                    </td>
                                                    <td>{{ $medicalMachineRequest->returnDateStoreKeeper ?? '-' }}</td>
                                                    <td>{{ $medicalMachineRequest->created_at }}</td>
                                                    <td>{{ $medicalMachineRequest->updated_at }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <span class="visually-hidden">Detail</span>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <form action="{{ route('admin.medicalMachineRequest.new.accept', $medicalMachineRequest->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('put')
                                                                    <button class="dropdown-item" type="submit" style="font-size: 12px; padding: 5px 10px;">Accept</button>
                                                                </form>
                                                                <form action="{{ route('admin.medicalMachineRequest.new.reject', $medicalMachineRequest->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('put')
                                                                    <button class="dropdown-item" type="button" style="color: red" onclick="toggleRejectInput({{ $medicalMachineRequest->id }})">Reject</button>
                                                                    <div id="reject-input-{{ $medicalMachineRequest->id }}" class="reject-input" style="display: none;">
                                                                        <input type="text" name="refuseCause" class="form-control" placeholder="Cause for rejection">
                                                                        <button class="btn btn-danger mt-2" type="submit">Submit Rejection</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        
                                        <script>
                                            function toggleRejectInput(id) {
                                                var inputDiv = document.getElementById('reject-input-' + id);
                                                if (inputDiv.style.display === 'none') {
                                                    inputDiv.style.display = 'block';
                                                } else {
                                                    inputDiv.style.display = 'none';
                                                }
                                            }
                                        </script>
                                        
                                        <style>
                                            .reject-input {
                                                padding: 10px;
                                                border: 1px solid #ddd;
                                                border-radius: 5px;
                                                background-color: #f9f9f9;
                                                margin-top: 10px;
                                            }
                                        
                                            .reject-input .form-control {
                                                width: 100%;
                                                margin-bottom: 10px;
                                            }
                                        
                                            .reject-input .btn {
                                                width: 100%;
                                            }
                                        </style>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
            </div>

        </div>
    </div>

    @include('layouts.Admin.LinkJS')
</body>

</html>
