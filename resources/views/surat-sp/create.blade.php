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
                <form action="" method="POST">
                    @csrf
                    <div class="row mb-3">
                      <div class="col-6">
                          <div class="form-group">
                              <label class="col-md-3 control-label">Nama Pegawai*</label>
                              <div class="col-md-9">
                                  <input type="text" class="form-control" name="nik">
                              </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-3 control-label">Perihal*</label>
                            <div class="col-md-9">
                                <select name="" id="" class="form-control">
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
                                    <input type="text" class="form-control" name="">
                                </div>
                            </div>
                          <div class="form-group">
                                <label class="col-md-3 control-label">Tanggal Pelanggaran<span class="required">*</span></label>
                                <div class="col-md-9">
                                    <input type="date" class="form-control" name="">
                                </div>
                            </div> 
                      </div>
                      <div class="col-6">
                          <div class="form-group">
                                <label class="col-md-6 control-label">Tanggal Menghadap HRD<span class="required">*</span></label>
                                <div class="col-md-9">
                                    <input type="date" class="form-control" name="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Mulai Skorsing<span class="required">*</span></label>
                                <div class="col-md-9">
                                    <input type="date" class="form-control" name="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Akhir Skorsing<span class="required">*</span></label>
                                <div class="col-md-9">
                                    <input type="date" class="form-control" name="">
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