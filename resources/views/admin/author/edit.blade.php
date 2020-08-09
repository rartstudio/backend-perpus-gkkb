@extends('admin.templates.default')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">
                Edit Data Penulis
            </h3>
        </div>
        <div class="box-body">
            <form action="{{ route('admin.authors.update',$author) }}" method="POST">
                @csrf
                @method("PUT")
                <div class="form-group @error('author_name') has-error @enderror">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" name="author_name" id="name" placeholder="ketikkan nama penulis" value="{{ old('author_name') ??$author->author_name }}">
                    @error('name')
                        <span class="form-text text-red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Ubah">
                </div>
            </form>
        </div>
    </div>
@endsection