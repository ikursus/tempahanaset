<div class="form-group">
    <label>PENGGUNA</label>
    {!! Form::select('user_id', $select_users, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <label>ASSET</label>
    {!! Form::select('asset_id', $select_assets, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <label>TARIKH PINJAM</label>
    {!! Form::date('tarikh_pinjam', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <label>TARIKH PULANG</label>
    {!! Form::date('tarikh_pulang', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <label>NOTA</label>
    {!! Form::textarea('nota', null, ['class' => 'form-control']) !!}
</div>

<button type="submit" class="btn btn-primary">SAVE</button>
<a href="{{ route('tempahan.index') }}" class="btn btn-warning">BACK</a>
