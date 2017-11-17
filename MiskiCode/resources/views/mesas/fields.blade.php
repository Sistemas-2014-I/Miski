<!-- Cod Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cod', 'Cod:') !!}
    {!! Form::text('cod', null, ['class' => 'form-control']) !!}
</div>

<!-- Numcomensales Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numComensales', 'Numcomensales:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('numComensales', false) !!}
        {!! Form::checkbox('numComensales', '1', null) !!} 1
    </label>
</div>

<!-- Idestadomesa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idEstadoMesa', 'Idestadomesa:') !!}
    {!! Form::number('idEstadoMesa', null, ['class' => 'form-control']) !!}
</div>

<!-- Idseccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idSeccion', 'Idseccion:') !!}
    {!! Form::number('idSeccion', null, ['class' => 'form-control']) !!}
</div>

<!-- Idpiso Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idPiso', 'Idpiso:') !!}
    {!! Form::number('idPiso', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('mesas.index') !!}" class="btn btn-default">Cancel</a>
</div>
