<!DOCTYPE html>
<html>
<head>
	<title>Surat Perjalanan</title>
	<link rel="stylesheet" href="/css/app.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body> 
	<center>
		<h2>LAPORAN SURAT PERJALANAN</h2>
	</center>

	@foreach($surat as $value)
	<table>
	<tr>
			<td><b>NIK</b></td>
			<td>:</td>
			<td><b>{{$value-> pegawai['nik']}}</b></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td>{{$value->pegawai['nama']}}</td>
		</tr>
		<tr>
			<td>Tujuan</td>
			<td>:</td>
			<td>{{$value['tujuan']}}</td>
		</tr>
		<tr>
			<td>Kegiatan</td>
			<td>:</td>
			<td>{{$value['kegiatan']}}</td>
		</tr>
		<tr>
			<td>Sponsor</td>
			<td>:</td>
			<td>{{$value['sponsor']}}</td>
		</tr>
		<tr>
			<td>Tgl.Berangkat</td>
			<td>:</td>
			<td>{{$value['tgl_berangkat']}}</td>
		</tr>
		<tr>
			<td>Tgl.Pulang</td>
			<td>:</td>
			<td>{{$value['tgl_pulang']}}</td>
		</tr>
	</table>
	@endforeach

</body>
</html>