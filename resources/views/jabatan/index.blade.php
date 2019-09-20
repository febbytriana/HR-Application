@extends('layouts.app')

@section('content')

<section role="main" class="content-body">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item active" aria-current="page">Jabatan</li>
        </ol>
    </nav>

    <section class="card mt-3">

        <section class="panel">
            @if(session()->has('success-create'))
            <div class="row-md-5">
                <div class="alert alert-success"> 
                    <center>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        &times;
                        </button>
                        <strong>Berhasil</strong><br>
                        {{ session()->get('success-create') }}
                    </center>
                </div>
            </div>
            @endif

            @if(session()->has('failed-create'))
            <div class="row-md-5">
                <div class="alert alert-danger"> 
                    <center>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        &times;
                        </button>
                        <strong>Gagal</strong><br>
                        {{ session()->get('failed-create') }}
                    </center>
                </div>
            </div>
            @endif
        </section>

        <div class="card-header">
                <h4>Jabatan</h2>
        </div>
        <div class="card-body">
            <a href="{{ route('jabatan.create')}}">
                <button class="btn btn-primary"><i class="fa fa-plus"></i></button>
            </a>
            <br>
            <br>
            <table class="table table-bordered table-striped table-hover" id="data-id" width="100%">
                <thead>
                    <tr>
                        <th style="text-align: center;" rowspan="2">NO.</th>
                        <th style="text-align: center;" rowspan="2">Nama</th>
                        <th style="text-align: center;" rowspan="2">Gaji Pokok</th>
                        <th style="text-align: center;" colspan="2">Jam</th>          
                        <th style="text-align: center;" width="200px" rowspan="2">Aksi</th>
                    </tr>
                    <tr>
                        <th style="text-align: center;">Jam Masuk</th>
                        <th style="text-align: center;">Jam Keluar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jabatan as $key => $jabatan)
                    <tr>
                        <td align="center">{{  $key+1 }}</td>
                        <td align="center">{{ $jabatan->jabatan }}</td>
                        <td align="center">Rp. {{number_format("$jabatan->gaji_pokok",2,",",".")}}</td>
                        <td align="center">{{ $jabatan->jam_masuk }}</td>
                        <td align="center">{{ $jabatan->jam_keluar }}</td>
                        <td align="center">
                        <a href="/jabatan/edit/{{$jabatan->id_jabatan}}">
                                <button class="btn btn-warning col-sm-4"><i class="fa fa-pencil"></i></button>
                            </a>
                            <a href="/jabatan/hapus/{{$jabatan->id_jabatan}}">
                                <button class="btn btn-danger col-sm-4" onclick="return confirm('Hapus data ini?')"><i class="fa fa-trash"></i></button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</section>
@endsection