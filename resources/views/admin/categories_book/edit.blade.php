@extends('admin.templates.default')

@section('content')
    <div class="box">
        <div class="box-body">
            <form action="{{ route('admin.categories_book.update',$categories_book) }}" method="POST">
                @csrf
                @method("PUT")
                <div class="form-group @error('cbo_name') has-error @enderror">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" name="cbo_name" id="name" placeholder="ketikkan nama Kategori buku" value="{{ old('cbo_name') ??$categories_book->cbo_name }}">
                    @error('cbo_name')
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