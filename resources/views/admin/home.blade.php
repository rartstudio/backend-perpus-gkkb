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
          {{-- <a href="{{ route('admin.members.index') }}" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a> --}}
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
                        <th>
                            Peminjam
                        </th>
                        <th style="width: 5%">
                            Qty
                        </th>
                        <th style="width: 10%" class="text-center">
                            Status
                        </th>
                        <th style="width: 31%" class="text-center">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @forelse ($process as $item)
                    <tr>
                        <td>
                            {{ $i }}
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
                          <a 
                            class="btn btn-primary btn-sm" 
                            data-toggle="modal" 
                            data-target="#modal-lg" 
                            data-remote="{{ route('admin.transactions-show', $item->id) }}"
                            data-title="Detail Transaksi {{ $item->transaction_code }}"
                            href="#modal-lg"
                            >
                              <i class="fas fa-eye">
                              </i>
                              Detail
                          </a>
                          <button 
                            class="btn btn-info btn-sm 
                              @if ($item->state == 2)
                                disabled
                              @endif" 
                            href="{{ route('admin.transactions-accepted',$item->id) }}"
                            id="accept"
                            >
                              <i class="fas fa-pencil-alt">
                              </i>
                              Diterima
                          </button>
                            <a class="btn btn-info btn-sm 
                            @if ($item->state == 1)
                                disabled
                            @else
                                
                            @endif" href="{{ route('admin.transactions-ready-form',$item->id) }}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Siap
                            </a>
                            
                            <a class="btn btn-danger btn-sm" href="{{ route('admin.transactions-reject-form',$item->id) }}">
                                <i class="fas fa-trash">
                                </i>
                                Tolak
                            </a>
                        </td>
                        <?php $i++; ?>
                    </tr>    
                    @empty
                    <tr>
                      <td colspan="6" class="text-center">

                        Transaksi Tidak ada
                      </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
      <!-- /.card-body -->
    </div>
    <!-- /.card process-->
    
</section>

<section class="content">
  <!-- Default box -->
  <div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">Pengajuan Verifikasi User</h3>

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
                    <th style="width: 15%">
                        No Member Gereja
                    </th>
                    <th>
                        Nama Member
                    </th>
                    <th style="width: 15%">
                        Tgl Pengajuan
                    </th>
                    <th style="width: 10%" class="text-center">
                        Status
                    </th>
                    <th style="width: 25%" class="text-center">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @forelse ($member as $user)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $user->no_cst }} </td>
                    <td>{{ $user->user->name }}</td>
                    <td class="project_progress">{{ $user->updated_at }}</td>
                    <td class="project-state">
                        <span class="badge badge-success">
                        @if ($user->submission == 1 )
                            Menunggu
                        @endif</span>
                    </td>
                    <td class="project-actions text-right">
                      <a 
                        class="btn btn-primary btn-sm" 
                        data-toggle="modal" 
                        data-target="#modal-lg" 
                        data-remote="{{ route('admin.member-show', $user->user->id) }}"
                        data-title="Detail Transaksi {{ $user->no_cst }}"
                        href="#modal-lg"
                        >
                          <i class="fas fa-eye">
                          </i>
                          Detail
                      </a>
                      <button 
                        class="btn btn-info btn-sm" 
                    href="{{ route('admin.member-submission',$user->user->id) }}"
                        id="submission"
                        >
                          <i class="fas fa-pencil-alt">
                          </i>
                          Diterima
                      </button>
                        
                        <a class="btn btn-danger btn-sm" 
                    href="{{ route('admin.member-reject',$user->user->id) }}">
                            <i class="fas fa-trash">
                            </i>
                            Tolak
                        </a>
                    </td>
                    <?php $i++; ?>
                </tr>    
                @empty
                <tr>
                  <td colspan="6" class="text-center">

                    Transaksi Tidak ada
                  </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
  <!-- /.card-body -->
</div>
<!-- /.card process-->
</section>


<form method="POST" id="acceptForm" action="">
    @csrf
    <input type="submit" value="Hapus" style="display: none">
</form>

<!-- /.modal -->
  <!-- /.content -->
@endsection