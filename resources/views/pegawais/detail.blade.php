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
            <a class="dropdown-item" data-toggle="tab" href="">Istri</a>
          </div>
      </li>
      <li class="nav-item" style="margin-left: 10px;">
        <a class="nav-link link-tab" data-toggle="tab" href="#menu2">Menu 2</a>
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
                  <img src="" width="160" height="300"><i class="fa fa-user hide"></i></a>
              </div>
              <!-- end profile-image -->
              <div class="m-b-10">
                <a href="javascript:;" class="btn btn-warning btn-block btn-sm">d11122</a>
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
                          <h4>Ridwan <small>Dummy Data</small></h4>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="highlight">
                        <td class="field">NIK</td>
                        <td>d11122</td>
                      </tr>
                      <tr>
                        <td class="field">Jenis Kelamin</td>
                        <td><i class="fa fa-male fa-lg m-r-5"></i> Laki-laki</td>
                      </tr>
                      <tr>
                        <td class="field">Unit</td>
                        <td>ENG / Engineering                       </td>
                      </tr>
                      <tr>
                        <td class="field">Tanggal Masuk</td>
                        <td>13-05-2019</td>
                      </tr>
                      <tr>
                        <td class="field">Alamat</td>
                        <td><i class="fa fa-map-marker fa-lg m-r-5"></i> sss</td>
                      </tr>
                      <tr>
                        <td class="field">Kota</td>
                        <td>sss</td>
                      </tr>
                      <tr>
                        <td class="field">Kota Asal</td>
                        <td>s</td>
                      </tr>
                      <tr>
                        <td class="field">Tempat Tanggal Lahir</td>
                        <td>cccc, 24-07-2019</td>
                      </tr>
                      <tr>
                        <td class="field">Umur</td>
                        <td>0 Tahun, 0 Bulan, 7 Hari</td>
                      </tr>
                      <tr>
                        <td class="field">Agama</td>
                        <td>Islam</td>
                      </tr>
                      <tr>
                        <td class="field">WN</td>
                        <td>Indonesia</td>
                      </tr>
                      <tr>
                        <td class="field">Status Perkawinan</td>
                        <td>K/0</td>
                      </tr>
                      <tr>
                        <td class="field">Status Pph</td>
                        <td>K/2</td>
                      </tr>
                      <tr>
                        <td class="field">Golongan Darah</td>
                        <td>O</td>
                      </tr>
                      <tr>
                        <td class="field">No. Telp</td>
                        <td><i class="fa fa-mobile fa-lg m-r-5"></i> 00292</td>
                      </tr>
                      <tr>
                        <td class="field">No. BPJS Kesehatan</td>
                        <td>888</td>
                      </tr>
                      <tr>
                        <td class="field">No. BPJS Ketenagakerjaan</td>
                        <td>5556</td>
                      </tr>
                      <tr>
                        <td class="field">No. BPJS Pensiun</td>
                        <td>66</td>
                      </tr>
                    </tbody>
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
        <h4>-- Pengalaman Mencari Nafkah --</h4>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <section class="card mt-2 mb-4" style="border: 1px solid #6d6d6d; border-radius: 0px;">
              <div class="card-body">
                <div class="head" style="margin-bottom: 27px">
                  <span style="font-size: 17px; font-family: 'Poppins', sans-serif;">Pernah Bekerja di?</span>
                  <div class="pull-right">
                    <a href="" class="btn btn-info btn-xs"><i class="fa fa-plus fa-fx"></i> Tambah</a>
                  </div>  
                </div>
                
                <section class="card mb-4" style="border: 1px solid #898989; border-radius: 0px;">
                  <div class="card-header" style="background: #b4b4b4">
                    <h6>Nama Perusahaan</h6>
                  </div>
                  <div class="card-body">
                      <span style="margin-right: 60px">JABATAN</span><span style="margin-right: 18px"> : </span><span>SEBAGAI APA</span>
                      <br>
                      <span style="margin-right: 28px">LAMA BEKERJA</span><span style="margin-right: 18px;"> : </span><span>2 HARI</span>
                      <br>
                      <div class="pull-right">
                        <a class="btn btn-success btn-xs" href=""><i class="fa fa-edit fa-fx"></i> EDIT</a> &nbsp<a class="btn btn-danger btn-xs" href=""><i class="fa fa-trash fa-fx"></i> HAPUS</a>
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
    <div id="kontrak" class="container tab-pane fade"><br>
      <div class="container">
        <h4>-- Kontrak Kerja --</h4>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <section class="card mt-2">
              <div class="card-body">
                <div class="head" style="margin-bottom: 27px">
                  <span style="font-size: 17px; font-family: 'Poppins', sans-serif;">List Kontrak</span>
                  <div class="pull-right">
                    <a href="" class="btn btn-info btn-xs"><i class="fa fa-plus fa-fx"></i> Tambah</a>
                  </div>  
                </div>
                
                <table class="table table-striped table-hover" id="data-id" width="100%">
                  <thead>
                      <tr>
                          <th style="text-align: center;">No</th>
                          <th style="text-align: center;">Jabatan</th>
                          <th style="text-align: center;">Tahun</th>
                          <th style="text-align: center;">Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td style="text-align: center; font-size: 15px;">1</td>
                          <td align="center" style="font-size: 15px;">Staff</td>
                          <td align="center" style="font-size: 15px;">2018-2020</td>
                          <td align="center">
                            <a href="#">
                                  <button class="btn btn-success btn-xs mr-2"><i class="fa fa-edit"></i> EDIT</button>
                              </a>
                              <a href="#">
                                  <button class="btn btn-danger btn-xs" onclick="return confirm('Hapus data ini?')"><i class="fa fa-trash"></i> HAPUS</button>
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
              <div class="card-body" style="border: 2px solid #898989;">
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
        <h4>-- Anak --</h4>
        <div class="head-title">
          <a class="btn btn-info btn-xs pull-right" href=""><i class="fa fa-plus fa-fx"></i> Tambah</a>
        </div>
      </div>
      <br>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <section class="card">
              <div class="card-body" style="border: 2px solid #898989;">
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
  </div>
  </div>
</div>

@endsection
