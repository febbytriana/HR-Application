@extends('layouts.app')

@section('content')

<section role="main" class="content-body">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item active" aria-current="page">Absen Pegawai</li>
        </ol>
    </nav>

    <section class="card mt-3">
        <div class="card-header">
              <h4>Absen Pegawai</h4>
        </div>
        <div class="card-body">
        <div class="pull-left">
              <a href="{{ route('absen.export') }}"> 
                <button class="btn btn-success btn-xs"><i class="fa fa-file"></i> Export EXCEL</button>
              </a>
            </div><br><br><br>
            <table class="table table-striped table-hover" id="data-id" width="100%">
                <thead>
                    <tr>
                        <th style="text-align: center;">No</th>
                        <th style="text-align: center;">Bulan</th>
                        <th style="text-align: center;">Tahun</th>
                        <th style="text-align: center;" width="180px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="text-align: center;">1</td>
                        <td style="text-align: center;">Januari</td>
                        <td style="text-align: center;">2019</td>
                        <td style="text-align: center;">
                            <a href="">
                                <button class="btn btn-success btn-xs"><i class="fa fa-eye"></i></button>
                            </a>
                            <a href="">
                                <button class="btn btn-info btn-xs"><i class="fa fa-print"></i></button>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
      </div>
    </section>
</section>
@endsection