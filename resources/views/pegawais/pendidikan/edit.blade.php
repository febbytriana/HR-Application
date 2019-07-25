@extends('layouts.app')

@section('content')

 <section role="main" class="content-body">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mt-3">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
        <li class="breadcrumb-item"><a href="{{ route('pegawai.index') }}">Data pegawai</a></li>
        <li class="breadcrumb-item"><a href="{{ route('pegawai.profil', $pegawai->id_pegawai)}}">Pendidikan</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit</li>
      </ol>
    </nav>

    <section class="card mt-3">
        <div class="card-header">
                <h4>Pendidikan</h2>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <form action="/pegawai/pendidikan/store/{{$pegawai->id_pegawai}}" method="POST">
                    @csrf 
                    <h5 style="margin-left:30px; margin-bottom:10px;">SEKOLAH DASAR</h5>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-md-9 control-label">Nama Sekolah Dasar <span class="required">*</span></label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="sd">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-9 control-label">Tahun lulus Sekolah Dasar <span class="required">*</span></label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="lulus_sd">
                            </div>
                        </div>    
                    </div>
                    <h5 style="margin-left:30px; margin-bottom:10px;">SEKOLAH MENENGAH PERTAMA</h5>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-md-9 control-label">Nama Sekolah Menengah Pertama<span class="required">*</span></label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="smp">
                            </div>
                        </div>  
                        <div class="form-group">
                            <label class="col-md-9 control-label">Tahun lulus Sekolah Menengah Pertama<span class="required">*</span></label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="lulus_smp">
                            </div>
                        </div>
                        <h5 style="margin-left:10px; margin-bottom:10px;">SEKOLAH MENEGAH KEJURUAN</h5>
                        <div class="form-group">
                            <label class="col-md-9 control-label">Nama Sekolah Menengah Kejuruan</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="smk">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-9 control-label">Tahun Lulus Sekolah Menengah Kejuruan</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="lulus_smk">
                            </div>
                        </div>
                        <h5 style="margin-left:10px; margin-bottom:10px;">PERGURUAN TINGGI</h5>
                        <div class="form-group">
                            <label class="col-md-9 control-label">Nama Universitas <span class="required">*</span></label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="nama_universitas">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-9 control-label">Tingkat <span class="required">*</span></label>
                            <div class="col-md-12">
                                <select name="tingkat_pt" id="tingkat_pt" class="form-control">
                                    <option value=""></option>
                                    <option value="D1">D1</option>
                                    <option value="D2">D2</option>
                                    <option value="D3">D3</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-9 control-label">Tahun lulus Perguruan Tinggi <span class="required">*</span></label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="lulus_pt">
                            </div>
                        </div>    
                    </div>
                        <div class="form-group">
                            &nbsp;<button type="submit" class="btn btn-primary" style="margin-left:30px;">Ubah</button>
                        </div>  
                    </div>
                </form>
            </div>
        </div>
    </section>
</section>

@endsection