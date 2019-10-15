
 @extends('layouts.app')

@section('content')

 <section role="main" class="content-body">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mt-3">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $pegawai->nama }}</li>
        <li class="breadcrumb-item"><a href="{{ route('pegawai.detail',$pegawai->id_pegawai) }}">Keluarga</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
      </ol>
    </nav>

    <section class="card mt-3">
        <div class="card-header" style="background: #0f5b94; color: #fff;">
                <h5>Tambah Data Keluarga</h5>
        </div>
        <div class="card-body" style="margin-left:200px;">
            <div class="col-md-24">
                <form action="{{ route('keluarga.store',['id_pegawai'=>$pegawai->id_pegawai]) }}" enctype="multipart/form-data" method="POST">
                    @csrf 


                    <div class="col-md-12"> 
                        <div class="form-group">
                                <label class="col-md-3 control-label">Status Dalam Keluarga<span class="required">*</span></label>
                                <div class="col-md-9">
                                    <select name="status" onchange="ganti(this.value)" id="status" class="custom-select select2">
                                        <option value=""></option>
                                        <option value="Anak">Anak</option>
                                        <option value="Ayah" @if(count($checkayah) == 1) disabled='disabled' @endif >Ayah</option>
                                        <option value="Ibu" @if(count($checkibu) == 1) disabled='disabled' @endif>Ibu</option>
                                        @if($pegawai->jk=="Laki-laki")
                                            <option value="Istri">Istri</option>
                                        @endif
                                        @if($pegawai->jk=="Perempuan")
                                            <option value="Suami">Suami</option>
                                        @endif
                                    </select>
                                </div>
                        </div>
                    </div>

                    <div class="col-md-12"> 
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nama<span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="nama" required="">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label">Jenis Kelamin<span class="required">*</span></label>
                            <div class="col-md-9">
                                <div id="jenis1" class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="customRadio" name="jk" value="Laki-laki" checked="value">
                                    <label class="custom-control-label" for="customRadio">Laki-laki</label>
                                </div>
                                <div id="jenis2" class="custom-control custom-radio custom-control-inline" style="margin-left: 150px;">
                                    <input type="radio" class="custom-control-input" id="customRadio2" name="jk" value="Perempuan">
                                    <label class="custom-control-label" for="customRadio2">Perempuan</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Tempat<span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="text"  class="form-control" name="tempat"> 
                            </div>
                        </div> 
                         <div class="form-group">
                            <label class="col-md-3 control-label">Tanggal Lahir<span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="date"  class="form-control" name="tgl">
                            </div>
                        </div> 

                        
                        <div class="form-group">
                            <div class="col-md-9">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-success btn-sm waves-effect" anim="ripple">Tambah</button>
                                </div>
                            </div>
                        </div>     
                    </div> 
            </div>
                </form>
            </div>
        </div>
    </section>
</section>
<script type="text/javascript">
    function ganti(status) {
        if(status == 'Suami'){
            document.getElementById('customRadio').disabled=false;
            document.getElementById('customRadio').checked=true;

            document.getElementById('customRadio2').disabled=true;
           
        }
        if(status == 'Istri'){   
            document.getElementById('customRadio2').disabled=false;
            document.getElementById('customRadio2').checked=true;
            document.getElementById('customRadio').disabled=true;
            
        }
        if(status =="Ayah"){
            document.getElementById('customRadio').disabled=false;
            document.getElementById('customRadio').checked=true;

            document.getElementById('customRadio2').disabled=true;
           
        }
        if(status =="Ibu"){
            document.getElementById('customRadio2').disabled=false;
            document.getElementById('customRadio2').checked=true;
            document.getElementById('customRadio').disabled=true;
            
        }
        if(status =="Anak"){
            document.getElementById('customRadio').disabled=false;
            document.getElementById('customRadio2').disabled=false;
        }

    }
</script>

@endsection