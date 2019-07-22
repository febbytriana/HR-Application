 @extends('layouts.app')

@section('content')

 <section role="main" class="content-body">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mt-3">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
        <li class="breadcrumb-item"><a href="{{ route('akun.index') }}">Manajemen Akun</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Akun Pegawai</li>
      </ol>
    </nav>

    <section class="card mt-3">
        <div class="card-header">
                <h4>Tambah Akun</h2>
    </div>
        <div class="card-body">
            <div class="col-md-12">
                <form action="{{ route('akunpegawai.storepegawai') }}" method="POST">
                    @csrf 
                    <div class="col-md-6">
                        <div class="form-group">
                        <label class="control-label">Nama <span class="required">*</span></label>
                        <div class="tambahElemen">
                            <select class="form-control" name="id" data-show-subtext="true">
                                <option value="">-- Cari -- </option>
                               
                               
                                <optgroup label="Pegawai">
                                    @foreach( $pegawai as $datapegawai )
                                    <option value="{{ $datapegawai->id_pegawai }}">{{ $datapegawai->nama }} </option>
                                    @endforeach
                                </optgroup> 
                             
                                
                            </select>
                        </div>
                    </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Email <span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="email">
                            </div>
                        </div>    
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Password<span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>  
                        <div class="form-group">
                            <label class="col-md-3 control-label">Ketik Ulang Password <span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" name="password-confirmation">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Status</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="status" value="Pegawai" readonly="">
                            </div>
                            
                        </div>
                        <div class="form-group">
                            &nbsp;<button type="submit" class="btn btn-primary">Tambah</button>
                        </div>  
                    </div>
                </form>
            </div>
        </div>
    </section>
</section>

@endsection