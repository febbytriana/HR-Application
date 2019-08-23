@php 
	$tanggal = date('d-m-y');
@endphp
@extends('layouts.app')

@section('content')

	
 <section role="main" class="content-body">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mt-3">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Absensi</li>
      </ol>
    </nav>

    <section class="card mt-3">
        <div class="card-header">
                <h4>Absensi</h2>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <form action="{{ route('absen.store',['id_pegawai'=>$id_pegawai['id_pegawai']]) }}" method="POST">
                    @csrf
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Tanggal <span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="tgl" value="{{ $tanggal }}" readonly="">
                            </div>
                        </div>

                   		 <div class="form-group">
                            <label class="col-md-3 control-label">Keterangan<span class="required">*</span></label>
                            <div class="col-md-9">
                                <select name="keterangan" id="keterangan" class="custom-select">
                                    <option value=""></option>
                                    <option value="izin">Izin</option>
                                    <option value="sakit">Sakit</option>
                                    <option value="alpa">Tanpa Keterangan</option>
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