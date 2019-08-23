@extends('layouts.app')

@section('content')

 <section role="main" class="content-body">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mt-3">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
        <li class="breadcrumb-item"><a href="{{ route('pegawai.index') }}">Data Pegawai</a></li>
        <li class="breadcrumb-item"><a href="{{ route('pegawai.detail',$pegawai->id_pegawai) }}">Kontrak</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$pegawai->nama}}</li>
        <li class="breadcrumb-item active" aria-current="page">Edit</li>
      </ol>
    </nav>

    <section class="card mt-3">
        <div class="card-header" style="background-color: #0f5b94;">
                <h4 style="color: #fff;">Ubah Kontrak</h2>
        </div>
        <div class="card-body" style="margin-left:200px;">
            <div class="col-md-24">
                <form action="{{ route('kontrak.update',['id_pegawai'=>$pegawai->id_pegawai,'id_kontrak'=>$kontrak->id_kontrak]) }}" enctype="multipart/form-data" method="POST">
                    @csrf 
                    <div class="col-md-12">
                        <?php
                            $pisahkan = explode(" ", $kontrak->tahun);
                            $mulai = strtotime($pisahkan[0]); 
                            $newmulai = date('Y-m-d',$mulai);
                            $habis = strtotime($pisahkan[3]); 
                            $newhabis = date('Y-m-d',$habis); 
                        ?>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Kontrak <span class="required">*</span></label>
                             <div class="col-md-9">
                                <input type="text" class="form-control" name="kontrak" value="{{ $kontrak->kontrak }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Durasi Kontrak<span class="required">*</span></label>
                            <div class="col-md-9">
                                <span>Mulai</span>
                                <input type="date" class="form-control" name="mulai" value="{{$newmulai}}" required>
                                <span>Habis Kontrak</span>
                                <input type="date" class="form-control" name="habis" value="{{$newhabis}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-9">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary" style="width: 150px">Ubah</button>
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