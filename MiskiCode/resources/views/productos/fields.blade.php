<!-- Cod Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cod', 'Cod:') !!}
    {!! Form::text('cod', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Fecvencimiento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecVencimiento', 'Fecvencimiento:') !!}
    {!! Form::date('fecVencimiento', null, ['class' => 'form-control']) !!}
</div>

<!-- Transformado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('transformado', 'Transformado:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('transformado', false) !!}
        {!! Form::checkbox('transformado', '1', null) !!} 1
    </label>
</div>

<!-- Activo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('activo', 'Activo:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('activo', false) !!}
        {!! Form::checkbox('activo', '1', null) !!} 1
    </label>
</div>

<!-- Idcategoria Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idCategoria', 'Idcategoria:') !!}
    {!! Form::number('idCategoria', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('productos.index') !!}" class="btn btn-default">Cancel</a>
</div>
