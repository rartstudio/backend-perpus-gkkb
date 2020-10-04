<div class="container" id="container-message-form">
    <form id="message-form" action="{{ route('admin.member-message') }}" method="POST">
        @csrf
        @foreach ($user as $item)    
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Pesan</label>
                <input type="hidden" value="{{ $item->id }}" id="user_id" name="id">
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