<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;
use App\Absen;
use Auth;
use DB;
use Response;
use App\Exports\AbsenExport;
use App\Exports\AbsenAllExport;
use Maatwebsite\Excel\Facades\Excel;

class AbsenHRController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


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

            $hasil = tanggal_indonesia($bulan);

            $bulans =(explode(" ",$hasil));
               $bulanz = $bulans[1];

             $id_pegawai = Pegawai::select('id_pegawai')->get();

             $absen = Absen::all();
        
            $sumsakit = $absen->where('keterangan','=','Sakit')->where('bulan',$bulanz);
            
            $sumizin = $absen->where('keterangan','=','Izin')->where('bulan',$bulanz);
           
            $sumtp = $absen->where('keterangan','=','Tanpa Keterangan')->where('bulan',$bulanz);

            $sumhadir = $absen->where('keterangan','=','Hadir')->where('bulan', $bulanz);
         
            

        $absenhr = Pegawai::all();
        
        return view('absenhr.index',compact('absenhr','absen','sumtp','sumsakit','sumizin','sumhadir'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function detail($id_pegawai){
        $pegawai = Pegawai::where('id_pegawai','=',$id_pegawai)->get();
        $pegawais = Pegawai::find($id_pegawai); 
        $data = Pegawai::all()->where('id_pegawai',$id_pegawai)->first();
        $absen = Absen::all()->where('id_pegawai',$id_pegawai);

        return view('absenhr.detail', compact('pegawai','pegawais','absen','data'));
    }
    public function export($id_pegawai = NULL) 
    {
        if(!empty($id_pegawai)){

        return Excel::download(new AbsenExport($id_pegawai), 'absen.xlsx');

        }else{

        return Excel::download(new AbsenAllExport, 'absenAll.xlsx');

        }
    }

}
