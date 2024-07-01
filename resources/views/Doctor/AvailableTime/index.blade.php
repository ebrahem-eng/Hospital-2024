<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title> Available Time Table </title>

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
                                    <h4> Available Time Table </h4>
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
                                                    <th>Day Name</th>
                                                    <th>Start Time</th>
                                                    <th>End Time</th>
                                                    <th>Inspection Duration</th>
                                                    <th>Doctor Name</th>
                                                    <th>Created Date</th>
                                                    <th>Last Updated Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($availableTimes as $availableTime)
                                                    <tr>
                                                        <td>
                                                            {{ $availableTime->id }}
                                                        </td>
                                                        <td>{{ $availableTime->dayName }}</td>
                                                        <td>
                                                            {{ $availableTime->startTime }}
                                                        </td>
                                                        <td>
                                                            {{ $availableTime->endTime }}

                                                        </td>
                                                        <td>
                                                            {{ $availableTime->inspectionDuration }}
                                                        </td>

                                                        <td>
                                                            {{ $availableTime->doctor->name }}
                                                        </td>

                                                        <td>
                                                            {{ $availableTime->created_at }}
                                                        </td>
                                                        <td>
                                                            {{ $availableTime->updated_at }}
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
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('doctor.availableTime.edit', $availableTime->id) }}"
                                                                        style="size: 20px;">Edit</a>

                                                                    <form
                                                                        action="{{ route('doctor.availableTime.delete', $availableTime->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button class="dropdown-item" type="submit"
                                                                            style="color: red">Delete</button>
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

    @include('layouts.Doctor.LinkJS')
</body>

</html>
