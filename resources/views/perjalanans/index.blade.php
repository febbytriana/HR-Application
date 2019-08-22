@section('js')
<script type="text/javascript">
    function hapusJl(idsp) {
        Swal({
            title: 'Apakah Anda Yakin?',
            text: "Tekan 'Hapus' Untuk Meneruskan Penghapusan",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#82df39',
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
                        location.href = 'http://localhost:8000/perjalanan/hapus/'+idsp;
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
            <li class="breadcrumb-item active" aria-current="page">Perjalanan</li>
        </ol>
    </nav>

    <section class="card shadow mt-3">

        <div class="card-body">
            <div class="head-title">
              <h2>Surat Perjalanan</h2>
            </div>
            <br>
            <div class="pull-left">
             <a href="{{ route('perjalanan.cetak_pdf')}}">
                <button class="btn btn-success btn-xs"><i class="fa fa-print fa-print"></i> Cetak</button>
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
                        <th style="text-align: center;">Tujuan</th>
                        <th style="text-align: center;">Kegiatan</th>
                        <th style="text-align: center;">Berangkat</th>
                        <th style="text-align: center;">Pulang</th>
                        <th style="text-align: center;" width="100px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($surat_perjalanan as $key => $value)
                    <tr>
                        <td style="text-align: center;">{{$key+1}}</td>
                        <td style="text-align: center;">{{$value -> pegawai['nik']}}</td>
                        <td style="text-align: center;">{{$value-> pegawai['nama']}}</td>
                        <td style="text-align: center;">{{$value->tujuan}}</td>
                        <td style="text-align: center;">{{$value->kegiatan}}</td>
                        <td style="text-align: center;">{{$value->tgl_berangkat}}</td>
                        <td style="text-align: center;">{{$value->tgl_pulang}}</td>
                        <td style="text-align: center;">
                            <a href="{{ route('perjalanan.cetak_pdf_id', $value->id_surat)}}">
                                <button class="btn btn-success btn-xs"><i class="fa fa-print"></i></button>
                            </a>
                            <a href="{{ route('perjalanan.edit', $value->id_surat)}}">
                                <button class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></button>
                            </a>
                            <a href="{{ route('perjalanan.hapus', $value->id_surat)}}">
                                <a class="btn btn-danger btn-xs" onclick="hapusJl('{{$value->id_surat}}')"><i class="fa fa-trash"></i></a>
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