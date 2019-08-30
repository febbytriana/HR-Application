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
      <div class="card-body">
        <div class="col-md-12">
          <form action="" enctype="multipart/form-data" method="POST">
            @csrf 
            <form>
              <div class="form-group">
                <label for="inputPegawai">NIK</label>
                <input class="form-control" list="pegawai" name="id_pegawai" id="id_pegawai" autocomplete="off" oninput="showPegawai(this.value)" autofocus="">
                <datalist id="pegawai"                >
	                @foreach ($pegawai as $p)
	                  <option value="{{$p->nik}}">{{$p->nama}}</option>
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
                  <input type="text" class="form-control" name="jabatan" id="jabatan" readonly="">
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
                  <label for="inputIstri">Jumlah istri</label>
                  <input type="text" class="form-control" id="jumlah_istri" readonly="">
                </div>
                <div class="form-group col-md-8">
                  <label for="inputTunjanganIstri">Besar tunjangan</label>
                  <input type="text" class="form-control" name="tunjagan_istri" id="tunjangan_istri"  
				        	autocomplete="off" min="0">
                </div>
              </div>
              
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="inputAnak">Jumlah Anak</label>
                  <input type="text" class="form-control" id="jumlah_anak" readonly="">
                </div>
                <div class="form-group col-md-8">
                  <label for="inputTunjanganAnak">Besar tunjangan</label>
                  <input type="text" class="form-control" name="tunjagan_anak" id="tunjangan_anak">
                </div>
              </div>
              <div class="form-group">
                <label for="inputPPH">PPH</label>
                <input type="text" class="form-control" name="pph" id="pph">
              </div>
              <div class="form-group">
                <label for="inputPPN">PPN</label>
                <input type="text" class="form-control" name="ppn" id="ppn">
              </div>
              <div class="form-group">
                <label for="inputLembur">Lembur (jam)</label>
                <input type="text" class="form-control" name="lembur" id="lembur">
              </div>
              </div>
              <div class="form- col-md-4" style="margin-left: auto;">
                <label for="total"><h6>GAJI BERSIH</h6></label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Rp.</span>
                  </div>
                  <input type="text" class="form-control" name="total" id="gaji_bersih" readonly="readonly" style="height:70px;">
                </div>
              </div>
              <button type="submit" class="btn btn-primary btn-submit">Simpan</button>
          </form>
        </form>
      </div>
    </div>
  </section>
</section>

@endsection

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
      $('#nama').val('');
      $('#jabatan').val('');
      $('#gaji_pokok').val('');
      $('#jumlah_istri').val('');
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

  function hasil(tunjangan_istri)
  {
    var jumlah_istri=document.getElementById("jumlah_istri").value;
    var gaji=tunjangan_istri*jumlah_istri;
    document.getElementById("gaji_bersih").value=convertToRupiah(gaji);
  }

  function convertToRupiah(angka)
  {

      var rupiah = '';    
      var angkarev = angka.toString().split('').reverse().join('');
      
      for(var i = 0; i < angkarev.length; i++) 
        if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
      
      return rupiah.split('',rupiah.length-1).reverse().join('');
  
  }
</script>

@stop

