<!-- Sueldo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sueldo', 'Sueldo:') !!}
    {!! Form::number('sueldo', null, ['class' => 'form-control']) !!}
</div>

<!-- Fechaingreso Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fechaIngreso', 'Fechaingreso:') !!}
    {!! Form::date('fechaIngreso', null, ['class' => 'form-control']) !!}
</div>

<!-- Fechacese Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fechaCese', 'Fechacese:') !!}
    {!! Form::date('fechaCese', null, ['class' => 'form-control']) !!}
</div>

<!-- Obsv Field -->
<div class="form-group col-sm-6">
    {!! Form::label('obsv', 'Obsv:') !!}
    {!! Form::text('obsv', null, ['class' => 'form-control']) !!}
</div>

<!-- Activo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('activo', 'Activo:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('activo', false) !!}
        {!! Form::checkbox('activo', '1', null) !!} 1
    </label>
</div>

<!-- Idsujeto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idSujeto', 'Idsujeto:') !!}
    {!! Form::number('idSujeto', null, ['class' => 'form-control']) !!}
</div>

<!-- Idtipoempleado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idTipoEmpleado', 'Idtipoempleado:') !!}
    {!! Form::number('idTipoEmpleado', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('empleados.index') !!}" class="btn btn-default">Cancel</a>
</div>
