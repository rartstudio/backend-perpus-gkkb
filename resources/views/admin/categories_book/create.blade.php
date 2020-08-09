@extends('admin.templates.default')

@section('content')
    <div class="box">
        <div class="box-body">
            <form action="{{ route('admin.categories_book.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" name="cbo_name" id="name" placeholder="Ketikkan nama kategori buku" class="form-control @error('cbo_name') border border-danger @enderror" value="{{ old('cbo_name') }}">
                    @error('cbo_name')
                        <span class="form-text text-red">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="submit" value="Tambah" class="btn btn-primary" >
                </div>
            </form>
        </div>
    </div>
@endsection