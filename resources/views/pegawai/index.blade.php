@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <form action="{{ route('pegawai.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
    <div class="row">
        <div class="col">
            <x-adminlte-input name="nama" label="nama" placeholder="nama"
            fgroup-class="col-md-6" disable-feedback/>
        </div>
        <div class="col">
            <x-adminlte-select2 name="jeniskelamin" label="Jenis Kelamin" label-class="text-lightblue"
                igroup-size="sm" data-placeholder="Select an option...">
                <option value="pria">Laki-laki</option>
                <option value="wanita">Wanita</option>
            </x-adminlte-select2>
            
        </div>
    </div>

    <div class="row">
        <div class="col">
            <x-adminlte-textarea name="alamat" label="Alamat" rows=5 igroup-size="sm" placeholder="Alamat"></x-adminlte-textarea>    
            
        </div>
        <div class="col">
            <div class="form-check form-check-inline">
                <label for="">Status</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="menikah" checked>
                <label class="form-check-label" for="exampleRadios1">
                    Nikah
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="belum">
                <label class="form-check-label" for="exampleRadios2">
                    Belum Nikah
                </label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <x-adminlte-input name="hp" label="hp" placeholder="hp"
            fgroup-class="col-md-6" disable-feedback/>
        </div>
        <div class="col">
            <button type="submit" class="btn btn-primary ml-3">Simpan</button>
        </div>
    </div>
    </form>

    <x-adminlte-modal id="modalCustom" title="Detail Pegawai" size="lg" theme="teal"
        icon="fas fa-bell" v-centered static-backdrop scrollable>
        <div style="height:800px;">Detail Pegawai</div>
        <x-slot name="footerSlot">
            <x-adminlte-button theme="danger" label="Dismiss" data-dismiss="modal"/>
        </x-slot>
    </x-adminlte-modal>

    @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Hp</th>
                    <th>Jenis Kelamin</th>
                    <th>Status</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @if(!$pegawai)
                <tr>
                    <td colspan="3" class="text-center">Tidak ada pegawai</td>
                </tr>
                @endif
                @foreach ($pegawai as $pgw)
                    <tr>
                        <td>{{ $pgw->nama }}</td>
                        <td>{{ $pgw->alamat }}</td>
                        <td>{{ $pgw->hp }}</td>
                        <td>{{ $pgw->jeniskelamin }}</td>
                        <td>{{ $pgw->status }}</td>
                        <td>
                            <form action="{{ route('pegawai.destroy',$pgw->id) }}" method="Post">
                                <a class="btn btn-xs btn-default text-primary mx-1 shadow" href="{{ route('pegawai.edit',$pgw->id) }}"><i class="fa fa-lg fa-fw fa-pen"></i></a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                                    <i class="fa fa-lg fa-fw fa-trash"></i>
                                </button>
                                <a label="Open Modal" data-toggle="modal" data-target="#modalCustom" class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details" onclick="openModal({{ $pgw->id }})">
                                    <i class="fa fa-lg fa-fw fa-eye"></i>
                                </a>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        function openModal(id){
        $.ajax({
               type:'GET',
               url: '{{url("pegawai/detail",$pgw->id)}}',
               success:function(data) {
                alert(data);
                  $("#msg").html(data.msg);
               }
            });
        }
        
    </script>
@stop