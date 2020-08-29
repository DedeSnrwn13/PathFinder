@extends('layouts.app')
<link href="{{ asset('css/institutions-signup.css') }}" rel="stylesheet">
@section('title', 'Institutions | Sign Up')

@section('content')
<div class="jumbotron jumbotron2">
    <div class="container">
        <div class="cardlogin">
            <form action="/institutions/postregister" method="POST">
                @csrf
                {{-- @method('POST') --}}

                <h3 class="text-center" id="judul"><b>SIGN UP</b></h3>
                <div class="form-group">
                    <input type="text" id="inputfirstname" placeholder="First Name" class="form-control firstname {@error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}">
                    @error('firstname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('firstname') }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" id="inputlastname" placeholder="Last Name" class="form-control lastname @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}">
                    @error('lastname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="email" id="inputemail" placeholder="Email" class="form-control email_input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" id="inputphone" placeholder="Active Phone Number" class="phone_input @error('contact') is-invalid @enderror" name="contact" value="{{ old('contact') }}">
                    @error('contact')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('contact') }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" id="inputinstitution" placeholder="Institutions Name" class="form-control institution_input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="password" id="inputpassword01" placeholder="Password" class="form-control password @error('password') is-invalid @enderror" name="password">
                    <img src="{{ asset('uploads/img/human-eye-shape.png') }}" alt="" class="showpw" onclick="myFunction()">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="password" id="inputpassword02" placeholder="Confirm Password" class="form-control password_confirmation  @error('password_confirmation') is-invalid @enderror" name="password_confirmation">
                    <img src="{{ asset('uploads/img/human-eye-shape.png') }}" alt="" class="showpw" onclick="myFunction1()">
                    @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @enderror
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label ml-2" for="exampleCheck1">I have read and agree with <b>Path</b>Finder's Terms and Conditions, Privacy Policy, and End User License Agreement</label>
                </div>
                <button type="submit" class="btn btn-secondary text-center" id="btn_signup">SIGN UP</button>
                <a href="/institutions/login" id="btn_signin">I already have an account</a>
            </form>
        </div>
    </div>
</div>
<div class="message"></div>
@endsection


@section('footer')
<script>
    @if(Session::has('sukses'))
        swal({
            text: "You have successfully joined PathFinder", "Please activate your account by clicking the link on the confirmation email we have just sent you",
            buttons: "SEND AGAIN",
            timer: 30000,
        });
    @endif

    function myFunction() {
        var pw1 = document.getElementById("inputpassword01");

        if (pw1.type === "password") {
            pw1.type = "text";
        } else {
            pw1.type = "password";
        }
    }

    function myFunction1() {
        var pw2 = document.getElementById("inputpassword02");

        if (pw2.type === "password") {
            pw2.type = "text";
        } else {
            pw2.type = "password";
        }
    }

</script>
@endsection
