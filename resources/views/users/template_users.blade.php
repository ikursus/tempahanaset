@extends('layouts/app')

@section('header')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endsection

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

    <table class="table table-hover" id="users-table">

    <thead>
        <tr>
            <th>#</th>
            <th>NAMA</th>
            <th>EMEL</th>
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
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('users.datatables') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'tindakan', name: 'tindakan'}
        ]
    });
});
</script>

@endsection
