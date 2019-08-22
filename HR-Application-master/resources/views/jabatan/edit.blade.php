@extends('layouts.app')

@section('content')

 <section role="main" class="content-body">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mt-3">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
        <li class="breadcrumb-item"><a href="{{ route('jabatan.index') }}">Jabatan</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit</li>
      </ol>
    </nav>

    <section class="card mt-3">
        <div class="card-header">
                <h4>Edit Data Jabatan</h2>
        </div>
        <div class="card-body" style="margin-left:200px;">
            <div class="col-md-24">
                <form action="/jabatan/update/{{$jabatan->id_jabatan}}" method="POST">
                    @csrf 
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Jabatan <span class="required">*</span></label>
                             <div class="col-md-9">
                                <input type="text" class="form-control" name="jabatan" value="{{$jabatan->jabatan}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Gaji pokok <span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="gaji_pokok" value="{{$jabatan->gaji_pokok}}">
                            </div>
                        </div>    
                    </div>
                        <div class="form-group" style="margin-left:480px;">
                            &nbsp;<button type="submit" class="btn btn-primary">Edit</button>
                        </div>  
                    </div>
                </form>
            </div>
        </div>
    </section>
</section>

@endsection