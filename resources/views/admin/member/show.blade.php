@extends('admin.templates.default')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h4 class="font-weight-semibold">No Anggota</h4>
            <p class="font-weight-light">{{ $member->member_code }}</p>
            <h4 class="font-weight-semibold">Kartu Identitas</h4>
            <p class="font-weight-light">{{ $member->category_state->cst_name }}</p>
            <h4 class="font-weight-semibold">No Identitas</h4>
            <p class="font-weight-light">{{ $member->no_cst }}</p>
            <h4 class="font-weight-semibold">Nama Depan</h4>
            <p class="font-weight-light">{{ $member->first_name }}</p>
            <h4 class="font-weight-semibold">Nama Belakang</h4>
            <p class="font-weight-light">{{ $member->last_name }}</p>
            <h4 class="font-weight-semibold">Tanggal Lahir</h4>
            <p class="font-weight-light">{{ $member->date_of_birth }}</p>
            <h4 class="font-weight-semibold">Jenis Kelamin</h4>
            <p class="font-weight-light">{{ $member->gender }}</p>
            <h4 class="font-weight-semibold">Nomor Hp</h4>
            <p class="font-weight-light">{{ $member->phone_number }}</p>
        </div>
    </div>
@endsection