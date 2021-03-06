@section('js')
<script type="text/javascript">
      function hapus(rute) {
        Swal({
            title: 'Apakah Anda Yakin?',
            text: "Tekan 'Hapus' Untuk Meneruskan Penghapusan",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#82df39',
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
                        location.href = ''+rute;
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
    <ul class="nav nav-tabs shadow" role="tablist">
      <li class="nav-item">
        <a class="nav-link link-tab active" data-toggle="tab" href="#profile"><i class="fa fa-user fa-fx"></i> Profile</a>
      </li>
      <li class="nav-item dropdown" style="margin-left: 10px;">
        <!--<a class="nav-link link-tab active" data-toggle="tab" href="#pengalaman">Pengalaman</a>-->
          <a class="nav-link dropdown-toggle link-tab" data-toggle="dropdown" href="#"><i class="fa fa-briefcase fa-fx"></i> Pengalaman</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" data-toggle="tab" href="#pengalaman">Pengalaman Kerja</a>
            <a class="dropdown-item" data-toggle="tab" href="#kontrak">Kontrak</a>
          </div>
      </li>
      <li class="nav-item dropdown" style="margin-left: 10px;">
        <!--<a class="nav-link link-tab active" data-toggle="tab" href="#pengalaman">Pengalaman</a>-->
          <a class="nav-link dropdown-toggle link-tab" data-toggle="dropdown" href="#"><i class="fa fa-users fa-fx"></i> Keluarga</a>
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
  <div class="tab-content shadow">
    <div id="profile" class="container tab-pane active"><br>
      <!-- begin profile-container -->
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
              <div class="rounded shadow" style="background-color: #0f5b94; color: #fff; text-align: center;">
                  <span class="nickname">{{$data->nama}}<br>{{$data->jabatan['jabatan']}}</span>
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
                      <tr class="tr-profile">
                        <th class="th-profile"><h5><span class="label label-inverse pull-right"> # Data Personal Karyawan </span></h5></th>
                        <th class="th-profile">
                          <h4>{{ $data->nama }}<small>{{ $data->jabatan['jabatan']}}</small></h4>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="highlight tr-profile">
                        <td class="field td-profile">NIK</td>
                        <td class="td-profile">{{ $data->nik}}</td>
                      </tr>
                      <tr class="tr-profile">
                        <td class="field td-profile">Jenis Kelamin</td>
                        <td class="td-profile"><i class="fa fa-male fa-lg m-r-5"></i> {{ $data->jk}}</td>
                      </tr>
                      
                      <tr class="tr-profile">
                        <td class="field td-profile" >Tanggal Masuk</td>
                        <td class="td-profile">13-05-2019</td>
                      </tr>
                      <tr class="tr-profile">
                        <td class="field td-profile">Alamat</td>
                        <td class="td-profile"><i class="fa fa-map-marker fa-lg m-r-5"></i> {{ $data->alamat}}</td>
                      </tr>
                      <tr class="tr-profile">
                        <td class="field td-profile">Tempat Tanggal Lahir</td>
                        <td>{{ $data->tempat}}, {{ \Carbon\Carbon::parse($data->tgl)->format('d-m-Y')}}</td>
                      </tr>
                      <tr class="tr-profile">
                        <td class="field td-profile">Umur</td>
                        <td class="td-profile">{{ \Carbon\Carbon::parse($data->tgl)->age}} tahun</td>
                      </tr>
                      <tr class="tr-profile">
                        <td class="field td-profile">Agama</td>
                        <td class="td-profile">{{ $data->agama}}</td>
                      </tr>
                      <tr class="tr-profile">
                        <td class="field td-profile">Kewarganegaraan</td>
                        <td class="td-profile">{{$data->warga_negara }}</td>
                      </tr>
                      <tr class="tr-profile">
                        <td class="field td-profile">Status Perkawinan</td>
                        <td class="td-profile">{{$data->status_kawin }}</td>
                      </tr>
                      <tr class="tr-profile">
                        <td class="field td-profile">Golongan Darah</td>
                        <td class="td-profile">{{ $data->goldar}}</td>
                      </tr>
                      <tr class="tr-profile">
                        <td class="field td-profile">No. Telp</td>
                        <td class="td-profile"><i class="fa fa-mobile fa-lg m-r-5"></i> {{ $data->telp}}</td>
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
            <section class="card mt-4 mb-4 rounded" style="border: 1px solid #898989; border-radius: 0px;">
              <div class="card-body">
                <div class="head" style="margin-bottom: 27px">
                  <span style="font-size: 17px; font-family: 'Poppins', sans-serif;">Pernah Bekerja di?</span>
                  <div class="pull-right">
                    <a href="{{ route('pengalaman.create',$pegawais->id_pegawai) }}" class="btn btn-info btn-xs"><i class="fa fa-plus fa-fx"></i> Tambah</a>
                  </div>  
                </div>
                <!-- Color border : #c0c2ce -->
                @if(count($pengalaman) > 0)
                  @foreach($pengalaman as $data)
                  <section class="card shadow mb-4">
                    <div class="card-header" style="background: #0f5b94; color: #fff;">
                      <h6>{{$data->nama_perusahaan}}</h6>
                    </div>
                    <div class="card-body">
                        <table>
                          <tr>
                            <td style="font-size: 14px;">Jabatan</td>
                            <td style="padding: 0 40px;font-size: 14px;">:</td>
                            <td style="font-size: 14px;">{{ $data->jabatan }}</td>
                          </tr>
                          <tr>
                            <td style="font-size: 14px;">Lama Bekerja</td>
                            <td style="padding: 0 40px;font-size: 14px;">:</td>
                            <td style="font-size: 14px;">{{ $data->tahun }}</td>
                          </tr>
                        </table>
                        <br>
                        <div class="pull-right">
                            <?php $rute9 = route('pengalaman.hapus',['id_pegawai'=>$pegawais->id_pegawai,'id_pengalaman'=>$data->id_pengalaman]); ?>
                          <a class="btn btn-success btn-xs" href="{{ route('pengalaman.edit',['id_pegawai'=>$pegawais->id_pegawai,'id_pengalaman'=>$data->id_pengalaman]) }}"><i class="fa fa-edit fa-fx"></i> Edit</a> &nbsp<a class="btn btn-danger btn-xs" href="#" onclick="hapus('{{$rute9}}')"><i class="fa fa-trash fa-fx"></i> Hapus</a>
                        </div>
                    </div>
                  </section>
                  @endforeach
                @else
                  <div class="form-group">
                    <div class="col-md-12">
                      <div class="alert alert-secondary" align="center" style="background-color: #e9ecef;">
                          <label class="col-md-9 control-label" style="color: #000;">Data tidak tersedia</label>
                      </div>
                    </div>
                  </div>
                @endif
            </div>
            </section>
            <section class="card rounded" style="border: 1px solid #898989; border-radius: 0px;">
                  <div class="card-body">
                      <span style="font-size: 14px">Jabatan saat ini ?</span>
                      <br>
                      <br>
                      <form action="{{ route('pegawai.updatejabatan',$pegawais->id_pegawai) }}" method="POST">
                        @csrf
                      <div class="input-group mb-2">
                        <select name="id_jabatan" id="id_jabatan" class="custom-select">
                            @foreach ($jabatan as $jabatan)
                            <option value="{{$jabatan->id_jabatan}}"@if($pegawais->id_jabatan) selected='selected @endif'>{{$jabatan->jabatan}}</option>
                            @endforeach
                        </select>
                        <div class="input-group-append">
                          <button class="btn btn-success btn-xs waves-effect btn-jbt" type="submit" anim="ripple"><i class="fa fa-edit fa-fx"></i> Edit</button>
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
                  <a href="{{ route('kontrak.create',$pegawais->id_pegawai)}}">
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
                    @foreach($kontrak as $key => $data)
                      <tr>
                          <td style="text-align: center; font-size: 14px;">{{ $key+1 }}</td>
                          <td align="center" style="font-size: 14px;">{{ $data->kontrak }}</td>
                          <td align="center" style="font-size: 14px;">{{ $data->tahun }}
                          </td>
                          <td align="center">
                            <a href="{{ route('kontrak.edit',['id_pegawai'=>$pegawais->id_pegawai,'id_kontrak'=>$data->id_kontrak]) }}">
                                  <button class="btn btn-success btn-xs mr-2"><i class="fa fa-edit"></i> Edit</button>
                              </a>
                              <a href="#">
                            <?php $rute8 = route('kontrak.hapus',['id_pegawai'=>$pegawais->id_pegawai,'id_kontrak'=>$data->id_kontrak]); ?>

                                  <button class="btn btn-danger btn-xs" onclick="hapus('{{$rute8}}')"><i class="fa fa-trash"></i> Hapus</button>
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


    <div id="orangtua" class="container tab-pane fade"><br>
      <div class="container">
        <span class="title-head">-- OrangTua --</span>
      </div>
      <br>
      @if(count($hitungortu) > 0)
        @foreach($keluarga as $keluargas)
           @if($keluargas->status=="Ayah" ||  $keluargas->status=="Ibu")
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


                            <?php $rute7 = route('keluarga.destroy',['id_pegawai'=>$pegawais->id_pegawai,'id_keluarga'=>$keluargas->id_keluarga]); ?>
                              <a class="btn btn-success btn-xs" href="#" onclick="hapus('{{$rute7}}')"><i class="fa fa-trash fa-fx"></i> Hapus</a>                            
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

                              <?php $rute6 = route('keluarga.destroy',['id_pegawai'=>$pegawais->id_pegawai,'id_keluarga'=>$keluargas->id_keluarga]); ?>
                              <a class="btn btn-success btn-xs" href="#" onclick="hapus('{{$rute6}}')"><i class="fa fa-trash fa-fx"></i> Hapus</a>                            
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
      @if(count($hitungistri)   > 0)
        @foreach($keluarga as $keluargas)
          @if($keluargas->status=="Istri")
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

                              <?php $rute5 = route('keluarga.destroy',['id_pegawai'=>$pegawais->id_pegawai,'id_keluarga'=>$keluargas->id_keluarga]); ?>
                              <a class="btn btn-success btn-xs" href="#" onclick="hapus('{{$rute5}}')"><i class="fa fa-trash fa-fx"></i> Hapus</a>                            
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

                              <?php $rute4 = route('keluarga.destroy',['id_pegawai'=>$pegawais->id_pegawai,'id_keluarga'=>$keluargas->id_keluarga]); ?>
                              <a class="btn btn-success btn-xs" href="#" onclick="hapus('{{$rute4}}')"><i class="fa fa-trash fa-fx"></i> Hapus</a>                            
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
              <div class="card-body mb-4 rounded" style="border: 1px solid #898989;">
                <div class="body-text">
                  <table>
                    <tbody>
                      <tr>
                        <td style="font-size: 14px;">SD</td>
                        <td style="padding: 0 55px;font-size: 14px;">:</td>
                        <td style="font-size: 14px;">@if(!empty($pendidikan->sd)) 
                              {{ $pendidikan->sd }} 
                              @else
                              {{ __('-') }}
                            @endif
                        </td>
                      </tr>             
                      <tr>
                        <td style="font-size: 14px;">Tahun Lulus</td>
                        <td style="padding: 0 55px;font-size: 14px;">:</td>
                        <td style="font-size: 14px;">@if(!empty($pendidikan->lulus_sd)) 
                              {{ $pendidikan->lulus_sd }} 
                              @else
                              {{ __('-') }}
                            @endif
                        </td>
                      </tr>
                      <tr>
                        <td style="font-size: 14px;">SMP</td>
                        <td style="padding: 0 55px;font-size: 14px;">:</td>
                        <td style="font-size: 14px;">@if(!empty($pendidikan->smp)) 
                              {{ $pendidikan->smp }} 
                              @else
                              {{ __('-') }}
                            @endif
                        </td>
                      </tr>
                      <tr>
                        <td style="font-size: 14px;">Tahun Lulus</td>
                        <td style="padding: 0 55px;font-size: 14px;">:</td>
                        <td style="font-size: 14px;">@if(!empty($pendidikan->lulus_smp)) 
                              {{ $pendidikan->lulus_smp }} 
                              @else
                              {{ __('-') }}
                            @endif
                        </td>
                      </tr>
                      <tr>
                        <td style="font-size: 14px;" class="field">SMK/SMA</td>
                        <td style="padding: 0 55px;font-size: 14px;">:</td>
                        <td style="font-size: 14px;">@if(!empty($pendidikan->smk)) 
                              {{ $pendidikan->smk }} 
                              @else
                              {{ __('-') }}
                            @endif
                        </td>
                      </tr>
                      <tr>
                        <td style="font-size: 14px;" class="field">Tahun Lulus</td>
                        <td style="padding: 0 55px;font-size: 14px;">:</td>
                        <td style="font-size: 14px;">@if(!empty($pendidikan->lulus_smk)) 
                              {{ $pendidikan->lulus_smk }} 
                              @else
                              {{ __('-') }}
                            @endif
                        </td>
                      </tr>
                      <tr>
                        <td style="font-size: 14px;">Universitas</td>
                        <td style="padding: 0 55px;font-size: 14px;">:</td>
                        <td style="font-size: 14px;">@if(!empty($pendidikan->nama_universitas)) 
                              {{ $pendidikan->nama_universitas }} 
                              @else
                              {{ __('-') }}
                            @endif
                        </td>
                      </tr>
                      <tr>
                        <td style="font-size: 14px;">Tingkat</td>
                        <td style="padding: 0 55px;font-size: 14px;">:</td>
                        <td style="font-size: 14px;">@if(!empty($pendidikan->tingkat_pt)) 
                              {{ $pendidikan->tingkat_pt }} 
                              @else
                              {{ __('-') }}
                            @endif
                        </td>
                      </tr>
                      <tr>
                        <td style="font-size: 14px;">Tahun Lulus</td>
                        <td style="padding: 0 55px;font-size: 14px;">:</td>
                        <td style="font-size: 14px;">@if(!empty($pendidikan->lulus_pt)) 
                              {{ $pendidikan->lulus_pt }} 
                              @else
                              {{ __('-') }}
                            @endif
                        </td>
                      </tr>
                    </tbody>
                  </table>
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
            <section class="card mt-2 mb-4 rounded" style="border: 1px solid #898989; border-radius: 0px;">
              <div class="card-body">
                <div class="head" style="margin-bottom: 27px">
                  <span style="font-size: 17px; font-family: 'Poppins', sans-serif;">Pernah Ikut Pelatihan di?</span>
                  <div class="pull-right">
                    <a href="{{ route('pelatihan.create',$pegawais->id_pegawai) }}" class="btn btn-info btn-xs"><i class="fa fa-plus fa-fx"></i> Tambah</a>
                  </div>  
                </div>
                
                @if(count($pelatihan) > 0)
                  @foreach($pelatihan as $data)
                  <section class="card mb-4 shadow">
                    <div class="card-header" style="background: #0f5b94; color: #fff;">
                      <h6>{{$data->nama_event}}</h6>
                    </div>
                    <div class="card-body">
                        <table>
                          <tr>
                            <td style="font-size: 14px;">Tempat</td>
                            <td style="padding: 0 40px;font-size: 14px;">:</td>
                            <td style="font-size: 14px;">{{ $data->tempat_pelatihan }}</td>
                          </tr>
                          <tr>
                            <td style="font-size: 14px;">Tanggal</td>
                            <td style="padding: 0 40px;font-size: 14px;">:</td>
                            <td style="font-size: 14px;">{{\Carbon\Carbon::parse($data->tanggal)->format('d-m-Y')}}</td>
                          </tr>
                          <tr>
                            <td style="font-size: 14px;">Peran</td>
                            <td style="padding: 0 40px;font-size: 14px;">:</td>
                            <td style="font-size: 14px;">{{ $data->peran }}</td>
                          </tr>
                        </table>
                        <br>
                        <div class="pull-right">
                          <?php $rute3 = route('pelatihan.hapus',['id_pegawai'=>$pegawais->id_pegawai,'id_pelatihan'=>$data->id_pelatihan]); ?>
                          <a class="btn btn-success btn-xs" href="{{ route('pelatihan.edit',['id_pegawai'=>$pegawais->id_pegawai,'id_pelatihan'=>$data->id_pelatihan]) }}"><i class="fa fa-edit fa-fx"></i> Edit</a> &nbsp<a class="btn btn-danger btn-xs" href="#" onclick="hapusPel('{{$rute3}}')"><i class="fa fa-trash fa-fx"></i> Hapus</a>
                        </div>
                    </div>
                  </section>
                  @endforeach
                @else
                  <div class="form-group">
                    <div class="col-md-12">
                      <div class="alert alert-secondary" align="center" style="background-color: #e9ecef;">
                          <label class="col-md-9 control-label" style="color: #000;">Data tidak tersedia</label>
                      </div>
                    </div>
                  </div>
                @endif
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
              @if(count($sertifikat) > 0)
                 @foreach($sertifikat as $s)
                  <div class="card-body mb-4" style="border: 1px solid #c0c2ce;">
                      <div class="profile-left">
                        <!-- begin profile-image -->
                        <div style="width:250px; height:167px;border: 1px solid #c0c2ce;">
                            <img src="{{ asset('upload/'.$s->gambar_sertifikat) }}" style="width: 100%;height: 100%;">
                        </div>
                        <!-- end profile-image -->  
                      </div>
                      <div class="profile-right-tab" style="margin-bottom: 80px; margin-left: 270px;">
                        <p><b style="font-size: 22px;">{{$s->nama_event}}</b>({{ \Carbon\Carbon::parse($s->tahun_event)->format('d M Y')}})</p>
                        <span style="font-size: 14px;">Prestasi yang diraih : <b>{{$s->ket_prestasi}}</b></span>
                      </div>
                      <div class="pull-right">
                        <a href="{{route('pegawai.sertifikat.edit',['id_pegawai'=>$pegawais->id_pegawai,'id_sertifikat'=>$s->id_sertifikat])}}">
                          <button class="btn btn-success btn-xs"><i class="fa fa-edit"></i> Edit</button>
                        </a>
                        <?php $rute2 = route('pegawai.sertifikat.destroy',['id_pegawai'=>$pegawais->id_pegawai,'id_sertifikat'=>$s->id_sertifikat]); ?>
                        <a href="#" onclick="hapus('{{$rute2}}')">
                          <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button>
                        </a>
                      </div>
                  </div>
                @endforeach
              @else
              <div class="card-body">
                <div class="form-group">
                    <div class="col-md-12">
                      <div class="alert alert-secondary" align="center" style="background-color: #e9ecef;">
                          <label class="col-md-9 control-label" style="color: #000;">Data tidak tersedia</label>
                      </div>
                    </div>
                </div>
              </div>
              @endif
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
                              <?php $rute = route('darurat.destroy',['id_pegawai'=>$pegawais->id_pegawai,'id_no_darurat'=>$data->id_no_darurat]); ?>
                              <a href="#" onclick="hapus('{{$rute}}')">
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

@endsection   