@extends('admin.templates.default')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <table class="table table-light">
                <thead>
                    <tr>
                        <th scope="col" style="width:100px">#</th>
                        <th scope="col" style="width:200px">Cover</th>
                        <th scope="col">Buku</th>
                        <th scope="col" style="width:30px">Qty</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($item as $detail)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>
                            <img src="{{ $detail->book->getCover() }}" width="130px" height="180px"/>
                            </td>
                            <td>{{ $detail->book->title }}</td>
                            <td>{{ $detail->qty }}</td>
                        </tr>
                    <?php $i++; ?>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            @foreach ($datas as $data)
            <div class="card">
                <div class="card-header">Detail Transaksi</div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-4 font-weight-bold">Kode Trx </div>
                        <div class="col-md-8">{{ $data->transaction_code}}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4 font-weight-bold">Nama </div>
                        <div class="col-md-8">{{ $data->users->name }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4 font-weight-bold">No Anggota </div>
                        <div class="col-md-8">{{ $data->users->members->no_cst }}</div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-4 font-weight-bold">Qty </div>
                        <div class="col-md-8">{{ $data->qty_borrow }}</div>
                    </div>
                    <form action="{{ route('admin.transactions-ready-store', $data->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Status</label>
                            <select name="state" id="" class="form-control">
                                <option value="4">Siap</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Informasi Tambahan</label>
                            <textarea name="add_info" id="" cols="30" rows="5" class="form-control" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mb-2 btn-block" id="btn-form">Simpan</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    
</div>
@endsection

@push('scripts')
    <script>
        var btnTambah = document.getElementById('btn-form');

        btnTambah.addEventListener('click', function(e){
            btnTambah.innerHTML = "Tunggu...";
            btnTambah.classList.toggle('disabled');
        });
    </script>
@endpush