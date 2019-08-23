@extends('layouts.app')

@section('content')

 <section role="main" class="content-body">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mt-3">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
        <li class="breadcrumb-item"><a href="{{ route('pegawai.index') }}">Data Pegawai</a></li>
        <li class="breadcrumb-item"><a href="{{ route('pegawai.detail',$pegawai->id_pegawai) }}">Kontrak</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$pegawai->nama}}</li>
        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
      </ol>
    </nav>

    <section class="card mt-3">
        <div class="card-header" style="background-color: #0f5b94;">
                <h4 style="color: #fff;">Tambah Kontrak</h2>
        </div>
        <div class="card-body" style="margin-left:200px;">
            <div class="col-md-24">
                <form action="{{ route('kontrak.store',$pegawai->id_pegawai) }}" enctype="multipart/form-data" method="POST">
                    @csrf 
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Kontrak <span class="required">*</span></label>
                             <div class="col-md-9">
                                <input type="text" class="form-control" name="kontrak">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Durasi Kontrak<span class="required">*</span></label>
                            <div class="col-md-9">
                                <span>Mulai</span>
                                <input type="date" class="form-control" name="mulai">
                                <span>Habis Kontrak</span>
                                <input type="date" class="form-control" name="habis">
                            </div>
                            <div class="col-md-9">
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-9">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary" style="width: 150px">Tambah</button>
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