<!DOCTYPE html>
<html lang="en">

@include('adminpanel.partials.head')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        @include('adminpanel.partials.loader')

        @include('adminpanel.partials.header')

        @include('adminpanel.partials.sidebar')

        @yield('content')

        @include('adminpanel.partials.footer')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

    </div>
    @include('adminpanel.partials.script')
</body>

</html>
