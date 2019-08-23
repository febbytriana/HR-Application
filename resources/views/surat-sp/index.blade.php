@section('js')
<script type="text/javascript">
    function hapusSp(idsp) {
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
                        location.href = 'http://localhost:8000/surat-sp/hapus/'+idsp;
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
            <li class="breadcrumb-item active" aria-current="page">Teguran/Peringatan</li>
        </ol>
    </nav>

    <section class="card shadow mt-3">

        <div class="card-body">
            <div class="head-title">
              <h2>Surat Teguran/Peringatan</h2>
            </div>
            <br>
            <div class="pull-left">
             <a href="{{ route('sp.cetak_pdf')}}">
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
                        <th style="text-align: center;">Perihal</th>
                        <th style="text-align: center;">Pelanggaran</th>
                        <th style="text-align: center;">Tanggal Pelanggaran</th>
                        <th style="text-align: center;" width="180px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($surat_peringatan as $key => $sp)
                    <tr>
                        <td style="text-align: center;">{{$key+1}}</td>
                        <td style="text-align: center;">{{$sp->pegawai['nik']}}</td>
                        <td style="text-align: center;">{{$sp->pegawai['nama']}}</td>
                        <td style="text-align: center;">{{$sp->perihal}}</td>
                        <td style="text-align: center;">{{$sp->pelanggaran}}</td>
                        <td style="text-align: center;">{{$sp->tgl_pelanggaran}}</td>
                        <td style="text-align: center;">
                            <a href="{{ route('sp.cetak_pdf_id', $sp->id_sp)}}">
                                <button class="btn btn-success btn-xs"><i class="fa fa-print"></i></button>
                            </a>
                            <a href="{{ route('sp.edit', $sp->id_sp)}}">
                                <button class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></button>
                            </a>
                            <a href="{{ route('sp.hapus', $sp->id_sp)}}">
                                <button class="btn btn-danger btn-xs" onclick="return confirm('Yakin akan dihapus?')"><i class="fa fa-trash"></i></button>
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