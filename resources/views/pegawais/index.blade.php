@extends('layouts.app')

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb mt-3">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Pegawai</li>
    </ol>
</nav>

<div class="row">
  <div class="col-md-12">
    <section class="card">
      <div class="card-body">
        <div class="head-title">
          <h2>Data Pegawai</h2@extends('layouts.app')

@section('content')

<section role="main" class="content-body">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data pegawai</li>
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
                <h4>Data Pegawai</h2>
        </div>
        <div class="card-body">
            <a href="{{ route('pegawai.create')}}">
                <button class="btn btn-primary"><i class="fa fa-plus"></i></button>
            </a>
            <a href="">
                <button class="btn btn-primary"><i class="fa fa-print"></i></button>
            </a>
            <br>
            <br>
            <table class="table table-bordered table-striped table-hover" id="data-id" width="100%">
                <thead>
                    <tr>
                        <th style="text-align: center;" width="30px">NO.</th>
                        <th style="text-align: center;" width="120px">NIK</th>
                        <th style="text-align: center;">Nama</th>
                        <th style="text-align: center;" width="90px">Jabatan</th>
                        <th style="text-align: center;width:200px;">Alamat</th>
                        <th style="text-align: center;" width="120px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pegawai as $key => $value)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$value -> nik}}</td>
                        <td>{{$value -> nama}}</td>
                        <td>{{$value -> jabatan['jabatan']}}</td>
                        <td>{{$value -> alamat}}</td>
                        <td>
                            <a href="{{ route('pegawai.profil',$value->id_pegawai)}}">
                                <i class="fa fa-eye btn-success" style="padding:8px;border-radius:5px;"></i>
                            </a>
                            <a href="{{ route('pegawai.edit',$value->id_pegawai) }}">
                                <i class="fa fa-pencil btn-warning" style="padding:8px;border-radius:5px;"></i>
                            </a>
                            <a href="{{ route('pegawai.destroy',$value->id_pegawai)}}" onclick="return confirm('Anda yakin akan menghapus data ini?')">
                                <i class="fa fa-trash btn-danger" style="padding:8px;border-radius:5px;"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</section>
@endsection>
        </div>
        <br>

            <div class="pull-left">
              <a href="">
                <button class="btn btn-success btn-xs"><i class="fa fa-file"></i> Export EXCEL</button>
              </a>
              <a href="" style="margin-left: 7px">
                <button class="btn btn-info btn-xs"><i class="fa fa-plus"></i> Tambah</button>
              </a>
            </div>
            <br>
            <br>
            <br>
            <table class="table table-striped table-hover" id="data-id" width="100%">
                <thead>
                    <tr>
                        <th style="text-align: center;">No</th>
                        <th style="text-align: center;">NIK</th>
                        <th style="text-align: center;">Nama</th>
                        <th style="text-align: center;">Gaji Pokok</th>
                        <th style="text-align: center;" width="250">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="text-align: center; font-size: 14px;">1</td>
                        <td align="center" style="font-size: 14px;">1234567891112</td>
                        <td align="center" style="font-size: 14px;">Ridwan</td>
                        <td align="center" style="font-size: 14px;">Rp. {{ number_format(10000,0,'','.') }}</td>
                        <td style="text-align: center;">
                            <a href="{{ route('pegawai.detail') }}">
                                <button class="btn btn-success btn-xs"><i class="fa fa-eye fa-fx"></i> Detail</button>
                            </a>
                            <a href="">
                                <button class="btn btn-warning btn-xs"><i class="fa fa-edit fa-fx"></i> Edit</button>
                            </a>
                            <a href="">
                                <button class="btn btn-danger btn-xs" onclick="return confirm('Hapus data ini?')"><i class="fa fa-trash fa-fx"></i> Hapus</button>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
      </div>
    </section>
  </div>
</div>

@endsection