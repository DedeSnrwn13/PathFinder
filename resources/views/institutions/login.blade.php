@extends('layouts.app')
<link href="{{ asset('css/institutions-signin.css') }}" rel="stylesheet">
@section('title', 'Institutions | Sign In')

@section('content')
<div class="jumbotron jumbotron2">
    <div class="container">
        <div class="cardlogin">
            <form action="/institutions/postlogin" method="POST">
                @csrf

                <h3 class="text-center" id="judul"><b>SIGN IN</b></h3>
                <div class="form-group">
                    <input type="email" id="inputemail" placeholder="Email" class="form-control email_input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="password" id="inputpassword" placeholder="Password" class="form-control password @error('password') is-invalid @enderror" name="password">
                    <img src="{{ asset('uploads/img/human-eye-shape.png') }}" alt="" class="showpw" onclick="myFunction()">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-secondary text-center" id="btn_signin">SIGN IN</button>
                    <a href="/institutions/register" id="btn_signup">Don't have an account?</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('footer')
<script>
    @if(Session::has('successMsg'))
    swal({
        text: "Hello world!",
    });
    @endif

    function myFunction() {
        var pw1 = document.getElementById("inputpassword");

        if (pw1.type === "password") {
            pw1.type = "text";
        } else {
            pw1.type = "password";
        }
    }
</script>
@endsection
