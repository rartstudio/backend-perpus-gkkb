@extends('admin.templates.default')

@section('content')
    <div class="box">
        <div class="box-body">
            <form action="{{ route('admin.categories_state.update',$categories_state) }}" method="POST">
                @csrf
                @method("PUT")
                <div class="form-group @error('cst_name') has-error @enderror">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" name="cst_name" id="name" placeholder="ketikkan nama Kategori status" value="{{ old('cst_name') ??$categories_state->cst_name }}">
                    @error('cst_name')
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