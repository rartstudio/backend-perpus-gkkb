@extends('admin.templates.default')

@section('content')
    <div class="box">
        <div class="box-body">
            <form action="{{ route('admin.publishers.update',$publisher) }}" method="POST">
                @csrf
                @method("PUT")
                <div class="form-group @error('publisher_name') has-error @enderror">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" name="pub_name" id="name" placeholder="ketikkan nama penulis" value="{{ old('pub_name') ??$publisher->pub_name }}">
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