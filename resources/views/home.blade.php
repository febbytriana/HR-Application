@php
    function tanggal_indonesia($tgl)
            {
            $tanggal     = substr($tgl,8,2);
            $bulan         = bulan(substr($tgl,5,2));
            $tahun         = substr($tgl,0,4);
            return $tanggal.' '.$bulan.' '.$tahun;

            }

            function bulan($bln)
            {
            switch ($bln)
            {
            case 1:
            return "Januari";
            break;
            case 2:
            return "Februari";
            break;
            case 3:
            return "Maret";
            break;
            case 4:
            return "April";
            break;
            case 5:
            return "Mei";
            break;
            case 6:

            return "Juni";
            break;
            case 7:
            return "Juli";
            break;
            case 8:
            return "Agustus";
            break;
            case 9:
            return "September";
            break;
            case 10:
            return "Oktober";
            break;
            case 11:
            return "November";
            break;
            case 12:
            return "Desember";
            break;
            }
            }

            $tgl = tanggal_indonesia(date('Y-m-d'));
            $now = explode(' ', $tgl);
@endphp
@extends('layouts.app')
@section('content')

  <section role="main" class="content-body">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item active" aria-current="page">Beranda</li>
        </ol>
    </nav>

    <section class="card shadow mt-3">
        <div class="card-header bg-bprimary text-light">
            <h6>Dashboard - Hari ini {{ date('d-M-Y') }}</h6>
        </div>
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

        <div class="main-content-inner">
                <div class="row">
                    <!-- seo fact area start -->
                    <div class="col-lg-12 ">
                        <div class="row">
                            <div class="col-md-4 mt-5 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg3">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-user"></i> Pegawai</div>
                                            <h2>{{$jumlah_pegawai}}</h2>
                                        </div>
                                        <canvas id="seolinechart1" height="25"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mt-md-5 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg1">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-book"></i>Perjalanan</div>
                                            <h2>{{$jumlah_perjalanan}}</h2>
                                        </div>
                                        <canvas id="seolinechart2" height="25"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mt-md-5 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg2">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-book"></i>SP</div>
                                            <h2>{{$jumlah_sp}}</h2>
                                        </div>
                                        <canvas id="seolinechart2" height="25"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
            </div>
            @if(Auth::user()->status == "HR" )
            <div class="table-responsive">
                <div class="head-title">
                    <hr>
                    <h6>Pegawai yang belum Absen Hari ini.</h6>
                    <hr>
                </div>
                <table class="table table-striped" id="data-id" width="100%">
                    <thead>
                        
                    <tr>
                        <th width="39px" style="text-align: center;"><input type="checkbox"> All</th>
                        <th width="39px" style="text-align: center;">No</th>
                        <th>Nama Pegawai</th>
                        <th>Beri Keterangan</th>
                    </tr>
                    </thead>
                    <tbody>
                   @foreach($pegawai as $key => $data)
                    <tr>
                   @php $ab = DB::table('absens')->where([['id_pegawai',$data->id_pegawai],['tgl',$now[0]],['bulan',$now[1]],['tahun',$now[2]]])->count(); @endphp
                   @if($ab == 0)
                        <td><input type="checkbox" name="" value=""></td>
                        <td align="center">{{$key+1}}</td>
                        <td>{{$data->nama}}</td>
                        <td>
                            <a href="">
                                <button class="btn btn-warning btn-xs"> Alfa</button>
                            </a>
                            <a href="">
                                <button class="btn btn-info btn-xs"> Izin</button>
                            </a>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
            @endif
    </section>
</section>

@endsection
