<!-- Mtoprecio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mtoPrecio', 'Mtoprecio:') !!}
    {!! Form::number('mtoPrecio', null, ['class' => 'form-control']) !!}
</div>

<!-- Activo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('activo', 'Activo:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('activo', false) !!}
        {!! Form::checkbox('activo', '1', null) !!} 1
    </label>
</div>

<!-- Idproducto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idProducto', 'Idproducto:') !!}
    {!! Form::number('idProducto', null, ['class' => 'form-control']) !!}
</div>

<!-- Idpresentacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idPresentacion', 'Idpresentacion:') !!}
    {!! Form::number('idPresentacion', null, ['class' => 'form-control']) !!}
</div>

<!-- Idmoneda Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idMoneda', 'Idmoneda:') !!}
    {!! Form::number('idMoneda', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('presentacionProductos.index') !!}" class="btn btn-default">Cancel</a>
</div>
