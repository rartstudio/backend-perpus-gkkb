@extends('admin.templates.default')

@section('content')
    <div class="box">
        <div class="box-header">
            <a href="{{ route('admin.categories_state.create') }}" class="btn btn-primary my-2">Tambah Kategori status</a>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-hover" id="dataTable">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <form method="POST" id="deleteForm" action="">
        @csrf
        @method("DELETE")
        <input type="submit" value="Hapus" style="display: none">
    </form>
@endsection



@push('datatables')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush

@push('datatables-js')
    
<!-- DataTables -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
@endpush

@push('scripts')
@include('admin.templates.partials.alert')
    <script>
        $(function(){
            $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('admin.categories_state.data') }}',
                columns: [
                    { data: 'DT_RowIndex', orderable:false, searchable:false},
                    { data: 'cst_name'},
                    { data: 'action'}
                ]
            })
        });
    </script>
@endpush