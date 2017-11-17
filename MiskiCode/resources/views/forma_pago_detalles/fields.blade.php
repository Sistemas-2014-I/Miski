<!-- Mtorecibido Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mtoRecibido', 'Mtorecibido:') !!}
    {!! Form::number('mtoRecibido', null, ['class' => 'form-control']) !!}
</div>

<!-- Mtocobrado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mtoCobrado', 'Mtocobrado:') !!}
    {!! Form::number('mtoCobrado', null, ['class' => 'form-control']) !!}
</div>

<!-- Mtovuelto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mtoVuelto', 'Mtovuelto:') !!}
    {!! Form::number('mtoVuelto', null, ['class' => 'form-control']) !!}
</div>

<!-- Idformapago Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idFormaPago', 'Idformapago:') !!}
    {!! Form::number('idFormaPago', null, ['class' => 'form-control']) !!}
</div>

<!-- Idcomprobante Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idComprobante', 'Idcomprobante:') !!}
    {!! Form::number('idComprobante', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('formaPagoDetalles.index') !!}" class="btn btn-default">Cancel</a>
</div>
