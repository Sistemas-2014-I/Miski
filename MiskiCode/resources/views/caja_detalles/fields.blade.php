<!-- Fechorapertura Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecHorApertura', 'Fechorapertura:') !!}
    {!! Form::date('fecHorApertura', null, ['class' => 'form-control']) !!}
</div>

<!-- Fechorcierre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecHorCierre', 'Fechorcierre:') !!}
    {!! Form::date('fecHorCierre', null, ['class' => 'form-control']) !!}
</div>

<!-- Mtoapertura Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mtoApertura', 'Mtoapertura:') !!}
    {!! Form::number('mtoApertura', null, ['class' => 'form-control']) !!}
</div>

<!-- Mtoingreso Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mtoIngreso', 'Mtoingreso:') !!}
    {!! Form::number('mtoIngreso', null, ['class' => 'form-control']) !!}
</div>

<!-- Mtoegreso Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mtoEgreso', 'Mtoegreso:') !!}
    {!! Form::number('mtoEgreso', null, ['class' => 'form-control']) !!}
</div>

<!-- Mtoestimado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mtoEstimado', 'Mtoestimado:') !!}
    {!! Form::number('mtoEstimado', null, ['class' => 'form-control']) !!}
</div>

<!-- Mtoreal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mtoReal', 'Mtoreal:') !!}
    {!! Form::number('mtoReal', null, ['class' => 'form-control']) !!}
</div>

<!-- Mtodiferencia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mtoDiferencia', 'Mtodiferencia:') !!}
    {!! Form::number('mtoDiferencia', null, ['class' => 'form-control']) !!}
</div>

<!-- Aperturado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('aperturado', 'Aperturado:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('aperturado', false) !!}
        {!! Form::checkbox('aperturado', '1', null) !!} 1
    </label>
</div>

<!-- Idmoneda Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idMoneda', 'Idmoneda:') !!}
    {!! Form::number('idMoneda', null, ['class' => 'form-control']) !!}
</div>

<!-- Idempleado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idEmpleado', 'Idempleado:') !!}
    {!! Form::number('idEmpleado', null, ['class' => 'form-control']) !!}
</div>

<!-- Idworkstation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idWorkstation', 'Idworkstation:') !!}
    {!! Form::number('idWorkstation', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('cajaDetalles.index') !!}" class="btn btn-default">Cancel</a>
</div>
