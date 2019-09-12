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

        <div class="card-header rounded" style="background-color: #0f5b94; color: #fff;">
            <h4>Dashboard</h2>
        </div>

        <div class="card-body">
          <div class="container">
              <div class="col-md-12">
                  <div class="row">
                    Nama : {{Auth::user()->nama}},<br>
                    Hak Akses : {{Auth::user()->status}}<br>
                  </div>
              </div>
          </div>
        </div>
    </section>
</section>

@endsection
