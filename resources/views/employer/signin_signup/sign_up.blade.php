
@extends('layouts.app')
@section('title', 'Employer | Register ')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/register_employer.css') }}">
@endsection

@section('menu')
<a class="nav-link" href="{{ route('jobseekers.signin') }}">Job Seekers</a>
<a class="nav-link active" href="{{ route('employer.signin') }}">Employers</a>
<a class="nav-link" href="/institutions/login">Institutions</a>
<a class="nav-link" href="/signup">Register</a>
<a class="nav-link" href="/signin">Sign in</a>
@endsection

@section('content')

{{-- FormLogin --}}

    <div class="jumbotron jumbotron2">
        <div class="container">
            <div class="cardlogin">
                <form method="POST" action="/employer/signup">
                    {{ csrf_field() }}
                    <h3 class="text-center" id="judul"><b>SIGN UP</b></h3>

                    <div class="form-group">
                        <input type="text" id="inputfirstname" name="firstname" class="first {{ $errors->has('firtname') ? 'is-invalid' : '' }}" placeholder="First Name" class="form-control" value="{{ old('firstname') }}">
                        @if ($errors->has('firstname'))
                            <div class="ivalid-feedback">
                                {{ $errors->first('firstname') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <input type="text" id="inputlastname" name="lastname" class="last" placeholder="Last Name" class="form-control {{ $errors->has('lastname') ? 'is-invalid' : '' }}" value="{{ old('lastname') }}">
                        @if ($errors->has('lastname'))
                            <div class="invalid-feedback">
                                {{ $errors->first('lastname') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <input type="Email" id="inputemail" name="email" placeholder="Email"  class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}">
                        @if ($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <input type="password" id="inputpassword" name="password" placeholder="Password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="myInput">
                        <img src="{{ asset('images/human-eye-shape.png') }}" class="tombol" alt="" onclick="myFunction()">
                        @if ($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <input type="password" id="inputpassword1" name="password_confirmation" placeholder="Confirm Password" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" id="myInput1">
                        <img src="{{ asset('images/human-eye-shape.png') }}" class="tombol" alt="" onclick="myFunction1()">
                        @if ($errors->has('password_confirmation'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password_confirmation') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group form-check">
                        <input type="checkbox" name="acc" class="form-check-input" id="exampleCheck1" required>
                        <label class="form-check-label" required for="exampleCheck1">I have read and agree with <b>Path</b>Finder's Terms and Conditions, Privacy Policy, and End User License Agreement</label>
                    </div>
                    <button type="submit" class="btn btn-secondary" id="btn_signin">SIGN UP</button>
                </form>
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

    function myFunction1() {
        var pw2 = document.getElementById("inputpassword1");

        if (pw2.type === "password") {
            pw2.type = "text";
        } else {
            pw2.type = "password";
        }
    }
    </script>
@endsection
