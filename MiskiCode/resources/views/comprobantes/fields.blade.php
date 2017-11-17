<!-- Fechorregistro Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecHorRegistro', 'Fechorregistro:') !!}
    {!! Form::date('fecHorRegistro', null, ['class' => 'form-control']) !!}
</div>

<!-- Serie Field -->
<div class="form-group col-sm-6">
    {!! Form::label('serie', 'Serie:') !!}
    {!! Form::text('serie', null, ['class' => 'form-control']) !!}
</div>

<!-- Numcorrelativo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numCorrelativo', 'Numcorrelativo:') !!}
    {!! Form::text('numCorrelativo', null, ['class' => 'form-control']) !!}
</div>

<!-- Obsv Field -->
<div class="form-group col-sm-6">
    {!! Form::label('obsv', 'Obsv:') !!}
    {!! Form::text('obsv', null, ['class' => 'form-control']) !!}
</div>

<!-- Mtobaseimponible Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mtoBaseImponible', 'Mtobaseimponible:') !!}
    {!! Form::number('mtoBaseImponible', null, ['class' => 'form-control']) !!}
</div>

<!-- Mtoigv Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mtoIgv', 'Mtoigv:') !!}
    {!! Form::number('mtoIgv', null, ['class' => 'form-control']) !!}
</div>

<!-- Mtodescuento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mtoDescuento', 'Mtodescuento:') !!}
    {!! Form::number('mtoDescuento', null, ['class' => 'form-control']) !!}
</div>

<!-- Mtototal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mtoTotal', 'Mtototal:') !!}
    {!! Form::number('mtoTotal', null, ['class' => 'form-control']) !!}
</div>

<!-- Mtovuelto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mtoVuelto', 'Mtovuelto:') !!}
    {!! Form::number('mtoVuelto', null, ['class' => 'form-control']) !!}
</div>

<!-- Cortesia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cortesia', 'Cortesia:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('cortesia', false) !!}
        {!! Form::checkbox('cortesia', '1', null) !!} 1
    </label>
</div>

<!-- Anulado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('anulado', 'Anulado:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('anulado', false) !!}
        {!! Form::checkbox('anulado', '1', null) !!} 1
    </label>
</div>

<!-- Idcliente Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idCliente', 'Idcliente:') !!}
    {!! Form::number('idCliente', null, ['class' => 'form-control']) !!}
</div>

<!-- Idpedido Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idPedido', 'Idpedido:') !!}
    {!! Form::number('idPedido', null, ['class' => 'form-control']) !!}
</div>

<!-- Idtipocomprobante Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idTipoComprobante', 'Idtipocomprobante:') !!}
    {!! Form::number('idTipoComprobante', null, ['class' => 'form-control']) !!}
</div>

<!-- Idsucursal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idSucursal', 'Idsucursal:') !!}
    {!! Form::number('idSucursal', null, ['class' => 'form-control']) !!}
</div>

<!-- Idmoneda Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idMoneda', 'Idmoneda:') !!}
    {!! Form::number('idMoneda', null, ['class' => 'form-control']) !!}
</div>

<!-- Idworkstation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idWorkstation', 'Idworkstation:') !!}
    {!! Form::number('idWorkstation', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('comprobantes.index') !!}" class="btn btn-default">Cancel</a>
</div>
