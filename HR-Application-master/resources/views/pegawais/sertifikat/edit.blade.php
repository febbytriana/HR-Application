@extends('layouts.app')

@section('content')

 <section role="main" class="content-body">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mt-3">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
        <li class="breadcrumb-item"><a href="{{ route('pegawai.index') }}">Data Pegawai</a></li>
        <li class="breadcrumb-item active" aria-current="page">Sertifikat</li>
        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
      </ol>
    </nav>

    <section class="card mt-3">
        <div class="card-header">
                <h4>Tambah Data Sertifikat</h2>
        </div>
        <div class="card-body" style="margin-left:200px;">
            <div class="col-md-24">
                <form action="/pegawai/sertifikat/store/{{ $pegawai->id_pegawai }}" enctype="multipart/form-data" method="POST">
                    @csrf 
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nama Event <span class="required">*</span></label>
                             <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_event" value={{$sertifikat->nama_event}}>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Tanggal event<span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="date" class="form-control" name="tahun_event">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Prestasi yang diraih<span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="ket_prestasi">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Foto<span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="file" class="form-control" name="gambar_sertifikat">
                            </div>
                        </div> 
                    </div>
                        <div class="form-group" style="margin-left:480px;">
                            &nbsp;<button type="submit" class="btn btn-primary">Tambah</button>
                        </div>  
                    </div>
                </form>
            </div>
        </div>
    </section>
</section>

@endsection