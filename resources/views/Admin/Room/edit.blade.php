<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Update Room</title>

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
                            <form method="POST" action="{{ route('admin.room.update', $room->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="card-header">
                                    <h4>Update Room</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col">
                                                <label>Name</label>
                                                <input type="text" class="form-control" name="name"
                                                    value="{{ $room->name }}" required="">
                                            </div>

                                            <div class="col">
                                                <label>Code</label>
                                                <input type="text" class="form-control" name="code"
                                                    value="{{ $room->code }}" required="">
                                            </div>
                                        </div>

                                        <br>

                                        <div class="row">



                                            <div class="col-3">
                                                <label>Status</label>
                                                <select class="form-control select2" name="status" required>
                                                    <option value="1" {{ $room->status === 1 ? 'selected' : '' }}>
                                                        Active
                                                    </option>
                                                    <option value="0" {{ $room->status === 0 ? 'selected' : '' }}>
                                                        Not
                                                        Active</option>
                                                </select>
                                            </div>

                                            <div class="col-3">
                                                <label>Department</label>
                                                <select class="form-control select2" name="departmentID" required>
                                                    @foreach ($departments as $department)
                                                        <option value="{{ $department->id }}"
                                                            {{ $room->department_id === $department->id ? 'selected' : '' }}>
                                                            {{ $department->name }}</option>
                                                    @endforeach

                                                </select>
                                            </div>

                                            <div class="col-3">
                                                <label>Floor</label>
                                                <select class="form-control select2" name="floorID" required>
                                                    @foreach ($floors as $floor)
                                                        <option value="{{ $floor->id }}"
                                                            {{ $room->floor_id === $floor->id ? 'selected' : '' }}>
                                                            {{ $floor->name }}</option>
                                                    @endforeach

                                                </select>
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
