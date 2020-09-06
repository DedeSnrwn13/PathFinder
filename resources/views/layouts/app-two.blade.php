<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

    <!-- Yajra DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">

    <!-- Styles -->
    <link href="{{ asset('css/app-two.css') }}" rel="stylesheet">

</head>
<body>

{{-- Header --}}
    <div class="container">
        <a class="navbar-brand" href="/">
            <b>Path</b>Finder
        </a>
        <div class="btn-group float-md-right" >
            <button type="button" class="btn dropdown-toggle my-3" id="user" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->institution_name }}
            </button>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="{{ route('institution.logout') }}"><button class="dropdown-item" type="button"><i class="fas fa-sign-out-alt"></i> Logout</button></a>
            </div>
          </div>
    </div>
{{-- EndHeader --}}

{{-- Navbar --}}
    <ul class="nav nav-pills mb-0 py-2 justify-content-center" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link" id="pills-dashboard-tab" data-toggle="pill" href="#pills-dashboard" role="tab" aria-controls="pills-dashboard" aria-selected="true">Dashboard</a>
        </li>
        <li class="nav-item px-4">
            <a class="nav-link active" id="pills-mystudents-tab" data-toggle="pill" href="#pills-mystudents" role="tab" aria-controls="pills-mystudents" aria-selected="false">My Students</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Institution Profile</a>
        </li>
    </ul>
{{-- EndNavbar --}}

{{-- konten --}}
<main class="">
    @yield('content')
</main>
{{-- EndKonten --}}

{{-- Footer --}}
    <footer class="">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="w-100 foot">
                        <b>Path</b>Finder
                    </div>
                    <div class="w-100 deskripsi">
                        <P>The best solution for both the recruiters <br> and candidates to find the best people <br> at the right place in the right time</P>
                    </div>
                    <div class="w-100 media-social">
                        <img src="{{ asset('uploads/img/facebook.png') }}" alt="">
                        <img src="{{ asset('uploads/img/google-plus.png') }}" alt="">
                        <img src="{{ asset('uploads/img/linkedin.png') }}" alt="">
                        <img src="{{ asset('uploads/img/logo-ig.png') }}" alt="">
                    </div>
                </div>
                <div class="col-md-2 offset"></div>
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
                <div id="right2" class="col-md-2">
                    <h3>Employers</h3>
                    <p class="list"><a href="">Find Candidates</a></p>
                    <p class="list"><a href="">Post Jobs</a></p>
                    <p class="list"><a href="">Online Testing</a></p>
                    <p class="list"><a href="">Online Interview</a></p>
                    <p class="list"><a href="">Buy Products</a></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="copyright">©PathFinder2019</p>
                </div>
            </div>
        </div>
    </footer>
{{-- EndFooter --}}

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- SweetAlerts JS -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Yajra DataTables -->
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script>
        @if(Session::has('sukses'))
            toastr.success("{{ Session::get('sukses') }}", "Sukses")
        @endif
    </script>
    {{-- @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"]) --}}
    @yield('footer')


</body>
</html>
