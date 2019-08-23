@extends('layouts.app')

@section('content')

 <section role="main" class="content-body">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mt-3">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $pegawai->nama }}</li>
        <li class="breadcrumb-item"><a href="{{ route('pegawai.detail',$pegawai->id_pegawai) }}">Keluarga</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit</li>
      </ol>
    </nav>

    <section class="card mt-3">
        <div class="card-header" style="background: #0f5b94; color: #fff;">
                <h5>Ubah Data Keluarga</h5>
        </div>
        <div class="card-body" style="margin-left:200px;">
            <div class="col-md-24">
                <form action="{{ route('keluarga.update',['id_pegawai'=>$pegawai->id_pegawai,'id_keluarga'=>$keluarga->id_keluarga]) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                @if(!empty($keluarga))
                    <div class="col-md-12"> 
                         <div class="form-group">
                            <label class="col-md-3 control-label">Status<span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="status" required="" value="{{$keluarga->status}}" readonly>
                            </div>
                        </div>  
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nama<span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="nama" required="" value="{{$keluarga->nama}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Jenis Kelamin<span class="required">*</span></label>
                            <div class="col-md-9">
                                @if($keluarga->jk=='Laki-laki')
                                <input type="radio" name="jk" id="jk" value="Laki-laki" checked='checked '>Laki-laki
                                 <input type="radio" name="jk" id="jk" value="Perempuan" style="margin-left:200px;">Perempuan
                                @endif

                                @if($keluarga->jk=='Perempuan')
                                <input type="radio" name="jk" id="jk" value="Laki-laki" >Laki-laki
                                 <input type="radio" name="jk" id="jk" value="Perempuan" style="margin-left:200px;" checked='checked '>Perempuan
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Tempat<span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="text"  class="form-control" name="tempat" value="{{$keluarga->tempat}}">
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="col-md-3 control-label">Tanggal Lahir<span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="date"  class="form-control" name="tgl" value="{{$keluarga->tgl}}">
                            </div>
                        </div> 
                       
                        <div class="form-group">
                            <div class="col-md-9">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-success btn-sm waves-effect" anim="ripple">Ubah</button>
                                </div>
                            </div>
                        </div>     
                    </div>
                @else
                    <div class="col-md-12"> 
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nama<span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="nama" required="" value="Tidak Ada Data yang Dimaksud">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Jenis Kelamin<span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="jk" required="" value="Tidak Ada Data yang Dimaksud">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Tempat<span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="tempat" required="" value="Tidak Ada Data yang Dimaksud">
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="col-md-3 control-label">Tanggal Lahir<span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="tgl" required="" value="Tidak Ada Data yang Dimaksud">
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="col-md-3 control-label">Status<span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="status" required="" value="Tidak Ada Data yang Dimaksud">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-9">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-success btn-sm waves-effect" anim="ripple" disabled="">Ubah</button>
                                </div>
                            </div>
                        </div>     
                    </div>
                @endif    

            </div>
                </form>
            </div>
        </div>
    </section>
</section>

@endsection