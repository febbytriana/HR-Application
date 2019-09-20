@extends('layouts.app')

@section('content')

	<section role="main" class="content-body">
		<nav aria-label="breadcumb">
			<ol class="breadcrumb mt-3">
	            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
	            <li class="breadcrumb-item"><a href="{{ route('absenhr.index') }}">Data Absen</a></li>
        		<li class="breadcrumb-item active" aria-current="page">{{ $data->nama }}</li>

       		 </ol>
		</nav>

		<section class="card mt-3">
			<div class="card-header">
				<h4>Detail Absen</h4>
			</div>
			<div class="card-body">
				<section class="card mt-1">
		<div class="pull-left">
			
         <a href="{{ route('absenhr.exportexcel',$pegawais->id_pegawai)}}" style="margin-left: 7px">
          <button class="btn btn-success btn-xs"><i class="fa fa-book"></i> EXCEL</button>
        </a>

		</div>
       
        <br>
					 <table class="table table-striped table-hover" id="data-tbl" width="100%">
		                  <thead>
		                     <tr>
		                        <th style="text-align: center;">No</th>
		                        <th style="text-align: center;">Tanggal</th>
		                        <th style="text-align: center;">Keterangan</th>
		                        <th style="text-align: center;">Alasan</th>
		                        <th style="text-align: center;">Jam Masuk</th>
		                        <th style="text-align: center;">Jam Keluar</th>
		                     </tr>
		                  </thead>

		                  <tbody>
		                  		@foreach($absen as $key => $value)
		                  	<tr>
			                  		<td style="text-align: center;">{{ $key+1 }}</td>
			                  		<td style="text-align: center;">{{ $value->tgl }} {{ $value->bulan }} {{ $value->tahun }}</td>
			                  		<td style="text-align: center;">{{ $value->keterangan }}</td>

				                    @if($value['alasan']!=NULL)
				                      <td style="text-align: center;">{{ $value->alasan }}<	/td>
				                    @endif

				                    @if($value['alasan']==NULL)
				                      <td style="text-align: center;"> Tidak ada alasan. </td>
				                    @endif

			                  		<td style="text-align: center;">{{ $value->jam_masuk }}</td>
			                  		<td style="text-align: center;">{{ $value->jam_keluar }}</td>



		                  	</tr>

		                  		@endforeach
		                  </tbody>
					 </table>
				</section>
			</div>
		</section>
	</section>

@endsection