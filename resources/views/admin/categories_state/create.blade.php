@extends('admin.templates.default')

@section('content')
    <div class="box">
        <div class="box-body">
            <form action="{{ route('admin.categories_state.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" name="cst_name" id="name" placeholder="Ketikkan nama kategori status" class="form-control @error('cst_name') border border-danger @enderror" value="{{ old('cst_name') }}">
                    @error('cst_name')
                        <span class="form-text text-red">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" id="btn-form">Tambah</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var btnTambah = document.getElementById('btn-form');

        btnTambah.addEventListener('click', function(e){
            btnTambah.innerHTML = "Tunggu...";
            
        });
    </script>
@endpush