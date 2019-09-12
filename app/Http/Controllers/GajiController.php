<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \PDF;
use Input;


class GajiController extends Controller
{
    public function index()
    {
        $bulan = date('F');
        $pegawai = \App\Pegawai::all();

        return view('gaji.create',compact('pegawai','bulan' ));
    }

    public function getpegawai($id_pegawai)
    {
        $pegawai = \App\Pegawai::find($id_pegawai);
        $jabatan = \App\Jabatan::all();

        $hitungpasangan = \App\Keluarga::where([['id_pegawai',$id_pegawai],['status','=','istri']])->get();
        $hitunganak = \App\Keluarga::where([['id_pegawai',$id_pegawai],['status','=','Anak']])->get();
        $h = count($hitungpasangan);
        $ha = count($hitunganak);

        if ($pegawai) {
            echo ' <div class="form-group">
              <label for="nama">Nama Pegawai</label>
              <input type="text" class="form-control" name="nama" id="nama" readonly="" value="'.$pegawai->nama.'">
            </div><div class="form-group">
                      <label for="jabatan">Jabatan </label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan" 
                            value="'.$pegawai->jabatan['jabatan'].'" readonly="readonly">
                    </div>
                    <div class="form-group">
                      <label for="gaji_pokok">Gaji Pokok  </label>
                        <input type="text" class="form-control" id="gaji_pokok" name="gaji_pokok" 
                        value="'.$pegawai->jabatan['gaji_pokok'].'" readonly="readonly">
                    </div>

                    <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="inputSakit">Sakit</label>
                  <input type="text" class="form-control" id="sakit" disabled="">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputIzin">Izin</label>
                  <input type="text" class="form-control" id="izin" disabled="">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputIzin">Alfa</label>
                  <input type="text" class="form-control" id="alfa" disabled="">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="inputIstri">Hari kerja</label>
                  <input type="text" class="form-control" id="hari_kerja" disabled="" value="20">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputTunjanganIstri">Uang Harian</label>
                  <input type="text" onkeyup="jumlahkan(this.value)" class="form-control" name="uang_harian" id="uang_harian"  
				        	autocomplete="off" min="0" placeholder="0">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputIzin">Nominal</label>
                  <input type="text" class="form-control" id="total_harian" name="gaji_harian" readonly ="">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="inputIstri">Jumlah istri/suami</label>
                  <input type="text" class="form-control" id="jumlah" disabled="" value="'.$h.'">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputTunjanganIstri">Besar tunjangan (%)</label>
                  <input type="text" onkeyup="keluarga(this.value)" class="form-control" name="besar_tunjangan_keluarga" id="tunjangan_keluarga"
                  autocomplete="off" min="0" placeholder="0" value="0">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputIzin">Nominal</label>
                  <input type="text" class="form-control" id="total_tunjangan_keluarga" name="tunjangan_keluarga" readonly="" value="0">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="inputAnak">Jumlah Anak</label>
                  <input type="text" class="form-control" id="jumlah_anak" disabled="" value="'.$ha.'">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputTunjanganAnak">Besar tunjangan</label>
                  <input type="text" onkeyup="anak(this.value)" class="form-control" name="tunjangan_anak" id="tunjangan_anak" autocomplete="off" min="0" placeholder="0">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputIzin">Nominal</label>
                  <input type="text" class="form-control" id="total_tunjangan_anak" name="tunjangan_anak" readonly="" value="0">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputPPH">PPH ( % )</label>
                  <input type="text" class="form-control" onkeyup="totalpph(this.value)" name="pph" id="pph" autocomplete="off" min="0" placeholder="0">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputTunjanganAnak">Nominal</label>
                  <input type="text" class="form-control" name="pph" id="total_pph" placeholder="0" readonly="">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputPPH">PPN ( % )</label>
                  <input type="text" class="form-control" onkeyup="totalppn(this.value)" name="ppn" id="ppn" placeholder="0" autocomplete="off" min="0">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputTunjanganAnak">Nominal</label>
                  <input type="text" class="form-control" name="ppn" id="total_ppn" placeholder="0" readonly="">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="inputIstri">Jam lembur</label>
                  <input type="text" class="form-control" id="lembur" disabled="" value="2">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputTunjanganIstri">Uang lembur</label>
                  <input type="text" class="form-control" onkeyup="totallembur(this.value)" name="gaji_lembur" id="uang_lembur"  
				        	autocomplete="off" min="0" placeholder="0">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputIstri">Nominal</label>
                  <input type="text" class="form-control" id="total_uang_lembur" name="uang_lembur" readonly="">
                </div>
              </div>

              <div class="form-group col-md-4" style="margin-left:527px;">
                <label for="total"><h6>GAJI BERSIH</h6></label>
                <input type="text" class="form-control" name="total" id="gaji_bersih" readonly="readonly" style="height:70px;"  value="'.number_format( $pegawai->jabatan['gaji_pokok'], 0 ,
                '' , '.' ).'">
              </div>
                    ';
        }else{

            echo '<div class="form-group">
            <label for="jabatan">Jabatan </label>
              <input type="text" class="form-control" id="jabatan" name="jabatan" 
                  value="'.$pegawai->jabatan['jabatan'].'" readonly="readonly">
          </div>
          <div class="form-group">
            <label for="gaji_pokok">Gaji Pokok  </label>
              <input type="text" class="form-control" id="gaji_pokok" name="gaji_pokok" 
              value="'.number_format( $pegawai->jabatan['gaji_pokok'], 0 ,
              '' , '.' ).'" readonly="readonly">
          </div>';
        }
    }

    public function store(Request $req)
    {
       $bulan = date('F');
       
       $gaji = new \App\Gaji;
       $gaji->id_pegawai = $req->id_pegawai;
       $gaji->bulan = $bulan;
       $gaji->gaji_pokok = $req->gaji_pokok;
       $gaji->gaji_harian = $req->gaji_harian;
       $gaji->tunjangan_keluarga = $req->tunjangan_keluarga;
       $gaji->tunjangan_anak = $req->tunjangan_anak;
       $gaji->pph = $req->pph;
       $gaji->ppn = $req->ppn;
       $gaji->gaji_lembur = $req->gaji_lembur;
       $gaji->total = $req->total;
       $gaji->save();

       return redirect('/gaji/laporan');
    }

    public function laporan()
    {
      $gaji = \App\Gaji::all();

      return view('gaji.laporangaji', compact('gaji'));
    }
    
    public function cetak_pdf()
    {
      $gaji = \App\Gaji::all();
      $grandtotal = collect($gaji)->sum('total');

      $pdf = PDF::loadview('gaji/reportgaji', compact('gaji','grandtotal'));
    	return $pdf->stream();
    }
    public function cetak_pdf_id($id_gaji)
    {
      $gaji = \App\Gaji::find($id_gaji);
      $jabatan = \App\Jabatan::all();

      $pdf = PDF::loadview('gaji/reportgaji_id', compact('gaji','jabatan'));
    	return $pdf->stream(); 
    }
    public function filter(Request $req)
    {
      //$query = $req->get('bulan');
      $hasil = \App\Gaji::where('bulan','like', '%' . $req->get('bulan') . '%')->get();
      $grandtotal = collect($hasil)->sum('total');

      $pdf = PDF::loadview('gaji/reportfilter', compact('hasil','grandtotal'));
    	return $pdf->stream();
    }
}
