@extends('layouts.apppegawai')

@section('content')

  <section role="main" class="content-body">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{route('pegawai.profil',$pegawai->id_user)}}">Profil</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$pegawai->nama}}</li>
            <li class="breadcrumb-item active" aria-current="page">Orang Tua</li>
        </ol>
    </nav>

    <section class="card mt-3">
          <div class="">
              <div class="col-md-12">
                <div class="s-report-title d-flex justify-content-between">
                    <h5>Orang Tua</h5>
                        @if(count($ortu) < 2 && count($checkayah) < 1 && count($checkibu) < 1)
                        <a class="" href="{{route('keluarga.createtemp',$pegawai->id_pegawai)}}" style="font-size: 17px;"><i class="fa fa-plus"></i> Tambah</a>
                        @elseif(count($ortu) < 2 && count($checkayah) == 1 && count($checkibu) < 1)
                        <a class="" href="{{route('keluarga.createtemp',$pegawai->id_pegawai)}}" style="font-size: 17px;"><i class="fa fa-plus"></i> Tambah</a>
                        @elseif(count($ortu) < 2 && count($checkayah) < 1 && count($checkibu) == 1)
                        <a class="" href="{{route('keluarga.createtemp',$pegawai->id_pegawai)}}" style="font-size: 17px;"><i class="fa fa-plus"></i> Tambah</a>
                        @elseif(count($checkayah) == 1 && count($checkibu) == 1)

                        @endif

                        @if(count($ortu) == 2)
                        Data sudah lengkap
                        @endif
                </div>
                <hr>                  
                <div class="row">
                    @if(count($ortu) > 0)
                    @foreach($ortu as $data)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow">
                        <div class="card-body rounded">
                        <div class="s-report-title d-flex justify-content-between">
                            <h6>{{$data->status}}</h6>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tr>
                                    <td style="font-size: 14px; padding-left: 30px;">Nama</td>
                                    <td style="font-size: 14px; padding-right: 30px;">{{$data->nama}}</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px; padding-left: 30px;">TTL</td>
                                    <td style="font-size: 14px; padding-right: 30px;">{{$data->tempat}}, {{$data->tgl}}</td>
                                </tr>
                            </table>
                        </div>
                        </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-md-12">
                              <div class="alert alert-secondary" align="center" style="background-color: #e9ecef;">
                                  <label class="col-md-9 control-label" style="color: #000;">Data tidak tersedia</label>
                              </div>
                            </div>
                        </div>
                    </div>
                    @endif
                  </div> 
              </div>
          </div>
    </section>
</section>

@endsection
