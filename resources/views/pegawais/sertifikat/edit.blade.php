@section('js')
<script type="text/javascript">

      function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#showgambar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#inputgambar").change(function () {
        readURL(this);
    });

</script>
@stop

@extends('layouts.app')

@section('content')

 <section role="main" class="content-body">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mt-3">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
        <li class="breadcrumb-item"><a href="{{ route('pegawai.index') }}">Data Pegawai</a></li>
        <li class="breadcrumb-item"><a href="{{ route('pegawai.detail',$pegawai->id_pegawai) }}">Sertifikat</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$pegawai->nama}}</li>
        <li class="breadcrumb-item active" aria-current="page">Edit</li>
      </ol>
    </nav>

    <section class="card mt-3">
        <div class="card-header">
                <h4>Ubah Data Sertifikat</h2>
        </div>
        <div class="card-body" style="margin-left:200px;">
            <div class="col-md-24">
                <form action="{{ route('pegawai.sertifikat.update',['id_pegawai'=>$pegawai->id_pegawai,'id_sertifikat'=>$sertifikat->id_sertifikat]) }}" enctype="multipart/form-data" method="POST">
                    @csrf 
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nama Event <span class="required">*</span></label>
                             <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_event" value="{{$sertifikat->nama_event}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Tanggal event<span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="date" class="form-control" name="tahun_event" value="{{$sertifikat->tahun_event}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Prestasi yang diraih<span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="ket_prestasi" value="{{$sertifikat->ket_prestasi}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Foto<span class="required">*</span></label>
                            <div class="col-md-9">
                                <div style="width:350px; height:180px;border: 1px solid #c0c2ce;">
                                    <img src="{{ asset('upload/'.$sertifikat->gambar_sertifikat) }}" id="showgambar" alt="" style="width: 100%; height: 100%;">
                                </div>
                                <br>
                                <input type="file" class="form-control" id="inputgambar" name="gambar_sertifikat">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-9">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary btn-sm" style="width: 150px">Ubah</button>
                                </div>
                            </div>
                        </div> 
                    </div> 
                    </div>
                </form>
            </div>
        </div>
    </section>
</section>

@endsection