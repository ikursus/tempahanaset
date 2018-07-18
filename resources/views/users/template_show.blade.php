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
                        <a href="{{ route('tempahan.create') }}" class="btn btn-primary">
                            Tambah Tempahan
                        </a>
                    </p>

    @if ( count( $user->showAssets ) )

    <div class="table-responsive">
    <table class="table table-hover">

    <thead>
        <tr>
            <th>#</th>
            <th>ASSET</th>
            <th>TARIKH PINJAM</th>
            <th>TARIKH PULANG</th>
        </tr>
    </thead>

    <tbody>


    @foreach( $user->showAssets as $item )
    <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->dataAsset->nama }}</td>
        <td>{{ $item->tarikh_pinjam }}</td>
        <td>{{ $item->tarikh_pulang }}</td>
    </tr>
    @endforeach

    </tbody>
    </table>
    </div><!--/.table-responsive-->
    @else

    <div class="alert alert-info">
        Tiada rekod pinjaman asset.
    </div>

    @endif


</div>
</div>
</div>
</div>
</div>
</div><!-- /container -->
@endsection
