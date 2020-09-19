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
                    @error('pub_name')
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
            
        });
    </script>
@endpush