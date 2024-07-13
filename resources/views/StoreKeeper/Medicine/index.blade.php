<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Medicine Table</title>

    @include('layouts.StoreKeeper.LinkHeader')

    <style>
        .custom-input, .confirm-btn {
            display: none;
            margin-top: 10px;
        }

        .confirm-btn {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        .confirm-btn:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            @include('layouts.StoreKeeper.Header')

            <div class="main-sidebar sidebar-style-2">
                @include('layouts.StoreKeeper.Sidebar')
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Medicine Table</h4>
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
                                                    <th>Name</th>
                                                    <th>Calibres</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                    <th>Details</th>
                                                    <th>Image</th>
                                                    <th>Deleted Quantity</th>
                                                    <th>Created By</th>
                                                    <th>Created Date</th>
                                                    <th>Last Update Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($medicines as $medicine)
                                                    <tr>
                                                        <td>{{ $medicine->id }}</td>
                                                        <td>{{ $medicine->name }}</td>
                                                        <td>{{ $medicine->calibres }}</td>
                                                        <td>{{ $medicine->quantity }}</td>
                                                        <td>{{ $medicine->price }}</td>
                                                        <td>{{ $medicine->details }}</td>
                                                        <td><img src="{{ asset('image/' . $medicine->img) }}" style="width: 100px; height: 100px;"></td>
                                                        <td>{{ $medicine->deletedQuantity }}</td>
                                                        <td>{{ $medicine->storeKeeper->name }}</td>
                                                        <td>{{ $medicine->created_at }}</td>
                                                        <td>{{ $medicine->updated_at }}</td>
                                                        <td id="action-{{ $medicine->id }}">
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <span class="visually-hidden">Detail</span>
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item" href="{{ route('storeKeeper.medicine.edit', $medicine->id) }}" style="size: 20px;">Edit</a>
                                                                    <a class="dropdown-item" href="#" onclick="showCustomQuantityInput({{ $medicine->id }})">Delete Custom Quantity</a>
                                                                    <form action="{{ route('storeKeeper.medicine.soft.delete', $medicine->id) }}" method="POST">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button class="dropdown-item" type="submit" style="color: red">Delete All</button>
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

    @include('layouts.StoreKeeper.LinkJS')

    <script>
        function showCustomQuantityInput(medicineId) {
            // Hide the action buttons
            const actionCell = document.getElementById('action-' + medicineId);
            actionCell.innerHTML = `
                <form action="/storeKeeper/medicine/delete/custom/quantity/${medicineId}" method="POST">
                    @csrf
                    @method('put')
                    <input type="number" name="deletedQuantity" class="custom-input" id="custom-input-${medicineId}" placeholder="Enter quantity" style="display: block; margin-top: 0;">
                    <br>
                    <button type="submit" class="btn btn-success" id="confirm-btn-${medicineId}" style="display: inline-block; margin-top: 0;">Confirm</button>
                </form>`;
        }
    </script>
    
</body>
</html>
