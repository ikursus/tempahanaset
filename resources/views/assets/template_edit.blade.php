@extends('layouts/app')

@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">

<div class="card card-default">
<div class="card-header">
    <h1 class="card-title text-center">
        <strong>Edit Asset</strong>
    </h1>
</div>
<div class="card-body">

@include('layouts.alerts')

<form action="{{ route('assets.update', ['id' => $id]) }}" method="post">

@csrf
@method('patch')

<div class="form-group">
    <label>NAMA</label>
    <input type="text" name="nama" class="form-control">
    {!! $errors->first('nama', '<span style="color:red;">:message</span>') !!}
</div>

<div class="form-group">
    <label>BARCODE</label>
    <input type="text" name="barcode" class="form-control">
    {!! $errors->first('barcode', '<span style="color:red;">:message</span>') !!}
</div>

<div class="form-group">
    <label>TARIKH BELI</label>
    <input type="date" name="tarikh_beli" class="form-control">
    {!! $errors->first('tarikh_beli', '<span style="color:red;">:message</span>') !!}
</div>

<div class="form-group">
    <label>HARGA PASARAN</label>
    <input type="text" name="harga_pasaran" class="form-control">
    {!! $errors->first('harga_pasaran', '<span style="color:red;">:message</span>') !!}
</div>

<div class="form-group">
    <label>JENAMA</label>
    <input type="text" name="jenama" class="form-control">
    {!! $errors->first('jenama', '<span style="color:red;">:message</span>') !!}
</div>

<div class="form-group">
    <label>JENIS</label>
    <select name="jenis" class="form-control">
        <option value="laptop">Laptop</option>
        <option value="pc">PC</option>
        <option value="projector">Projector</option>
        <option value="kamera">Kamera</option>
    </select>
    {!! $errors->first('jenis', '<span style="color:red;">:message</span>') !!}
</div>

<button type="submit" class="btn btn-primary">SAVE</button>
<a href="{{ route('assets.index') }}" class="btn btn-warning">BACK</a>
</form>


</div>
</div>

</div><!-- /col-md-12 -->
</div><!-- /row -->


</div><!-- /container -->
@endsection
