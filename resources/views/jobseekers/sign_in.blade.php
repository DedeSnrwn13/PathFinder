@extends('layouts.app')


@section('title', 'Jobseekers | Login ')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/login_employer.css') }}">
@endsection

@section('menu')
<a class="nav-link active" href="{{ route('jobseekers.signin') }}">Job Seekers</a>
<a class="nav-link " href="{{ route('employer.signin') }}">Employers</a>
<a class="nav-link" href="/institutions/login">Institutions</a>
<a class="nav-link" href="/signup">Register</a>
<a class="nav-link" href="/signin">Sign in</a>
@endsection

@section('content')

{{-- FormLogin --}}

    <div class="bg">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="cardlogin">
                        <form method="POST" action="{{ route('jobseekers.post.signin') }}">
                            {{ csrf_field() }}

                            <h3 class="text-center" id="judul"><b>SIGN IN</b></h3>

                            <div class="form-group">
                                <input type="Email" id="inputemail" name="email" placeholder="Email"  class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="password" name="password" placeholder="Password" class="form-control" id="inputpassword">
                                <img src="{{ asset('images/human-eye-shape.png') }}" class="tombol" alt="" onclick="showpw()">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-secondary" id="btn_signin">SIGN IN</button>
                            {{-- <small id="emailHelp" class="form-text text-center"><a href="/employer/signup">I don't have an account</a></small> --}}
                        </form>
                    </div>
                </div>
                <div class="col-md-7" >
                    <h3 id="judulkanan">Here are some of <b>Path</b>Finder's features</h3>
                    <div class="kontenkanan">
                        <h4>Search Your Most Fever Job</h4>
                    </div>
                    <div class="kontenkanan">
                        <h4>nterview online with Company</h4>
                    </div>
                    <div class="kontenkanan" id="tiga">
                        <h4>Online Testing Feature</h4>
                    </div>
                    <div class="kontenkanan" id="empat">
                        <h4>Quicker response From Company</h4>
                    </div>
                </div>
            </div>
        </div>

{{-- EndFormLogin --}}

@endsection

@section('footer')
<script>

    function showpw() {
        var pswrd = document.getElementById("inputpassword");

        if (pswrd.type === "password") {
            pswrd.type = "text";
        } else {
            pswrd.type = "password";
        }
    }
</script>
