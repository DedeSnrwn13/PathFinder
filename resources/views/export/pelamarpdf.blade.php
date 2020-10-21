@php
            $i = 1;
        @endphp
<form method="post" action="/">
        @csrf
        @method("patch")

<input type="hidden" name="id" value="{{$pelamar->id}}">
<h1>{{ $pelamar->nama }}</h1>
</form>
@php
            $i++;
@endphp
