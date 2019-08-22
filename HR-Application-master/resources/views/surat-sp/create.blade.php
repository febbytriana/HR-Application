@extends('layouts.app')

@section('content')

 <section role="main" class="content-body">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mt-3">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Surat Teguran dan Peringatan</li>
      </ol>
    </nav>

    <section class="card mt-3">
        <div class="card-header">
                <span class="title-head">Tambah Surat Teguran/Peringatan</span>
                <div class="pull-right">
                    <a class="nav-link" href="{{ route('sp.index') }}" style="font-size: 15px;"><i class="menu-icon ti-arrow-left"></i> Back</a>
                </div>
        </div>
        <div class="card-body" style="">
                <form action="{{ route('sp.store') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                      <div class="col-6">
                      <div class="form-group">
                            <label class="col-md-3 control-label">Nama pegawai*</label>
                            <div class="col-md-9">
                                <select name="id_pegawai" id="id_pegawai" class="form-control">
                                    <option value=""></option>
                                    @foreach($pegawai as $p)
                                    <option value="{{$p->id_pegawai}}">{{$p->nik}}   {{$p->nama}}</option>
                                    @endforeach
                                </select>
                          </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-3 control-label">Perihal*</label>
                            <div class="col-md-9">
                                <select name="perihal" id="perihal" onclick="aktif(this.value)" class="form-control">
                                    <option value=""></option>
                                    <option value="Teguran">Teguran</option>
                                    <option value="SP-1">SP 1</option>
                                    <option value="SP-2">SP 2</option>
                                    <option value="Skorsing">Skorsing</option>
                                </select>
                            </div>
                          </div>
                          <div class="form-group">
                                <label class="col-md-3 control-label">Pelanggaran<span class="required">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="pelanggaran">
                                </div>
                            </div>
                          <div class="form-group">
                                <label class="col-md-3 control-label">Tanggal Pelanggaran<span class="required">*</span></label>
                                <div class="col-md-9">
                                    <input type="date" class="form-control" name="tgl_pelanggaran">
                                </div>
                            </div> 
                      </div>
                      <div class="col-6">
                          <div class="form-group">
                                <label class="col-md-6 control-label">Tanggal Menghadap HRD<span class="required">*</span></label>
                                <div class="col-md-9">
                                    <input type="date" class="form-control" name="tgl_menghadap_hrd">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Mulai Skorsing<span class="required">*</span></label>
                                <div class="col-md-9">
                                    <input disabled="" id="mulai" type="date" class="form-control" name="mulai_skorsing">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Akhir Skorsing<span class="required">*</span></label>
                                <div class="col-md-9">
                                    <input disabled="" id="selesai" type="date" class="form-control" name="selesai_skorsing">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-9">
                                    <button type="submit" class="btn btn-success btn-md btn-block"><i class="menu-icon ti-save"></i>   Simpan</button>
                                </div>
                            </div>
                      </div>
                    </div>
                </form>
        </div>
    </section>
</section>

<script>
    function aktif(val){
        var mulai=document.getElementById("mulai");
        var selesai=document.getElementById("selesai");
        if(val=="Skorsing"){
            mulai.disabled=false;
            selesai.disabled=false;
        }
        else{
            mulai.disabled=true;
            selesai.disabled=true;
        }
    }
</script>
@endsection