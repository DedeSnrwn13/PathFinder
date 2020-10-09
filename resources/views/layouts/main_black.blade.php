<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/style_black.css') }}">
    @yield('css')
</head>
<body>
<div class="nav">
    <div class="container">
        <a class="navbar-brand" href="#">
            <b>Path</b>Finder
        </a>
        <div class="navbar-tengah">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-link" href="#">Job Seekers</a>
                            <a class="nav-link active" href="#">Employers</a>
                            <a class="nav-link" href="/">Institutions</a>
                            <a class="nav-link" href="#">Register</a>
                            <a class="nav-link" href="#">Sign in</a>
                            <div class="btn-group">
                                <img class="bahasa" src="{{ asset('uploads/img/united-states.png') }}" alt="">
                                <img id="toggle" class="dropdown-toggle dropdown-toggle-split" src="{{ asset('uploads/img/drop.png') }}" alt="" id="dropdownMenuReference" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
                                </button>
                                <div class="dropdown-menu" id="lebar">
                                <a class="dropdown-item" href="#"><img src="{{ asset('uploads/img/united-states.png') }}" alt=""></a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
    </div>
</div>

{{-- konten --}}
    @yield('content')

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <a href="#" class="foot">
                        <b>Path</b>Finder
                    </a>
                    <P class="deskripsi">The best solution for both the recruiters <br> and candidates to find the best people <br> at the right place in the right time</P>
                </div>
                <div id="right" class="col-md-2">
                    <h3>About Us</h3>
                        <p class="list"><a href="">Our Profile</a></p>
                        <p class="list"><a href="">Careers</a></p>
                </div>
                <div id="right1" class="col-md-2">
                    <h3>Job Seekers</h3>
                        <p class="list"><a href="">Find Jobs</a></p>
                        <p class="list"><a href="">Build Profile</a></p>
                </div>
                <div id="right1" class="col-md-2">
                    <h3>Employers</h3>
                        <p class="list"><a href="">Find Candidates</a></p>
                        <p class="list"><a href="">Post Jobs</a></p>
                        <p class="list"><a href="">Online Testing</a></p>
                        <p class="list"><a href="">Online Interview</a></p>
                        <p class="list"><a href="">Buy Products</a></p>
                </div>
            </div>
        </div>
    </footer>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- SweetAlerts JS -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>

    <script>
        @if(Session::has('sukses'))
            toastr.success("{{ Session::get('sukses') }}", "Sukses")
        @endif
    </script>

    @yield('footer')
</body>
</html>
