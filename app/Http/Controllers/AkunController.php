<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Pegawai;
use Auth;
use Illuminate\Support\Facades\Hash;
class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response=
     */
    public function index()
    {
        $akuns = User::where('status','=','HR')->get();
        return view('akuns/index', compact('akuns'));
    }
    public function manajerindex()
    {
        $akunmanajers = User::where('status','=','Manajer')->get();
        return view('akunmanajers/index', compact('akunmanajers'));
    }
    public function indexpegawai()
    {
        $akuns = User::where('status','=','Pegawai')->get();
        $pegawais = Pegawai::all();
        return view('akunpegawais/index', compact('akuns','pegawais'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $akun = User::all();
         return view('akuns/create', compact('akun'));
    }
      public function createmanajer()
    {
        $akun = User::all();
         return view('akunmanajers/create', compact('akun'));
    }
    public function createpegawai()
    {
        $akun = User::all();
        $pegawai = Pegawai::all();
        $hitungpegawai = count($pegawai);
         return view('akunpegawais/create', compact('akun','pegawai','hitungpegawai'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        
           $akun = new User;
           $akun->nama = $req->nama;
           $akun->email = $req->email;
           $akun->password = Hash::make($req->password);
           $akun->status = $req->status;
           $akun->save();
           session()->flash('success-create', 'Data Akun berhasil disimpan');

           return redirect('/akun/index');
    }

    public function storemanajer(Request $req)
    {
        
           $akun = new User;
           $akun->nama = $req->nama;
           $akun->email = $req->email;
           $akun->password = Hash::make($req->password);
           $akun->status = $req->status;
           $akun->save();
           session()->flash('success-create', 'Data Akun berhasil disimpan');

           return redirect('/akun/manajerindex');
    }
    /* store-pegawai */
    public function storepegawai(Request $req)
    {
        $pegawai = Pegawai::all();
        $hitungpegawai = count($pegawai);
        if($hitungpegawai > 0){
           $pegawai = Pegawai::select('nama')->where('id_pegawai', $req->id)->first();
           $nama = $pegawai['nama'];
           $akun = new User;
           $akun->nama = $nama;
           $akun->email = $req->email;
           $akun->password = Hash::make($req->password);
           $akun->status = $req->status;
           $akun->save();

           $akun_id = User::select('id')->whereRaw('id = (select max(`id`) from users)')->first();
            $pegawai = Pegawai::find($req->id);
            $pegawai->id_user = $akun_id['id'];
            $pegawai->save();
            return redirect('/akunpegawai/indexpegawai');
        }
        else{
            
        
            
        }
           session()->flash('success-create', 'Data Akun berhasil disimpan');
           
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
        $id = Auth::user()->id;
        $akun = User::find($id);
        $pegawai = Pegawai::all();
        return view('akuns/edit', compact('akun','pegawai'));
    }

    public function editpegawai($id)
    {
        $id = Auth::user()->id;
        $akun = User::find($id);
        $pegawai = Pegawai::all();
        return view('akunpegawais/edit', compact('akun','pegawai'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateakun(Request $req)
    {
        $akun = User::find($req->id);
        $passold = $akun->password;
        if ($req->password != $req->password1) {
            session()->flash('failed-create', 'Password tidak sama');
            return redirect()->back();
        } else{
            $akun->password = Hash::make($req->password);
            $akun->save();
            session()->flash('success-create', 'Password berhasil diubah');
             return redirect('/akun/manajerindex');
        }
    }
    public function update(Request $req)
        {
       $akun = User::find($req->id);   
        $akun->name = $req->name;
        $akun->email = $req->email;
        $akun->password = Hash::make($req->password);
        $akun->status = $req->status;
  
        $akun->save();
        return redirect('/akun/index'); 
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $akun = User::find($id);
        $akun->delete();
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
        return redirect()->back();
    }

    public function destroypegawai($id)
    {
        $akun = User::find($id);
        $akun->delete();
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
        return redirect()->back();
    }
}