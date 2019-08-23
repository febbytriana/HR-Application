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
        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
      </ol>
    </nav>

    <section class="card mt-3">
        <div class="card-header">
                <h4>Tambah Data Pegawai</h2>
        </div>
        <div class="card-body" style="margin-left:200px;">
            <div class="col-md-24">
                <form action="{{ route('pegawai.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf 
                    <div class="col-md-12"> 
                        <div class="form-group">
                            <label class="col-md-3 control-label">NIK <span class="required">*</span></label>
                             <div class="col-md-9">
                                <input type="text" class="form-control" name="nik" maxlength="16">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nama<span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="nama">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Jabatan<span class="required">*</span></label>
                            <div class="col-md-9">
                                <select name="id_jabatan" id="id_jabatan" class="form-control select2">
                                    <option value="">Pilih</option>
                                    @foreach ($jabatan as $jabatan)
                                    <option value="{{$jabatan->id_jabatan}}">{{$jabatan->jabatan}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>   
                        <div class="form-group">
                            <label class="col-md-3 control-label">Tempat<span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="tempat">
                            </div>
                        </div>   

                        <div class="form-group">
                            <label class="col-md-3 control-label">Tanggal Lahir<span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="date" class="form-control" name="tgl">
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
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="customRadio" name="jk" value="Laki-laki" checked="value">
                                    <label class="custom-control-label" for="customRadio">Laki-laki</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline" style="margin-left: 150px;">
                                    <input type="radio" class="custom-control-input" id="customRadio2" name="jk" value="Perempuan">
                                    <label class="custom-control-label" for="customRadio2">Perempuan</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Agama<span class="required">*</span></label>
                            <div class="col-md-9">
                                <select name="agama" id="agama" class="custom-select select2">
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
                                <select name="warga_negara" id="warga_negara" class="custom-select select2">
                                    <option value=""></option>
                                    <option value="WNI">Warga Negara Indonesia</option>
                                    <option value="WNA">Warga Negara Asing</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Status Perkawinan<span class="required">*</span></label>
                            <div class="col-md-9">
                                <select name="status_kawin" id="status_kawin" class="custom-select select2">
                                    <option value=""></option>
                                    <option value="Kawin">Kawin</option>
                                    <option value="Belum kawin">Belum kawin</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Golongan Darah<span class="required">*</span></label>
                            <div class="col-md-9">
                                <select name="goldar" id="goldar" class="custom-select select2">
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
                                <input type="text" class="form-control" name="penyakit">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">No.Telepon<span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="text" id="cc" class="form-control" name="telp">
                            </div>
                        </div>  
                        <div class="form-group">
                            <label class="col-md-3 control-label">Email<span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="email" class="form-control" name="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Foto<span class="required">*</span></label>
                            <div class="col-md-9">
                                 <div style="width:150px; height:180px;border: 1px solid #c0c2ce;">
                                    <img src="/images/{{ Session::get('path') }}" id="showgambar" alt="" style="width: 100%; height: 100%;">
                                </div>
                                <input id="inputgambar" type="file" class="form-control" style="margin-top:20px;" name="image">
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