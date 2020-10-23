@extends('layouts.app')
@section('css')
    <link href="{{ asset('css/institutions-signup.css') }}" rel="stylesheet">
@endsection
@section('title', 'Institutions | Sign Up')

@section('menu')
<a class="nav-link" href="{{ route('jobseekers.signin') }}">Job Seekers</a>
<a class="nav-link " href="/employer/signin">Employers</a>
<a class="nav-link active" href="{{ route('landing') }}">Institutions</a>
<a class="nav-link" href="/signup">Register</a>
<a class="nav-link" href="/signin">Sign in</a>
@endsection

@section('content')
<div class="jumbotron jumbotron2">
    @if(Session('suksesregister'))
    {{-- <div id="closed"></div> --}}
    <div class="popup-wrapper" id="popup">
        <div class="popup-container">
            <form action="" method="GET" class="popup-form">
                @csrf
                <span>{{ session('suksesregister') }}<b>PathFinder</b></span>
                <p>Please activate your account by clicking the link on the confirmation email we have just sent you</p>
                <div class="sukesregister">
                    {{-- <button type="submit" id="send_again" name="send_again" onclick="sendEmail($data, $institution);">SEND AGAIN</button> --}}
                    <a href="/institutions/login" value="" id="sign_in" name="sign_in">SIGN IN</a>
                </div>
                {{-- <a class="popup-close" href="#closed">X</a> --}}
            </form>
        </div>
    </div>
    @endif
    <div class="container">
        <div class="cardlogin">
            <form action="{{ route('post.register') }}" method="POST">
                @csrf
                {{-- @method('POST') --}}

                <h3 class="text-center" id="judul"><b>SIGN UP</b></h3>
                <div class="form-group">
                    <input type="text" id="inputfirstname" placeholder="First Name" class="form-control firstname {@error('nama_depan') is-invalid @enderror" name="nama_depan" value="{{ old('nama_depan') }}">
                    @error('nama_depan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('nama_depan') }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" id="inputlastname" placeholder="Last Name" class="form-control lastname @error('nama_belakang') is-invalid @enderror" name="nama_belakang" value="{{ old('nama_belakang') }}">
                    @error('nama_belakang')
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
                    <input type="text" id="inputphone" placeholder="Active Phone Number" class="form-control phone_input @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ old('no_hp') }}">
                    @error('no_hp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('no_hp') }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" id="inputinstitution" placeholder="Institutions Name" class="form-control institution_input @error('nama_sekolah') is-invalid @enderror" name="nama_sekolah" value="{{ old('nama_sekolah') }}">
                    @error('nama_sekolah')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('nama_sekolah') }}</strong>
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
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
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
    // @if(Session::has('sukses'))
    //     swal({
    //         text: "You have successfully joined PathFinder", "Please activate your account by clicking the link on the confirmation email we have just sent you",
    //         buttons: "SEND AGAIN",
    //         timer: 30000,
    //     });
    // @endif

    // @if(Session::has('suksesregister'))
    //     setTimeout(function() {
    //         swal({
    //             title: "Wow!",
    //             text: "Message!",
    //             type: "success"
    //         }, function() {
    //             window.location = {{ route('login') }}
    //         });
    //     }, 1000);
    // @endif

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

    // $(document).ready(function() {
    //     $("#btn_signup").click( function() {
    //         var firstname = $("#inputfirstname").val();
    //         var lastname = $("#inputlastname").val();
    //         var email = $("#inputemail").val();
    //         var contact = $("#inputphone").val();
    //         var name = $("#inputinstitution").val();
    //         var password = $("#inputpassword01").val();
    //         var password_confirmation = $("#inputpassword02").val();


    //         if (firstname.length == "") {
    //             Swal.fire({
    //                 type: 'warning',
    //                 title: 'Oops...',
    //                 text: {{ $errors->first('firstname') }}
    //             });

    //         } else if(lastname.length == "") {

    //             Swal.fire({
    //                 type: 'warning',
    //                 title: 'Oops...',
    //                 text: {{ $errors->first('firstname') }}
    //             });

    //         } else if(email.length == "") {

    //             Swal.fire({
    //                 type: 'warning',
    //                 title: 'Oops...',
    //                 text: {{ $errors->first('email') }}
    //             });

    //         } else if(contact.length == "") {

    //             Swal.fire({
    //                 type: 'warning',
    //                 title: 'Oops...',
    //                 text: {{ $errors->first('contact') }}
    //             });

    //         }  else if(name.length == "") {

    //             Swal.fire({
    //                 type: 'warning',
    //                 title: 'Oops...',
    //                 text: {{ $errors->first('name') }}
    //             });

    //         } else if(password.length == "") {

    //             Swal.fire({
    //                 type: 'warning',
    //                 title: 'Oops...',
    //                 text: {{ $errors->first('password') }}
    //             });

    //         } else if(password_confirmation.length == "") {

    //             Swal.fire({
    //                 type: 'warning',
    //                 title: 'Oops...',
    //                 text: {{ $errors->first('password_confirmation') }}
    //             });

    //         }  else {

    //             //ajax
    //             $.ajax({
    //                 url: {{ route('post.register') }},
    //                 type: "POST",
    //                 data: {
    //                     "firstname": firstname,
    //                     "lastname": lastname,
    //                     "email": email,
    //                     "contact": contact,
    //                     "institution": institution,
    //                     "password": pass1,
    //                     "password_confirmation": pass2,
    //                 },

    //                 success:function(response){
    //                     if (response == "success") {
    //                         Swal.fire({
    //                             type: 'success',
    //                             title: 'Register Berhasil!',
    //                             text: 'silahkan login!'
    //                         });

    //                         $("#inputfirstname").val('');
    //                         $("#inputlastname").val('');
    //                         $("#inputemail").val('');
    //                         $("#inputphone").val('');
    //                         $("#inputinstitution").val('');
    //                         $("#inputpassword01").val('');
    //                         $("#inputpassword02").val('');
    //                     } else {

    //                         Swal.fire({
    //                             type: 'error',
    //                             title: 'Register Gagal!',
    //                             text: 'silahkan coba lagi!'
    //                         });
    //                     }
    //                     console.log(response);
    //                 },

    //                 error:function(response){
    //                     Swal.fire({
    //                         type: 'error',
    //                         title: 'Opps!',
    //                         text: 'server error!'
    //                     });
    //                 }
    //             })
    //         }
    //     });
    // });

</script>
@endsection
