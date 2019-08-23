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
                <h5>Tambah Pelatihan Kerja</h5>
        </div>
        <div class="card-body" style="margin-left:200px;">
            <div class="col-md-24">
                <form action="{{ route('pelatihan.update',['id_pegawai'=>$pegawai->id_pegawai,'id_pelatihan'=>$pelatihan->id_pelatihan]) }}" enctype="multipart/form-data" method="POST">
                    @csrf 
                    <div class="col-md-12"> 
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nama Kegiatan<span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_event" required="" value="{{ $pelatihan->nama_event }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Tempat<span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="tempat_pelatihan" required="" value="{{ $pelatihan->tempat_pelatihan }}">
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="col-md-3 control-label">Tanggal<span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="date" class="form-control mr-2" name="tanggal" required="" value="{{ $pelatihan->tanggal }}">  
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Peran<span class="required">*</span></label>
                            <div class="col-md-9">
                                <select class="custom-select" name="peran">
                                    <option value="Panitia" @if($pelatihan->peran=='Panitia') selected='selected @endif'>Panitia</option>
                                    <option value="Peserta" @if($pelatihan->peran=='Peserta') selected='selected @endif'>Peserta</option>
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