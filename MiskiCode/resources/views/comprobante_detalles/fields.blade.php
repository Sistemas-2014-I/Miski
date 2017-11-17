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

<!-- Idpresentacionproducto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idPresentacionProducto', 'Idpresentacionproducto:') !!}
    {!! Form::number('idPresentacionProducto', null, ['class' => 'form-control']) !!}
</div>

<!-- Idcomprobante Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idComprobante', 'Idcomprobante:') !!}
    {!! Form::number('idComprobante', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('comprobanteDetalles.index') !!}" class="btn btn-default">Cancel</a>
</div>
