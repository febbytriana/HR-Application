@extends('layouts.app')

@section('content')

<div  class="head-title">
  <h2>Detail Pegawai</h2>
  <!-- Nav tabs -->
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb mt-3">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
        <li class="breadcrumb-item"><a href="{{ route('pegawai.index') }}">Pegawai</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail</li>
    </ol>
  </nav>
</div>

<div class="row">
  <div class="tab-content">
    <div id="sertifikat" class="container tab-pane fade"><br>
      <div class="container">
        <span class="title-head">-- Sertifikat --</span>
        <div class="pull-right">
          <a class="btn btn-info btn-xs pull-right" href="{{ route('pegawai.sertifikat', $pegawais->id_pegawai)}}"><i class="fa fa-plus fa-fx"></i> Tambah</a>
        </div>
      </div>

     
      <div class="container">
        <div class="row">

          <div class="col-md-12">
            <section class="card mt-2 mb-4">
                 @foreach($sertifikat as $s)
                  <div class="card-body" style="border: 1px solid #c0c2ce;">
                      <div class="profile-left">
                        <!-- begin profile-image -->
                        <div class="profile-image">
                          <a href="index.php?page=form-ganti-foto&amp;id_kar=16" title="ganti foto">
                            <img src="{{ asset('images/2.jpg') }}" width="160" height="300"></a>
                        </div>
                        <!-- end profile-image -->  
                      </div>
                      <div class="profile-right-tab" style="margin-bottom: 80px;">
                        <p><b style="font-size: 22px;">{{$s->nama_event}}</b><i>({{$s->tahun_event}}</i>)</p>
                        <span style="font-size: 14px;">Prestasi yang diraih : <b>{{$s->ket_prestasi}}</b></span>
                      </div>
                      <div class="pull-right">
                        <a href="">
                          <button class="btn btn-success btn-xs"><i class="fa fa-edit"></i> Edit</button>
                        </a>
                        <a href="">
                          <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button>
                        </a>
                      </div>
                  </div>
                @endforeach
            </section>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  var nick=document.getElementById("ada").value;
  var nickname=nick.split(" ");
  if (nickname.length>=2) {
    document.getElementById("panggilan").innerHTML=nickname[0]+" "+nickname[1];  
  }
  else{
    document.getElementById("panggilan").innerHTML=nickname[0];
  }
  

</script>

@endsection