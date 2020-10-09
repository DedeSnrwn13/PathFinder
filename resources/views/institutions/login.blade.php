@extends('layouts.app')
@section('css')
    <link href="{{ asset('css/institutions-signin.css') }}" rel="stylesheet">
@endsection
@section('title', 'Institutions | Sign In')

@section('content')
<div class="jumbotron jumbotron2">
    <div class="container">
        <div class="cardlogin">
            <form action="{{ route('post.login') }}" method="POST">
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
                @if (session('pesan'))
                    <div class="alert alert-danger alert-dismissible show fade mt-3">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>x</span>
                            </button>
                            {{ session('pesan') }}
                        </div>
                    </div>
                @endif
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
