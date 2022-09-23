@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
    <div class="row">
        <div class="col">
            <x-adminlte-input name="nama" label="nama" placeholder="nama"
            fgroup-class="col-md-6" disable-feedback/>
        </div>
        <div class="col">
            <x-adminlte-select2 name="jeniskelamin" label="Jenis Kelamin" label-class="text-lightblue"
                igroup-size="sm" data-placeholder="Select an option...">
                <option/>
                <option>Laki-laki</option>
                <option>Wanita</option>
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
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                <label class="form-check-label" for="exampleRadios1">
                    Default radio
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                <label class="form-check-label" for="exampleRadios2">
                    Second default radio
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

        
    
    {{-- Setup data for datatables --}}
    @php
    $heads = [
        'Nama',
        'Alamat',
        ['label' => 'HP', 'width' => 40],
        ['label' => 'Jenis Kelamin', 'width' => 40],
        ['label' => 'Status', 'width' => 40],
        ['label' => 'Actions', 'no-export' => true, 'width' => 5],
    ];

    $btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                    <i class="fa fa-lg fa-fw fa-pen"></i>
                </button>';
    $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                    <i class="fa fa-lg fa-fw fa-trash"></i>
                </button>';
    $btnDetails = '<button label="Open Modal" data-toggle="modal" data-target="#modalCustom" class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                    <i class="fa fa-lg fa-fw fa-eye"></i>
                </button>';

    $config = [
        'data' => [
            ['nama','alamat','hp','John Bender', '+02 (123) 123456789', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
            ['nama','alamat','hp','John Bender', '+02 (123) 123456789', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
            ['nama','alamat','hp','John Bender', '+02 (123) 123456789', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
        ],
        'order' => [[1, 'asc']],
        'columns' => [null, null, null, ['orderable' => false]],
    ];
    @endphp

    {{-- Minimal example / fill data using the component slot --}}
    <x-adminlte-datatable id="table1" :heads="$heads">
        @foreach($config['data'] as $row)
            <tr>
                @foreach($row as $cell)
                    <td>{!! $cell !!}</td>
                @endforeach
            </tr>
        @endforeach
    </x-adminlte-datatable>

    <x-adminlte-modal id="modalCustom" title="Account Policy" size="lg" theme="teal"
        icon="fas fa-bell" v-centered static-backdrop scrollable>
        <div style="height:800px;">Read the account policies...</div>
        <x-slot name="footerSlot">
            <x-adminlte-button class="mr-auto" theme="success" label="Accept"/>
            <x-adminlte-button theme="danger" label="Dismiss" data-dismiss="modal"/>
        </x-slot>
    </x-adminlte-modal>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop