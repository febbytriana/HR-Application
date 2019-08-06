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
                <form action="{{ route('sp.update', $sp->id_sp)}}" method="POST">
                    @csrf
                    <div class="row mb-3">
                      <div class="col-6">
                      <div class="form-group">
                            <label class="col-md-3 control-label">Nama pegawai*</label>
                            <div class="col-md-9">
                                <select name="id_pegawai" id="id_pegawai" class="form-control">
                                    <option value=""></option>
                                    @foreach($pegawai as $p)
                                    <option value="{{$p->id_pegawai}}"@if($sp->id_sp) selected='selected @endif'>{{$p->nama}}</option>
                                    @endforeach
                                </select>
                          </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-3 control-label">Perihal*</label>
                            <div class="col-md-9">
                                <select name="perihal" id="perihal" onclick="aktif(this.value)" class="form-control">
                                    <option value=""></option>
                                    <option value="Teguran"@if($sp->perihal) selected='selected @endif'>Teguran</option>
                                    <option value="SP-1"@if($sp->perihal) selected='selected @endif'>SP 1</option>
                                    <option value="SP-2"@if($sp->perihal) selected='selected @endif'>SP 2</option>
                                    <option value="Skorsing"@if($sp->perihal) selected='selected @endif'>Skorsing</option>
                                </select>
                            </div>
                          </div>
                          <div class="form-group">
                                <label class="col-md-3 control-label">Pelanggaran<span class="required">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="pelanggaran" value="{{$sp->pelanggaran}}">
                                </div>
                            </div>
                          <div class="form-group">
                                <label class="col-md-3 control-label">Tanggal Pelanggaran<span class="required">*</span></label>
                                <div class="col-md-9">
                                    <input type="date" class="form-control" name="tgl_pelanggaran" value="{{$sp->tgl_pelanggaran}}">
                                </div>
                            </div> 
                      </div>
                      <div class="col-6">
                          <div class="form-group">
                                <label class="col-md-6 control-label">Tanggal Menghadap HRD<span class="required">*</span></label>
                                <div class="col-md-9">
                                    <input type="date" class="form-control" name="tgl_menghadap_hrd"  value="{{$sp->tgl_menghadap_hrd}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Mulai Skorsing<span class="required">*</span></label>
                                <div class="col-md-9">
                                    <input disabled="" id="mulai" type="date" class="form-control" name="mulai_skorsing" value="{{$sp->mulai_skorsing}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Akhir Skorsing<span class="required">*</span></label>
                                <div class="col-md-9">
                                    <input disabled="" id="selesai" type="date" class="form-control" name="selesai_skorsing"  value="{{$sp->selesai_skorsing}}">
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
    var perihal=document.getElementById("perihal").value;
    var mulai=document.getElementById("mulai");
    var selesai=document.getElementById("selesai");
        if(perihal=="Skorsing"){
            mulai.disabled=false;
            selesai.disabled=false;
        }
        else{
            mulai.disabled=true;
            selesai.disabled=true;
        }
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