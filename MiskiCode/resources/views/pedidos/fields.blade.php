<!-- Cantidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cantidad', 'Cantidad:') !!}
    {!! Form::number('cantidad', null, ['class' => 'form-control']) !!}
</div>

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

<!-- Idpedido Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idPedido', 'Idpedido:') !!}
    {!! Form::number('idPedido', null, ['class' => 'form-control']) !!}
</div>

<!-- Idpresentacionproducto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idPresentacionProducto', 'Idpresentacionproducto:') !!}
    {!! Form::number('idPresentacionProducto', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('pedidos.index') !!}" class="btn btn-default">Cancel</a>
</div>
