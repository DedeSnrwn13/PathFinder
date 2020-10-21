

@extends('layouts.app')
@section('title', 'Employer | Login ')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/login_employer.css') }}">
@endsection

@section('content')

{{-- FormLogin --}}

    <div class="bg">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="cardlogin">
                        <form method="POST" action="/postlogin">
                            {{ csrf_field() }}

                            <h3 class="text-center" id="judul"><b>SIGN IN</b></h3>

                            <div class="form-group">
                                <input type="Email" id="inputemail" name="email" placeholder="Email"  class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}">
                                @if ($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <input type="password" name="password" placeholder="Password" class="form-control" id="inputpassword">
                                <img src="{{ asset('images/human-eye-shape.png') }}" class="tombol" alt="" onclick="myFunction()">
                                @if ($errors->has('password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-secondary" id="btn_signin">SIGN IN</button>
                            <small id="emailHelp" class="form-text text-center"><a href="/employer/signup">I don't have an account</a></small>
                        </form>
                    </div>
                </div>
                <div class="col-md-7" >
                    <h3 id="judulkanan">Here are some of <b>Path</b>Finder's features</h3>
                    <div class="kontenkanan">
                        <h4>Conduct your own online testing</h4>
                    </div>
                    <div class="kontenkanan">
                        <h4>Interview your candidates online</h4>
                    </div>
                    <div class="kontenkanan" id="tiga">
                        <h4>Costumizable recruitment process</h4>
                    </div>
                    <div class="kontenkanan" id="empat">
                        <h4>Quiker response to candidates</h4>
                    </div>
                </div>
            </div>
        </div>

{{-- EndFormLogin --}}

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
