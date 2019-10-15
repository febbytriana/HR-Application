@php 
    
    function tanggal_indonesia($tgl)
    {
    $tanggal     = substr($tgl,8,2);
    $bulan         = bulan(substr($tgl,5,2));
    $tahun         = substr($tgl,0,4);
    return $tanggal.' '.$bulan.' '.$tahun;
    }

     
    function bulan($bln)
    {
    switch ($bln)
    {
    case 1:
    return "Januari";
    break;
    case 2:
    return "Februari";
    break;
    case 3:
    return "Maret";
    break;
    case 4:
    return "April";
    break;
    case 5:
    return "Mei";
    break;
    case 6:

    return "Juni";
    break;
    case 7:
    return "Juli";
    break;
    case 8:
    return "Agustus";
    break;
    case 9:
    return "September";
    break;
    case 10:
    return "Oktober";
    break;
    case 11:
    return "November";
    break;
    case 12:
    return "Desember";
    break;
    }
    }
    date_default_timezone_set('Asia/Jakarta');
    $date=date('Y-m-d')    ;
    $date2=date('Y-M-d')    ;
    $bulan = date('mmm');
    $jam = date('H:i:s');
@endphp
@extends('layouts.apppegawai')

@section('content')

 <section role="main" class="content-body">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mt-3">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $pegawai->nama }}</li>
        <li class="breadcrumb-item"><a href="{{ route('absen.index',$pegawai->id_pegawai) }}">Absen</a></li>
        <li class="breadcrumb-item active" aria-current="page">Absen Pulang</li>
      </ol>
    </nav>

    <section class="card mt-3">
        <div class="card-header" style="background: #0f5b94; color: #fff;">
                <h5>Absen</h5>
        </div>
        <div class="card-body" style="margin-left:200px;">
            <div class="col-md-24">
                <form action="{{ route('absen.update',['id_pegawai'=>$pegawai->id_pegawai,'id_absen'=>$absen->id_absen]) }}" enctype="multipart/form-data" method="POST">
                    @csrf
             
                    <div class="col-md-12"> 
                        <div class="form-group">
                            <label class="col-md-3 control-label">Tanggal <span class="required">*</span></label>
                            <div class="col-md-9">
                                <input readonly="" id="tanggals" type="text" class="form-control" name="tanggal" value="{{ $absen->tgl }} {{ $absen->bulan }} {{ $absen->tahun }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Keterangan<span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="keterangan" value="{{ $absen->keterangan}}"readonly="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Alasan<span class="required">*</span></label>
                            <div class="col-md-9">
                                 <input type="text" class="form-control" name="alasan" value="{{ $absen->alasan }}"readonly="">
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="col-md-3 control-label">Jam Masuk<span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="jam_masuk" value="{{ $absen->jam_masuk }}"readonly="">
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="col-md-3 control-label">Jam Keluar<span class="required">*</span></label>
                            <div class="col-md-9">
                                <input type="text" id="ct" class="form-control" name="jam_keluar" readonly="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-9">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-success btn-sm waves-effect" anim="ripple">Absen</button>
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

    var inti  = document.getElementById('tanggals').value;
    var pecah = inti.split(" ");
    document.getElementById('tgl').value = pecah[0];
    document.getElementById('bulan').value = pecah[1];
    document.getElementById('tahun').value = pecah[2];
</script>

<script type="text/javascript"> 
    display_ct();
    function display_c(){
    var refresh=1000; // Refresh rate in milli seconds
    mytime=setTimeout('display_ct()',refresh)
    }
        
    function display_ct() {
    var x = new Date();
        h = x.getHours();
        if(h<10)
        {
                h = "0"+h;
        }
        m = x.getMinutes();
        if(m<10)
        {
                m = "0"+m;
        }
        s = x.getSeconds();
        if(s<10)
        {
                s = "0"+s;
        }
    x1 =h+ ":" +  m + ":" + s;
    document.getElementById('ct').value = x1;
    display_c();
    }

</script>

@endsection