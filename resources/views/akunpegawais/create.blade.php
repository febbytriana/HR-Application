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
                        
                        <div class="tambahElemen">
                            @if( $hitungpegawai > 0 )
                            <label class="control-label">Nama <span class="required">*</span></label>

                            <select class="form-control" id="pilih" name="id"data-show-subtext="true">
                                <option value="cari">-- Cari -- </option>
                               
                                

                                <optgroup label="Akun">

                                        @foreach( $pegawai as $datapegawai )
                                        @if($datapegawai['id_user']!=NULL)

                                         <option data-toggle="tooltip" title="Sudah memiliki akun." disabled="" value="{{ $datapegawai->id_pegawai }}">{{ $datapegawai->nama }} </option>

                                         @endif 

                                         @endforeach

                                </optgroup> 
                                <optgroup label="Kosong">

                                        @foreach( $pegawai as $datapegawais )
                                        @if($datapegawais['id_user']==NULL)

                                         <option value="{{ $datapegawais->id_pegawai }}">{{ $datapegawais->nama }} </option>
                                         @endif 
                                         @endforeach

                                </optgroup> 





                            </select>                                                               
                             @endif
                                
                                
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

<script type="text/javascript">
    function ganti() {
            var data1=document.getElementById('pilih');
            var data2=document.getElementById('nama_baru');
            var ada=document.getElementById('tambah');
            var balik=document.getElementById('back');
            data1.style.display="none";
            ada.style.display="none";
            data2.style.display="inline";
            balik.style.display="inline";
    }

    function back() {
            var data1=document.getElementById('pilih');
            var data2=document.getElementById('nama_baru');
            var ada=document.getElementById('tambah');
            var balik=document.getElementById('back');
            data1.style.display="inline";
            ada.style.display="inline";
            data2.style.display="none";
            balik.style.display="none";
    }

    function hilangkan(val){
        if (val!="cari") {
            var ada=document.getElementById('tambah');
            ada.style.display="none";
        }
        else if(val=="cari"){
            var ada=document.getElementById('tambah');
            ada.style.display="inline";
        }
    }
</script>

@endsection