

@extends('layouts.app')

@section('content')

<div class="head-title">
  <h2>Detail Pegawai</h2>
  <!-- Nav tabs -->
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb mt-3">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
        <li class="breadcrumb-item"><a href="{{ route('pegawai.index') }}">Pegawai</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail</li>
    </ol>
  </nav>
</div>

<div class="row">
  <div class="col-md-12">
    <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item">
        <a class="nav-link link-tab active" data-toggle="tab" href="#profile"><i class="fa fa-user fa-fx"></i> Profile</a>
      </li>
      <li class="nav-item dropdown" style="margin-left: 10px;">
        <!--<a class="nav-link link-tab active" data-toggle="tab" href="#pengalaman">Pengalaman</a>-->
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" style="color: #82df39;"><i class="fa fa-briefcase fa-fx"></i> Pengalaman</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" data-toggle="tab" href="#pengalaman">Pengalaman Kerja</a>
            <a class="dropdown-item" data-toggle="tab" href="#kontrak">Kontrak</a>
          </div>
      </li>
      <li class="nav-item dropdown" style="margin-left: 10px;">
        <!--<a class="nav-link link-tab active" data-toggle="tab" href="#pengalaman">Pengalaman</a>-->
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" style="color: #82df39;"><i class="fa fa-users fa-fx"></i> Keluarga</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" data-toggle="tab" href="#orangtua">Orang Tua</a>
            <a class="dropdown-item" data-toggle="tab" href="#anak">Anak</a>
            <a class="dropdown-item" data-toggle="tab" href="#istri">Istri</a>
          </div>
      </li>
      <li class="nav-item" style="margin-left: 10px;">
        <a class="nav-link link-tab" data-toggle="tab" href="#pendidikan">Pendidikan</a>
      </li>
      <li class="nav-item" style="margin-left: 10px;">
        <a class="nav-link link-tab" data-toggle="tab" href="#pelatihan">Pelatihan</a>
      </li>
      <li class="nav-item" style="margin-left: 10px;">
        <a class="nav-link link-tab" data-toggle="tab" href="#sertifikat">Sertifikat</a>
      </li>
      <li class="nav-item" style="margin-left: 10px;">
        <a class="nav-link link-tab" data-toggle="tab" href="#darurat">Darurat</a>
      </li>
    </ul>
  <!-- Tab panes -->
  <div class="tab-content">
    <div id="profile" class="container tab-pane active"><br>
      <!-- begin profile-container -->
      <div class="container">
        <h4>-- Profile --</h4>
      </div>
        <div class="profile-container">
                <!-- begin profile-section -->
          <div class="profile-section">
            <!-- begin profile-left -->
            <div class="profile-left">
              <!-- begin profile-image -->
              <div class="profile-image">
                <a href="index.php?page=form-ganti-foto&amp;id_kar=16" title="ganti foto">
                  <img src="" width="160" height="300"></a>
              </div>
              <!-- end profile-image -->

                @foreach($pegawai as $data)
                <div class="m-b-10">
                <span class="nickname">{{ $data->nama}}</span>
              </div>
            </div>
            <!-- end profile-left -->
            <!-- begin profile-right -->
            <div class="profile-right">
              <!-- begin profile-info -->
              <div class="profile-info">
                <!-- begin table -->
                <div class="table-responsive">
                  <table class="table table-profile">

                
                    <thead>
                      <tr>
                        <th><h5><span class="label label-inverse pull-right"> # Data Personal Karyawan </span></h5></th>
                        <th>
                          <h4>{{ $data->nama }}<small>{{ $data->jabatan['jabatan']}}</small></h4>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="highlight">
                        <td class="field">NIK</td>
                        <td>{{ $data->nik}}</td>
                      </tr>
                      <tr>
                        <td class="field">Jenis Kelamin</td>
                        <td><i class="fa fa-male fa-lg m-r-5"></i> {{ $data->jk}}</td>
                      </tr>
                      
                      <tr>
                        <td class="field">Tanggal Masuk</td>
                        <td>13-05-2019</td>
                      </tr>
                      <tr>
                        <td class="field">Alamat</td>
                        <td><i class="fa fa-map-marker fa-lg m-r-5"></i> {{ $data->alamat}}</td>
                      </tr>
                        <td class="field">Tempat Tanggal Lahir</td>
                        <td>{{ $data->tempat}}, {{ \Carbon\Carbon::parse($data->tgl)->format('d-m-Y')}}</td>
                      </tr>
                      <tr>
                        <td class="field">Umur</td>
                        <td>{{ \Carbon\Carbon::parse($data->tgl)->age}} tahun</td>
                      </tr>
                      <tr>
                        <td class="field">Agama</td>
                        <td>{{ $data->agama}}</td>
                      </tr>
                      <tr>
                        <td class="field">Kewarganegaraan</td>
                        <td>{{$data->warga_negara }}</td>
                      </tr>
                      <tr>
                        <td class="field">Status Perkawinan</td>
                        <td>{{$data->status_kawin }}</td>
                      </tr>
                        <td class="field">Golongan Darah</td>
                        <td>{{ $data->goldar}}</td>
                      </tr>
                      <tr>
                        <td class="field">No. Telp</td>
                        <td><i class="fa fa-mobile fa-lg m-r-5"></i> {{ $data->telp}}</td>
                      </tr>
                    </tbody>
                    @endforeach
                  </table>
                </div>
                <!-- end table -->
              </div>
              <!-- end profile-info -->
            </div>
            <hr>
            <!-- end profile-right -->
          </div>
          <!-- end profile-section -->
        </div>
        <!-- end profile-container -->
    </div>
    <div id="pengalaman" class="container tab-pane fade"><br>
      <div class="container">
        <h4>-- Pengalaman Kerja --</h4>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <section class="card mt-2 mb-4" style="border: 1px solid #898989; border-radius: 0px;">
              <div class="card-body">
                <div class="head" style="margin-bottom: 27px">
                  <span style="font-size: 17px; font-family: 'Poppins', sans-serif;">Pernah Bekerja di?</span>
                  <div class="pull-right">
                    <a href="" class="btn btn-info btn-xs"><i class="fa fa-plus fa-fx"></i> Tambah</a>
                  </div>  
                </div>
                
                <section class="card mb-4">
                  <div class="card-header" style="background: #b4b4b4">
                    <h6>Nama Perusahaan</h6>
                  </div>
                  <div class="card-body" style="border: 1px solid #c0c2ce;">
                      <span style="margin-right: 60px; font-size: 14px;">Jabatan</span><span style="margin-right: 18px; font-size: 14px;"> : </span><span style="font-size: 14px;">Sebagai</span>
                      <br>
                      <span style="margin-right: 28px; font-size: 14px;">Lama Bekerja</span><span style="margin-right: 18px;font-size: 14px;"> : </span><span style="font-size: 14px;">2 HARI</span>
                      <br>
                      <div class="pull-right">
                        <a class="btn btn-success btn-xs" href=""><i class="fa fa-edit fa-fx"></i> Edit</a> &nbsp<a class="btn btn-danger btn-xs" href=""><i class="fa fa-trash fa-fx"></i> Hapus</a>
                      </div>
                  </div>
                </section>
            </div>
            </section>
            <section class="card" style="border: 1px solid #898989; border-radius: 0px;">
                  <div class="card-body">
                      <span style="font-size: 14px">Jabatan saat ini ?</span>
                      <br>
                      <br>
                      <form action="#" method="post">
                      <div class="input-group mb-2">
                        <input type="text" class="form-control" placeholder="Manager Parkiran" name="jabatan">
                        <div class="input-group-append">
                          <a class="btn btn-success btn-md" href="#"><i class="fa fa-edit fa-fx"></i> EDIT</a>
                        </div>
                      </div>
                      </form>
                  </div>
                </section>
          </div>
        </div>
      </div>
    </div>
    <div id="kontrak" class="container tab-pane fade">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <section class="card mt-2">
              <div class="card-body">
                <div class="head-title">
                  <h4>-- Kontrak Kerja --</h4>
                </div>
                <br>
                <div class="pull-left">
                  <a href="{{ route('akun.create')}}">
                    <button class="btn btn-info btn-xs" style="width: 200px"><i class="fa fa-plus fa-fx"></i> Tambah</button>
                 </a>
                </div>
                <br>
                <br>
                <br>
                <table class="table table-striped table-hover" id="data-id" width="100%">
                  <thead>
                      <tr>
                          <th style="text-align: center;">No</th>
                          <th style="text-align: center;">Jabatan</th>
                          <th style="text-align: center;">Durasi Kontrak</th>
                          <th style="text-align: center;">Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td style="text-align: center; font-size: 14px;">1</td>
                          <td align="center" style="font-size: 14px;">Staff</td>
                          <td align="center" style="font-size: 14px;">2019-2020</td>
                          <td align="center">
                            <a href="#">
                                  <button class="btn btn-success btn-xs mr-2"><i class="fa fa-edit"></i> Edit</button>
                              </a>
                              <a href="#">
                                  <button class="btn btn-danger btn-xs" onclick="return confirm('Hapus data ini?')"><i class="fa fa-trash"></i> Hapus</button>
                              </a>
                          </td>
                      </tr>
                  </tbody>
              </table>
            </div>
            </section>
          </div>
        </div>
      </div>
    </div>
    <div id="orangtua" class="container tab-pane fade"><br>
      <div class="container">
        <h4>-- Orang Tua --</h4>
      </div>
      <br>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <section class="card">
              <div class="card-body mb-4" style="border: 2px solid #c0c2ce;">
                <div class="body-text">
                    <span style="margin-right: 25px; font-size: 14px;">Nama Ayah</span><span style="margin-right: 18px;font-size: 14px;"> : </span><span style="font-size: 14px;">Budi</span>
                    <br>
                    <span style="margin-right: 58px;font-size: 14px;">Status</span><span style="margin-right: 18px;font-size: 14px;"> : </span><span style="font-size: 14px;">Hidup</span>  
                    <br>
                    <span style="margin-right: 36px;font-size: 14px;">Nama Ibu</span><span style="margin-right: 18px;font-size: 14px;"> : </span><span style="font-size: 14px;">Budi</span>  
                    <br>
                    <span style="margin-right: 58px;font-size: 14px;">Status</span><span style="margin-right: 18px;font-size: 14px;"> : </span><span style="font-size: 14px;">Hidup</span>
                    <br>
                    <span style="margin-right: 53px;font-size: 14px;">Alamat</span><span style="margin-right: 18px;font-size: 14px;"> : </span><span style="font-size: 14px;">Jl. Tes Perum Test No. 99, Kec. Batujajar Kota Padalarang</span>
                  <div class="pull-right">
                    <a class="btn btn-success btn-xs" href=""><i class="fa fa-edit fa-fx"></i> Edit</a>
                  </div>
                </div>    
              </div>
            </section>
          </div>
        </div>
      </div>
    </div>
    <div id="anak" class="container tab-pane fade"><br>
      <div class="container">
        <span class="title-head">-- Anak --</span>
        <div class="pull-right">
          <a class="btn btn-info btn-xs pull-right" href=""><i class="fa fa-plus fa-fx"></i> Tambah</a>
        </div>
      </div>
      <br>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <section class="card">
              <div class="card-body mb-4" style="border: 2px solid #c0c2ce;">
                <div class="body-text">
                    <span style="margin-right: 111px; font-size: 14px;">Nama</span><span style="margin-right: 18px;font-size: 14px;"> : </span><span style="font-size: 14px;">Budi</span>
                    <br>
                    <span style="margin-right: 18px;font-size: 14px;">Tempat Tanggal Lahir</span><span style="margin-right: 18px;font-size: 14px;"> : </span><span style="font-size: 14px;">Hidup</span>  
                    <br>
                    <span style="margin-right: 98px;font-size: 14px;">Anak ke</span><span style="margin-right: 18px;font-size: 14px;"> : </span><span style="font-size: 14px;">Budi</span>  
                    <br>
                    <span style="margin-right: 109px;font-size: 14px;">Status</span><span style="margin-right: 18px;font-size: 14px;"> : </span><span style="font-size: 14px;">Hidup</span>
                  
                  <div class="pull-right">
                    <a class="btn btn-success btn-xs" href=""><i class="fa fa-edit fa-fx"></i> Edit</a>
                  </div>
                </div>    
              </div>
            </section>
          </div>
        </div>
      </div>
    </div>
    <div id="istri" class="container tab-pane fade"><br>
      <div class="container">
        <span class="title-head">-- Istri --</span>
        <div class="pull-right">
          <a class="btn btn-info btn-xs pull-right" href=""><i class="fa fa-plus fa-fx"></i> Tambah</a>
        </div>
      </div>
      <br>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <section class="card">
              <div class="card-body mb-4" style="border: 2px solid #c0c2ce;">
                <div class="body-text">
                    <span style="margin-right: 111px; font-size: 14px;">Nama</span><span style="margin-right: 18px;font-size: 14px;"> : </span><span style="font-size: 14px;">Budi</span>
                    <br>
                    <span style="margin-right: 18px;font-size: 14px;">Tempat Tanggal Lahir</span><span style="margin-right: 18px;font-size: 14px;"> : </span><span style="font-size: 14px;">Hidup</span>  
                    <br>
                    <span style="margin-right: 106px;font-size: 14px;">Istri ke</span><span style="margin-right: 18px;font-size: 14px;"> : </span><span style="font-size: 14px;">Budi</span>  
                    <br>
                    <span style="margin-right: 89px;font-size: 14px;">Pekerjaan</span><span style="margin-right: 18px;font-size: 14px;"> : </span><span style="font-size: 14px;">Hidup</span>
                  
                  <div class="pull-right">
                    <a href="">
                      <button class="btn btn-success btn-xs"><i class="fa fa-edit fa-fx"></i> Edit</button>
                    </a>
                    <a href="">
                      <button class="btn btn-danger btn-xs"><i class="fa fa-trash fa-fx"></i> Hapus</button>
                    </a>
                  </div>
                </div>    
              </div>
            </section>
          </div>
        </div>
      </div>
    </div>
    <div id="pendidikan" class="container tab-pane fade"><br>
      <div class="container">
        <h4>-- Pendidikan --</h4>
      </div>
      <br>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <section class="card">
              <div class="card-body mb-4" style="border: 1px solid #898989;">
                <div class="body-text">
                    <span style="margin-right: 113px; font-size: 14px;">SD</span><span style="margin-right: 18px;font-size: 14px;"> : </span><span style="font-size: 14px;">Budi</span>
                    <br>
                    <span style="margin-right: 58px;font-size: 14px;">Tahun Lulus</span><span style="margin-right: 18px;font-size: 14px;"> : </span><span style="font-size: 14px;">Hidup</span>  
                    <br>
                    <br>
                    <span style="margin-right: 102px;font-size: 14px;">SMP</span><span style="margin-right: 18px;font-size: 14px;"> : </span><span style="font-size: 14px;">Budi</span>  
                    <br>
                    <span style="margin-right: 58px;font-size: 14px;">Tahun Lulus</span><span style="margin-right: 18px;font-size: 14px;"> : </span><span style="font-size: 14px;">Hidup</span>
                    <br>
                    <br>
                    <span style="margin-right: 68px;font-size: 14px;">SMA/SMK</span><span style="margin-right: 18px;font-size: 14px;"> : </span><span style="font-size: 14px;">Budi</span>  
                    <br>
                    <span style="margin-right: 58px;font-size: 14px;">Tahun Lulus</span><span style="margin-right: 18px;font-size: 14px;"> : </span><span style="font-size: 14px;">Hidup</span>
                    <br>
                    <br>
                    <span style="margin-right: 26px;font-size: 14px;">Perguruan Tinggi</span><span style="margin-right: 18px;font-size: 14px;"> : </span><span style="font-size: 14px;">Budi</span>  
                    <br>
                    <span style="margin-right: 58px;font-size: 14px;">Tahun Lulus</span><span style="margin-right: 18px;font-size: 14px;"> : </span><span style="font-size: 14px;">Hidup</span>
                    <br>
                  <div class="pull-right">
                    <a class="btn btn-success btn-xs" href=""><i class="fa fa-edit fa-fx"></i> Edit</a>
                  </div>
                </div>    
              </div>
            </section>
          </div>
        </div>
      </div>
    </div>
    <div id="pelatihan" class="container tab-pane fade"><br>
      <div class="container">
        <h4>-- Pelatihan Kerja --</h4>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <section class="card mt-2 mb-4" style="border: 1px solid #898989; border-radius: 0px;">
              <div class="card-body">
                <div class="head" style="margin-bottom: 27px">
                  <span style="font-size: 17px; font-family: 'Poppins', sans-serif;">Pernah Ikut Pelatihan di?</span>
                  <div class="pull-right">
                    <a href="" class="btn btn-info btn-xs"><i class="fa fa-plus fa-fx"></i> Tambah</a>
                  </div>  
                </div>
                
                <section class="card mb-4">
                  <div class="card-header" style="background: #b4b4b4">
                    <h6>PT. Cap Kaki Tiga</h6>
                  </div>
                  <div class="card-body" style="border: 1px solid #c0c2ce;">
                      <span style="margin-right: 49px; font-size: 14px;">Tempat</span><span style="margin-right: 18px;font-size: 14px;"> : </span><span style="font-size: 14px;"> Staff</span>
                      <br>
                      <span style="margin-right: 48px;font-size: 14px;">Tanggal</span><span style="margin-right: 18px;font-size: 14px;"> : </span><span style="font-size: 14px;">2 Bulan</span>
                      <br>
                      <span style="margin-right: 60px;font-size: 14px;">Peran</span><span style="margin-right: 18px;font-size: 14px;"> : </span><span style="font-size: 14px;">Sutradara</span>
                      <br>
                      <div class="pull-right">
                        <a class="btn btn-success btn-xs" href=""><i class="fa fa-edit fa-fx"></i> Edit</a> &nbsp<a class="btn btn-danger btn-xs" href=""><i class="fa fa-trash fa-fx"></i> Hapus</a>
                      </div>
                  </div>
                </section>
            </div>
            </section>
          </div>
        </div>
      </div>
    </div>
    <div id="sertifikat" class="container tab-pane fade"><br>
      <div class="container">
        <span class="title-head">-- Sertifikat --</span>
        <div class="pull-right">
          <a class="btn btn-info btn-xs pull-right" href=""><i class="fa fa-plus fa-fx"></i> Tambah</a>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <section class="card mt-2 mb-4">
                
                  <div class="card-body" style="border: 1px solid #c0c2ce;">
                      <div class="profile-left">
                        <!-- begin profile-image -->
                        <div class="profile-image">
                          <a href="index.php?page=form-ganti-foto&amp;id_kar=16" title="ganti foto">
                            <img src="{{ asset('images/2.jpg') }}" width="160" height="300"></a>
                        </div>
                        <!-- end profile-image -->  
                      </div>
                      <div class="profile-right-tab" style="margin-bottom: 80px;">
                        <h4>LOMBA - LOMBA</h4>
                        <span style="font-size: 14px;">02 Nov 2020 ASDJK ASDJK ASDJK ASDJK ASDJK ASDJK ASDJK ASDJK ASDJK ASDJKV ASDJK ASDJKVV ASDJK ASDJK ASDJKV</span>
                      </div>
                      <div class="pull-right">
                        <a href="">
                          <button class="btn btn-success btn-xs"><i class="fa fa-edit"></i> Edit</button>
                        </a>
                        <a href="">
                          <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button>
                        </a>
                      </div>
                  </div>

            </section>
          </div>
        </div>
      </div>
    </div>
    <div id="darurat" class="container tab-pane fade">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <section class="card mt-2">
              <div class="card-body">
                <div class="head-title">
                  <h4>-- Nomor Darurat --</h4>
                </div>
                <br>
                <div class="pull-left">
                  <a href="{{ route('akun.create')}}">
                    <button class="btn btn-info btn-xs" style="width: 200px"><i class="fa fa-plus fa-fx"></i> Tambah</button>
                 </a>
                </div>
                <br>
                <br>
                <br>
                <table class="table table-striped table-hover" id="data-tbl" width="100%">
                  <thead>
                      <tr>
                          <th style="text-align: center;">No</th>
                          <th style="text-align: center;">Nama</th>
                          <th style="text-align: center;">No Telepon</th>
                          <th style="text-align: center;">Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td style="text-align: center; font-size: 14px;">1</td>
                          <td align="center" style="font-size: 14px;">Ica</td>
                          <td align="center" style="font-size: 14px;">088928300132</td>
                          <td align="center">
                            <a href="#">
                                  <button class="btn btn-success btn-xs mr-2"><i class="fa fa-edit"></i> Edit</button>
                              </a>
                              <a href="#">
                                  <button class="btn btn-danger btn-xs" onclick="return confirm('Hapus data ini?')"><i class="fa fa-trash"></i> Hapus</button>
                              </a>
                          </td>
                      </tr>
                  </tbody>
              </table>
            </div>
            </section>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</div>
@endsection
