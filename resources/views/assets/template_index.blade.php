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
            <th>HARGA PASARAN</th>
            <th>TINDAKAN</th>
        </tr>
    </thead>

    <tbody>

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
