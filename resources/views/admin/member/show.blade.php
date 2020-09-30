<?php
use Carbon\Carbon;
?>
<div class="card mb-3" style="max-width: 780px;">
    @foreach ($item as $detail)
    <div class="row no-gutters">
        <div class="col-md-4">
            <img src="{{ $detail->getCover() }}" class="card-img" alt="...">
        </div>
        <div class="col-md-8">
            <div class="card-body">
            <h5 class="card-title font-weight-bold">No Member Gereja</h5> <br>
            <p class="mb-2">{{ ucfirst($detail->no_cst) }}</p>
            <h5 class="card-title font-weight-bold">Nama</h5> <br>
            <p class="mb-2">{{ ucfirst($detail->user->name) }}</p>
            <h5 class="card-title font-weight-bold">Alamat</h5> <br>
            <p class="mb-2">{{ ucfirst($detail->address) }}</p>
            <h5 class="card-title font-weight-bold">Tanggal Lahir</h5> <br>
            <p class="mb-2">{{ Carbon::parse($detail->date_of_birth)->format('d-m-Y') }}</p>
            <h5 class="card-title font-weight-bold">Jenis Kelamin</h5> <br>
            <p class="mb-2">{{ ucfirst($detail->gender) }}</p>
            <h5 class="card-title font-weight-bold">No Handphone</h5> <br>
            <p class="mb-2">{{ ucfirst($detail->phone_number) }}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>