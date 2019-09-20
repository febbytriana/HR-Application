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
        <li class="breadcrumb-item active" aria-current="page">Absensi</li>
      </ol>
    </nav>

    <section class="card mt-3">
        <div class="card-header">
                <h4>Absensi</h2>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <form action="{{ route('absen.store',['id_pegawai'=>$pegawai->id_pegawai]) }}" method="POST">
                    @csrf
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Tanggal <span class="required">*</span></label>
                            <div class="col-md-9">
                                <input id="tanggals" type="text" class="form-control" name="tanggal" value="@php {{echo tanggal_indonesia($date); }} @endphp" readonly="">
                                <input type="text" hidden="" name="tgl" id="tgl">
                                <input type="text" hidden="" name="bulan" id="bulan">
                                <input type="text" hidden="" name="tahun" id="tahun">
                                @foreach($sekarang as $data)
                                    <input type="" value="{{$data->tgl}}" id="db">
                                @endforeach
                                <input type="text" id="pas" name="db">
                                
                            </div>
                        </div>

                   		 <div class="form-group">
                            <label class="col-md-3 control-label">Keterangan <span class="required">*</span></label>
                            <div class="col-md-9">
                                <select name="keterangan" id="keterangan" class="custom-select">
                                    <option value=""></option>
                                    <option value="Izin">Izin</option>
                                    <option value="Hadir">Hadir</option>
                                    <option value="Sakit">Sakit</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group" >
                            <label class="col-md-3 control-label">Alasan <span class="required">*</span></label>    
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="alasan">
                            </div>
                        </div>
                        <div class="form-group" >
                            <label class="col-md-3 control-label">Jam Masuk <span class="required">*</span></label>
                            <div class="col-md-9">
                                <input id="ct" type="text" class="form-control" name="jam_masuk" readonly="">
                            </div>
                        </div>


                        
	                    <div class="form-group">
	                            &nbsp;<button type="submit" class="btn btn-primary">Absen</button>
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


    switch(pecah[1]){
        case "Januari":
         var tanggal="01";
        break;
        case "Februari":
         var tanggal="02";
        break;
        case "Maret":
         var tanggal="03";
        break;
        case "April":
         var tanggal="04";
        break;
        case "Mei":
         var tanggal="05";
        break;
        case "Juni":
         var tanggal="06";
        break;
        case "Juli":
         var tanggal="07";
        break;
        case "Agustus":
         var tanggal="08";
        break;
        case "September":
         var tanggal="09";
        break;
        case "Oktober":
         var tanggal="10";
        break;
        case "November":
         var tanggal="11";
        break;
        case "Desember":
         var tanggal="12";
        break;
    }
    var hari=new Date();
    var sekarang=hari.getDate();
    var data=document.getElementById('db').value;
     document.getElementById('pas').value=sekarang-data;
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