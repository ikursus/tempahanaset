@extends('layouts/app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Senarai Users</div>

                <div class="card-body">

                    @include('layouts.alerts')

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
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
            <a href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn btn-sm btn-info">EDIT</a>

            <!-- Button trigger modal delete -->
            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete-{{ $user->id }}">
                Delete
            </button>

            <!-- Modal -->
            <form action="{{ route('users.destroy', ['id' => $user->id]) }}" method="POST">
                @csrf
                @method('delete')

                <div class="modal fade" id="modal-delete-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <p>Adakah anda bersetuju untuk menghapuskan rekod data ini?</p>
                    <ul>
                        <li>ID: {{ $user->id }}</li>
                    </ul>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Delete</button>
                </div>
                </div>
                </div>
                </div>
            </form>

        </td>
    </tr>
    @endforeach

    </tbody>
    </table>
    </div><!--/.table-responsive-->

{!! $senarai_users->links() !!}

</div>
</div>
</div>
</div>
</div>
</div><!-- /container -->
@endsection
