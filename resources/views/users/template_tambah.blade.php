@extends('layouts/app')

@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">

<div class="card card-default">
<div class="card-header">
    <h1 class="card-title text-center">
        <strong>Tambah User</strong>
    </h1>
</div>
<div class="card-body">

@include('layouts.alerts')

<form action="{{ route('users.store') }}" method="post">

@csrf

<div class="form-group">
    <label>NAMA</label>
    <input type="text" name="name" class="form-control">
    {!! $errors->first('name', '<span style="color:red;">:message</span>') !!}
</div>

<div class="form-group">
    <label>EMEL</label>
    <input type="email" name="email" class="form-control">
    {!! $errors->first('email') !!}
</div>

<div class="form-group">
    <label>PHONE</label>
    <input type="text" name="phone" class="form-control">
</div>

<div class="form-group">
    <label>ADDRESS</label>
    <textarea class="form-control">
    </textarea>
</div>

<div class="form-group">
    <label>PASSWORD</label>
    <input type="password" name="password" class="form-control">
</div>

<button type="submit" class="btn btn-primary">SAVE</button>

</form>


</div>
</div>

</div><!-- /col-md-12 -->
</div><!-- /row -->


</div><!-- /container -->
@endsection
