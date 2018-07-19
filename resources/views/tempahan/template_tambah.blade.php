@extends('layouts/app')

@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">

<div class="card card-default">
<div class="card-header">
    <h1 class="card-title text-center">
        <strong>Tempahan Baru</strong>
    </h1>
</div>
<div class="card-body">

@include('layouts.alerts')

{!! Form::open(['route' => 'tempahan.store']) !!}
@include('tempahan/template_borang')
{!! Form::close() !!}


</div>
</div>

</div><!-- /col-md-12 -->
</div><!-- /row -->


</div><!-- /container -->
@endsection
