@extends('layouts/app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Senarai Assets
                </div>

                <div class="card-body">

                    @include('layouts/alerts')

                    <p>
                        <a href="{{ route('assets.create') }}" class="btn btn-primary">
                            Tambah Asset
                        </a>
                    </p>


    <div class="table-responsive">
    <table class="table table-hover">

    <thead>
        <tr>
            <th>#</th>
            <th>NAMA</th>
            <th>BARCODE</th>
            <th>TARIKH BELI</th>
            <th>HARGA PASARAN (RM)</th>
            <th>TINDAKAN</th>
        </tr>
    </thead>

    <tbody>

        @foreach ( $senarai_assets as $asset )

        <tr>
            <td></td>
            <td>{{ $asset['nama'] }}</td>
            <td>{{ $asset['barcode'] }}</td>
            <td>{{ $asset['tarikh_beli'] }}</td>
            <td>{{ $asset['harga_pasaran'] }}</td>
            <td>
                <a href="{{ route('assets.edit', ['id' => $asset['id']]) }}" class="btn btn-sm btn-info">Edit</a>

                <!-- Button trigger modal delete -->
                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete-{{ $asset['id'] }}">
                    Delete
                </button>

                <!-- Modal -->
                <form action="{{ route('users.destroy', ['id' => $asset['id']]) }}" method="POST">
                    @csrf
                    @method('delete')

                    <div class="modal fade" id="modal-delete-{{ $asset['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <li>ID: {{ $asset['id'] }}</li>
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
