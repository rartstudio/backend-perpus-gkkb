<!--when we use view we can resolve $author with $model to get existing loop data model-->

<a href="{{ route('admin.books.edit', $model) }}" class="btn btn-success mb-2"><i class="fas fa-star">
</i></a>
<a href="{{ route('admin.books.show', $model) }}" class="btn btn-info mb-2"><i class="fas fa-eye">
</i></a>
<a href="{{ route('admin.books.edit', $model) }}" class="btn btn-warning mb-2"><i class="fas fa-pencil-alt">
</i></a>

{{-- we dont use this because this doesnt support a delete method cause we need form to delete or do this way if you want to do in this way--}}
<button href="{{ route('admin.books.destroy', $model) }}" class="btn btn-danger mb-2" id="delete"><i class="fas fa-trash-alt">
</i></button>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
    $('button#delete').on('click', function(e){
        e.preventDefault();

        var href = $(this).attr('href');

        //use sweet alert
        Swal.fire({
            title: 'Apakah kamu yakin hapus data ini ?',
            text: 'Data yang sudah dihapus tidak bisa dikembalikan!',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus saja!'
            })
            .then((result) => {
                if(result.value){
                    
                    document.getElementById('deleteForm').action = href;
                    document.getElementById('deleteForm').submit();
                        Swal.fire(
                            'Terhapus!',
                            'Data Kamu berhasil dihapus',
                            'success'
                        )
                }
        });
    })

</script>



{{-- this is another option to use delete--}}
{{-- <form action="{{ route('admin.author.destroy', $model) }}" method="POST" style="display: inline">
    @csrf
    @method("DELETE")
    <input type="submit" value="Hapus" class="btn btn-danger">
</form> --}}