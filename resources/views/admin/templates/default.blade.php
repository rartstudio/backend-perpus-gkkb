<!DOCTYPE html>
<html>
    @include('admin.templates.partials.head')
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

    @include('admin.templates.partials.navbar')
    @include('admin.templates.partials.sidebar')  

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header pl-3">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h5 class="m-0 text-dark">{{ Breadcrumbs::current()->title }}</h5>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{ Breadcrumbs::render() }}
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <section class="content pl-4">
            @yield('content')
        </section>
    </div>
    @include('admin.templates.partials.footer')
  
    </div>
<!-- ./wrapper -->

@include('admin.templates.partials.scripts')
{{-- @include('admin.templates.partials.alert') --}}
</body>
</html>
