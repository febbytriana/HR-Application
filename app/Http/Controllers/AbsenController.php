<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pegawai;
use App\Absen;
use Auth;
use Response;
use Carbon\Carbon;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index(Request $request)
    {
        $qwe=$request->input('alfa');

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
            $date=date('Y-m-d')    ;
            $date2=date('Y-M-d')    ;
            $bulan = date('mmm');


            $id_user = Auth::user()->id;
            $pegawai = Pegawai::where('id_user', $id_user)->first();
            $id_pegawai = $pegawai['id_pegawai'];

            $dataabsen = Absen::select('id_pegawai')->where('id_pegawai', $id_pegawai)->get();

            $hasil = tanggal_indonesia($bulan);

            $bulans =(explode(" ",$hasil));
               $bulanz = $bulans[1];

            $sumsakit = Absen::select('id_pegawai','keterangan')->where('id_pegawai', $id_pegawai)->where('keterangan','=','Sakit')->where('bulan', $bulanz)->count();
            
            $sumizin = Absen::select('id_pegawai','keterangan')->where('id_pegawai', $id_pegawai)->where('keterangan','=','Izin')->where('bulan', $bulanz)->count();
           
            $sumhadir = Absen::select('id_pegawai','keterangan')->where('id_pegawai', $id_pegawai)->where('keterangan','=','Hadir')->where('bulan', $bulanz)->count();
           
           
            $sumtp = Absen::select('id_pegawai','keterangan')->where('id_pegawai', $id_pegawai)->where('keterangan','=','Tanpa Keterangan')->where('bulan', $bulanz)->count();


            $absen = Absen::select('id_absen','id_pegawai','tgl','bulan','tahun','jam_masuk','jam_keluar','keterangan','alasan')->where('id_pegawai',$id_pegawai)->latest()->limit(1)->get();

            $absensi = Absen::where('id_pegawai',$id_pegawai)->get();

            return view('absen.index',compact('dataabsen','id_pegawai','pegawai','sumsakit','sumizin','sumhadir','sumtp','absen','absensi','qwe'));
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_pegawai)
    {

        $id_user = Auth::user()->id;
        $pegawai = Pegawai::select('id_pegawai')->where('id_user', $id_user)->first();
        $id_pegawai = $pegawai['id_pegawai'];


        $dataabsen = Absen::where('id_pegawai', $id_pegawai)->get();

        $absen = Absen::all();
        $pegawais = Pegawai::all();
        $sekarang = Absen::select('id_absen','id_pegawai','tgl','bulan','tahun','jam_masuk','jam_keluar','keterangan','alasan')->latest()->limit(1)->get();

        return view('absen/create', compact('id_pegawai','dataabsen','absen','pegawais','pegawai','sekarang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req, $id_pegawai)
    {

        $absen = new Absen;

        $absen->id_pegawai = $id_pegawai;

        $absen->tgl = $req->tgl;
        $absen->bulan = $req->bulan;
        $absen->tahun = $req->tahun;
        $absen->keterangan = $req->keterangan;
        $absen->alasan = $req->alasan;
        $absen->jam_masuk = $req->jam_masuk;
        $absen->jam_keluar = $req->jam_keluar;
        $absen->save();

        

        $absen = Absen::select('id_absen','id_pegawai','tgl','bulan','tahun')->latest()->limit(1)->get();


        
        session()->flash('success-create', 'Data Absen berhasil disimpan');
        return redirect('/absen/index/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_pegawai, $id_absen)
    {
        $absen = Absen::find($id_absen);
        $pegawai = Pegawai::find($id_pegawai);
        return view('absen/edit', compact('absen','pegawai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req,  $id_pegawai, $id_absen)
    {
        $absen = Absen::find($req->id_absen);
        $absen->id_pegawai = $req->id_pegawai;
        $absen->keterangan = $req->keterangan;
        $absen->alasan = $req->alasan;
        $absen->jam_masuk = $req->jam_masuk;
        $absen->jam_keluar = $req->jam_keluar;
        $absen->save();
        session()->flash('success-create', 'Data Absen berhasil diubah');
        return redirect('/absen/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pegawai,$id_absen)
    {
        $absen = Absen::find($id_absen);
        $absen->delete();
        return redirect()->back();
    }
}
