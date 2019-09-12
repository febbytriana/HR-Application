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
    $date=date('Y-m-d')    ;
    $date2=date('Y-M-d')    ;
    $bulan = date('mmm');


@endphp

@extends('layouts.app')

@section('content')

                <style type="text/css">
                    th,td{
                        text-align: center;
                    }
                </style>


<section role="main" class="content-body">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item active" aria-current="page">Absen Pegawai</li>
        </ol>
    </nav>

    <section class="card mt-3">
        <div class="card-header">
              <h4>Absen Pegawai</h4>
        </div>
        <div class="card-body">
            <section class="card mt-1">
                
        @if(Auth::user()->status == "Pegawai" )
                <span>Nama : {{ $pegawai->nama }}</span>

                <span>Nama : {{ $pegawai->jabatan['jabatan']}}</span>
                sakit :
                <span>{{ $sumsakit }}</span>
                izin : 
                <span>{{ $sumizin }}</span>
                tanpa keterangan :
                <span>{{ $sumtp }}</span>
            </section>
            <div class=pull-right>

                @foreach($absen as $absens)
                    <input hidden="" type="text" id="tanggal" value="{{ $absens['tgl'] }}-{{ $absens['bulan'] }}-{{ $absens['tahun'] }}">
                    <input hidden="" type="text" id="tanggal_sekarang" name="">
                    <input hidden="" type="text" id="database" name="" >
                    <input type="text" name="alfa" id="alfa">

                <div id="keluar">
                    <a href="{{ route('absen.edit',['id_pegawai'=>$pegawai->id_pegawai,'id_absen'=>$absens->id_absen]) }}"> 
                    <button class="btn btn-info">Keluar</button>
                </a>
                </div>

                <div id="tambah">
                    <a href="{{ route('absen.create', $pegawai['id_pegawai']) }}"> 
                    <button class="btn btn-info">Absen</button>
                </a>
                </div>

                
                @endforeach

           
                <input type="" value="{{$qwe}}" name="">

                
                
            </div>
        
            <br>
            <br>    
            <table class="table table-striped table-hover" id="data-id" width="100%">

                <tr>
                    <th colspan="6">
                    @php
                    
                        {{$hasil= tanggal_indonesia($bulan);

                            $bulans=(explode(" ",$hasil));
                            echo $bulans[1];}}
                    @endphp
                    </th>
                </tr>
                <tr>
                    <th rowspan="2" style="padding-top: 30px;">No.</th>
                    <th rowspan="2" style="padding-top: 30px;">Tanggal</th>
                    <th rowspan="2" style="padding-top: 30px;">Keterangan</th>
                    <th rowspan="2" style="padding-top: 30px;">Alasan</th>
                    <th colspan="2">Jam</th>
                </tr>
                <tr>
                    <th>Masuk</th>
                    <th>Keluar</th>
                </tr>

                    @foreach($absen as $key => $data)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $data->tgl }}
                        {{ $data->bulan }}  
                        {{ $data->tahun }}</td>
                    <td>{{ $data->keterangan }}</td>

                    @if($data['alasan']!=NULL)
                      <td>{{ $data->alasan }}</td>
                    @endif

                    @if($data['alasan']==NULL)
                      <td> Tidak ada alasan. </td>
                    @endif

                    <td>{{ $data->jam_masuk }}</td>
                    <td>{{ $data->jam_keluar }}</td>
                </tr>

                    @endforeach


            </table>
                
        @endif

        @if(Auth::user()->status == "HR" )
                <span>tidak ada data.</span>
        @endif
      </div>

      
    </section>
</section>



@endsection