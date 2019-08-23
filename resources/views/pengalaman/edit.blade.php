@extends('layouts.app')

@section('content')

 <section role="main" class="content-body">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mt-3">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
        <li class="breadcrumb-item"><a href="{{ route('pegawai.detail',$pegawai->id_pegawai) }}">Nomor Darurat</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $pegawai->nama }}</li>
        <li class="breadcrumb-item active" aria-current="page">Edit</li>
      </ol>
    </nav>

    <section class="card mt-3">
        <div class="card-header" style="background: #0f5b94; color: #fff;">
                <h5>Ubah Pengalaman Kerja</h5>
        </div>
        <div class="card-body" style="margin-left:200px;">
            <div class="col-md-24">
                <form action="{{ route('pengalaman.update',['id_pegawai'=>$pegawai->id_pegawai,'id_pengalaman'=>$pengalaman->id_pengalaman]) }}" enctype="multipart/form-data" method="POST">
                    @csrf 
                    <div class="col-md-12"> 
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nama Perusahaan<span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_perusahaan" required="" value="{{ $pengalaman->nama_perusahaan }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Jabatan<span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="jabatan" required="" value="{{ $pengalaman->jabatan }}">
                            </div>
                        </div>
                        <?php 
                            $pisahkan = explode(" ", $pengalaman->tahun);
                        ?> 
                        <div class="form-group">
                            <label class="col-md-3 control-label">Lama Bekerja<span class="required">*</span></label>
                            <div class="col-md-9">
                              <div class="input-group">
                                <input type="text" class="form-control mr-2" name="lama" required="" value="{{ $pisahkan[0] }}">
                                <div class="input-group-append">
                                  <select name="format" class="custom-select" style="padding: 10px 30px 10px 20px;" required="">
                                    <option value="Bulan" @if($pisahkan[1]=='Bulan') selected='selected @endif'>Bulan</option>
                                    <option value="Tahun" @if($pisahkan[1]=='Tahun') selected='selected @endif'>Tahun</option>
                                  </select>
                                </div>
                               </div>  
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-9">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-success btn-sm waves-effect btn-submit" anim="ripple">Ubah</button>
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