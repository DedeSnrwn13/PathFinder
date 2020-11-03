<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/pilihan.css') }}">
    <title>Log In | Pathfinder</title>
</head>
<body>
<div class="container">
    <a href="/" class="text-decoration-none"><h1><b>Path</b>Finder</h1></a>
        <p><b>Account Login As:</b></p>
    <div class="row pilihan">
        <a href="jobseekers/signin">
            <button>Job Seeker</button>
        </a>
        <a href="employer/signin">
            <button>Employer</button>
        </a>
        <a href="/institutions/login">
            <button>Institution</button>
        </a>
    </div>
</div>
</body>
</html>

