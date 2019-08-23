@section('js')
<script type="text/javascript">
      function hapusPeg(idpeg) {
        Swal({
            title: 'Apakah Anda Yakin?',
            text: "Tekan 'Hapus' Untuk Meneruskan Penghapusan",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.value) {
                Swal({
                    title: 'Sukses!',
                    text: 'Penghapusan Data Berhasil.',
                    type: 'success'
                }).then((result) => {
                    if(result.value) {
                        location.href = 'http://localhost:8000/pegawai/hapus/'+idpeg;
                    }
                })
            } else if (result.dismiss === swal.DismissReason.cancel) {
                  swal(
                    'Batal',
                    'Anda membatalkan penghapusan',
                    'error'
                  )
            }
        })
    }
</script>
@stop

@extends('layouts.app')

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
        <br>
        <div class="card-body">
             <div class="pull-left">
              <a href="{{ route('pegawai.create')}}" style="margin-left: 7px">
                <button class="btn btn-info btn-xs"><i class="fa fa-plus"></i> Tambah</button>
              </a>
            </div>
            <br>
            <br>
            <br>
            <table class="table table-bordered table-striped table-hover" id="data-id" width="100%">
                <thead>
                    <tr>
                        <th style="text-align: center;" width="50px">NO.</th>
                        <th style="text-align: center;" width="200px">NIK</th>
                        <th style="text-align: center;">Nama</th>
                        <th style="text-align: center;" width="150px">Jabatan</th>
                        <th style="text-align: center;">Alamat</th>
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
                        <td style="text-align: center;">
                            <a href="{{ route('pegawai.detail',$value->id_pegawai)}}">
                                <i class="fa fa-eye btn-success" style="padding:8px;border-radius:5px;"></i>
                            </a>
                            <a href="{{ route('pegawai.edit',$value->id_pegawai)}}">
                                <i class="fa fa-pencil btn-warning" style="padding:8px;border-radius:5px;"></i>
                            </a>
                            <a href="{{ route('pegawai.hapus', $value->id_pegawai)}}" onclick="hapusPeg('{{$value->id_pegawai}}')">
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

@endsection