<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    @include('layouts.templates.css-custom')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        {{-- @extends('layouts.app') --}}

       <!-- Navbar -->
        @include('layouts.templates.navbar-header')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('layouts.templates.navbar-side')
        <!-- ./main Sidebar Container -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header / Nav) -->
            @include('layouts.templates.navpage-header')
            <!-- /.content-header -->
            <!-- Main content -->

            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Footer -->
        @include('layouts.templates.footer')
        <!-- /.footer -->

    </div>
    <!-- ./wrapper -->

    @include('layouts.templates.jquery-custom')
</body>

</html>
