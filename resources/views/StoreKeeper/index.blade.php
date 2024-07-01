<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Ecommerce Dashboard &mdash; Stisla</title>

    @include('layouts.StoreKeeper.LinkHeader')

    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            @include('layouts.StoreKeeper.Header')

            <div class="main-sidebar sidebar-style-2">


                @include('layouts.StoreKeeper.Sidebar')
            </div>

          
        </div>
    </div>

    @include('layouts.StoreKeeper.LinkJS')
</body>

</html>
