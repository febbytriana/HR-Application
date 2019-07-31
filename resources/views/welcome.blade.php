@extends('layouts.welcomeapp')      

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="welcome-title" align="center" style="margin-top: 190px;">
                <h4 style="color: #fff;"><b>Selamat Datang dan Sampai Jumpa Di<br> Human Re-Source Development</b></h4>
                <br>
                <br>
                <a href="{{ route('login') }}" class="bounce">
                    <button class="btn btn-danger btn-lg waves-effect col-md-3" anim="ripple"><h6>Login Sekarang</h6></button>
                </a>
                <br>
            </div>
        </div>
    </div>
</div>
@endsection
