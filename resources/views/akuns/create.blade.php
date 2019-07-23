 @extends('layouts.app')

@section('content')

 <section role="main" class="content-body">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mt-3">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
        <li class="breadcrumb-item"><a href="{{ route('akun.index') }}">Manajemen Akun</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
      </ol>
    </nav>

    <section class="card mt-3">
        <div class="card-header">
                <h4>Tambah Akun</h2>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <form action="{{ route('akun.store') }}" method="POST">
                    @csrf 
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Name <span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="name">
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
                            <label class="col-md-3 control-label">Status<span class="required">*</span></label>
                            <div class="col-md-9">
                                <select name="status" class="form-control">
                                   <option value="Admin">Admin</option>
                                   <option value="HR">HR</option>
                                   <option value="Pegawai">Pegawai</option>
                                </select>
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