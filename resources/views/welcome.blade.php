@extends('layouts.welcomeapp')      

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="welcome-title" align="center" style="margin-top: 190px;">
                <h4 style="color: #fff;"><b>Selamat Datang Di<br>Aplikasi Human Resource Development</b></h4>
                <br>
                <br>
                <a href="{{ route('login') }}">
                    <button class="btn btn-success btn-lg waves-effect col-md-3" anim="ripple"><h6>Masuk</h6></button>
                </a>
                <br>
            </div>
        </div>
    </div>
</div>   
@endsection