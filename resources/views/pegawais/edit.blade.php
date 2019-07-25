@extends('layouts.app')

@section('content')

 <section role="main" class="content-body">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mt-3">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
        <li class="breadcrumb-item"><a href="{{ route('pegawai.index') }}">Data Pegawai</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
      </ol>
    </nav>

    <section class="card mt-3">
        <div class="card-header">
                <h4>Tambah Data Pegawai</h2>
        </div>
        <div class="card-body" style="margin-left:200px;">
            <div class="col-md-24">
                <form action="/pegawai/update/{{$pegawai->id_pegawai}}" enctype="multipart/form-data" method="POST">
                    @csrf 
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-md-3 control-label">NIK <span class="required">*</span></label>
                             <div class="col-md-9">
                                <input type="text" class="form-control" name="nik" value="{{$pegawai->nik}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nama<span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="nama" value="{{$pegawai->nama}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Jabatan<span class="required">*</span></label>
                            <div class="col-md-9">
                                <select name="id_jabatan" id="id_jabatan" class="form-control">
                                    <option value=""></option>
                                    @foreach ($jabatan as $jabatan)
                                    <option value="{{$jabatan->id_jabatan}}"@if($pegawai->id_jabatan) selected='selected @endif'>{{$jabatan->jabatan}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>   
                        <div class="form-group">
                            <label class="col-md-3 control-label">Tanggal Lahir<span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="date" class="form-control" name="ttl" value="{{$pegawai->ttl}}">
                            </div>
                        </div>   
                        <div class="form-group">
                            <label class="col-md-3 control-label">Alamat<span class="required">*</span></label>
                            <div class="col-md-9">
                                <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control">{{$pegawai->alamat}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Jenis Kelamin<span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="radio" name="jk" id="jk" value="Laki-laki"@if($pegawai->jk=='Laki-laki') checked='checked @endif'>Laki-laki
                                <input type="radio" name="jk" id="jk" value="Perempuan" style="margin-left:200px;"@if($pegawai->jk=='Perempuan') checked='checked @endif'>Perempuan
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Agama<span class="required">*</span></label>
                            <div class="col-md-9">
                                <select name="agama" id="agama" class="form-control">
                                    <option value=""></option>
                                    <option value="Islam"@if($pegawai->agama=='Islam') selected='selected @endif'>Islam</option>
                                    <option value="Katholik"@if($pegawai->agama=='Katholik') selected='selected @endif'>Katholik</option>
                                    <option value="Protestan"@if($pegawai->agama=='Protestan') selected='selected @endif'>Protestan</option>
                                    <option value="Hindu"@if($pegawai->agama=='Hindu') selected='selected @endif'>Hindu</option>
                                    <option value="Budha"@if($pegawai->agama=='Budha') selected='selected @endif'>Budha</option>
                                    <option value="Kong Hu Chu"@if($pegawai->agama=='Kong Hu Cu') selected='selected @endif'>Kong Hu Chu</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Kewarganegaraan<span class="required">*</span></label>
                            <div class="col-md-9">
                                <select name="warga_negara" id="warga_negara" class="form-control">
                                    <option value=""></option>
                                    <option value="WNI"@if($pegawai->warga_negara=='WNI') selected='selected @endif'>Warga Negara Indonesia</option>
                                    <option value="WNA"@if($pegawai->warga_negara=='WNA') selected='selected @endif'>Warga Negara Asing</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Status Perkawinan<span class="required">*</span></label>
                            <div class="col-md-9">
                                <select name="status_kawin" id="status_kawin" class="form-control">
                                    <option value=""></option>
                                    <option value="Kawin"@if($pegawai->status_kawin=='Kawin') selected='selected @endif'>Kawin</option>
                                    <option value="Belum kawin"@if($pegawai->status_kawin=='Belum kawin') selected='selected @endif'>Belum kawin</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Golongan Darah<span class="required">*</span></label>
                            <div class="col-md-9">
                                <select name="goldar" id="goldar" class="form-control">
                                    <option value=""></option>
                                    <option value="A"@if($pegawai->goldar=='A') selected='selected @endif'>A</option>
                                    <option value="B"@if($pegawai->goldar=='B') selected='selected @endif'>B</option>
                                    <option value="AB"@if($pegawai->goldar=='AB') selected='selected @endif'>AB</option>
                                    <option value="O"@if($pegawai->goldar=='O') selected='selected @endif'>O</option>
                                </select>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="col-md-3 control-label">Riwayat Penyakit<span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="penyakit" value="{{$pegawai->penyakit}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">No.Telepon<span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="telp" value="{{$pegawai->telp}}">
                            </div>
                        </div>  
                        <div class="form-group">
                            <label class="col-md-3 control-label">Email<span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="email" class="form-control" name="email" value="{{$pegawai->email}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Foto<span class="required">*</span></label>
                            <div class="col-md-9">
                                 <div style="width:150px; height:180px;border: 1px solid #000;">
                                    <img src="{{ asset('uploads/'.$pegawai->image)}}" alt="" style="width:150px; height:180px;border: 1px solid #000;">
                                </div>
                                <input type="file" class="form-control" style="margin-top:20px;" name="image" value="{{$pegawai->image}}">
                            </div>
                        </div> 
                    </div>
                        <div class="form-group" style="margin-left:480px;">
                            &nbsp;<button type="submit" class="btn btn-primary">Ubah</button>
                        </div>  
                    </div>
                </form>
            </div>
        </div>
    </section>
</section>

@endsection