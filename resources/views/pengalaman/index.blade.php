@extends('layouts.apppegawai')

@section('content')

  <section role="main" class="content-body">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{route('pegawai.profil',$pegawai->id_user)}}">Profil</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$pegawai->nama}}</li>
            <li class="breadcrumb-item active" aria-current="page">Pengalaman</li>
        </ol>
    </nav>

    <section class="card mt-3">
          <div class="">
              <div class="col-md-12">
                <div class="s-report-title d-flex justify-content-between">
                    <h5>Pengalaman Kerja</h5>
                    @if($checktemp > 0)
                        <a class="disabled" style="font-size: 14px;padding-top: 3px; color: grey;"><i class="fa fa-spinner"></i> Permintaan penambahan data sedang diproses...</a>
                    @else
                        <a href="{{route('pengalaman.createpengtemp',$pegawai->id_pegawai)}}" style="font-size: 17px;"><i class="fa fa-plus"></i> Tambah</a>
                    @endif
                </div>
                <hr>                  
                <div class="row">
                    @if(count($pengalaman) > 0)
                    @foreach($pengalaman as $data)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow">
                        <div class="card-body rounded">
                        <div class="s-report-title d-flex justify-content-between">
                            <h6>{{$data->nama_perusahaan}}</h6>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tr>
                                    <td style="font-size: 14px; padding-left: 30px;">Sebagai</td>
                                    <td style="font-size: 14px; padding-right: 90px;">{{$data->jabatan}}</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px; padding-left: 30px;">Lama bekerja</td>
                                    <td style="font-size: 14px; padding-right: 90px;">{{$data->tahun}}</td>
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
