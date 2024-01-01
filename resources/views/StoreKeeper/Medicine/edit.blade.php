<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Edit Medicine</title>

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
                            <form method="POST" action="{{ route('storeKeeper.medicine.update' , $medicine->id ) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="card-header">
                                    <h4>Update Medicine</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col">
                                                <label>Name</label>
                                                <input type="text" class="form-control" name="name" required=""
                                                    value="{{ $medicine->name }}">
                                            </div>

                                            <div class="col">
                                                <label>Calibres</label>
                                                <input type="number" class="form-control" name="calibres"
                                                    required="" value="{{ $medicine->calibres }}">
                                            </div>
                                        </div>

                                        <br>

                                        <div class="row">
                                            <div class="col-3">
                                                <label>Quantity</label>
                                                <input type="number" class="form-control" name="quantity"
                                                    required="" value="{{ $medicine->quantity }}">
                                            </div>

                                            <div class="col-3">
                                                <label>Price</label>
                                                <input type="number" class="form-control" name="price" required=""
                                                    value="{{ $medicine->price }}">
                                            </div>

                                            <div class="col">
                                                <label>Details</label>
                                                <input type="text" class="form-control" name="details" required=""
                                                    value="{{ $medicine->details }}">
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
