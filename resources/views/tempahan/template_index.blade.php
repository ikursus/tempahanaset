@extends('layouts/app')

@section('header')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endsection

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
    <table class="table table-hover" id="tempahan-table">

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

    </table>
    </div><!--/.table-responsive-->

</div>
</div>
</div>
</div>
</div>
</div><!-- /container -->
@endsection

@section('script')
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

<script>
$(function() {
    $('#tempahan-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('tempahan.datatables') !!}',
        columns: [
            { data: 'id', name: 'tempahan.id' },
            { data: 'data_pengguna.name', name: 'dataPengguna.name' },
            { data: 'data_asset.nama', name: 'dataAsset.nama' },
            { data: 'tarikh_pinjam', name: 'tempahan.tarikh_pinjam' },
            { data: 'tarikh_pulang', name: 'tempahan.tarikh_pulang' },
            { data: 'nota', name: 'tempahan.nota' },
            { data: 'tindakan', name: 'tindakan', orderable: false, searchable: false }
        ]
    });
});
</script>

@endsection
