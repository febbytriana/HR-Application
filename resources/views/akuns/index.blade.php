@extends('layouts.app')

@section('content')

<section role="main" class="content-body">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item active" aria-current="page">Manajemen Akun</li>
            <li class="breadcrumb-item active" aria-current="page">HR</li>
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

        <div class="card-body">
            <div class="head-title">
              <h2>Managemen Akun</h2>
            </div>
            <br>
            <div class="pull-left">
              <a href="{{ route('akun.create')}}">
                <button class="btn btn-info btn-xs"><i class="fa fa-plus fa-fx"></i> Tambah</button>
             </a>
            </div>
            <br>
            <br>
            <br>
            <table class="table table-striped table-hover" id="data-id" width="100%">
                <thead>
                    <tr>
                        <th style="text-align: center;">NO.</th>
                        <th style="text-align: center;">Nama</th>
                        <th style="text-align: center;">Email</th>
                        <th style="text-align: center;">Status</th>
                        <th style="text-align: center;" width="200px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach( $akuns as $key => $akun )
                    <tr>
                        <td style="text-align: center;">{{ $key+1 }}</td>
                        <td>{{ $akun->nama }}</td>
                        <td>{{ $akun->email }}</td>
                        <td>{{ $akun->status }}</td>
                        <td style="text-align: center;">
                            <a href="{{ route('akun.edit',$akun->id)}}">
                                <button class="btn btn-info col-sm-4"><i class="fa fa-pencil"></i></button>
                            </a>
                            <a href="{{ route('akun.destroy', $akun->id) }}">
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