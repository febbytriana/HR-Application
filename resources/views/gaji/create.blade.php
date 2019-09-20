@extends('layouts.app')

@section('content')

 <section role="main" class="content-body" id="main">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mt-3">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
        <li class="breadcrumb-item"><a href="{{ route('pegawai.index') }}">Data Pegawai</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
      </ol>
    </nav>

    <section class="card mt-3">
      <div class="card-header">
        <h4>Perhitungan Gaji Karyawan</h2>
      </div>
      <div class="card-body" style="margin-left:200px;">
        <div class="col-md-24">
          <form action="{{ route('gaji.store') }}" enctype="multipart/form-data" method="POST">
            @csrf 
            <form>
              <div class="form-group">
                  <label for="inputJabatan">Bulan</label>
                  <input type="text" class="form-control" name="bulan" id="bulan" disabled="" value="{{$bulan}}">
              </div>
              <div class="form-group">
                <label for="inputPegawai">Pegawai</label>
                <input class="form-control" list="pegawai" name="id_pegawai" id="id_pegawai" autocomplete="off" onchange="showPegawai(this.value)" autofocus="">
                <datalist id="pegawai"                >
	                @foreach ($pegawai as $p)
	                  <option value="{{$p->id_pegawai}}">{{$p->nama}}</option>
	                @endforeach 
	              </datalist>
              </div>
              <div class="pegawaiview" id="pegawaiview">
                <div class="form-group">
                  <label for="nama">Nama Pegawai</label>
                  <input type="text" class="form-control" name="nama" id="nama" readonly="">
                </div>
                <div class="form-group">
                  <label for="inputJabatan">Jabatan</label>
                  <input type="text" class="form-control" name="id_jabatan" id="id_jabatan" disabled="">
                </div>
                <div class="form-group">
                  <label for="inputGajiPokok">Gaji Pokok</label>
                  <input type="text" class="form-control" name="gaji_pokok" id="gaji_pokok" readonly="">
                </div>

              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="inputSakit">Sakit</label>
                  <input type="text" class="form-control" id="sakit" readonly="">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputIzin">Izin</label>
                  <input type="text" class="form-control" id="izin" readonly="">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputIzin">Alfa</label>
                  <input type="text" class="form-control" id="alfa" readonly="">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="inputIstri">Hari kerja</label>
                  <input type="text" class="form-control" id="hari_kerja" disabled="">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputTunjanganIstri">Uang Harian</label>
                  <input type="text" class="form-control" name="uang_harian" id="uang_harian"  
				        	autocomplete="off" min="0" placeholder="0">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputIzin">Nominal</label>
                  <input type="text" class="form-control" id="total_harian" name="gaji_harian" readonly="">
                </div>
              </div>
              
  
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="inputIstri">Jumlah istri/suami</label>
                  <input type="text" class="form-control" id="jumlah" disabled="">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputTunjanganIstri">Besar tunjangan ( % )</label>
                  <input type="text" class="form-control" name="besar_tunjangan_keluarga" id="tunjangan_keluarga"  
				        	autocomplete="off" min="0" placeholder="0">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputIzin">Nominal</label>
                  <input type="text" class="form-control" id="total_tunjangan_keluarga" name="tunjangan_keluarga" readonly="">
                </div>
              </div>
              
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="inputAnak">Jumlah Anak</label>
                  <input type="text" class="form-control" id="jumlah_anak" readonly="">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputTunjanganAnak">Besar tunjangan ( % )</label>
                  <input type="text" class="form-control" name="besar_tunjangan_anak" id="tunjangan_anak" placeholder="0">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputIzin">Nominal</label>
                  <input type="text" class="form-control" id="total_tunjangan_anak" name="tunjangan_anak" readonly="">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputPPH">PPH ( % )</label>
                  <input type="text" class="form-control" name="besar_pph" id="pph" placeholder="0">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputTunjanganAnak">Nominal</label>
                  <input type="text" class="form-control" name="pph" id="total_pph" placeholder="0" readonly="">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputPPH">PPN ( % )</label>
                  <input type="text" class="form-control" name="besar_ppn" id="ppn" placeholder="0">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputTunjanganAnak">Nominal</label>
                  <input type="text" class="form-control" name="ppn" id="total_ppn" placeholder="0" readonly="">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="inputIstri">Jam lembur</label>
                  <input type="text" class="form-control" id="lembur" disabled="">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputTunjanganIstri">Uang lembur</label>
                  <input type="text" class="form-control" name="uang_lembur" id="uang_lembur"  
				        	autocomplete="off" min="0" placeholder="0">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputIstri">Nominal</label>
                  <input type="text" class="form-control" id="total_uang_lembur" name="gaji_lembur" readonly="">
                </div>
              </div>

              

              <div class="form-group col-md-4" style="margin-left:527px;">
                <label for="total"><h6>GAJI BERSIH</h6></label>
                <input type="text" class="form-control" name="total" id="gaji_bersih" readonly="readonly" style="height:70px;" value="0">
              </div>
            
            </div>

              <button type="submit" class="btn btn-primary">Simpan</button>
              <input type="button" value="=" onclick="hasil()" class="btn btn-success" style="position:absolute; margin: -75px 0px 0px 400px;">
          </form>
        </form>
      </div>
    </div>
  </section>
</section>

<script type="text/javascript">
  function showPegawai(str) 
	{
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN':
        $('meta[name="csrf-token"]').attr('content')
      }
    });
	  if (str == "") {
	    $('#jabatan').val('');
      $('#gaji_pokok').val('');
      $('#jumlah_istri').val('');
      $('#jumlah_anak').val('');
      $('#total').val('');
	    $('#reset').hide();
	    return;
	  } else {    
	    if (window.XMLHttpRequest) {
	        xmlhttp = new XMLHttpRequest();
	    } else {
	        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	    }
	      xmlhttp.onreadystatechange = function() {
	        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                 
	        document.getElementById("pegawaiview").innerHTML = xmlhttp.responseText;
      }
	  }
	    xmlhttp.open("GET", "/getpegawai/"+str,true);
	    xmlhttp.send();
	  }
	}
  function hasil()
	{
    alert("Lihat hasil?");
    var gaji = document.getElementById("gaji_pokok").value;
    var gajih=gaji.split(".");
    var gajiint=gajih[0]+gajih[1]+gajih[2];

    var subtotal0 = document.getElementById("total_harian").value;
    var subtotal1 = document.getElementById("total_tunjangan_keluarga").value;
    var subtotal2 = document.getElementById("total_tunjangan_anak").value;
    var subtotal3 = document.getElementById("total_ppn").value;
    var subtotal4 = document.getElementById("total_pph").value;
    var subtotal5 = document.getElementById("total_uang_lembur").value;

    var hasil=parseInt(gajiint)+parseInt(subtotal0)+parseInt(subtotal1)+parseInt(subtotal2)+parseInt(subtotal3)+parseInt(subtotal4)+parseInt(subtotal5);
    document.getElementById("gaji_bersih").value = hasil;
  } 
  
  function jumlahkan(val){
    var hari = document.getElementById("hari_kerja").value;
    var hasil = hari*val;
    document.getElementById("total_harian").value = hasil;
  }

  function keluarga(tunjangan_keluarga){
    var gaji_bersih=document.getElementById("gaji_bersih").value;
    var gaji = document.getElementById("gaji_pokok").value;
    var gajih=gaji.split(".");
    var gajiint=gajih[0]+gajih[1]+gajih[2];
    var jumlah = document.getElementById("jumlah").value;

    var hasil = jumlah*tunjangan_keluarga*parseInt(gajiint)/100;
    document.getElementById("total_tunjangan_keluarga").value = hasil;
  }

  function anak(tunjangan_anak){
    var gaji = document.getElementById("gaji_pokok").value;
    var gajih=gaji.split(".");
    var gajiint=gajih[0]+gajih[1]+gajih[2];
    var jumlah = document.getElementById("jumlah_anak").value;

    var hasil = jumlah*tunjangan_anak*parseInt(gajiint)/100;
    document.getElementById("total_tunjangan_anak").value = hasil;
  }

  function totalpph(val){
    var gaji = document.getElementById("gaji_pokok").value;
    var gajih=gaji.split(".");
    var gajiint=gajih[0]+gajih[1]+gajih[2];

    var hasil = val*parseInt(gajiint)/100;
    document.getElementById("total_pph").value = hasil;
  }

  function totalppn(val){
    var gaji = document.getElementById("gaji_pokok").value;
    var gajih=gaji.split(".");
    var gajiint=gajih[0]+gajih[1]+gajih[2];

    var hasil = val*parseInt(gajiint)/100;
    document.getElementById("total_ppn").value = hasil;
  }

  function totallembur(val){
    var jam_lembur = document.getElementById("lembur").value; 

    var hasil = jam_lembur*val;
    document.getElementById("total_uang_lembur").value = hasil;
  }

</script>

@section('js')
<script type="text/javascript">
      document.getElementById('main').addEventListener("load",resetGaji());
      function resetGaji() {
        $('#gaji_bersih').val('');
      }
      function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#showgambar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#inputgambar").change(function () {
        readURL(this);
    });

</script>
@endsection

@endsection

