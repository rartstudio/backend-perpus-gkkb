@extends('admin.templates.default')

@push('aftercss')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.9.13/combined/css/gijgo.min.css " type="text/css">    
@endpush

@section('content')
    <div class="box">
        <div class="box-body">
            <form action="{{ route('admin.recommendation-books.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="book_id">Buku</label>
                    <select name="book_id" id="book_id" class="form-control select2 @error('book_id') border border-danger @enderror">
                        @foreach ($books as $book)
                            <option value="{{ $book->id ?? old('book_id') }}">{{ $book->title }}</option>
                        @endforeach
                    </select>
                    @error('book_id')
                        <span class="form-text text-red">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="started_at">Tanggal Mulai</label>
                            <input id="datepicker" name="started_at" class="form-control @error('started_at') border border-danger @enderror" value="{{ old('started_at') }}">
                            @error('started_at')
                                <span class="form-text text-red">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="ended_at">Tanggal Berakhir</label>
                            <input id="datepicker2" name="ended_at" class="form-control @error('ended_at') border border-danger @enderror" value="{{ old('ended_at') }}">
                            @error('ended_at')
                                <span class="form-text text-red">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" id="btn-form">Tambah</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('select2css')
<link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css')}}">
@endpush

@push('scripts')
    {{-- script for make user easier to find if author is too many --}}
    {{-- dont forget to put css on head before bootstrap load --}}
    <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>

    {{-- using that scripts --}}
    <script>
        $('.select2').select2();
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.9.13/combined/js/gijgo.min.js"></script>
    <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'dd-mm-yyyy'
        });
        $('#datepicker2').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'dd-mm-yyyy'
        });
    </script>

    <script>
        var btnTambah = document.getElementById('btn-form');

        btnTambah.addEventListener('click', function(e){
            btnTambah.innerHTML = "Tunggu...";
            btnTambah.disabled = true;
        });
    </script>
@endpush
