@extends('layouts/app')

@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">

<div class="card card-default">
<div class="card-header">
    <h1 class="card-title text-center">
        <strong>Edit User - {{ $user->name }}</strong>
    </h1>
</div>
<div class="card-body">

    @include('layouts.alerts')

<form action="{{ route('users.update', ['id' => $user->id]) }}" method="POST">

@csrf
@method('patch')

<div class="form-group">
    <label>NAMA</label>
    <input type="text" name="name" class="form-control" value="{{ $user->name }}">
</div>

<div class="form-group">
    <label>EMEL</label>
    <input type="email" name="email" class="form-control" value="{{ $user->email }}">
</div>

<div class="form-group">
    <label>PHONE</label>
    <input type="text" name="phone" class="form-control" value="{{ $user->phone }}">
</div>

<div class="form-group">
    <label>ADDRESS</label>
    <textarea class="form-control">{{ $user->address }}</textarea>
</div>

<div class="form-group">
    <label>PASSWORD</label>
    <input type="password" name="password" class="form-control">
</div>

<div class="form-group">
    <label>ROLE</label>
    <select name="phone" class="form-control">
        <option value="admin" {{ $user->role == 'admin' ? 'selected=selected' : '' }}>Admin</option>
        <option value="user" {{ $user->role == 'user' ? 'selected=selected' : '' }}>User</option>
    </select>
</div>

<button type="submit" class="btn btn-primary">SAVE</button>
<a href="{{ route('users.index') }}" class="btn btn-warning">BACK</a>

</form>


</div>
</div>

</div><!-- /col-md-12 -->
</div><!-- /row -->


</div><!-- /container -->
@endsection
