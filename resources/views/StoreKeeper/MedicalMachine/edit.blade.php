<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Update Medical Machine</title>

    @include('layouts.StoreKeeper.LinkHeader')

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

                    <div class="col-10 col-md-6 col-lg-12">
                        <div class="card">
                            <form method="POST"
                                action="{{ route('storeKeeper.medicalMachine.update', $medicalMachine->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="card-header">
                                    <h4>Update Medical Machine</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-5">
                                                <label>Name</label>
                                                <input type="text" class="form-control" name="name" required=""
                                                    value="{{ $medicalMachine->name }}">
                                            </div>

                                            <div class="col-4">
                                                <label>Quantity</label>
                                                <input type="number" class="form-control" name="quantity"
                                                    required="" value="{{ $medicalMachine->quantity }}">
                                            </div>
                                        </div>

                                        <br>

                                        <div class="row">


                                            <div class="col-4">
                                                <label>Status</label>
                                                <select class="form-control select2" name="status" required>
                                                    <option value="1"
                                                        {{ $medicalMachine->status === 1 ? 'selected' : '' }}>Active
                                                    </option>
                                                    <option value="0"
                                                        {{ $medicalMachine->status === 0 ? 'selected' : '' }}>Not Active
                                                    </option>
                                                </select>
                                            </div>

                                            <div class="col-5">
                                                <label>Details</label>
                                                <input type="text" class="form-control" name="details" required=""
                                                    value="{{ $medicalMachine->details }}">
                                            </div>

                                        </div>

                                        <br>

                                        <div class="row">

                                            <div class="col-5">
                                                <label>Image</label>
                                                <input type="file" class="form-control" name="img">
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

    @include('layouts.StoreKeeper.LinkJS')
</body>

</html>
