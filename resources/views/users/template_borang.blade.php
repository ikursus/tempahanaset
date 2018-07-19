<div class="form-group">
    <label>NAMA</label>
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<span style="color:red;">:message</span>') !!}
</div>

<div class="form-group">
    <label>EMEL</label>
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
    {!! $errors->first('email') !!}
</div>

<div class="form-group">
    <label>PHONE</label>
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <label>NO. KP</label>
    {!! Form::text('ic', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <label>ADDRESS</label>
    {!! Form::textarea('address', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <label>PASSWORD</label>
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <label>ROLE</label>
    {!! Form::select('role', ['admin' => 'Admin', 'user' => 'User'], null, ['class' => 'form-control']) !!}
</div>

<button type="submit" class="btn btn-primary">SAVE</button>
<a href="{{ route('users.index') }}" class="btn btn-warning">BACK</a>
