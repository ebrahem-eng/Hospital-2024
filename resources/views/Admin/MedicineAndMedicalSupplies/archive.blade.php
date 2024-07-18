<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Medicine And Medical Supplies Archive</title>

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
                                    <h4>Medicine Archive Table</h4>
                                </div>

                                {{-- message Section --}}
                                @if (session('success_message_medicine'))
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        {{ session('success_message_medicine') }}
                                    </div>
                                @endif

                                @if (session('error_message_medicine'))
                                    <div class="alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        {{ session('error_message_medicine') }}
                                    </div>
                                @endif
                                {{-- end  message Section --}}
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="medicine-table">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th>Name</th>
                                                    <th>Calibres</th>
                                                    <th>Original Quantity</th>
                                                    <th>Price</th>
                                                    <th>Details</th>
                                                    <th>Image</th>
                                                    <th>Deleted Quantity</th>
                                                    <th>Created By</th>
                                                    <th>Created Date</th>
                                                    <th>Last Update Date</th>
                                                    <th>Deleted Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($medicines as $medicine)
                                                    <tr>
                                                        <td>{{ $medicine->id }}</td>
                                                        <td>{{ $medicine->name }}</td>
                                                        <td class="align-middle">{{ $medicine->calibres }}</td>
                                                        <td>{{ $medicine->quantity }}</td>
                                                        <td>{{ $medicine->price }}</td>
                                                        <td>{{ $medicine->details }}</td>
                                                        <td><img src="{{ asset('image/' . $medicine->img) }}" style="width: 100px; height: 100px;"></td>
                                                        <td>{{ $medicine->deletedQuantity }}</td>
                                                        <td>{{ $medicine->storeKeeper->name }}</td>
                                                        <td>{{ $medicine->created_at }}</td>
                                                        <td>{{ $medicine->updated_at }}</td>
                                                        <td>{{ $medicine->deleted_at }}</td>
                                                        <td id="action-medicine-{{ $medicine->id }}">
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <span class="visually-hidden">Detail</span>
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <form action="{{ route('admin.medicineMedicalSupplies.restore.all.medicine', $medicine->id) }}" method="POST">
                                                                        @csrf
                                                                        @method('put')
                                                                        <button class="dropdown-item" type="submit">Restore All Medicine</button>
                                                                    </form>
                                                                    <a class="dropdown-item" href="#" onclick="showCustomQuantityMedicineInput({{ $medicine->id }})">Restore Custom Quantity</a>
                                                                    <form action="{{ route('admin.medicineMedicalSupplies.force.delete.all.medicine', $medicine->id) }}" method="POST">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button class="dropdown-item" type="submit" style="color: red">Force Delete</button>
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
                    <br>
                </section>

                <section class="section">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Medical Supplies Archive Table</h4>
                                </div>

                                {{-- message Section --}}
                                @if (session('success_message_medicalSupplies'))
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        {{ session('success_message_medicalSupplies') }}
                                    </div>
                                @endif

                                @if (session('error_message_medicalSupplies'))
                                    <div class="alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        {{ session('error_message_medicalSupplies') }}
                                    </div>
                                @endif
                                {{-- end  message Section --}}
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="medical-supplies-table">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th>Name</th>
                                                    <th>Type</th>
                                                    <th>Details</th>
                                                    <th>Status</th>
                                                    <th>Quantity</th>
                                                    <th>Image</th>
                                                    <th>Deleted Quantity</th>
                                                    <th>Created By</th>
                                                    <th>Created Date</th>
                                                    <th>Last Update Date</th>
                                                    <th>Deleted Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($medicalSupplieses as $medicalSupplies)
                                                    <tr>
                                                        <td>{{ $medicalSupplies->id }}</td>
                                                        <td>{{ $medicalSupplies->name }}</td>
                                                        <td class="align-middle">{{ $medicalSupplies->type }}</td>
                                                        <td>{{ $medicalSupplies->details }}</td>
                                                        <td>
                                                            @if ($medicalSupplies->status == 1)
                                                                <div class="badge badge-success">Active</div>
                                                            @else
                                                                <div class="badge badge-danger">Not Active</div>
                                                            @endif
                                                        </td>
                                                        <td>{{ $medicalSupplies->quantity }}</td>
                                                        <td><img src="{{ asset('image/' . $medicalSupplies->img) }}" style="width: 100px; height: 100px;"></td>
                                                        <td>{{ $medicalSupplies->deletedQuantity }}</td>
                                                        <td>{{ $medicalSupplies->storeKeeper->name }}</td>
                                                        <td>{{ $medicalSupplies->created_at }}</td>
                                                        <td>{{ $medicalSupplies->updated_at }}</td>
                                                        <td>{{ $medicalSupplies->deleted_at }}</td>
                                                        <td id="action-medical-supplies-{{ $medicalSupplies->id }}">
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <span class="visually-hidden">Detail</span>
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <form action="{{ route('admin.medicineMedicalSupplies.restore.all.medicalSupplies', $medicalSupplies->id) }}" method="POST">
                                                                        @csrf
                                                                        @method('put')
                                                                        <button class="dropdown-item" type="submit">Restore All MedicalSupplies</button>
                                                                    </form>
                                                                    <a class="dropdown-item" href="#" onclick="showCustomQuantityMedicalSuppliesInput({{ $medicalSupplies->id }})">Restore Custom Quantity</a>
                                                                    <form action="{{ route('admin.medicineMedicalSupplies.force.delete.all.medicalSupplies', $medicalSupplies->id) }}" method="POST">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button class="dropdown-item" type="submit" style="color: red">Force Delete</button>
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

    @include('layouts.Admin.LinkJS')
    <script>
        function showCustomQuantityMedicineInput(medicineId) {
            const actionCell = document.getElementById('action-medicine-' + medicineId);
            actionCell.innerHTML = `
                <form action="/admin/medicine/medicalSupplies/archive/restor/custom/medicine/${medicineId}" method="POST">
                    @csrf
                    @method('put')
                    <input type="number" name="restoredQuantity" class="custom-input" id="custom-input-${medicineId}" placeholder="Enter quantity" style="display: block; margin-top: 0;">
                    <br>
                    <button type="submit" class="btn btn-success" id="confirm-btn-${medicineId}" style="display: inline-block; margin-top: 0;">Confirm</button>
                </form>`;
        }

        function showCustomQuantityMedicalSuppliesInput(medicalSuppliesId) {
            const actionCell = document.getElementById('action-medical-supplies-' + medicalSuppliesId);
            actionCell.innerHTML = `
                <form action="/admin/medicine/medicalSupplies/archive/restor/custom/medicalSupplies/${medicalSuppliesId}" method="POST">
                    @csrf
                    @method('put')
                    <input type="number" name="restoredQuantity" class="custom-input" id="custom-input-${medicalSuppliesId}" placeholder="Enter quantity" style="display: block; margin-top: 0;">
                    <br>
                    <button type="submit" class="btn btn-success" id="confirm-btn-${medicalSuppliesId}" style="display: inline-block; margin-top: 0;">Confirm</button>
                </form>`;
        }
    </script>
</body>

</html>
