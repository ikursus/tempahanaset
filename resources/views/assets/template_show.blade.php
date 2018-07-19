@extends('layouts/app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Senarai Pengguna Asset - {{ $asset->nama }}</div>

                <div class="card-body">

                    @include('layouts.alerts')

                    <p>
                        <a href="{{ route('assets.index') }}" class="btn btn-warning">
                            BACK
                        </a>
                    </p>

    @if ( count( $asset->showTempahan ) )

    <div class="table-responsive">
    <table class="table table-hover">

    <thead>
        <tr>
            <th>#</th>
            <th>PENGGUNA</th>
            <th>TARIKH PINJAM</th>
            <th>TARIKH PULANG</th>
        </tr>
    </thead>

    <tbody>


    @foreach( $asset->showTempahan as $item )
    <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->dataPengguna->name }}</td>
        <td>{{ $item->tarikh_pinjam }}</td>
        <td>{{ $item->tarikh_pulang }}</td>
    </tr>
    @endforeach

    </tbody>
    </table>
    </div><!--/.table-responsive-->
    @else

    <div class="alert alert-info">
        Tiada rekod pengguna asset {{ $asset->nama }}.
    </div>

    @endif

</div>
</div>
</div>
</div>
</div>
</div><!-- /container -->
@endsection
