@extends('layouts.app')
@section('content')

  <section role="main" class="content-body">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item active" aria-current="page">Beranda</li>
        </ol>
    </nav>

    <section class="card shadow mt-3">

        <section class="panel">
            @if(session()->has('success-create'))
            <div class="row-md-5">
                <div class="alert alert-success"> 
                    <center>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        &times;
                        </button>
                        <strong>Berhasil</strong><br>
                        {{ session()->get('success-create') }}
                    </center>
                </div>
            </div>
            @endif

            @if(session()->has('failed-create'))
            <div class="row-md-5">
                <div class="alert alert-danger"> 
                    <center>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        &times;
                        </button>
                        <strong>Gagal</strong><br>
                        {{ session()->get('failed-create') }}
                    </center>
                </div>
            </div>
            @endif
        </section>

        <div class="main-content-inner">
                <div class="row">
                    <!-- seo fact area start -->
                    <div class="col-lg-12 ">
                        <div class="row">
                            <div class="col-md-4 mt-5 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg3">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-user"></i> Pegawai</div>
                                            <h2>{{$jumlah_pegawai}}</h2>
                                        </div>
                                        <canvas id="seolinechart1" height="25"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mt-md-5 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg1">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-book"></i>Perjalanan</div>
                                            <h2>{{$jumlah_perjalanan}}</h2>
                                        </div>
                                        <canvas id="seolinechart2" height="25"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mt-md-5 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg2">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-book"></i>SP</div>
                                            <h2>{{$jumlah_sp}}</h2>
                                        </div>
                                        <canvas id="seolinechart2" height="25"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
            </div>
    </section>
</section>

@endsection
