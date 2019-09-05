@extends('layouts.apppegawai')

@section('content')

  <section role="main" class="content-body">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{route('pegawai.profil',$pegawai->id_user)}}">Profil</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$pegawai->nama}}</li>
            <li class="breadcrumb-item active" aria-current="page">Sertifikat</li>
        </ol>
    </nav>

    <section class="card mt-3">
          <div class="">
              <div class="col-md-12">
                <div class="s-report-title d-flex justify-content-between">
                    <h5>Nomor Darurat</h5>
                    @if($checktemp == 3)
                        <a class="disabled" style="font-size: 14px;padding-top: 3px; color: grey;"><i class="fa fa-spinner"></i> Permintaan penambahan data sedang diproses...</a>
                    @else
                        <a href="{{route('darurat.crtdarurat',$pegawai->id_pegawai)}}" style="font-size: 17px;"><i class="fa fa-plus"></i> Tambahkan</a>
                    @endif
                </div>
                <hr>                  
                <div class="row">
                    @if(count($darurat) > 0)
                    <div class="col-md-12 mb-4">
                        <table class="table table-striped table-hover" id="data-tbl" width="100%">
                  <thead>
                      <tr>
                          <th style="text-align: center;">No</th>
                          <th style="text-align: center;">Nama</th>
                          <th style="text-align: center;">No Telepon</th>
                          <th style="text-align: center;">Status</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($darurat as $key => $data)
                      <tr>
                          <td style="text-align: center; font-size: 14px;">{{ $key+1 }}</td>
                          <td align="center" style="font-size: 14px;">{{ $data->nama }}</td>
                          <td align="center" style="font-size: 14px;">{{ $data->nomor }}</td>
                          <td align="center" style="font-size: 14px;">{{ $data->status }}</td>

                      </tr>
                    @endforeach
                  </tbody>
              </table>
                    </div>
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
