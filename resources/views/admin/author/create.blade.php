@extends('admin.templates.default')

@section('content')
    <div class="box">
        <div class="box-header">
        </div>
        <div class="box-body">
            <form action="{{ route('admin.authors.store') }}" method="POST" id="addForm">
                @csrf
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" name="author_name" id="name" placeholder="Ketikkan nama penulis" class="form-control @error('author_name') border border-danger @enderror" value="{{ old('author_name') }}">
                    @error('author_name')
                        <span class="form-text text-red">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" id="btn-form">Tambah</button>
                    {{-- <button href="{{ route('admin.authors.store') }}" class="btn btn-danger" id="store">Hapus</button> --}}
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
        btnTambah.classList.toggle('disabled');
    });
</script>
@endpush