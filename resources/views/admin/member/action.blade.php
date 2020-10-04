<a 
    class="btn btn-primary btn-sm" 
    data-toggle="modal" 
    data-target="#modal-lg" 
    data-remote="{{ route('admin.member-show', $model) }}"
    data-title="Detail Member{{ $model->no_cst }}"
    href="#modal-lg"
    >
        <i class="fas fa-eye">
        </i>
</a>
<a 
    class="btn btn-success btn-sm" 
    data-toggle="modal" 
    data-target="#modal-lg" 
    data-remote="{{ route('admin.member-message-form', $model) }}"
    data-title="Member : {{ $model->name }}"
    href="#modal-lg"
    >
        <i class="fas fa-envelope">
        </i>
</a>