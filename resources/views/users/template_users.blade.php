@extends('layouts/app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Senarai Users</div>

                <div class="card-body">

                    <p>
                        <a href="{{ route('users.create') }}" class="btn btn-primary">
                            Tambah User
                        </a>
                    </p>

    <div class="table-responsive">
    <table class="table table-hover">

    <thead>
        <tr>
            <th>#</th>
            <th>NAMA</th>
            <th>EMEL</th>
            <th>TINDAKAN</th>
        </tr>
    </thead>

    <tbody>


    @foreach( $senarai_users as $user )
    <tr>
        <td>{{ $user['id'] }}</td>
        <td>{{ $user['name'] }}</td>
        <td>{{ $user['email'] }}</td>
        <td>
            <a href="{{ route('users.edit', ['id' => $user['id']]) }}" class="btn btn-sm btn-info">EDIT</a>
            <a href="#" class="btn btn-sm btn-danger">DELETE</a>
        </td>
    </tr>
    @endforeach

    </tbody>
    </table>
    </div><!--/.table-responsive-->

</div>
</div>
</div>
</div>
</div>
</div><!-- /container -->
@endsection
