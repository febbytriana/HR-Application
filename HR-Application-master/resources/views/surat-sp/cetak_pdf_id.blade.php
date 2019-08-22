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
			<td>Perihal</td>
			<td>:</td>
			<td>{{$value['perihal']}}</td>
		</tr>
		<tr>
			<td>Pelanggaran</td>
			<td>:</td>
			<td>{{$value['pelanggaran']}}</td>
		</tr>
		<tr>
			<td>Tanggal Pelanggaran</td>
			<td>:</td>
			<td>{{$value['tgl_pelanggaran']}}</td>
		</tr>
		<tr>
			<td>Tanggal Menghadap HRD</td>
			<td>:</td>
			<td>{{$value['tgl_menghadap_hrd']}}</td>
		</tr>
		<tr>
			<td>Mulai Skorsing</td>
			<td>:</td>
			<td>{{$value['mulai_skorsing']}}</td>
		</tr>
        <tr>
			<td>Akhir Skorsing</td>
			<td>:</td>
			<td>{{$value['selesai_skorsing']}}</td>
		</tr>
	</table>
	@endforeach

</body>
</html>