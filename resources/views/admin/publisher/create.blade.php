@extends('admin.templates.default')

@section('content')
    <div class="box">
        <div class="box-header">
        </div>
        <div class="box-body">
            <form action="{{ route('admin.publishers.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" name="pub_name" id="name" placeholder="Ketikkan nama penulis" class="form-control @error('pub_name') border border-danger @enderror" value="{{ old('pub_name') }}">
                    @error('pub_name')
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