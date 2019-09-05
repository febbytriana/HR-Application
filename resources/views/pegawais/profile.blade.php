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
          <div class="">
              <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-2 mb-4">
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
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card shadow">
                        <div class="card-body rounded">
                        <div class="s-report-title d-flex justify-content-between">
                            <h5>Data Personal</h5>
                            @if($checktemp > 0)
                            <a class="disabled" style="font-size: 14px;padding-top: 3px; color: grey;"><i class="fa fa-spinner"></i> Permintaan edit sedang diproses...</a>
                            @else
                            <a href="{{route('pegawai.editperson',base64_encode($pegawai->id_pegawai))}}" style="font-size: 14px;padding-top: 3px;"><i class="fa fa-edit"></i> Edit</a>
                            @endif

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
                    <div class="col-md-4">
                        <div class="card shadow">
                          <a class="card-header" data-toggle="collapse" href="#collapseOne" style="font-size: 18px; color: #fff; background-color: #0f5b94;">
                              Data lainnya..
                          </a>
                          <div id="collapseOne" class="collapse show" data-parent="#accordion">
                            <div class="card-body">
                              <div class="table-responsive">
                                    <table class="table table-hover">
                                        <tr>
                                            <td style="font-size: 14px;"><a class="text-dark" href="{{route('pegawai.pengalaman',$pegawai->id_pegawai)}}">Pengalaman Kerja</a></td> 
                                        </tr>
                                        <tr>
                                            <td style="font-size: 14px;"><a class="text-dark" href="{{route('keluarga.ortu',$pegawai->id_pegawai)}}">Orang Tua</a></td>
                                        </tr>
                                        <tr>@if($pegawai->jk == "Laki-laki")
                                            <td style="font-size: 14px;"><a class="text-dark" href="#">Istri</a></td>
                                            @else
                                            <td style="font-size: 14px;"><a class="text-dark" href="#">Suami</a></td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td style="font-size: 14px;"><a class="text-dark" href="#">Anak</a></td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 14px;"><a class="text-dark" href="{{route('pendidikan.indexpegawai',$pegawai->id_pegawai)}}">Pendidikan</a></td> 
                                        </tr>
                                        <tr>
                                            <td style="font-size: 14px;"><a class="text-dark" href="{{route('pelatihan.indexpegawai',$pegawai->id_pegawai)}}">Pelatihan yang pernah diikuti</a></td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 14px;"><a class="text-dark" href="{{route('sertifikat.indexpegawai',$pegawai->id_pegawai)}}">Sertifikat yang pernah didapat</a></td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 14px;"><a class="text-dark" href="{{route('darurat.indexpegawai',$pegawai->id_pegawai)}}">Nomor Darurat</a></td>
                                        </tr>
                                    </table>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                  </div>
              </div>
          </div>
    </section>
</section>

@endsection
