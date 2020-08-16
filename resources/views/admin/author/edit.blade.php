@extends('admin.templates.default')

@section('content')
    <div class="box">
        <div class="box-body">
            <form action="{{ route('admin.authors.update',$author) }}" method="POST">
                @csrf
                @method("PUT")
                <div class="form-group @error('author_name') has-error @enderror">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" name="author_name" id="name" placeholder="ketikkan nama penulis" value="{{ old('author_name') ??$author->author_name }}">
                    @error('author_name')
                        <span class="form-text text-red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" id="btn-form">Ubah</button>
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
            btnTambah.disabled = true;
        });
    </script>
@endpush