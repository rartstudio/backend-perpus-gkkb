@extends('admin.templates.default')

@push('aftercss')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.9.13/combined/css/gijgo.min.css " type="text/css">    
@endpush

@section('content')
    <div class="box">
        <div class="box-body">
            <form action="{{ route('admin.members.update',$member) }}" method="POST">
                @method("PUT")
                @csrf
                <div class="form-group">
                    <label for="member_code">Nomor Member</label>
                    <input type="text" name="member_code" id="member_code" class="form-control @error('member_code') border border-danger @enderror" placeholder="Ketikkan nama depan member" value="{{ $member->member_code }} " readonly>
                    @error('member_code')
                        <span class="form-text text-red">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="cst_id">Kartu Identitas</label>
                            <select name="cst_id" id="cst_id" class="form-control select2 @error('cst_id') border border-danger @enderror">
                                @foreach ($categories_state as $category_state)
                                    <option value="{{ $category_state->id ?? old('cst_id') }}" @if ($category_state->id == $member->cst_id)
                                        selected
                                    @endif>{{ $category_state->cst_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('cst_id')
                                <span class="form-text text-red">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="no_cst">No Kartu Identitas</label>
                            <input type="text" name="no_cst" id="no_cst" class="form-control @error('no_cst') border border-danger @enderror" placeholder="Ketikkan no kartu identitas" value="{{$member->no_cst ?? old('no_cst')}}">
                            @error('no_cst')
                                <span class="form-text text-red">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="first_name">Nama Depan</label>
                            <input type="text" name="first_name" id="first_name" class="form-control @error('first_name') border border-danger @enderror" placeholder="Ketikkan nama depan member" value="{{$member->first_name ?? old('first_name')}}">
                            @error('first_name')
                                <span class="form-text text-red">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="last_name">Nama Belakang</label>
                            <input type="text" name="last_name" id="last_name" class="form-control @error('last_name') border border-danger @enderror" placeholder="Ketikkan nama belakang member" value="{{$member->last_name ?? old('last_name')}}">
                            @error('last_name')
                                <span class="form-text text-red">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="date_of_birth">Tanggal Lahir</label>
                            <input id="datepicker" name="date_of_birth" class="form-control @error('date_of_birth') border border-danger @enderror" value="{{ date('d-m-yy',strtotime($member->date_of_birth)) ?? old('date_of_birth') }}">
                            @error('date_of_birth')
                                <span class="form-text text-red">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <label for="gender">Gender</label>
                        <select name="gender" id="gender" class="form-control select2 @error('gender') border border-danger @enderror">
                            <option value="Pria" @if ($member->gender == 'Pria')
                                selected
                            @endif>Pria</option>
                            <option value="Wanita" @if ($member->gender == 'Wanita')
                                selected
                            @endif>Wanita</option>
                        </select>
                        @error('gender')
                            <span class="form-text text-red">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="phone_number">Nomor HP</label>
                            <input type="text" name="phone_number" id="phone_number" class="form-control @error('phone_number') border border-danger @enderror" placeholder="Ketikkan nomor hp member" value="{{$member->phone_number ?? old('phone_number')}}">
                            @error('phone_number')
                                <span class="form-text text-red">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" id="btn-form">Ubah</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('select2css')
<link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css')}}">
@endpush

@push('scripts')
    {{-- script for make user easier to find if author is too many --}}
    {{-- dont forget to put css on head before bootstrap load --}}
    <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>

    {{-- using that scripts --}}
    <script>
        $('.select2').select2();
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.9.13/combined/js/gijgo.min.js"></script>
    <script>
        const getDatePicker = document.querySelector('#datepicker').value;
        console.log(getDatePicker);

        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'dd-mm-yyyy',
            value: getDatePicker
        });
    </script>

    <script>
        var btnTambah = document.getElementById('btn-form');

        btnTambah.addEventListener('click', function(e){
            btnTambah.innerHTML = "Tunggu...";
            btnTambah.disabled = true;
        });
    </script>
@endpush
