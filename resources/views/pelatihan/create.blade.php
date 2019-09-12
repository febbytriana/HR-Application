@extends('layouts.app')

@section('content')

 <section role="main" class="content-body">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mt-3">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
        <li class="breadcrumb-item"><a href="{{ route('pegawai.detail',$pegawai->id_pegawai) }}">Pelatihan Kerja</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $pegawai->nama }}</li>
        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
      </ol>
    </nav>

    <section class="card mt-3">
        <div class="card-header" style="background: #0f5b94; color: #fff;">
                <h5>Tambah Pengalaman Kerja</h5>
        </div>
        <div class="card-body" style="margin-left:200px;">
            <div class="col-md-24">
                <form action="{{ route('pelatihan.store',$pegawai->id_pegawai) }}" enctype="multipart/form-data" method="POST">
                    @csrf 
                    <div class="col-md-12"> 
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nama Kegiatan<span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_event" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Tempat<span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="tempat_pelatihan" required="">
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="col-md-3 control-label">Tanggal<span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="date" class="form-control mr-2" name="tanggal" required="">  
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Peran<span class="required">*</span></label>
                            <div class="col-md-9">
                                <select class="custom-select" name="peran" required="">
                                    <option value="Panitia">Panitia</option>
                                    <option value="Peserta">Peserta</option>
                                </select>  
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-9">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-success btn-sm waves-effect btn-submit" anim="ripple">Tambah</button>
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