

<table class="table table-striped">
    @foreach ($transaction as $trx)      
      @if ($trx->state == 5)
        <a class="btn btn-block btn-success" href="{{ route('admin.transactions-returned', $trx->id) }}">Terima Pengembalian Buku</a>    
      @else
        <div></div>
      @endif
    @endforeach
    <thead>
          <tr>
              <td>Gambar</td>
              <td>Buku</td>
              <td>Qty</td>
          </tr>
    </thead>
    <tbody>
      @foreach ($item as $detail)
        <tr>
            <td>
              <img src="{{ $detail->book->getCover() }}" width="130px" height="180px"/>
            </td>
            <td>{{ $detail->book->title }}</td>
            <td>{{ $detail->qty }}</td>
        </tr>
      @endforeach
    </tbody>
</table>