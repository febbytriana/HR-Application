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
            <table class="table table-striped table-hover" id="data-id" width="100%">
                <thead>
                    <tr>
                        <th style="text-align: center;">No</th>
                        <th style="text-align: center;">NIK</th>
                        <th style="text-align: center;">Nama</th>
                        <th style="text-align: center;">Jabatan</th>
                        <th style="text-align: center;" width="180px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="text-align: center;">1</td>
                        <td style="text-align: center;">1234</td>
                        <td style="text-align: center;">Babeh</td>
                        <td style="text-align: center;">Manajer</td>
                        <td style="text-align: center;">
                            <a href="">
                                <button class="btn btn-success btn-xs"><i class="fa fa-print"></i> Absen</button>
                            </a>
                            <a href="">
                                <button class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Rekap</button>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
      </div>
    </section>
</section>
@endsection