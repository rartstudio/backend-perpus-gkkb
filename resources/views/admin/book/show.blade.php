<div class="card">
    <div class="row">
        <div class="col-md-4">
            <img src="{{ $book->getCover() }}" class="" width="250px" height="450px"/>
        </div>
        <div class="col-md-8">
            <h4 class="font-weight-semibold">Kategori Buku</h4>
            <p class="font-weight-light">{{ $book->categories_book->cbo_name }}</p>
            <h4 class="font-weight-semibold">Judul</h4>
            <p class="font-weight-light">{{ $book->title }}</p>
            <h4 class="font-weight-semibold">Deskripsi</h4>
            <p class="font-weight-light">{{ $book->getBookDescription()}}</p>
            <h4 class="font-weight-semibold">Qty</h4>
            <p class="font-weight-light">{{ $book->qty }}</p>
            <h4 class="font-weight-semibold">Penerbit</h4>
            <p class="font-weight-light">{{ $book->publisher->pub_name }}</p>
            <h4 class="font-weight-semibold">Penulis</h4>
            <p class="font-weight-light">{{ $book->author->author_name }}</p>
        </div>
    </div>
</div>
    