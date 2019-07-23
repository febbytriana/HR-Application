@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-md-12">
    <section class="card">
      <div class="card-body">
        <div class="head-title">
          <h2>Manajemen Akun</h2>
          <nav aria-label="breadcrumb">
                <ol class="breadcrumb mt-3">
                    <li class="breadcrumb-item active" aria-current="page">Beranda</li>
                </ol>
            </nav>
        </div>
            <div class="pull-left">
              <a href="">
                <button class="btn btn-success btn-xs"><i class="fa fa-file"></i> Export EXCEL</button>
              </a>
              <a href="">
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