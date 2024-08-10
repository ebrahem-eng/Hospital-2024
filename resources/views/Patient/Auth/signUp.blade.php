<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Register &mdash; Stisla</title>

    @include('layouts.Patient.LinkHeader')
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="login-brand">
                            <img src="{{ asset('DashboardAssets/assets/img/stisla-fill.svg') }}" alt="logo"
                                width="100" class="shadow-light rounded-circle">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Register</h4>
                            </div>


                                 {{-- message Section --}}
                                 @if (session('success_message'))
                                 <div class="alert alert-success" id="success-alert">
                                     <button type="button" class="close" onclick="closeAlert('success-alert')"
                                         aria-label="Close">
                                         <span aria-hidden="true">&times;</span>
                                     </button>
                                     {{ session('success_message') }}
                                 </div>
                             @endif

                             @if (session('error_message'))
                                 <div class="alert alert-danger" id="error-alert">
                                     <button type="button" class="close" onclick="closeAlert('error-alert')"
                                         aria-label="Close">
                                         <span aria-hidden="true">&times;</span>
                                     </button>
                                     {{ session('error_message') }}
                                 </div>
                             @endif



                             {{-- end  message Section --}}
                            <div class="card-body">
                                <form method="POST" action="{{route('patient.signUp.store')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="frist_name">Name</label>
                                            <input id="frist_name" type="text" class="form-control" name="name"
                                                autofocus required>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="last_name">Phone</label>
                                            <input id="last_name" type="tel" class="form-control" name="phone"
                                                required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control" name="email"
                                            required>
                                        <div class="invalid-feedback">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="password" class="d-block">Password</label>
                                            <input id="password" type="password" class="form-control pwstrength"
                                                data-indicator="pwindicator" name="password">
                                            <div id="pwindicator" class="pwindicator">
                                                <div class="bar"></div>
                                                <div class="label"></div>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <label>Gender</label>
                                            <select class="form-control select2" name="gender" required>
                                                <option value="1">Male</option>
                                                <option value="0">Female</option>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-4">
                                            <label>Age</label>
                                            <input type="number" class="form-control" name="age" required="">
                                        </div>
                                        <div class="col-7">
                                            <label>Image</label>
                                            <input type="file" class="form-control" name="img" required="">
                                        </div>
                                    </div>
                                    <br>


                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="agree" class="custom-control-input"
                                                id="agree">
                                            <label class="custom-control-label" for="agree">I agree with the terms
                                                and conditions</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            Register
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="simple-footer">
                            Copyright &copy; Stisla 2018
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @include('layouts.Patient.LinkJS')
</body>

</html>
