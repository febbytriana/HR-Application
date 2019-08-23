<!DOCTYPE html>
<html>
<head>
	<title>Surat Perjalanan</title>
	<link rel="stylesheet" href="/css/app.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body> 
	<style type="text/css">
		table{
            border-collapse: collapse; 
            width: 730px;
        }
        th{
            width:100%;
            position:fixed;
            height:40px;
            background-color : #d3d3d3;
        }
        td{
            height:30px;
        }
        .no{
            width:30px;
        }
        .tgl{
            width:70px;
        }
        .nik{
            width:110px;
        }
        .nama{
            width:130px;
        }
        .kegiatan{
            width:140px;
        }
        .tujuan{
            width:70px;
        }

	</style>
	<center>
		<h2>LAPORAN SURAT PERINGATAN</h2>
	</center>

	<table class='table table-bordered' border="1px">
		<thead>
			<tr>
                <th style="text-align: center;" class="no">No</th>
                <th style="text-align: center;" class="nik">NIK</th>
                <th style="text-align: center;" class="nama">Nama</th>
                <th style="text-align: center;" class="tujuan">Perihal</th>
                <th style="text-align: center;" class="kegiatan">Pelanggaran</th>
                <th style="text-align: center;" class="tgl">Tanggal Pelanggaran</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($surat_peringatan as $key => $value)
			<tr>
                <td style="text-align: center;">{{$key+1}}</td>
                <td style="text-align: center;">{{$value->nik}}</td>
                <td style="text-align: center;">{{$value->nama}}</td>
                <td style="text-align: center;">{{$value->perihal}}</td>
                <td style="text-align: center;">{{$value->pelanggaran}}</td>
                <td style="text-align: center;">{{$value->tgl_pelanggaran}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>