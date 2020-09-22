

<table class="table table-striped">
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