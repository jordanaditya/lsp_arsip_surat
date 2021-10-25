@extends('layouts.main')

@section('container')
    <div id="left" class='mt-3'>
        <h1>{{ $title }}</h1>
        <img src="img/{{ $image }}" alt="{{ $name }}" width="200"
            class="img-thumbnail rounded-circle float-left">
    </div>
    <div id="right">
        <h5><b>Aplikasi Ini dibuat oleh :</b></h5>
        <h5>Nama : {{ $name }}</h5>
        <h5>NIM : {{ $nim }}</h5>
        <h5>Tanggal : {{ $tanggal }}</h5>
    </div>

@endsection
