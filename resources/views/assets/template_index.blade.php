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
                <button type="button" class="btn btn-sm btn-danger">Delete</button>
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
