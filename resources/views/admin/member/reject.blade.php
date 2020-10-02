<div class="container" id="container-reject-form">
    <form id="reject-form" action="{{ route('admin.member-rejected') }}" method="POST">
        @csrf
        @foreach ($user as $item)    
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Alasan Penolakan</label>
                <input type="hidden" value="{{ $item->id }}" id="user_id" name="id">
                <textarea class="form-control" id="message" rows="3" name="message"></textarea>
            </div>
        @endforeach
        <button type="submit" class="btn btn-primary mb-2 btn-block" id="rejected">Kirim</button>
    </form>
</div>