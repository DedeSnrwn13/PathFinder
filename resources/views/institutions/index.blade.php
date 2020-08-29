@extends('layouts.app')
<link href="{{ asset('css/institutions-landing.css') }}" rel="stylesheet">
@section('title', 'Institutions Page')

@section('content')
    <div class="jumbotron text-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="display-4 text-center">Increase the possibility of your students <br>
                        get recruited by companies with <span><strong>Path</strong>Finder</span>
                    </h1>
                </div>
                <div class="col-md-12">
                    <a href="/institutions/register" class="btn register">Register</a>
                </div>
                <div class="col-md-12">
                    <a href="/institutions/login" class="sigin">I already have an account</a>
                </div>
            </div>
        </div>
    </div>
@endsection


