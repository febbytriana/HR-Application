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
	<table>
        <tr>
            <td width="30%">
                <b style="font-size:18px;color:navy;">PT.GAMMA SOLUTION</b>
                <br>
                Jl.Somawinata Ruko Dream<br>Square No.1
            </td>
            <td><center><h2>SLIP GAJI</h2></center></td>
            <td width="30%" align="right">Tanggal : {{date('d - m - Y')}}</td>
        </tr>
    </table>

    <hr>

    <table>    
        <tr>
            <td width="50%"><b>NIK :{{$gaji->pegawai->nik}} </b></td>
        </tr>
        <tr>
            <td width="50%">Nama : {{$gaji->pegawai->nama}}</td> 
        </tr>
        <tr>
            <td width="50%">Alamat : {{$gaji->pegawai->alamat}}</td>
        </tr>
    </table>

    <hr>
    <p style="text-align:right;"><b>Bulan : {{$gaji->bulan}}</b></p>

    <hr>
    <table>
        <tr>
            <th style="width:70px;text-align:center">NO.</th>
            <th style="width:395px;">Keterangan</th>
            <th style="text-align:center;width:200px;">Jumlah</th>
        </tr>
        <tr>
            <td style="text-align:center;">1</td>
            <td>Gaji pokok</td>
            <td style="text-align:center;">Rp.{{number_format("$gaji->gaji_pokok",2,",",".") }}</td>
        </tr>
        <tr>
            <td style="text-align:center;">2</td>
            <td>Gaji harian</td>
            <td style="text-align:center;">Rp.{{number_format("$gaji->gaji_harian",2,",",".") }}</td>
        </tr>
        <tr>
            <td style="text-align:center;">3</td>
            <td>Tunjangan keluarga</td>
            <td style="text-align:center;">Rp.{{number_format("$gaji->tunjangan_keluarga",2,",",".") }}</td>
        </tr>
        <tr>
            <td style="text-align:center;">4</td>
            <td>Tunjangan anak</td>
            <td style="text-align:center;">Rp.{{number_format("$gaji->tunjangan_anak",2,",",".") }}</td>
        </tr>
        <tr>
            <td style="text-align:center;">5</td>
            <td>PPH</td>
            <td style="text-align:center;">Rp.{{number_format("$gaji->pph",2,",",".") }}</td>
        </tr>
        <tr>
            <td style="text-align:center;">6</td>
            <td>PPN</td>
            <td style="text-align:center;">Rp.{{number_format("$gaji->ppn",2,",",".") }}</td>
        </tr>
        <tr>
            <td style="text-align:center;">7</td>
            <td>Lembur</td>
            <td style="text-align:center;">Rp.{{number_format("$gaji->gaji_lembur",2,",",".") }}</td>
        </tr>
        <tr>
            <td style="text-align:center;"></td>
            <td></td>
            <td style="text-align:center;"><hr><p style="position:absolute;margin:-30px 0px 0px 190px;">(+)</p></td>
        </tr>
        <tr>
            <td style="text-align:center;"></td>
            <td><b>Total</b></td>
            <td style="text-align:center;">Rp.{{number_format("$gaji->total",2,",",".") }}</td>
        </tr>

        <p style="margin-left:550px;padding-top:100px;">Ngamprah, {{date('d-m-Y')}}
        <br>
        <b>HR PT.Gamma Solution</b>
        <br><br><br><br>
        <b><u>abcd</u></b>
        </p>
    </table>

	

</body>
</html>