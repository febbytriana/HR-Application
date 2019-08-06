@extends('layouts.app')

@section('content')

 <section role="main" class="content-body">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mt-3">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
        <li class="breadcrumb-item"><a href="{{ route('pegawai.index') }}">Data pegawai</a></li>
        <li class="breadcrumb-item"><a href="{{ route('pegawai.detail', $pegawai->id_pegawai)}}">Detail</a></li>
        <li class="breadcrumb-item active" aria-current="page">Pendidikan</li>
        <li class="breadcrumb-item active" aria-current="page">Edit</li>
        <li class="breadcrumb-item active" aria-current="page">{{ $pegawai->nama }}</li>
      </ol>
    </nav>

    <section class="card mt-3">
        <div class="card-header">
                <h4>Form Tambah Pendidikan</h2>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <form action="/pegawai/pendidikan/store/{{$pegawai->id_pegawai}}" method="POST">
                    @csrf 
                    <h5 style="margin-left:32px; margin-bottom:10px;"><img src="{{ asset('images/logo_sd.png') }}" width="32px" height="33px">  SEKOLAH DASAR</h5>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-md-9 control-label">Nama Sekolah Dasar<span style="color: #ff1100;font-size: 17px;">*</span></label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="sd" value="<?php if(!empty($pendidikan->sd)){ echo $pendidikan->sd; } ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-9 control-label">Tahun lulus Sekolah Dasar<span style="color: #ff1100;font-size: 17px;">*</span></label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="lulus_sd" value="<?php if(!empty($pendidikan->lulus_sd)){ echo $pendidikan->lulus_sd; } ?>" required>
                            </div>
                        </div>    
                    </div>
                    <h5 style="margin-left:32px; margin-bottom:10px;"><img src="{{ asset('images/logo_smp.png') }}" width="30px" height="33px">  SEKOLAH MENENGAH PERTAMA</h5>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-md-9 control-label">Nama Sekolah Menengah Pertama<span style="color: #ff1100;font-size: 17px;">*</span></label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="smp" value="<?php if(!empty($pendidikan->smp)){ echo $pendidikan->smp; } ?>" required>
                            </div>
                        </div>  
                        <div class="form-group">
                            <label class="col-md-9 control-label">Tahun lulus Sekolah Menengah Pertama<span style="color: #ff1100;font-size: 17px;">*</span>></label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="lulus_smp" value="<?php if(!empty($pendidikan->lulus_smp)){ echo $pendidikan->lulus_smp; } ?>" required>
                            </div>
                        </div>
                        <h5 style="margin-left:16px; margin-bottom:10px;"><img src="{{ asset('images/logo_sma.png') }}" width="30px" height="33px">  SEKOLAH MENEGAH KEJURUAN/ATAS</h5>
                        <div class="form-group">
                            <label class="col-md-9 control-label">Nama Sekolah Menengah Kejuruan/Atas<span style="color: #ff1100;font-size: 17px;">*</span></label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="smk" value="<?php if(!empty($pendidikan->smk)){ echo $pendidikan->smk; } ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-9 control-label">Tahun Lulus Sekolah Menengah Kejuruan/Atas<span style="color: #ff1100;font-size: 17px;">*</span></label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="lulus_smk" value="<?php if(!empty($pendidikan->lulus_smk)){ echo $pendidikan->lulus_smk; } ?>" required>
                            </div>
                        </div>
                        <h5 style="margin-left:15px; margin-bottom:10px;">PERGURUAN TINGGI</h5>
                        <div class="form-group">
                            <label class="col-md-9 control-label">Nama Universitas<span style="color: #ff1100;font-size: 17px;">*</span></label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="nama_universitas" value="<?php if(!empty($pendidikan->nama_universitas)){ echo $pendidikan->nama_universitas; } ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-9 control-label">Tingkat<span style="color: #ff1100;font-size: 17px;">*</span></label>
                            <div class="col-md-12">
                                @if(!empty($pendidikan->tingkat_pt))
                                <select name="tingkat_pt" id="tingkat_pt" class="form-control" required>
                                    <option value=""></option>
                                    <option value="D1" <?php if($pendidikan->tingkat_pt == "D1"){ echo "selected=\"selected\""; } ?>>D1</option>
                                    <option value="D2" <?php if($pendidikan->tingkat_pt == "D2"){ echo "selected=\"selected\""; } ?>>D2</option>
                                    <option value="D3" <?php if($pendidikan->tingkat_pt == "D3"){ echo "selected=\"selected\""; } ?>>D3</option>
                                    <option value="S1" <?php if($pendidikan->tingkat_pt == "S1"){ echo "selected=\"selected\""; } ?>>S1</option>
                                    <option value="S2" <?php if($pendidikan->tingkat_pt == "S2"){ echo "selected=\"selected\""; } ?>>S2</option>
                                </select>
                                @else
                                <select name="tingkat_pt" id="tingkat_pt" class="form-control" required>
                                    <option value=""></option>
                                    <option value="D1"@if($pendidikan['tingkat_pt']=='D1') selected='selected @endif'>D1</option>
                                    <option value="D2"@if($pendidikan['tingkat_pt']=='D2') selected='selected @endif'>D2</option>
                                    <option value="D3"@if($pendidikan['tingkat_pt']=='D3') selected='selected @endif'>D3</option>
                                    <option value="S1"@if($pendidikan['tingkat_pt']=='S1') selected='selected @endif'>S1</option>
                                    <option value="S2"@if($pendidikan['tingkat_pt']=='S2') selected='selected @endif'>S2</option>
                                </select>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-9 control-label">Tahun lulus Perguruan Tinggi<span style="color: #ff1100;font-size: 17px;">*</span></label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="lulus_pt" value="<?php if(!empty($pendidikan->lulus_pt)){ echo $pendidikan->lulus_pt; } ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="alert alert-secondary">
                                    <label class="col-md-9 control-label" style="color: #000;"><span style="color: #ff1100;font-size: 17px;">*</span> Wajib Diisi</label>
                                </div>
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