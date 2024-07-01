<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Update Surgeries</title>

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
                    <div class="section-header">
                        <h1>Surgeries</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                            <div class="breadcrumb-item">Surgeries</div>
                        </div>
                    </div>
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="activities">

                                    <div class="col-6 col-md-6 col-lg-12">
                                        <div class="card">

                                            <form method="POST"
                                                action="{{ route('doctor.surgeries.update', $surgeries->id) }}"
                                                action="" enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4>Surgeries Details</h4>
                                                    </div>

                                                    {{-- message Section --}}

                                                    @if (session('success_message'))
                                                        <div class="alert alert-success">
                                                            <button type="button" class="close" data-dismiss="alert"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            {{ session('success_message') }}
                                                        </div>
                                                    @endif

                                                    @if (session('error_message'))
                                                        <div class="alert alert-danger">
                                                            <button type="button" class="close" data-dismiss="alert"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            {{ session('error_message') }}
                                                        </div>
                                                    @endif
                                                    {{-- end  message Section --}}
                                                    <div class="card-body">


                                                        <div class="row">
                                                            <div class="col-5">
                                                                <label>Name</label>
                                                                <input type="text" class="form-control"
                                                                    name="name" placeholder="name"
                                                                    value="{{ $surgeries->name }}">
                                                            </div>

                                                            <div class="col">
                                                                <label>Details</label>
                                                                <input type="text" class="form-control"
                                                                    name="details" placeholder="............."
                                                                    value="{{ $surgeries->details }}">
                                                            </div>


                                                        </div>
                                                        <br>
                                                        <div class="row">

                                                            <div class="col">
                                                                <label>Report</label>
                                                                <input type="text" class="form-control"
                                                                    name="report" placeholder="Report Surgeries"
                                                                    style="height: 100px;"
                                                                    value="{{ $surgeries->report }}">
                                                            </div>
                                                        </div>
                                                        <br>

                                                        <div class="row">

                                                            <div class="col">
                                                                <label>Surgeries Result</label>
                                                                <input type="text" class="form-control"
                                                                    name="surgeriesResult"
                                                                    placeholder="Report Surgeries"
                                                                    style="height: 100px;"
                                                                    value="{{ $surgeries->surgeriesResult }}">
                                                            </div>
                                                        </div>
                                                        <br>

                                                    </div>

                                                    <div class="card-footer text-center">

                                                        <button class="btn btn-primary" type="submit">Update</button>

                                                    </div>
                                                </div>
                                            </form>

                                        </div>

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
