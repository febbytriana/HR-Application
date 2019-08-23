@extends('layouts.app')

@section('content')

 <section role="main" class="content-body">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mt-3">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
      </ol>
    </nav>

    <section class="card mt-3">
        <div class="card-header">
                <h4>Tambah Data Keluarga</h2>
        </div>
        <div class="card-body" style="margin-left:200px;">
            <div class="col-md-24">
                <form action="{{ route('keluarga.update')}}" method="POST">
                    @csrf 
                    <div class="col-md-12">
                        <input type="hidden" name="id_pegawai" value="{{ $keluarga->id_pegawai }}">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nama <span class="required">*</span></label>
                             <div class="col-md-9">
                                <input type="text" class="form-control" name="nama">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Tempat <span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="tempat">
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="col-md-3 control-label">Tanggal Lahir <span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="date" class="form-control" name="tgl">
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="col-md-3 control-label">Anak ke <span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="anak_ke">
                            </div>
                        </div>    

                        <div class="form-group">
                            <label class="col-md-3 control-label">Status <span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="status">
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