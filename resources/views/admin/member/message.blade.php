<div class="container" id="container-message-form">
    <form id="message-form" action="{{ route('admin.member-message') }}" method="POST">
        @csrf
        @foreach ($user as $item)    
            <div class="form-group">
                <input type="hidden" value="{{ $item->id }}" id="user_id" name="id">
                <label for="header">Judul</label>
                <input type="text" name="header" id="header" class="form-control">
                <label for="message">Pesan</label>
                <textarea class="form-control" id="message" rows="3" name="message"></textarea>
            </div>
        @endforeach
        <button type="submit" class="btn btn-primary mb-2 btn-block" id="rejected">Kirim</button>
    </form>
</div>

<script>
    var btnTambah = document.getElementById('rejected');

    btnTambah.addEventListener('click', function(e){
        btnTambah.innerHTML = "Tunggu...";
        btnTambah.classList.toggle('disabled');
    });
</script>