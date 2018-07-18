@extends('layouts/app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Senarai Tempahan
                </div>

                <div class="card-body">

                    @include('layouts/alerts')

                    <p>
                        <a href="{{ route('tempahan.create') }}" class="btn btn-primary">
                            Tempahan Baru
                        </a>
                    </p>


    <div class="table-responsive">
    <table class="table table-hover">

    <thead>
        <tr>
            <th>#</th>
            <th>PENGGUNA</th>
            <th>ASSET</th>
            <th>TARIKH PINJAM</th>
            <th>TARIKH PULANG</th>
            <th>NOTA</th>
            <th>TINDAKAN</th>
        </tr>
    </thead>

    <tbody>

        @foreach ( $senarai_tempahan as $tempahan )

        <tr>
            <td>{{ $tempahan->id }}</td>
            <td>{{ $tempahan->user_id }}</td>
            <td>{{ $tempahan->asset_id }}</td>
            <td>{{ $tempahan->tarikh_pinjam }}</td>
            <td>{{ $tempahan->tarikh_pulang }}</td>
            <td>{{ $tempahan->nota }}</td>
            <td>
                <a href="{{ route('tempahan.edit', ['id' => $tempahan->id]) }}" class="btn btn-sm btn-info">Edit</a>

                <!-- Button trigger modal delete -->
                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete-{{ $tempahan->id }}">
                    Delete
                </button>

                <!-- Modal -->
                <form action="{{ route('tempahan.destroy', ['id' => $tempahan->id]) }}" method="POST">
                    @csrf
                    @method('delete')

                    <div class="modal fade" id="modal-delete-{{ $tempahan->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <li>ID: {{ $tempahan->id }}</li>
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

</div>
</div>
</div>
</div>
</div>
</div><!-- /container -->
@endsection
