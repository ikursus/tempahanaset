@extends('layouts/app')

@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">

<div class="card card-default">
<div class="card-header">
    <h1 class="card-title text-center">
        <strong>Edit Tempahan - {{ $tempahan->id }}</strong>
    </h1>
</div>
<div class="card-body">

@include('layouts.alerts')

<form action="{{ route('tempahan.update', ['id' => $tempahan->id]) }}" method="post">

@csrf

<div class="form-group">
    <label>PENGGUNA</label>
    <select name="user_id" class="form-control">
        @foreach( $select_users as $user )
        <option value="{{ $user->id }}" {{ $tempahan->user_id == $user->id ? 'selected=selected' : '' }}>{{ $user->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label>ASSET</label>
    <select name="asset_id" class="form-control">
        @foreach( $select_assets as $asset )
        <option value="{{ $asset->id }}" {{ $tempahan->asset_id == $asset->id ? 'selected=selected' : '' }}>{{ $asset->nama }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label>TARIKH PINJAM</label>
    <input type="date" name="tarikh_pinjam" class="form-control" value="{{ $tempahan->tarikh_pinjam }}">
</div>

<div class="form-group">
    <label>TARIKH PULANG</label>
    <input type="date" name="tarikh_pulang" class="form-control" value="{{ $tempahan->tarikh_pulang }}">
</div>

<div class="form-group">
    <label>NOTA</label>
    <textarea name="nota" class="form-control">{{ $tempahan->nota }}</textarea>
</div>

<button type="submit" class="btn btn-primary">SAVE</button>
<a href="{{ route('tempahan.index') }}" class="btn btn-warning">BACK</a>
</form>


</div>
</div>

</div><!-- /col-md-12 -->
</div><!-- /row -->


</div><!-- /container -->
@endsection
