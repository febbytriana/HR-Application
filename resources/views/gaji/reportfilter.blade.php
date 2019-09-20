<!DOCTYPE html>
<html>
<head>
	<title>Laporan Gaji Karyawan</title>
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
		<h2>LAPORAN GAJI KARYAWAN</h2>
	</center>

	<table class='table table-bordered' border="1px">
		<thead>
			<tr>
                <th style="text-align: center;width:30px;">No</th>
                <th style="text-align: center;">Nama</th>
                <th style="text-align: center;">Gaji Pokok</th>
                <th style="text-align: center;">Bulan</th>
                <th style="text-align: center;">Gaji bersih</th>
			</tr>
		</thead>    
		<tbody>
            @foreach($hasil as $key=>$h)
                <tr>
                    <td>{{$key+1}}</td>
                     <td>{{$h->pegawai->nama}}</td>
                     <td>Rp.{{number_format("$h->gaji_pokok",2,",",".")}}</td>
                     <td>{{$h->bulan}}</td>
                     <td>Rp.{{number_format("$h->total",2,",",".")}}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="4"><b>Grandtotal</b></td>
                <td align="center">Rp.{{number_format("$grandtotal",2,",",".")}}</td>
            </tr>
		</tbody>
	</table>

</body>
</html>