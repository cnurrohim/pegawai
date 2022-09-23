@extends('adminlte::page')

@section('title', 'Edit Pegawai')

@section('content_header')
    <h1>Edit Pegawai</h1>
@stop

@section('content')
    <form action="{{ route('pegawai.update',$pegawai->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
    <div class="row">
        <div class="col">
            <x-adminlte-input name="nama" label="nama" placeholder="nama" value="{{ $pegawai->nama }}"
            fgroup-class="col-md-6" disable-feedback/>
        </div>
        <div class="col">
            <x-adminlte-select2 name="jeniskelamin" label="Jenis Kelamin" label-class="text-lightblue"  value="{{ $pegawai->jeniskelamin }}"
                igroup-size="sm" data-placeholder="Select an option...">
                <option value="pria" {{ $pegawai->jeniskelamin == 'pria' ? "selected" : "" }}>Laki-laki</option>
                <option value="wanita" {{ $pegawai->jeniskelamin == 'wanita' ? "selected" : "" }}>Wanita</option>
            </x-adminlte-select2>
            
        </div>
    </div>

    <div class="row">
        <div class="col">
            <x-adminlte-textarea name="alamat" label="Alamat" rows=5 igroup-size="sm" placeholder="Alamat">{{ $pegawai->alamat }}</x-adminlte-textarea>    
        </div>
        <div class="col">
            <div class="form-check form-check-inline">
                <label for="">Status</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="menikah"
                {{ $pegawai->status == 'menikah' ? "checked" : "" }}
                >
                <label class="form-check-label" for="exampleRadios1">
                    Nikah
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="belum"
                {{ $pegawai->status == 'belum' ? "checked" : "" }}
                >
                <label class="form-check-label" for="exampleRadios2">
                    Belum Nikah
                </label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <x-adminlte-input name="hp" label="hp" placeholder="hp"  value="{{ $pegawai->hp }}"
            fgroup-class="col-md-6" disable-feedback/>
        </div>
        <div class="col">
            <button type="submit" class="btn btn-warning ml-3">Update</button>
        </div>
    </div>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop