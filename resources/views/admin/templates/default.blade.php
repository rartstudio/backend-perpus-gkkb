<!DOCTYPE html>
<html>
@include('admin.templates.partials.head')
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

    @include('admin.templates.partials.navbar')
    @include('admin.templates.partials.sidebar')  

    @yield('content')
    @include('admin.templates.partials.footer')
  
    </div>
<!-- ./wrapper -->

@include('admin.templates.partials.scripts')
</body>
</html>
