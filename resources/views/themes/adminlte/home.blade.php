@extends('themes.adminlte.master')

@section('content')
<h1>Homepage</h1>
<p>Selamat Datang {{ Auth::user()->name }}!</p>
@endsection
