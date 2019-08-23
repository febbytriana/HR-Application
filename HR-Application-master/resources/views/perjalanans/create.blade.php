@extends('layouts.app')

@section('content')

 <section role="main" class="content-body">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mt-3">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Surat Perjalanan</li>
      </ol>
    </nav>

    <section class="card mt-3">
        <div class="card-header">
                <span class="title-head">Tambah Surat Perjalanan</span>
                <div class="pull-right">
                    <a class="nav-link" href="{{ route('perjalanan.index') }}" style="font-size: 15px;"><i class="menu-icon ti-arrow-left"></i> Back</a>
                </div>
        </div>
        <div class="card-body" style="">
                <form action="{{ route('perjalanan.store') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                      <div class="col-6">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nama pegawai*</label>
                            <div class="col-md-9">
                                <select name="id_pegawai" id="id_pegawai" class="form-control">
                                    <option value=""></option>
                                    @foreach($pegawai as $p)
                                    <option value="{{$p->id_pegawai}}">{{$p->nik}}    <b>{{$p->nama}}</b></option>
                                    @endforeach
                                </select>
                          </div>
                          </div>
                          <div class="form-group">
                              <label class="col-md-3 control-label">Kegiatan*</label>
                              <div class="col-md-9">
                                  <input type="text" class="form-control" name="kegiatan" >
                              </div>
                          </div>
                          <div class="form-group">
                                <label class="col-md-3 control-label">Sponsor<span class="required">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="sponsor">
                                </div>
                            </div>
                          <div class="form-group">
                                <label class="col-md-3 control-label">Tujuan<span class="required">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="tujuan">
                                </div>
                            </div>
                      </div>
                      <div class="col-6">
                
                            <div class="form-group">
                                <label class="col-md-3 control-label">Tanggal Berangkat<span class="required">*</span></label>
                                <div class="col-md-9">
                                    <input type="date" class="form-control" name="tgl_berangkat">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Tanggal Pulang<span class="required">*</span></label>
                                <div class="col-md-9">
                                    <input type="date" class="form-control" name="tgl_pulang">
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

@endsection