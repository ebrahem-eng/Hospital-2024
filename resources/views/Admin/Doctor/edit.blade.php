<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Update Doctor</title>

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

                    <div class="col-10 col-md-6 col-lg-12">
                        <div class="card">
                            <form method="POST" action="{{route('admin.doctor.update' , $doctor->id)}}" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="card-header">
                                    <h4>Update Doctor</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col">
                                                <label>Name</label>
                                                <input type="text" class="form-control" name="name" value="{{$doctor->name}}"
                                                    required="">
                                            </div>

                                            <div class="col">
                                                <label>Email</label>
                                                <input type="email" class="form-control" name="email" value="{{$doctor->email}}"
                                                    required="">
                                            </div>
                                        </div>

                                        <br>

                                        <div class="row">

                                            <div class="col-4">
                                                <label>Phone</label>
                                                <input type="tel" class="form-control" name="phone"
                                                    required="" value="{{$doctor->phone}}">
                                            </div>

                                            <div class="col-2">
                                                <label>Age</label>
                                                <input type="number" class="form-control" name="age"
                                                    required="" value="{{$doctor->age}}">
                                            </div>

                                        </div>

                                        <br>

                                        <div class="row">

                                            <div class="col-3">
                                                <label>Gender</label>
                                                <select class="form-control select2" name="gender" required>
                                                    <option value="1" {{ $doctor->gender === 1 ? 'selected' : '' }}>Male</option>
                                                    <option value="0" {{ $doctor->gender === 0 ? 'selected' : '' }}>Female</option>
                                                </select>
                                            </div>

                                            <div class="col-3">
                                                <label>Status</label>
                                                <select class="form-control select2" name="status" required>
                                                    <option value="1" {{ $doctor->status === 1 ? 'selected' : '' }}>Active</option>
                                                    <option value="0" {{ $doctor->status === 0 ? 'selected' : '' }}>Not Active</option>
                                                </select>
                                            </div>

                                            <div class="col-3">
                                                <label>Specialization</label>
                                                <select class="form-control select2" name="specializationID" required>
                                                    @foreach ($specializations as $specialization)
                                                        <option value="{{ $specialization->id }}" {{ $doctor->specialization_id === $specialization->id ? 'selected' : '' }}>
                                                            {{ $specialization->name }}</option>
                                                    @endforeach

                                                </select>
                                            </div>

                                        </div>

                                        <br>

                                        <div class="row">

                                            <div class="col-5">
                                                <label>Image</label>
                                                <input type="file" class="form-control" name="img"
                                                    >
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

    @include('layouts.Admin.LinkJS')
</body>

</html>
