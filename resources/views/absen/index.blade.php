@extends('layouts.app')

@section('content')

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

        @if(Auth::user()->status == "Pegawai" )
            <div class=pull-right>
                <a href="{{ route('absen.create', $pegawai['id_pegawai']) }}"> 
                    <button class="btn btn-info">Absen</button>
                 </a>
            </div>
        @endif
            <br>
            <br>    
            <table class="table table-striped table-hover" id="data-id" width="100%">
                <tr>
                    <th style="" rowspan="3">No.</th>
                    <th style="text-align: center;" rowspan="3">Nama</th>
                    <th style="text-align: center;" colspan="15">Bulan</th>
                </tr>
                <tr>
                    <td style="text-align: center;" colspan="3">Jan</td>
                    <td style="text-align: center;" colspan="3">Feb</td>
                    <td style="text-align: center;" colspan="3">Mar</td>
                    <td style="text-align: center;" colspan="3">Jun</td>
                    <td style="text-align: center;" colspan="3">Jul</td>
                </tr>
                <tr>

                    @for($a = 1; $a <= 5; $a++)
                            <th>I</th>
                            <th>S</th>
                            <th>A</th>
                    
                    @endfor

                </tr>
                <tr>

                </tr>


            </table>
      </div>
    </section>
</section>
@endsection