@extends('layouts.app')

@section('content')

 <section role="main" class="content-body">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mt-3">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
        <li class="breadcrumb-item"><a href="{{ route('jabatan.index') }}">Jabatan</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
      </ol>
    </nav>

    <section class="card mt-3">
        <div class="card-header">
                <h4>Tambah Data Jabatan</h2>
        </div>
        <div class="card-body" style="margin-left:200px;">
            <div class="col-md-24">
                <form action="{{ route('jabatan.store')}}" method="POST">
                    @csrf 
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-md-3 control-label">NIK <span class="required">*</span></label>
                             <div class="col-md-9">
                                <input type="text" class="form-control" name="nik">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nama<span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="nama">
                            </div>
                        </div>   
                        <div class="form-group">
                            <label class="col-md-3 control-label">Tempat Tanggal Lahir<span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="ttl">
                            </div>
                        </div>   
                        <div class="form-group">
                            <label class="col-md-3 control-label">Alamat<span class="required">*</span></label>
                            <div class="col-md-9">
                                <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Jenis Kelamin<span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="radio">Laki-laki
                                <input type="radio" style="margin-left:200px;">Perempuan
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Agama<span class="required">*</span></label>
                            <div class="col-md-9">
                                <select name="" id="" class="form-control">
                                    <option value=""></option>
                                    <option value="Islam">Islam</option>
                                    <option value="Katholik">Katholik</option>
                                    <option value="Protestan">Protestan</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Kong Hu Chu">Kong Hu Chu</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Kewarganegaraan<span class="required">*</span></label>
                            <div class="col-md-9">
                                <select name="" id="" class="form-control">
                                    <option value=""></option>
                                    <option value="WNI">Warga Negara Indonesia</option>
                                    <option value="WNA">Warga Negara Asing</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Status Perkawinan<span class="required">*</span></label>
                            <div class="col-md-9">
                                <select name="" id="" class="form-control">
                                    <option value=""></option>
                                    <option value="Kawin">Kawin</option>
                                    <option value="Belum kawin">Belum kawin</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Golongan Darah<span class="required">*</span></label>
                            <div class="col-md-9">
                                <select name="" id="" class="form-control">
                                    <option value=""></option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="AB">AB</option>
                                    <option value="O">O</option>
                                </select>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="col-md-3 control-label">Riwayat Penyakit<span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="ttl">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">No.Telepon<span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="ttl">
                            </div>
                        </div>  
                        <div class="form-group">
                            <label class="col-md-3 control-label">Email<span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="email" class="form-control" name="ttl">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Foto<span class="required">*</span></label>
                            <div class="col-md-9">
                                 <div style="width:150px; height:180px;border: 1px solid #000;">
                                    <img src="" alt="">
                                </div>
                                <input type="file" class="form-control" style="margin-top:20px;">
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