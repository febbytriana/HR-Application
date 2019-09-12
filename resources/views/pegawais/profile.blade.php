@extends('layouts.apppegawai')

@section('content')

  <section role="main" class="content-body">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Beranda</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profil</li>
            <li class="breadcrumb-item active" aria-current="page">{{$pegawai->nama}}</li>
        </ol>
    </nav>

    <section class="card mt-3">
          <div class="card-body">
                  <div class="row">
                    <div class="col-md-3 mb-2">
                        <div class="profile-left">
                          <!-- begin profile-image -->
                          <div class="profile-image shadow">
                            <a href="#" title="Foto {{$pegawai->nama}}">
                              <img src="{{ asset('upload/'.$pegawai->image) }}" width="170" height="300"></a>
                          </div>
                          <div class="rounded shadow" style="background-color: #0f5b94; color: #fff; text-align: center;">
                            <span class="nickname">{{$pegawai->nama}}<br>{{$pegawai->jabatan['jabatan']}}</span>
                          </div>
                          <!-- end profile-image -->
                        </div>
                        <!--<div class="card shadow">
                        <div class="card-body rounded">
                        <div class="s-report-title d-flex justify-content-between">
                            <h5>Data Personal</h5>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tr>
                                    <td style="font-size: 14px; padding-left: 30px;">Nama</td>
                                    <td style="font-size: 14px; padding-right: 90px;">{{$pegawai->nama}}</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px; padding-left: 30px;">Jabatan</td>
                                    <td style="font-size: 14px; padding-right: 90px;">{{$pegawai->jabatan['jabatan']}}</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px; padding-left: 30px;">Jenis Kelamin</td>
                                    <td style="font-size: 14px; padding-right: 90px;">{{$pegawai->jk}}</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px; padding-left: 30px;">TTL</td>
                                    <td style="font-size: 14px; padding-right: 90px;">{{$pegawai->tempat}}, {{$pegawai->tgl}}</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px; padding-left: 30px;">Alamat</td>
                                    <td style="font-size: 14px; padding-right: 90px;">{{$pegawai->alamat}}</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px; padding-left: 30px;">Umur</td>
                                    <td style="font-size: 14px; padding-right: 90px;">{{ \Carbon\Carbon::parse($pegawai->tgl)->age}}</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px; padding-left: 30px;">Agama</td>
                                    <td style="font-size: 14px; padding-right: 90px;">{{$pegawai->agama}}</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px; padding-left: 30px;">Kewarganegraan</td>
                                    <td style="font-size: 14px; padding-right: 90px;">{{$pegawai->warga_negara}}</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px; padding-left: 30px;">Status</td>
                                    <td style="font-size: 14px; padding-right: 90px;">{{$pegawai->status_kawin}}</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px; padding-left: 30px;">Goldar</td>
                                    <td style="font-size: 14px; padding-right: 90px;">{{$pegawai->goldar}}</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px; padding-left: 30px;">Telp</td>
                                    <td style="font-size: 14px; padding-right: 90px;">{{$pegawai->telp}}</td>
                                </tr>
                            </table>
                        </div>
                        </div>
                        </div>-->
                    </div>
                    <div class="col-md-8">
                        <div class="card shadow">
                        <div class="card-body rounded">
                        <div class="s-report-title d-flex justify-content-between">
                            <h5>Data Personal</h5>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tr>
                                    <td style="font-size: 14px; padding-left: 30px;">Nama</td>
                                    <td style="font-size: 14px; padding-right: 90px;">{{$pegawai->nama}}</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px; padding-left: 30px;">Jabatan</td>
                                    <td style="font-size: 14px; padding-right: 90px;">{{$pegawai->jabatan['jabatan']}}</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px; padding-left: 30px;">Jenis Kelamin</td>
                                    <td style="font-size: 14px; padding-right: 90px;">{{$pegawai->jk}}</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px; padding-left: 30px;">TTL</td>
                                    <td style="font-size: 14px; padding-right: 90px;">{{$pegawai->tempat}}, {{$pegawai->tgl}}</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px; padding-left: 30px;">Alamat</td>
                                    <td style="font-size: 14px; padding-right: 90px;">{{$pegawai->alamat}}</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px; padding-left: 30px;">Umur</td>
                                    <td style="font-size: 14px; padding-right: 90px;">{{ \Carbon\Carbon::parse($pegawai->tgl)->age}}</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px; padding-left: 30px;">Agama</td>
                                    <td style="font-size: 14px; padding-right: 90px;">{{$pegawai->agama}}</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px; padding-left: 30px;">Kewarganegraan</td>
                                    <td style="font-size: 14px; padding-right: 90px;">{{$pegawai->warga_negara}}</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px; padding-left: 30px;">Status</td>
                                    <td style="font-size: 14px; padding-right: 90px;">{{$pegawai->status_kawin}}</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px; padding-left: 30px;">Goldar</td>
                                    <td style="font-size: 14px; padding-right: 90px;">{{$pegawai->goldar}}</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px; padding-left: 30px;">Telp</td>
                                    <td style="font-size: 14px; padding-right: 90px;">{{$pegawai->telp}}</td>
                                </tr>
                            </table>
                        </div>
                        </div>
                        </div>
                    </div>
                  </div>
          </div>
    </section>
</section>

@endsection
