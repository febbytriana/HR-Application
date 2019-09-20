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
            <li class="breadcrumb-item active" aria-current="page">Laporan Gaji</li>
        </ol>
    </nav>

    <section class="card shadow mt-3">

        <div class="card-body">
            <div class="head-title">
              <h2>Laporan gaji Pegawai</h2>
            </div>
            <br>

        <form action="{{ route('gaji.filter') }}" method="GET">
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="inputPPH">Filter berdasarkan bulan</label>
                    <select class="form-control" name="bulan" id="bulan">
                        <option value="">- Pilih bulan -</option>
                        <option value="Januari">Januari</option>
                        <option value="Februari">Februari</option>
                        <option value="Maret">Maret</option>
                        <option value="April">April</option>
                        <option value="Mei">Mei</option>
                        <option value="Juni">Juni</option>
                        <option value="Juli">Juli</option>
                        <option value="Agustus">Agustus</option>
                        <option value="September">September</option>
                        <option value="Oktober">Oktober</option>
                        <option value="November">November</option>
                        <option value="Desember">Desember</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success" style="height:40px; margin-top:25px;">Filter</button>
              </div>
        </form>
                
 
            <br>
            <div class="pull-left">
             <a href="{{ route('gaji.report') }}">
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
                        <th style="text-align: center;">Gaji pokok</th>
                        <th style="text-align: center;">Bulan</th>
                        <th style="text-align: center;">Gaji bersih</th>
                        <th style="text-align: center;" width="180px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($gaji as $key=>$g)
                    <tr>
                     <td>{{$key+1}}</td>
                     <td>{{$g->pegawai->nik}}</td>
                     <td>{{$g->pegawai->nama}}</td>
                     <td>Rp. {{number_format("$g->gaji_pokok",2,",",".")}}</td>
                     <td>{{$g->bulan}}</td>
                     <td>Rp. {{number_format("$g->total",2,",",".") }}</td>
                     <td style="text-align: center;">
                            <a href="">
                                <i class="fa fa-eye btn-success" style="padding:8px;border-radius:5px;"></i>
                            </a>
                            <a href="">
                                <i class="fa fa-trash btn-warning" style="padding:8px;border-radius:5px;"></i>
                            </a>
                            <a href="{{ route('gaji.report_id', $g->id_gaji)}}">
                                <i class="fa fa-print btn-primary" style="padding:8px;border-radius:5px;"></i>
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