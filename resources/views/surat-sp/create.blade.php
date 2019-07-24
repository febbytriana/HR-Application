@extends('layouts.app')

@section('content')

 <section role="main" class="content-body">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mt-3">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
        <li class="breadcrumb-item"><a href="">Surat Teguran dan Peringatan</a></li>
      </ol>
    </nav>

    <section class="card mt-3">
        <div class="card-header">
                <h4>Tambah Surat Teguran/Peringatan</h2>
        </div>
        <div class="card-body" style="margin-left:200px;">
            <div class="col-md-24">
                <form action="" method="POST">
                    @csrf 
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nama pegawai <span class="required">*</span></label>
                            <div class="form-group" style="margin-left:445px;position:absolute;">
                                 &nbsp;<button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Tambah</button>
                            </div>  
                             <div class="col-md-9" style="width:460px;">
                                <input type="text" class="form-control" name="nik">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Perihal<span class="required">*</span></label>
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
                                <input type="text" class="form-control" name="ttl">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Tanggal Pelanggaran<span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="date" class="form-control" name="ttl">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-6 control-label">Tanggal Menghadap HRD<span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="date" class="form-control" name="ttl">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Mulai Skorsing<span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="date" class="form-control" name="ttl">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Akhir Skorsing<span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="date" class="form-control" name="ttl">
                            </div>
                        </div> 
                    </div>
                        <div class="form-group" style="margin-left:480px;">
                            &nbsp;<button type="submit" class="btn btn-primary">Tambah</button>
                        </div>  
                    </div>
                </form>
            </div>
        </div>
    </section>
</section>

@endsection