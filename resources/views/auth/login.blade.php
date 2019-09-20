@section('js')
    <script>
        $(document).ready(function(){
            validate();
            $('input').on('keyup',validate);
        });
        function validate() {
            var inputsWithVals = 0;
            var myInputs = $('input:not([type="submit"])');

            myInputs.each(function(e){
                if($(this).val()){
                    inputsWithVals += 1;
                }
            });

            if(inputsWithVals == myInputs.length) {
                $("input[type=submit]").prop("disabled",false);
            }else {
                $("input[type=submit]").prop("disabled",true);
            }
        }
    </script>
@stop
@extends('layouts.loginapp')
@section('content')
            <div class="container">
            <div class="login-box ptb--100">
            <form method="POST" action="{{route('login')}}">
                @csrf
            <div class="card-profile mb-4">
            <div class="card-avatar" style="background-color: #0f5b94">
                <a href="/">
                    <img class="img" src="{{asset('images/logohr.png')}}">
                </a>
            </div>
            </div>
            <div class="login-form-body">
            <div class="form-group row justify-content-center">
                <div class="col-md-10">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email" autofocus placeholder="Email" style="border-top: none; border-right: none; border-left: none; @error('email') border-bottom-color: #d35; @enderror border-radius: 0px;" > 

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Email atau Password Salah!</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
            <div class="form-group row justify-content-center">
                            <div class="col-md-10">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="off" required placeholder="Password" style="border-top: none; border-right: none; border-left: none; border-radius: 0px;">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
            <div class="form-group row justify-content-center">
                            <div class="col-md-10" align="center">
                                <input id="submit" class="btn btn-info btn-submit" type="submit" value="Login">
                            </div>
                        </div>
            </div>
            </form>
            </div>
            </div>
@endsection