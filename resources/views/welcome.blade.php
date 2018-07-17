@extends('layouts/app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Selamat Datang
                </div>

                <div class="card-body">

                    <ul>
                        <li><a href="{{ route('users.index') }}">Senarai Users</a></li>
                        <li><a href="{{ route('assets.index') }}">Senarai Assets</a></li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div><!-- /container -->
@endsection
