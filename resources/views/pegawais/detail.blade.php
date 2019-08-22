@section('js')
<script type="text/javascript">
      function hapusNo(idpeg,idno) {
        Swal({
            title: 'Apakah Anda Yakin?',
            text: "Tekan 'Hapus' Untuk Meneruskan Penghapusan",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
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
                        location.href = 'http://localhost:8000/no-darurat/delete/'+idpeg+'/'+idno;
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

<div class="head-title">
  <h2>Detail Pegawai</h2>
  <!-- Nav tabs -->
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb mt-3">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
        <li class="breadcrumb-item"><a href="{{ route('pegawai.index') }}">Pegawai</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail</li>
        @foreach($pegawai as $data)
        <li class="breadcrumb-item active" aria-current="page">{{$data->nama}}</li>
        @endforeach
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


              <a class="btn btn-info btn-xs pull-right" href="{{ route('keluarga.create',$pegawais->id_pegawai) }}"><i class="fa fa-plus fa-fx"></i> Tambah Data keluarga</a>
       
            <a class="dropdown-item" data-toggle="tab" href="#orangtua">Orang Tua</a>
            <a class="dropdown-item" data-toggle="tab" href="#anak">Anak</a>

            @if($pegawais->jk=="Perempuan")
            <a class="dropdown-item" data-toggle="tab" href="#suami">Suami</a>
            @endif   

            @if($pegawais->jk=="Laki-laki")
            <a class="dropdown-item" data-toggle="tab" href="#istri">Istri</a>
            @endif

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
          @foreach($pegawai as $data)
            <div class="profile-left">
              <!-- begin profile-image -->
              <div class="profile-image">
                <a href="index.php?page=form-ganti-foto&amp;id_kar=16" title="ganti foto">
                  <img src="{{ asset('upload/'.$data->image) }}" width="160" height="300"></a>
              </div>
              <!-- end profile-image -->
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
        <span class="title-head">-- OrangTua --</span>
      </div>
      <br>
      @if(count($hitungortu) > 0)
        @foreach($keluarga as $keluargas)
           @if($keluargas->status=="Ayah" ||  $keluargas->status=="Ibu")

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
                          
                    <span style="margin-right: 111px; font-size: 14px;">Nama</span><span style="margin-right: 18px;font-size: 14px;"> : </span><span style="font-size: 14px;">{{ $keluargas->nama }}</span>
                    <br>
                    <span style="margin-right: 65px; font-size: 14px;">Jenis Kelamin</span><span style="margin-right: 15px;font-size: 14px;"> : </span><span style="font-size: 14px;">{{ $keluargas->jk }}</span>
                    <br>
                    <span style="margin-right: 14px;font-size: 14px;">Tempat Tanggal Lahir</span><span style="margin-right: 18px;font-size: 14px;"> : </span><span style="font-size: 14px;">{{ $keluargas->tempat }} , {{ $keluargas->tgl }} </span>  
                    <br>
                    <span style="margin-right: 109px;font-size: 14px;">Status</span><span style="margin-right: 18px;font-size: 14px;"> : </span><span style="font-size: 14px;">{{ $keluargas->status }} </span>
                    <br>
                    <div class="pull-right">
                        <a class="btn btn-success btn-xs" href="{{ route('keluarga.edit',['id_pegawai'=>$pegawais->id_pegawai,'id_keluarga'=>$keluargas->id_keluarga]) }}"><i class="fa fa-edit fa-fx"></i> Edit</a>


                        <a class="btn btn-success btn-xs" href="{{ route('keluarga.destroy',['id_pegawai'=>$pegawais->id_pegawai,'id_keluarga'=>$keluargas->id_keluarga]) }}"><i class="fa fa-trash fa-fx"></i> Hapus</a>                            
                    </div>  
                           
                       

              </div>
            </div>

            </section>

          </div>
        </div>
      </div>
         @endif
          @endforeach
                            
      @endif

      @if(count($hitungortu) == 0)

        <div class="container">
        <div class="row">
          <div class="col-md-12">
            <section class="card">
              <div class="card-body mb-4" style="border: 2px solid #c0c2ce;">
                <div class="body-text">
                  <span>Tidak ada data.</span>
                </div>
              </div>

            </section>

          </div>
        </div>
      </div>

      @endif

    </div>

    <div id="anak" class="container tab-pane fade"><br>
      <div class="container">
        <span class="title-head">-- Anak --</span>
      </div>
      <br>
      @if(count($hitunganak) > 0)
        @foreach($keluarga as $keluargas)
        @if($keluargas->status=="Anak")
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <section class="card">
              <div class="card-body mb-4" style="border: 2px solid #c0c2ce;">
                <div class="body-text">
                        
                              
                              <span style="margin-right: 111px; font-size: 14px;">Nama</span><span style="margin-right: 18px;font-size: 14px;"> : </span><span style="font-size: 14px;">{{ $keluargas->nama }}</span>
                              <br>
                              <span style="margin-right: 65px; font-size: 14px;">Jenis Kelamin</span><span style="margin-right: 15px;font-size: 14px;"> : </span><span style="font-size: 14px;">{{ $keluargas->jk }}</span>
                              <br>
                              <span style="margin-right: 14px;font-size: 14px;">Tempat Tanggal Lahir</span><span style="margin-right: 18px;font-size: 14px;"> : </span><span style="font-size: 14px;">{{ $keluargas->tempat }} , {{ $keluargas->tgl }} </span>  
                              <br>
                              <span style="margin-right: 109px;font-size: 14px;">Status</span><span style="margin-right: 18px;font-size: 14px;"> : </span><span style="font-size: 14px;">{{ $keluargas->status }} </span>
                              <br>
                            <div class="pull-right">
                              <a class="btn btn-success btn-xs" href="{{ route('keluarga.edit',['id_pegawai'=>$pegawais->id_pegawai,'id_keluarga'=>$keluargas->id_keluarga]) }}"><i class="fa fa-edit fa-fx"></i> Edit</a>


                              <a class="btn btn-success btn-xs" href="{{ route('keluarga.destroy',['id_pegawai'=>$pegawais->id_pegawai,'id_keluarga'=>$keluargas->id_keluarga]) }}"><i class="fa fa-trash fa-fx"></i> Hapus</a>                            
                            </div>
                            
                       

              </div>
            </div>

            </section>

          </div>
        </div>
      </div>
@endif
          @endforeach
                            
      @endif

      @if(count($hitunganak) == 0)

        <div class="container">
        <div class="row">
          <div class="col-md-12">
            <section class="card">
              <div class="card-body mb-4" style="border: 2px solid #c0c2ce;">
                <div class="body-text">
                  <span>Tidak ada data.</span>
                </div>
              </div>

            </section>

          </div>
        </div>
      </div>

      @endif

    </div>

   @if($pegawais->jk=="Laki-laki")
      <div id="istri" class="container tab-pane fade"><br>
      <div class="container">
        <span class="title-head">-- Istri --</span>
      </div>
      <br>
      @if(count($hitungistri) > 0)
        @foreach($keluarga as $keluargas)
          @if($keluargas->status=="Istri")
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
        @foreach($pegawai as $spegawais)

        <a class="btn btn-info btn-xs pull-right" href="{{ route('keluarga.create',$pegawais->id_pegawai) }}"><i class="fa fa-plus fa-fx"></i> Tambah</a>
        @endforeach
        </div>
      </div>
      <br>
>>>>>>> origin/master
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <section class="card">
              <div class="card-body mb-4" style="border: 2px solid #c0c2ce;">
                <div class="body-text">

                        
                            
                              <span style="margin-right: 111px; font-size: 14px;">Nama</span><span style="margin-right: 18px;font-size: 14px;"> : </span><span style="font-size: 14px;">{{ $keluargas->nama }}</span>
                              <br>
                              <span style="margin-right: 65px; font-size: 14px;">Jenis Kelamin</span><span style="margin-right: 15px;font-size: 14px;"> : </span><span style="font-size: 14px;">{{ $keluargas->jk }}</span>
                              <br>
                              <span style="margin-right: 14px;font-size: 14px;">Tempat Tanggal Lahir</span><span style="margin-right: 18px;font-size: 14px;"> : </span><span style="font-size: 14px;">{{ $keluargas->tempat }} , {{ $keluargas->tgl }} </span>  
                              <br>
                              <span style="margin-right: 109px;font-size: 14px;">Status</span><span style="margin-right: 18px;font-size: 14px;"> : </span><span style="font-size: 14px;">{{ $keluargas->status }} </span>
                              <br>
                            <div class="pull-right">
                              <a class="btn btn-success btn-xs" href="{{ route('keluarga.edit',['id_pegawai'=>$pegawais->id_pegawai,'id_keluarga'=>$keluargas->id_keluarga]) }}"><i class="fa fa-edit fa-fx"></i> Edit</a>


                              <a class="btn btn-success btn-xs" href="{{ route('keluarga.destroy',['id_pegawai'=>$pegawais->id_pegawai,'id_keluarga'=>$keluargas->id_keluarga]) }}"><i class="fa fa-trash fa-fx"></i> Hapus</a>                            
                            </div>
                          
                       
              </div>
            </div>

            </section>

          </div>
        </div>
      </div>
        @endif
          @endforeach
                            
        @endif

        @if(count($hitungistri) == 0)

        <div class="container">
        <div class="row">
          <div class="col-md-12">
            <section class="card">
              <div class="card-body mb-4" style="border: 2px solid #c0c2ce;">
                <div class="body-text">
                  <span>Tidak ada data.</span>
                </div>

                    <span style="margin-right: 111px; font-size: 14px;">Nama</span><span style="margin-right: 18px;font-size: 14px;"> : </span><span style="font-size: 14px;">Budi</span>
                    <br>
                    <span style="margin-right: 18px;font-size: 14px;">Tempat Tanggal Lahir</span><span style="margin-right: 18px;font-size: 14px;"> : </span><span style="font-size: 14px;">Hidup</span>  
                    <br>
                    <span style="margin-right: 98px;font-size: 14px;">Anak ke</span><span style="margin-right: 18px;font-size: 14px;"> : </span><span style="font-size: 14px;">Budi</span>  
                    <br>
                    <span style="margin-right: 109px;font-size: 14px;">Status</span><span style="margin-right: 18px;font-size: 14px;"> : </span><span style="font-size: 14px;">Hidup</span>
                  
                  <div class="pull-right">

                            @foreach($keluarga as $keluargas)
                              <span style="margin-right: 111px; font-size: 14px;">Nama</span><span style="margin-right: 18px;font-size: 14px;"> : </span><span style="font-size: 14px;">{{ $keluargas->nama }}</span>
                              <br>
                              <span style="margin-right: 18px;font-size: 14px;">Tempat Tanggal Lahir</span><span style="margin-right: 18px;font-size: 14px;"> : </span><span style="font-size: 14px;">{{ $keluargas->tempat }} , {{ $keluargas->tgl }} </span>  
                              <br>
                              <span style="margin-right: 98px;font-size: 14px;">Anak ke</span><span style="margin-right: 18px;font-size: 14px;"> : </span><span style="font-size: 14px;">{{ $keluargas->anak_ke }} </span>  
                              <br>
                              <span style="margin-right: 109px;font-size: 14px;">Status</span><span style="margin-right: 18px;font-size: 14px;"> : </span><span style="font-size: 14px;">{{ $keluargas->status }} </span>
                            
                            <div class="pull-right">
                              <a class="btn btn-success btn-xs" href=""><i class="fa fa-edit fa-fx"></i> Edit</a>
                            </div>

                  @endforeach
                  </div>  

>>>>>>> origin/master
              </div>

            </section>

          </div>
        </div>
      </div>

      @endif
 
    </div>
  @endif

  @if($pegawais->jk=="Perempuan")
    <div id="suami" class="container tab-pane fade"><br>
      <div class="container">
        <span class="title-head">-- Suami --</span>
      </div>
      <br>
      @if(count($hitungsuami) > 0)
        @foreach($keluarga as $keluargas)
           @if($keluargas->status=="Suami")

      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <section class="card">
              <div class="card-body mb-4" style="border: 2px solid #c0c2ce;">
                <div class="body-text">
                        
                             
                              <span style="margin-right: 111px; font-size: 14px;">Nama</span><span style="margin-right: 18px;font-size: 14px;"> : </span><span style="font-size: 14px;">{{ $keluargas->nama }}</span>
                              <br>
                              <span style="margin-right: 65px; font-size: 14px;">Jenis Kelamin</span><span style="margin-right: 15px;font-size: 14px;"> : </span><span style="font-size: 14px;">{{ $keluargas->jk }}</span>
                              <br>
                              <span style="margin-right: 14px;font-size: 14px;">Tempat Tanggal Lahir</span><span style="margin-right: 18px;font-size: 14px;"> : </span><span style="font-size: 14px;">{{ $keluargas->tempat }} , {{ $keluargas->tgl }} </span>  
                              <br>
                              <span style="margin-right: 109px;font-size: 14px;">Status</span><span style="margin-right: 18px;font-size: 14px;"> : </span><span style="font-size: 14px;">{{ $keluargas->status }} </span>
                              <br>
                            <div class="pull-right">
                              <a class="btn btn-success btn-xs" href="{{ route('keluarga.edit',['id_pegawai'=>$pegawais->id_pegawai,'id_keluarga'=>$keluargas->id_keluarga]) }}"><i class="fa fa-edit fa-fx"></i> Edit</a>


                              <a class="btn btn-success btn-xs" href="{{ route('keluarga.destroy',['id_pegawai'=>$pegawais->id_pegawai,'id_keluarga'=>$keluargas->id_keluarga]) }}"><i class="fa fa-trash fa-fx"></i> Hapus</a>                            
                            </div>
                            
                       

              </div>
            </div>

            </section>

          </div>
        </div>
      </div>
      @endif
      @endforeach                
        @endif

      @if(count($hitungsuami) == 0)

        <div class="container">
        <div class="row">
          <div class="col-md-12">
            <section class="card">
              <div class="card-body mb-4" style="border: 2px solid #c0c2ce;">
                <div class="body-text">
                  <span>Tidak ada data.</span>
                </div>
              </div>

            </section>

          </div>
        </div>
      </div>

      @endif
    </div>
          
  
  @endif
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
                    <span style="margin-right: 117px;font-size: 14px;"><b>SD</b></span>
                    <span style="margin-right: 18px;font-size: 14px;">:</span>
                    <span style="font-size: 14px;">@if(!empty($pendidikan->sd)) 
                      {{ $pendidikan->sd }} 
                      @else
                      {{ __('-') }}
                    @endif</span>  
                    <br>
                    <span style="margin-right: 58px;font-size: 14px;"><b>Tahun Lulus</b>
                    </span><span style="margin-right: 18px;font-size: 14px;">:</span>
                    <span style="font-size: 14px;">@if(!empty($pendidikan->lulus_sd)) 
                      {{ $pendidikan->lulus_sd }}
                      @else
                      {{ __('-') }}
                    @endif</span>  
                    <br>
                    <br>
                    <span style="margin-right: 104px;font-size: 14px;"><b>SMP</b></span>
                    <span style="margin-right: 18px;font-size: 14px;">:</span>
                    <span style="font-size: 14px;">@if(!empty($pendidikan->smp)) 
                      {{ $pendidikan->smp }}
                      @else
                      {{ __('-') }}
                    @endif</span>  
                    <br>
                    <span style="margin-right: 58px;font-size: 14px;"><b>Tahun Lulus</b></span>
                    <span style="margin-right: 18px;font-size: 14px;">:</span>
                    <span style="font-size: 14px;">@if(!empty($pendidikan->lulus_smp)) 
                      {{ $pendidikan->lulus_smp }}
                      @else
                      {{ __('-') }}
                    @endif</span>
                    <br>
                    <br>
                    <span style="margin-right: 67px;font-size: 14px;"><b>SMA/SMK</b></span>
                    <span style="margin-right: 18px;font-size: 14px;">:</span>
                    <span style="font-size: 14px;">@if(!empty($pendidikan->smk)) 
                      {{ $pendidikan->smk }}
                      @else
                      {{ __('-') }}
                    @endif</span>  
                    <br>
                    <span style="margin-right: 58px;font-size: 14px;"><b>Tahun Lulus</b></span>
                    <span style="margin-right: 18px;font-size: 14px;">:</span>
                    <span style="font-size: 14px;">@if(!empty($pendidikan->lulus_smk)) 
                      {{ $pendidikan->lulus_smk }}
                      @else
                      {{ __('-') }}
                    @endif</span>
                    <br>
                    <br>
                    <span style="margin-right: 18px;font-size: 14px;"><b>Perguruan Tinggi</b></span>
                    <span style="margin-right: 18px;font-size: 14px;">:</span>
                    <span style="font-size: 14px;">@if(!empty($pendidikan->nama_universitas)) 
                      {{ $pendidikan->nama_universitas }}
                      @else
                      {{ __('-') }}
                    @endif</span>  
                    <br>
                    <span style="margin-right: 84px;font-size: 14px;"><b>Tingkat</b></span>
                    <span style="margin-right: 18px;font-size: 14px;">:</span>
                    <span style="font-size: 14px;">@if(!empty($pendidikan->tingkat_pt)) 
                      {{ $pendidikan->tingkat_pt }}
                      @else
                      {{ __('-') }}
                    @endif</span>
                    <br>
                    <span style="margin-right: 58px;font-size: 14px;"><b>Tahun Lulus</b></span>
                    <span style="margin-right: 18px;font-size: 14px;">:</span>
                    <span style="font-size: 14px;">@if(!empty($pendidikan->lulus_pt)) 
                      {{ $pendidikan->lulus_pt }}
                      @else
                      {{ __('-') }}
                    @endif</span>
                    <br>
                  <div class="pull-right">
                    @foreach($pegawai as $data)
                    <a class="btn btn-success btn-xs" href="{{ route('pegawai.pendidikan',$data->id_pegawai) }}"><i class="fa fa-edit fa-fx"></i> Edit</a>
                    @endforeach
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
          <a class="btn btn-info btn-xs pull-right" href="{{ route('pegawai.sertifikat', $pegawais->id_pegawai)}}"><i class="fa fa-plus fa-fx"></i> Tambah</a>
        </div>
      </div>

     
      <div class="container">
        <div class="row">

          <div class="col-md-12">
            <section class="card mt-2 mb-4">
                 @foreach($sertifikat as $s)
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
                        <p><b style="font-size: 22px;">{{$s->nama_event}}</b><i>({{$s->tahun_event}}</i>)</p>
                        <span style="font-size: 14px;">Prestasi yang diraih : <b>{{$s->ket_prestasi}}</b></span>
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
                @endforeach
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
                  @foreach($pegawai as $data)
                  <a href="{{ route('darurat.create',$data->id_pegawai) }}">
                    <button class="btn btn-info btn-xs" style="width: 200px"><i class="fa fa-plus fa-fx"></i> Tambah</button>
                 </a>
                 @endforeach
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
                    @foreach($no_darurat as $key => $data)
                      <tr>
                          <td style="text-align: center; font-size: 14px;">{{ $key+1 }}</td>
                          <td align="center" style="font-size: 14px;">{{ $data->nama }}</td>
                          <td align="center" style="font-size: 14px;">{{ $data->nomor }}</td>
                          <td align="center">
      
                            <a href="{{ route('darurat.edit',['id_pegawai'=>$pegawais->id_pegawai,'id_no_darurat'=>$data->id_no_darurat]) }}">
                                  <button class="btn btn-success btn-xs mr-2"><i class="fa fa-edit"></i> Edit</button>
                              </a>
                              <a href="#" onclick="hapusNo('{{$pegawais->id_pegawai}}','{{$data->id_no_darurat}}')">
                                  <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button>
                              </a>
                            
                          </td>
                      </tr>
                    @endforeach
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

<script type="text/javascript">
  var nick=document.getElementById("ada").value;
  var nickname=nick.split(" ");
  if (nickname.length>=2) {
    document.getElementById("panggilan").innerHTML=nickname[0]+" "+nickname[1];  
  }
  else{
    document.getElementById("panggilan").innerHTML=nickname[0];
  }
  
<<<<<<< HEAD
</script>

@endsection
=======

</script>

@endsection
>>>>>>> origin/master
