@extends('admin.templates.default')

@section('content')
    <div class="box">
        <div class="box-body">
            <form action="{{ route('admin.books.update', $book) }}" method="POST" enctype="multipart/form-data">
                @method("PUT")
                @csrf
                <div class="form-group">
                    <label for="cbo_id">Kategori Buku</label>
                    <select name="cbo_id" id="cbo_id" class="form-control select2 @error('cbo_id') border border-danger @enderror">
                        @foreach ($categories_book as $category_book)
                            <option value="{{ $category_book->id ?? old('cbo_id') }}"
                                @if ($category_book->id == $book->cbo_id)
                                    selected
                                @endif
                            >
                                {{ $category_book->cbo_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('cbo_id')
                        <span class="form-text text-red">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="title">Judul</label>
                    <input type="text" name="title" id="title" class="form-control @error('title') border border-danger @enderror" placeholder="Ketikkan judul buku" value="{{ $book->title ?? old('title') }}">
                    @error('title')
                        <span class="form-text text-red">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea name="description" id="description" class="form-control @error('description') border border-danger @enderror" rows="3">{{ $book->description ?? old('description')}}</textarea>
                    @error('description')
                        <span class="form-text text-red">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="qty">Qty</label>
                    <input type="number" name="qty" id="qty" class="form-control @error('qty') border border-danger @enderror" placeholder="Ketikkan deskripsi buku" value="{{ $book->qty ?? old('qty') }}">
                    @error('qty')
                        <span class="form-text text-red">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="author_id">Penulis</label>
                    <select name="author_id" id="author_id" class="form-control select2 @error('author_id') border border-danger @enderror">
                        @foreach ($authors as $author)
                            <option value="{{ $author->id ?? old('author_id') }}"
                                @if ($author->id == $book->author_id)
                                    selected
                                @endif
                            >
                                {{ $author->author_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('author_id')
                        <span class="form-text text-red">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="pub_id">Penerbit</label>
                    <select name="pub_id" id="pub_id" class="form-control select2 @error('pub_id') border border-danger @enderror">
                        @foreach ($publishers as $publisher)
                            <option value="{{ $publisher->id ?? old('pub_id') }}"
                                @if ($publisher->id == $book->pub_id)
                                    selected
                                @endif
                            >
                                {{ $publisher->pub_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('pub_id')
                        <span class="form-text text-red">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="cover">Sampul</label>
                    <input type="file" class="form-control @error('qty') border border-danger @enderror" name="cover" id="cover">
                    @error('cover')
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
    <script src="https://cdn.ckeditor.com/ckeditor5/21.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
                .create( document.querySelector( '#description' ) )
                .then( editor => {
                        console.log( editor );
                } )
                .catch( error => {
                        console.error( error );
                } );
    </script>
    <script>
        var btnTambah = document.getElementById('btn-form');

        btnTambah.addEventListener('click', function(e){
            btnTambah.innerHTML = "Tunggu...";
            btnTambah.disabled = true;
        });
    </script>
@endpush