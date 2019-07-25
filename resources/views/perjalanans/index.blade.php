@extends('layouts.app')

@section('content')

<section role="main" class="content-body">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item active" aria-current="page">Perjalanan</li>
        </ol>
    </nav>

    <section class="card mt-3">

        <div class="card-body">
            <div class="head-title">
              <h2>Surat Perjalanan</h2>
            </div>
            <br>
            <div class="pull-left">
             <a href="">
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
                        <th style="text-align: center;">Berangkat</th>
                        <th style="text-align: center;">Pulang</th>
                        <th style="text-align: center;" width="180px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="text-align: center;">1</td>
                        <td style="text-align: center;">1234</td>
                        <td style="text-align: center;">Babeh</td>
                        <td style="text-align: center;">17-08-1945</td>
                        <td style="text-align: center;">28-10-1968</td>
                        <td style="text-align: center;">
                            <a href="">
                                <button class="btn btn-success btn-xs"><i class="fa fa-print"></i></button>
                            </a>
                            <a href="">
                                <button class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></button>
                            </a>
                            <a href="">
                                <button class="btn btn-danger btn-xs" onclick="return confirm('Hapus data ini?')"><i class="fa fa-trash"></i></button>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
      </div>
    </section>
</section>
@endsection