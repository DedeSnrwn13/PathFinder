<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('css')
</head>
<body>


{{-- Header --}}
    <div class="container">
        <a class="navbar-brand" href="#">
            <b>Path</b>Finder
        </a>
        <!-- Example split danger button -->
        <div class="btn-group">
        <button type="button" id="menu" class="btn btn-secondary" id="dropdownMenuButton">{{ Auth::user()->nama_depan }} {{ Auth::user()->nama_belakang }}</button>
        <button type="button" id='menu' class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="sr-only">Toggle Dropdown</span>
        </button>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="/logout">LogOut</a>
        </div>
        </div>
    </div>

{{-- EndHeader --}}


{{-- konten --}}
    @yield('content')
{{-- EndKonten --}}

{{-- Footer --}}
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
{{-- EndFooter --}}


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    @yield('footer')
</body>
</html>
