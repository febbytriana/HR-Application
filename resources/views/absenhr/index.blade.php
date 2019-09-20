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
	
	<section role="main" class="content-body">
		<nav arial-label="breadcumb">
			<ol class="breadcrumb mt-3">
	            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
	            <li class="breadcrumb-item active" aria-current="page">Absen Pegawai</li>
	       	</ol>
		</nav>

		<section class="card mt-3">
			<div class="card-header">
				<h4>Absen Pegawai</h4>
			</div> 
      <br>

        <br>
        

			<div class="card-body">
				<section class="card mt-1">
					 <table class="table table-striped table-hover" id="data-tbl" width="100%">
                  <thead>
                      <tr>
                          <th style="text-align: center;"  rowspan="2">No</th>
                          <th style="text-align: center;" rowspan="2">Nama</th>
                          <th style="text-align: center;" rowspan="2">Bulan</th>
                          <th style="text-align: center;" colspan="4">Keterangan</th>
                          <th style="text-align: center;" rowspan="2">Detail</th>
                      </tr>
                      <tr>
                      	<th style="text-align: center;">I</th>
                        <th style="text-align: center;">H</th>
                      	<th style="text-align: center;">S</th>	
                      	<th style="text-align: center;">A</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($absenhr as $key => $data)
                      <tr>
                          <td style="text-align: center; font-size: 14px;">{{ $key+1 }}</td>
                          <td align="center" style="font-size: 14px;">{{ $data->nama }}</td>
                          <td align="center" style="font-size: 14px;">
                             @php
                              
                                  {{$hasil= tanggal_indonesia($bulan);

                                      $bulans=(explode(" ",$hasil));
                                      echo $bulans[1];}}
                              @endphp
                          </td>
                          <td align="center" style="font-size: 14px;">{{ $sumizin->where('id_pegawai',$data->id_pegawai)->count() }}</td>
                          <td align="center" style="font-size: 14px;">{{ $sumhadir->where('id_pegawai',$data->id_pegawai)->count() }}</td>
                          <td align="center" style="font-size: 14px;">{{ $sumsakit->where('id_pegawai',$data->id_pegawai)->count() }}</td>
                          <td align="center" style="font-size: 14px;">{{ $sumtp->where('id_pegawai',$data->id_pegawai)->count() }}</td>
                     
                        <td align="center">
                          <a href="{{ route('absenhr.detail',$data->id_pegawai)}}">
                                <i class="fa fa-eye btn-success" style="padding:8px;border-radius:5px;"></i>
                            </a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
              </table>
				</section>
			</div>
		</section>
	</section>
@endsection