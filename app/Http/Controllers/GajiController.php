<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GajiController extends Controller
{
    public function index()
    {
        $pegawai = \App\Pegawai::all();

        return view('gaji.create',compact('pegawai'));
    }

    public function getpegawai($id_pegawai)
    {
        $pegawai = \App\Pegawai::find($id_pegawai);
        $jabatan = \App\Jabatan::all();
        if ($pegawai) {
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
                  <label for="inputIstri">Jumlah istri</label>
                  <input type="text" class="form-control" id="jumlah_istri" disabled="" value="2">
                </div>
                <div class="form-group col-md-8">
                  <label for="inputTunjanganIstri">Besar tunjangan</label>
                  <input type="text" onkeyup="hasil(this.value)" class="form-control" name="tunjagan_istri" id="tunjangan_istri"  
				        	autocomplete="off"  
				         min="0">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="inputAnak">Jumlah Anak</label>
                  <input type="text" class="form-control" id="jumlah_anak" disabled="">
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
}
