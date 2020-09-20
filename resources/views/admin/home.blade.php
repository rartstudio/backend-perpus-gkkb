@extends('admin.templates.default')

@section('content')
<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{ $book }}</h3>

            <p>Total Buku</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{ route('admin.books.index') }}" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{ $categories_book }}</h3>

            <p>Total Kategori</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="{{ route('admin.categories_book.index') }}" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>{{ $members }}</h3>

            <p>Jumlah Member</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="{{ route('admin.members.index') }}" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>43</h3>

            <p>Jumlah Transaksi</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
</div>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Transaksi dalam proses</h3>

            <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th style="width: 1%">
                            No
                        </th>
                        <th style="width: 20%">
                            Kode Transaksi
                        </th>
                        <th style="width: 20%">
                            Peminjam
                        </th>
                        <th style="width: 5%">
                            Qty
                        </th>
                        <th style="width: 8%" class="text-center">
                            Status
                        </th>
                        <th style="width: 20%">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($process as $item)
                    <tr>
                        <td>
                            
                        </td>
                        <td>
                            <a>
                                {{ $item->transaction_code }}
                            </a>
                            <br/>
                            <small>
                                {{ $item->created_at }}
                            </small>
                        </td>
                        <td>
                            {{ $item->users->name }}
                        </td>
                        <td class="project_progress">
                            {{ $item->transaction_details->count() }}
                        </td>
                        <td class="project-state">
                            <span class="badge badge-success">
                            @if ($item->state == 1 )
                                Menunggu
                            @elseif($item->state == 2 )
                                Diterima
                            @else 
                                siap
                            @endif</span>
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" href="#">
                                <i class="fas fa-eye">
                                </i>
                                View
                            </a>
                            <a class="btn btn-info btn-sm" href="#">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            <a class="btn btn-danger btn-sm" href="#">
                                <i class="fas fa-trash">
                                </i>
                                Delete
                            </a>
                        </td>
                        
                    </tr>    
                    @empty
                    <tr>
                        Transaksi Tidak ada
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card process-->

   <!-- Default box -->
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Transaksi dalam Peminjaman</h3>

            <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body p-0">
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th style="width: 1%">
                        No
                    </th>
                    <th style="width: 20%">
                        Kode Transaksi
                    </th>
                    <th style="width: 20%">
                        Peminjam
                    </th>
                    <th style="width: 5%">
                        Qty
                    </th>
                    <th style="width: 8%" class="text-center">
                        Status
                    </th>
                    <th style="width: 20%">
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($borrow as $item)
                <tr>
                    <td>
                        
                    </td>
                    <td>
                        <a>
                            {{ $item->transaction_code }}
                        </a>
                        <br/>
                        <small>
                            {{ $item->created_at }}
                        </small>
                    </td>
                    <td>
                        {{ $item->users->name }}
                    </td>
                    <td class="project_progress">
                        {{ $item->transaction_details->count() }}
                    </td>
                    <td class="project-state">
                        <span class="badge badge-success">
                        @if ($item->state == 1 )
                            Menunggu
                        @elseif($item->state == 2 )
                            Diterima
                        @else 
                            siap
                        @endif</span>
                    </td>
                    <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm" href="#">
                            <i class="fas fa-folder">
                            </i>
                            View
                        </a>
                        <a class="btn btn-info btn-sm" href="#">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        <a class="btn btn-danger btn-sm" href="#">
                            <i class="fas fa-trash">
                            </i>
                            Delete
                        </a>
                    </td>
                    
                </tr>    
                @empty
                <tr>
                    Transaksi Tidak ada
                </tr>
                @endforelse
            </tbody>
        </table>
        </div>
         <!-- /.card-body -->
    </div>
<!-- /.card borrow-->

    <!-- Default box -->
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">Riwayat Transaksi</h3>

            <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th style="width: 1%">
                            No
                        </th>
                        <th style="width: 20%">
                            Kode Transaksi
                        </th>
                        <th style="width: 20%">
                            Peminjam
                        </th>
                        <th style="width: 5%">
                            Qty
                        </th>
                        <th style="width: 8%" class="text-center">
                            Status
                        </th>
                        <th style="width: 20%">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($history as $item)
                    <tr>
                        <td>
                            
                        </td>
                        <td>
                            <a>
                                {{ $item->transaction_code }}
                            </a>
                            <br/>
                            <small>
                                {{ $item->created_at }}
                            </small>
                        </td>
                        <td>
                            {{ $item->users->name }}
                        </td>
                        <td class="project_progress">
                            {{ $item->transaction_details->count() }}
                        </td>
                        <td class="project-state">
                            <span class="badge badge-success">
                            @if ($item->state == 1 )
                                Menunggu
                            @elseif($item->state == 2 )
                                Diterima
                            @else 
                                siap
                            @endif</span>
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" href="#">
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a>
                            <a class="btn btn-info btn-sm" href="#">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            <a class="btn btn-danger btn-sm" href="#">
                                <i class="fas fa-trash">
                                </i>
                                Delete
                            </a>
                        </td>
                        
                    </tr>    
                    @empty
                    <tr>
                        Transaksi Tidak ada
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card history-->
  </section>
  <!-- /.content -->
@endsection