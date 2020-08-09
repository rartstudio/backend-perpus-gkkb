@extends('admin.templates.default')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">
                Tambah Data Penulis
            </h3>
        </div>
        <div class="box-body">
            <form action="{{ route('admin.authors.store') }}" method="POST">
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
                    <input type="submit" value="Tambah" class="btn btn-primary" >
                </div>
            </form>
        </div>
    </div>
@endsection