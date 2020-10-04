<a 
class="btn btn-primary btn-sm" 
data-toggle="modal" 
data-target="#modal-lg" 
data-remote="{{ route('admin.transactions-show', $model->id) }}"
data-title="Detail Transaksi {{ $model->transaction_code}}"
href="#modal-lg"
>
    <i class="fas fa-eye">
    </i>
</a>
