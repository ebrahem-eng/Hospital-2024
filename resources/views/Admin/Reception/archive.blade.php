<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Reception Archive Table</title>

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
                                    <h4>Reception Archive Table</h4>
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
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Gender</th>
                                                    <th>Status</th>
                                                    <th>Age</th>
                                                    <th>Phone</th>
                                                    <th>Image</th>
                                                    <th>Created By</th>
                                                    <th>Created Date</th>
                                                    <th>Last Update Date</th>
                                                    <th>Deleted Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($receptions as $reception)
                                                    <tr>
                                                        <td>
                                                            {{ $reception->id }}
                                                        </td>
                                                        <td>{{ $reception->name }}</td>
                                                        <td class="align-middle">

                                                            {{ $reception->email }}
                                                        </td>
                                                        <td>
                                                            @if ($reception->gender == 0)
                                                                Female
                                                            @else
                                                                Male
                                                            @endif
                                                        </td>

                                                        <td>
                                                            @if ($reception->status == 1)
                                                                <div class="badge badge-success">Active</div>
                                                            @else
                                                                <div class="badge badge-danger">Not Active</div>
                                                            @endif

                                                        </td>
                                                        <td>{{ $reception->age }}</td>
                                                        <td>{{ $reception->phone }}</td>
                                                        <td><img src="{{ asset('image/' . $reception->img) }}"
                                                                style="width: 100px; height: 100px;"></td>

                                                        <td>{{ $reception->admin->name }}</td>
                                                        <td>
                                                            {{ $reception->created_at }}
                                                        </td>
                                                        <td>
                                                            {{ $reception->updated_at }}
                                                        </td>

                                                        <td>
                                                            {{ $reception->deleted_at }}
                                                        </td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button type="button"
                                                                    class="btn btn-secondary dropdown-toggle"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    <span class="visually-hidden">Detail</span>
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <form
                                                                        action="{{ route('admin.reception.restore', $reception->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        <button class="dropdown-item"
                                                                            type="submit">Restore</button>
                                                                    </form>

                                                                    <form
                                                                        action="{{ route('admin.reception.force.delete', $reception->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button class="dropdown-item" type="submit"
                                                                            style="color: red">Force Delete</button>
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
</body>

</html>
